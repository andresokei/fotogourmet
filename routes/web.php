<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\GalleryController;
use App\Livewire\Dashboard\Main;
use App\Models\User;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CustomStripeWebhookController;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page (público)
Route::view('/', 'landing')->name('home');

// Dashboard (Livewire) - requiere autenticación y verificación
Route::get('/dashboard', Main::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Perfil - requiere autenticación
Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas de autenticación con Google
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

    // Marcar email como verificado si no lo está
    if (is_null($user->email_verified_at)) {
        $user->email_verified_at = now();
        $user->save();
    }

      if ($user->wasRecentlyCreated) {
        $user->adjustCredits(2, 'welcome');
        Session::flash('nuevo_registro_google', true);
    }

    Auth::login($user);
    return redirect('/dashboard');
});



// Grupo de rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    
    // Subida de imágenes
    Route::get('/upload', [ImageUploadController::class, 'show'])->name('upload.show');
    Route::post('/upload', [ImageUploadController::class, 'store'])->name('upload.store');
    
    // Galería de imágenes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('/gallery/filter', [GalleryController::class, 'filter'])->name('gallery.filter');
    
    // Rutas de suscripciones organizadas
    Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('/plans', [SubscriptionController::class, 'showPlans'])->name('plans');
        Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
        Route::get('/portal', [SubscriptionController::class, 'redirectToPortal'])->name('portal');
        Route::get('/success', [SubscriptionController::class, 'success'])->name('success');
        Route::get('/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });
});

// Webhook de Stripe (sin autenticación por diseño)
Route::post('/stripe/webhook', [CustomStripeWebhookController::class, 'handleWebhook'])
    ->name('stripe.webhook');

// Rutas de autenticación generadas por Breeze
require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         Route::get('users', function () {
             $users = \App\Models\User::orderBy('created_at','desc')->paginate(20);
             return view('admin.users.index', compact('users'));
         })->name('users.index');
});