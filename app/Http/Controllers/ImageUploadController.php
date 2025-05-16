<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function show()
    {
        return view('images.upload');
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:2048'
    ]);

    $path = $request->file('image')->store('photos', 'public');

    return redirect()->route('dashboard')->with('success', 'Imagen subida correctamente: ' . $path);
}

}
