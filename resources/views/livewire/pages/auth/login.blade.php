<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<style>
:root {
    --gold-primary: #d4af37;
    --gold-light: #f0d278;
    --gold-dark: #9c7c21;
}

/* Contenedor principal con márgenes móviles - más específico */
form {
    margin: 0 1rem;
    box-sizing: border-box;
}

/* También aplicar a session status */
.session-status {
    margin-left: 1rem;
    margin-right: 1rem;
}

/* Mejoras para los inputs */
input[type="email"], 
input[type="password"] {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(212, 175, 55, 0.3) !important;
    color: white !important;
    border-radius: 8px !important;
    padding: 0.75rem 1rem !important;
    transition: all 0.3s ease !important;
}

input[type="email"]:focus, 
input[type="password"]:focus {
    border-color: var(--gold-primary) !important;
    box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1) !important;
    background: rgba(255, 255, 255, 0.08) !important;
}

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

/* Checkbox mejorado */
input[type="checkbox"] {
    accent-color: var(--gold-primary) !important;
    width: 18px !important;
    height: 18px !important;
}

/* Enlaces */
a {
    color: var(--gold-primary) !important;
    transition: color 0.3s ease !important;
}

a:hover {
    color: var(--gold-light) !important;
}

/* Remember me text */
.remember-text {
    color: rgba(255, 255, 255, 0.7) !important;
    font-size: 0.9rem !important;
}

/* Error messages */
.error-text {
    color: #ef4444 !important;
    font-size: 0.8rem !important;
}

/* Session status */
.session-status {
    background: rgba(34, 197, 94, 0.1) !important;
    border: 1px solid rgba(34, 197, 94, 0.3) !important;
    color: #22c55e !important;
    padding: 0.75rem 1rem !important;
    border-radius: 8px !important;
    margin-bottom: 1.5rem !important;
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

/* Responsive mejorado con márgenes */
@media (max-width: 768px) {
    form {
        margin: 0 1.5rem;
    }
    
    .session-status {
        margin-left: 1.5rem;
        margin-right: 1.5rem;
    }
}

@media (max-width: 480px) {
    form {
        margin: 0 1.25rem;
    }
    
    .session-status {
        margin-left: 1.25rem;
        margin-right: 1.25rem;
    }
    
    .actions-container {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    button[type="submit"] {
        width: 100%;
    }
}

@media (max-width: 360px) {
    form {
        margin: 0 1rem;
    }
    
    .session-status {
        margin-left: 1rem;
        margin-right: 1rem;
    }
}
</style>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="session-status" :status="session('status')" />

    <form wire:submit="login">
        
        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" placeholder="tu@email.com" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2 error-text" />
        </div>

        <!-- Google Login Button -->
        <div class="form-group">
            <a href="{{ url('/auth/redirect/google') }}"
               class="w-full inline-flex justify-center items-center google-btn-improved">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21.35 11.1h-9.19v2.91h5.39c-.23 1.4-1.64 4.08-5.39 4.08-3.26 0-5.93-2.71-5.93-6.05s2.67-6.05 5.93-6.05c1.86 0 3.12.79 3.83 1.48l2.63-2.55C17.77 4.07 15.71 3 13.01 3 7.94 3 4 6.96 4 12s3.94 9 9.01 9c5.18 0 8.61-3.63 8.61-8.74 0-.6-.07-1.15-.17-1.66z"/>
                </svg>
                Continuar con Google
            </a>
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2 error-text" />
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" name="remember">
                <span class="ms-2 remember-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="actions-container">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>