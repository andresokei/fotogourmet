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
        // Refresca el modelo
        $image = Image::find($this->image->id);

        // Marca como "processing"
        $image->status = 'processing';
        $image->save();

        $prompt = match ($image->processing_options) {
            'rustico' => 'Transforma la imagen en una fotografía gastronómica profesional estilo rústico...',
            'alta-cocina' => 'Transforma la imagen en una fotografía gastronómica profesional estilo alta cocina...',
            'luminoso' => 'Transforma la imagen en una fotografía gastronómica profesional estilo luminoso...',
            default => 'Transforma la imagen en una fotografía gastronómica profesional realista.',
        };

        $imagePath = Storage::disk('public')->path($image->original_path);
        $imageFile = fopen($imagePath, 'r');

        try {
            if (app()->environment('local')) {
                // Simulación en desarrollo (puedes cambiar la ruta a tu imagen de test)
                $testImagePath = public_path('test.png');
                $base64 = base64_encode(file_get_contents($testImagePath));
            } else {
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
            if (is_resource($imageFile)) {
                fclose($imageFile);
            }
            $image->update(['status' => 'failed']);
        }
    }
}
