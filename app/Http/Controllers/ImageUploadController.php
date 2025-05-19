<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\CreditTransaction;
use App\Jobs\ProcessImageJob;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    // El método show() solo muestra el formulario (si lo usas, sino bórralo)
    public function show()
    {
        return view('images.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:6144',
            'style' => 'required|string',
        ]);

        $user = auth()->user();

        if ($user->credits_balance < 1) {
            return redirect()->back()->withErrors(['No tienes créditos suficientes para transformar una imagen.']);
        }

        $image = null;
        \DB::transaction(function () use ($request, $user, &$image) {
            $user->credits_balance -= 1;
            $user->save();

            \App\Models\CreditTransaction::create([
                'user_id'   => $user->id,
                'amount'    => -1,
                'type'      => 'use',
                'reference' => null,
            ]);

            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('originals', $filename, 'public');

            $image = Image::create([
                'user_id' => $user->id,
                'original_path' => $path,
                'status' => 'pending',
                'processing_options' => $request->input('style'),
            ]);
        });

        dispatch(new ProcessImageJob($image));

        return redirect()->back()->with([
            'message' => 'Imagen subida correctamente. Estamos procesándola, recibirás el resultado en cuanto esté lista.',
        ]);
    }
}
