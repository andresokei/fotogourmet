<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var Image */
    public $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Ejecuta la edición de imagen.
     * - Marca failed si el modelo no devuelve imagen o sucede cualquier excepción.
     * - Solo descuenta créditos cuando la imagen se genera con éxito.
     */
    public function handle(): void
    {
        $usarApiReal = true;

        // Carga fresca del registro
        $image = Image::find($this->image->id);
        if (!$image) {
            return;
        }

        $image->update(['status' => 'processing']);

        /* -------- Prompt -------- */
        $prompt = match ($image->processing_options) {
            'rustico'     => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato, con ingredientes ligeramente irregulares y detalles naturales. • Iluminación: luz natural suave tipo ventana lateral, con sombras suaves pero perceptibles; evita apariencia de estudio o luz artificial. • Estética: estilo rústico-gourmet auténtico; fondo cálido y orgánico, como una mesa de madera real con textura visible y fondo ligeramente desenfocado (bokeh sutil). • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar textura y capas, pero no tan extrema como para parecer irreal. • Edición: realismo por encima de perfección: contraste leve, saturación natural, sin suavizados ni filtros artificiales. Que parezca tomada con una cámara profesional, no generada. • Entrega: solo la foto final, sin texto, marcas de agua.',
            'alta-cocina' => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato, con ingredientes ligeramente irregulares y detalles naturales. • Iluminación: luz cuidada de estudio fotografico para fotografia gastronomica • Estética: estilo gourmet nouvelle cousin, restaurante con estrella michellin; fondo oscuro y auténtico (bokeh sutil). • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar textura y capas, pero no tan extrema como para parecer irreal. • Edición: realismo por encima de perfección: contraste leve, saturación natural, sin suavizados ni filtros artificiales. Que parezca tomada con una cámara profesional, no generada. • Entrega: solo la foto final, sin texto, marcas de agua.',
            'luminoso'    => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato. • Iluminación: natural luminosa para fotografia gastronomica • Estética: estilo cafetería moderna y luminosa; fondo orgánico con bokeh sutil. • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar texturas. • Edición: realismo por encima de perfección. • Entrega: solo la foto final, sin texto, marcas de agua.',
            default        => 'Transforma la imagen en una fotografía gastronómica profesional realista.',
        };

        $imagePath = Storage::disk('public')->path($image->original_path);
        $base64    = null;

        try {
            if (!$usarApiReal) {
                // Modo demo
                $base64 = base64_encode(file_get_contents(public_path('test.png')));
            } else {
                $response = Http::timeout(120)
                    ->withToken(config('services.openai.key'))
                    ->attach('image', file_get_contents($imagePath), 'image.jpg') // ruta del archivo
                    ->attach('prompt', $prompt)
                    ->attach('model', 'gpt-image-1')
                    ->attach('size', '1536x1024') // resolución máxima permitida  // resolución alta
                    ->attach('quality', 'high')      // calidad alta
                    ->post('https://api.openai.com/v1/images/edits');

                if (!$response->successful()) {
                    Log::error('OpenAI error', [
                        'status'   => $response->status(),
                        'response' => $response->json(),
                    ]);
                    $this->failImage($image, 'OpenAI API error');
                    return;
                }

                $base64 = $response['data'][0]['b64_json'] ?? null;
            }

            // Verificación de resultado
            if (!$base64) {
                $this->failImage($image, 'Empty or null base64');
                return;
            }

            // Guarda la imagen procesada
            $outputPath = 'processed/' . basename($image->original_path);
            Storage::disk('public')->put($outputPath, base64_decode($base64));

            $image->update([
                'processed_path' => $outputPath,
                'status'         => 'done',
            ]);

            // Descuento de crédito SOLO en éxito
            $user = $image->user;
            if ($user && $user->credits_balance > 0) {
                $user->adjustCredits(-1, 'use', (string) $image->id);
            }
        } catch (\Throwable $e) {
            Log::error('ProcessImageJob exception', ['message' => $e->getMessage()]);
            $this->failImage($image, $e->getMessage());
        }
    }

    /** Marca la imagen como fallida y registra el motivo */
    private function failImage(Image $image, string $message = ''): void
    {
        $image->update(['status' => 'failed']);

        Log::warning('Image processing failed', [
            'image_id' => $image->id,
            'reason'   => $message,
        ]);
    }
}
