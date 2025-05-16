<?php
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('public/images');

        return back()->with('success', 'Imagen subida: ' . $path);
    }
}
