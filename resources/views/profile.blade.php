<style>
:root {
    --gold-primary: #d4af37;
    --gold-light: #f0d278;
    --gold-dark: #9c7c21;
}

/* Mejoras sutiles para la página de perfil */
.profile-header {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 600 !important;
    font-size: 1.5rem !important;
}

.profile-container {
    background: linear-gradient(135deg, #000000 0%, #111111 100%) !important;
    min-height: calc(100vh - 64px);
    padding: 3rem 0;
}

.profile-card {
    background: rgba(17, 17, 17, 0.95) !important;
    border: 1px solid rgba(212, 175, 55, 0.3) !important;
    border-radius: 8px !important;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5) !important;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease !important;
}

.profile-card:hover {
    border-color: rgba(212, 175, 55, 0.4) !important;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6) !important;
}

/* Mejoras para los formularios dentro */
.profile-card input[type="text"],
.profile-card input[type="email"],
.profile-card input[type="password"] {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(212, 175, 55, 0.3) !important;
    color: white !important;
    border-radius: 6px !important;
    padding: 0.75rem 1rem !important;
    transition: all 0.3s ease !important;
}

.profile-card input[type="text"]:focus,
.profile-card input[type="email"]:focus,
.profile-card input[type="password"]:focus {
    border-color: var(--gold-primary) !important;
    box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1) !important;
    background: rgba(255, 255, 255, 0.08) !important;
}

.profile-card label {
    color: rgba(255, 255, 255, 0.8) !important;
    font-weight: 500 !important;
    margin-bottom: 0.5rem !important;
    font-size: 0.9rem !important;
}

.profile-card button[type="submit"] {
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%) !important;
    color: black !important;
    font-weight: 600 !important;
    padding: 0.75rem 1.5rem !important;
    border-radius: 6px !important;
    border: none !important;
    transition: all 0.3s ease !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    font-size: 0.85rem !important;
}

.profile-card button[type="submit"]:hover {
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3) !important;
}

.profile-card button.delete-btn {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%) !important;
    color: white !important;
}

.profile-card button.delete-btn:hover {
    background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%) !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3) !important;
}

.profile-card h3,
.profile-card h2 {
    color: white !important;
    font-weight: 600 !important;
}

.profile-card p {
    color: rgba(255, 255, 255, 0.7) !important;
}

.profile-card a {
    color: var(--gold-primary) !important;
    transition: color 0.3s ease !important;
}

.profile-card a:hover {
    color: var(--gold-light) !important;
}

.error-message {
    color: #ef4444 !important;
    font-size: 0.8rem !important;
}

.success-message {
    color: #22c55e !important;
    font-size: 0.9rem !important;
}

@media (max-width: 640px) {
    .profile-container {
        padding: 2rem 0;
    }
    
    .profile-header {
        font-size: 1.2rem !important;
    }
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="profile-header font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="profile-container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="profile-card p-4 sm:p-8 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="profile-card p-4 sm:p-8 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="profile-card p-4 sm:p-8 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>