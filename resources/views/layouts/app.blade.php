<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Open Graph / Facebook / WhatsApp -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://chefsnap.app/">
<meta property="og:title" content="ChefSnap - Transforma tus fotos gastronómicas al instante">
<meta property="og:description" content="Haz que tus platos brillen en Instagram, Google Maps y tu carta digital. Impulsa las ventas con imágenes irresistibles.">
<meta property="og:image" content="https://chefsnap.app/img/preview.jpg">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="https://chefsnap.app/">
<meta name="twitter:title" content="ChefSnap - Transforma tus fotos gastronómicas al instante">
<meta name="twitter:description" content="Haz que tus platos brillen en Instagram, Google Maps y tu carta digital. Impulsa las ventas con imágenes irresistibles.">
<meta name="twitter:image" content="https://chefsnap.app/img/preview2.jpg">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<title>HOLA</title>
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9XXLGG97ZJ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-9XXLGG97ZJ');
    </script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
            @livewireScripts
    </body>
</html>
