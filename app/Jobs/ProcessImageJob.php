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
use Illuminate\Support\Str;

class ProcessImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $image;

    /**
     * Create a new job instance.
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Cambia esto a true para usar la API real, o a false para simular
        $usarApiReal = false; // <<--- SOLO CAMBIA ESTA LÍNEA

        // Refresca el modelo
        $image = Image::find($this->image->id);

        // Marca como "processing"
        $image->status = 'processing';
        $image->save();

        $prompt = match ($image->processing_options) {
            'rustico' => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato, con ingredientes ligeramente irregulares y detalles naturales. • Iluminación: luz natural suave tipo ventana lateral, con sombras suaves pero perceptibles; evita apariencia de estudio o luz artificial. • Estética: estilo rústico-gourmet auténtico; fondo cálido y orgánico, como una mesa de madera real con textura visible y fondo ligeramente desenfocado (bokeh sutil). • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar textura y capas, pero no tan extrema como para parecer irreal. • Edición: realismo por encima de perfección: contraste leve, saturación natural, sin suavizados ni filtros artificiales. Que parezca tomada con una cámara profesional, no generada. • Entrega: solo la foto final, sin texto, marcas de agua ni retoques estéticos artificiales',
            'alta-cocina' => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato, con ingredientes ligeramente irregulares y detalles naturales. • Iluminación: luz cuidada de estudio fotografico para fotografia gastronomica • Estética: estilo gourmet nouvelle cousin, restaurante con estrella michellin pero auténtico; fondo oscuro y auténtico (bokeh sutil). • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar textura y capas, pero no tan extrema como para parecer irreal. • Edición: realismo por encima de perfección: contraste leve, saturación natural, sin suavizados ni filtros artificiales. Que parezca tomada con una cámara profesional, no generada. • Entrega: solo la foto final, sin texto, marcas de agua ni retoques estéticos artificiales.',
            'luminoso' => 'Transforma la imagen en una fotografía gastronómica profesional realista: • Composición: mantén la disposición original del plato, con ingredientes ligeramente irregulares y detalles naturales. • Iluminación: natural luminosa para fotografia gastronomica • Estética: estilo cafetería moderna y luminosa, estética de bar hipster de bali o california; fondo organico luminoso, auténtico pero con bokeh. • Cámara: ángulo natural de 45° ("ojo de chef"), profundidad de campo baja para destacar textura y capas, pero no tan extrema como para parecer irreal. • Edición: realismo por encima de perfección: contraste leve, saturación natural, sin suavizados ni filtros artificiales. Que parezca tomada con una cámara profesional, no generada. • Entrega: solo la foto final, sin texto, marcas de agua ni retoques estéticos artificiales.',
            default => 'Transforma la imagen en una fotografía gastronómica profesional realista.',
        };

        $imagePath = Storage::disk('public')->path($image->original_path);
        $imageFile = fopen($imagePath, 'r');

        try {
            if (!$usarApiReal) {
                // Simulación local: usar imagen de test
                $testImagePath = public_path('test.png');
                $base64 = base64_encode(file_get_contents($testImagePath));
            } else {
                // Llamada real a la API de OpenAI
                $response = Http::timeout(120)
                    ->withToken(config('services.openai.key'))
                    ->attach('image', $imageFile, 'image.jpg')
                    ->attach('prompt', $prompt)
                    ->attach('model', 'gpt-image-1')
                    ->post('https://api.openai.com/v1/images/edits');

                fclose($imageFile);

                if ($response->successful()) {
                    $result = $response->json();
                    $base64 = $result['data'][0]['b64_json'] ?? null;
                } else {
                    $image->update(['status' => 'failed']);
                    return;
                }
            }

            $outputPath = 'processed/' . basename($image->original_path);
            Storage::disk('public')->put($outputPath, base64_decode($base64));

            $image->update([
                'processed_path' => $outputPath,
                'status' => 'done',
            ]);

        } catch (\Exception $e) {
            if (isset($imageFile) && is_resource($imageFile)) {
                fclose($imageFile);
            }
            $image->update(['status' => 'failed']);
        }
    }
}
