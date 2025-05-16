<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ImageUploadController;
use App\Livewire\Dashboard\Main;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'landing');

// Dashboard (Livewire)
Route::get('/dashboard', Main::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Perfil (opcional si aún no lo usas)
Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Login con Google
Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate(
        ['google_id' => $googleUser->getId()],
        [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'avatar' => $googleUser->getAvatar(),
        ]
    );

    Auth::login($user);
    return redirect('/dashboard');
})->name('google.callback');

// Subida de imágenes sin Livewire
Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [ImageUploadController::class, 'show'])->name('upload.show');
    Route::post('/upload', [ImageUploadController::class, 'store'])->name('upload.store');
});

// Auth routes generadas por Breeze
require __DIR__ . '/auth.php';
