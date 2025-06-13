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
            'rustico'     => 'Realistic professional food photo, keep original plating of the dish. Lighting: soft side window light, warm late-afternoon glow. Style: rustic bistro, rough wood table, vintage cutlery, background blurred. Camera: 45-degree angle, full-frame DSLR 50 mm f/2.8. Color: earthy, warm, moderate saturation. Post: subtle contrast, clear textures, no filters, no text. --negative_prompt: plastic, neon, CGI, flat lighting, watermark.',
            'alta-cocina' => 'Realistic Michelin-style food photo, keep original plating of the dish. Lighting: controlled studio softbox, dark moody background with gentle gradient. Style: haute cuisine, minimalist slate plate, gourmet garnish. Camera: 45-degree angle, DSLR 90 mm macro, f/3.2, ISO 100. Color: neutral with delicate highlights. Post: high clarity, slight vignette, no text. --negative_prompt: home kitchen, messy, cartoon, watermark.',
            'luminoso'    => '	Bright daylight food photo, keep original plating of the dish. Lighting: morning window light, airy shadows. Style: modern café, light wooden table, pastel ceramics, background blurred. Camera: 45-degree angle, DSLR 35 mm, f/2.8. Color: fresh, soft, slightly cool whites. Post: gentle contrast, no filters, no text. --negative_prompt: harsh shadows, oversaturated, CGI, watermark.',
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
                    ->attach('size', '1024x1024') // 
                    ->attach('quality', 'medium')      // calidad 
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
