<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Jobs\ProcessImageJob;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    /** Muestra el formulario (opcional) */
    public function show()
    {
        return view('images.upload');
    }

    /** Sube la imagen y lanza el Job */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:6144', // máx. 6 MB
            'style' => 'required|string',
        ]);

        $user = $request->user();

        // Solo comprobamos saldo; NO lo descontamos aquí
        if ($user->credits_balance < 1) {
            return back()->withErrors([
                'No tienes créditos suficientes para transformar una imagen.',
            ]);
        }

        // Creamos la imagen dentro de una transacción
        $image = \DB::transaction(function () use ($request, $user) {
            $file     = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path     = $file->storeAs('originals', $filename, 'public');

            return Image::create([
                'user_id'            => $user->id,
                'original_path'      => $path,
                'status'             => 'pending',
                'processing_options' => $request->input('style'),
            ]);
        });

        // Encola el Job
        dispatch(new ProcessImageJob($image));

        return back()->with([
            'message' => 'Imagen subida correctamente. Estamos procesándola; recibirás el resultado en cuanto esté lista.',
        ]);
    }
}
