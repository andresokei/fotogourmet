<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard\Main;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');


Route::get('/dashboard', Main::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

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
