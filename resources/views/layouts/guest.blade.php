<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ChefSnap') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --gold-primary: #d4af37;
                --gold-light: #f0d278;
                --gold-dark: #9c7c21;
                --black-primary: #0a0a0a;
                --black-secondary: #111111;
                --white-primary: #ffffff;
                --gray-light: rgba(255, 255, 255, 0.8);
            }

            body {
                background: linear-gradient(135deg, #000000 0%, #111111 100%) !important;
                min-height: 100vh;
                margin: 0;
                padding: 0;
                font-family: 'Montserrat', sans-serif !important;
                color: var(--white-primary) !important;
            }
            
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: 
                    url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.02)' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
                z-index: -1;
                pointer-events: none;
            }

            .chefsnap-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1.5rem 0;
                position: relative;
                z-index: 1;
            }

            .chefsnap-logo {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 2rem;
                text-decoration: none;
            }

            .logo-container {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
                transition: transform 0.3s ease;
                padding: 12px;
            }

            .logo-container:hover {
                transform: scale(1.05);
            }

            .logo-container img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                border-radius: 50%;
            }

            .content-wrapper {
                width: 100%;
                max-width: 420px;
                position: relative;
            }

            /* Eliminar estilos por defecto de Tailwind para el contenedor del slot */
            .content-wrapper > div {
                background: transparent !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="chefsnap-container">
            <div>
                <a href="/" wire:navigate class="chefsnap-logo">
                    <!-- <div class="logo-container">
                        <img src="{{ asset('img/logo.png') }}" alt="ChefSnap Logo" />
                    </div> -->
                </a>
            </div>

            <div class="content-wrapper">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>