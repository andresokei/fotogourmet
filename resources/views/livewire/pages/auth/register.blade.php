<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<style>
:root {
    --gold-primary: #d4af37;
    --gold-light: #f0d278;
    --gold-dark: #9c7c21;
}

/* Mejoras para los inputs */
input[type="text"],
input[type="email"], 
input[type="password"] {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(212, 175, 55, 0.3) !important;
    color: white !important;
    border-radius: 8px !important;
    padding: 0.75rem 1rem !important;
    transition: all 0.3s ease !important;
}

input[type="text"]:focus,
input[type="email"]:focus, 
input[type="password"]:focus {
    border-color: var(--gold-primary) !important;
    box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1) !important;
    background: rgba(255, 255, 255, 0.08) !important;
}

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="password"]::placeholder {
    color: rgba(255, 255, 255, 0.5) !important;
}

/* Labels */
label {
    color: rgba(255, 255, 255, 0.8) !important;
    font-weight: 500 !important;
    margin-bottom: 0.5rem !important;
    font-size: 0.9rem !important;
}

/* Título del registro */
.register-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    font-weight: 600;
    color: white;
    text-align: center;
    margin-bottom: 0.5rem;
}

.register-subtitle {
    color: var(--gold-primary);
    text-align: center;
    margin-bottom: 2rem;
    font-size: 0.85rem;
    font-weight: 300;
    letter-spacing: 2px;
    text-transform: uppercase;
    opacity: 0.9;
}

/* Botón de Google mejorado */
.google-btn-improved {
    background: linear-gradient(135deg, #4285f4 0%, #34a853 25%, #fbbc05 50%, #ea4335 75%, #4285f4 100%) !important;
    background-size: 200% 200% !important;
    animation: gradientShift 3s ease infinite !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 0.9rem 1rem !important;
    border-radius: 8px !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    border: none !important;
}

.google-btn-improved:hover {
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(66, 133, 244, 0.3) !important;
    color: white !important;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Botón principal mejorado */
button[type="submit"] {
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%) !important;
    color: black !important;
    font-weight: 600 !important;
    padding: 0.9rem 2rem !important;
    border-radius: 8px !important;
    border: none !important;
    transition: all 0.3s ease !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    font-size: 0.85rem !important;
}

button[type="submit"]:hover {
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3) !important;
}

/* Enlaces */
a {
    color: var(--gold-primary) !important;
    transition: color 0.3s ease !important;
    text-decoration: none !important;
}

a:hover {
    color: var(--gold-light) !important;
}

/* Error messages */
.error-text {
    color: #ef4444 !important;
    font-size: 0.8rem !important;
}

/* Espaciado mejorado */
.form-group {
    margin-bottom: 1.5rem;
}

.actions-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1.5rem;
}

/* Divider */
.divider {
    display: flex;
    align-items: center;
    margin: 1.5rem 0;
    color: rgba(255, 255, 255, 0.4);
    font-size: 0.8rem;
    font-weight: 300;
    letter-spacing: 1px;
}

.divider::before,
.divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(255, 255, 255, 0.1);
}

.divider::before {
    margin-right: 1rem;
}

.divider::after {
    margin-left: 1rem;
}

@media (max-width: 480px) {
    .actions-container {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    button[type="submit"] {
        width: 100%;
    }
    
    .register-title {
        font-size: 1.6rem;
    }
}
</style>

<div>
    <!-- Title -->
    <h1 class="register-title">Crear Cuenta</h1>
    <p class="register-subtitle">Únete a ChefSnap</p>

    <!-- Google Registration Button -->
    <div class="form-group">
        <a href="{{ url('/auth/redirect/google') }}"
           class="w-full inline-flex justify-center items-center google-btn-improved">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21.35 11.1h-9.19v2.91h5.39c-.23 1.4-1.64 4.08-5.39 4.08-3.26 0-5.93-2.71-5.93-6.05s2.67-6.05 5.93-6.05c1.86 0 3.12.79 3.83 1.48l2.63-2.55C17.77 4.07 15.71 3 13.01 3 7.94 3 4 6.96 4 12s3.94 9 9.01 9c5.18 0 8.61-3.63 8.61-8.74 0-.6-.07-1.15-.17-1.66z"/>
            </svg>
            Registrarse con Google
        </a>
    </div>

    <!-- Divider -->
    <div class="divider">o crea tu cuenta</div>

    <form wire:submit="register">
        <!-- Name -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" placeholder="Tu nombre completo" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 error-text" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" placeholder="tu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error-text" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error-text" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error-text" />
        </div>

        <!-- Actions -->
        <div class="actions-container">
            <a href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>