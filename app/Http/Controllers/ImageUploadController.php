<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Jobs\ProcessImageJob;

class ImageUploadController extends Controller
{
    public function show()
    {
        $image = Image::where('user_id', auth()->id())
                    ->whereNotNull('processed_path')
                    ->latest()
                    ->first();

        return view('images.upload', compact('image'));
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:6144',
        'style' => 'required|string',
    ]);

    $file = $request->file('image');
    $filename = \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('originals', $filename, 'public');

    $image = \App\Models\Image::create([
        'user_id' => \Illuminate\Support\Facades\Auth::id(),
        'original_path' => $path,
        'status' => 'pending',
        'processing_options' => $request->input('style'),
    ]);

    // Aquí es donde despachas el job:
    dispatch(new ProcessImageJob($image));

    return redirect()->back()->with([
        'message' => 'Imagen subida correctamente. Estamos procesándola, recibirás el resultado en cuanto esté lista.',
    ]);
}
}
