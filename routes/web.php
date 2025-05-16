<?php

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});

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
});

// Ruta protegida del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
