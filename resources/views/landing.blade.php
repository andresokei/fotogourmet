<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FotoGourmet') }}
        </h2>
    </x-slot>

    {{-- Estilos personalizados --}}
    <style>
        :root {
            --primary: #c9a227;
            --dark: #222;
            --light: #fff;
            --gray: #f5f5f5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        .custom-header {
            padding: 20px 0;
            position: relative;
            z-index: 100;
            background-color: var(--dark);
            color: var(--light);
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo span {
            font-size: 1.5rem;
            margin-left: 5px;
        }
        
        .menu-toggle {
            display: none;
            cursor: pointer;
            width: 30px;
            height: 20px;
            position: relative;
            z-index: 101;
        }
        
        .menu-toggle span {
            display: block;
            width: 100%;
            height: 2px;
            background-color: var(--light);
            position: absolute;
            transition: all 0.3s;
        }
        
        .menu-toggle span:nth-child(1) {
            top: 0;
        }
        
        .menu-toggle span:nth-child(2) {
            top: 9px;
        }
        
        .menu-toggle span:nth-child(3) {
            top: 18px;
        }
        
        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg);
            top: 9px;
        }
        
        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        
        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg);
            top: 9px;
        }
        
        .menu {
            display: flex;
            list-style: none;
            transition: all 0.3s ease;
        }
        
        .menu li {
            margin-left: 30px;
        }
        
        .menu a {
            color: var(--light);
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }
        
        .menu a:hover {
            color: var(--primary);
        }
        
        .cta-button {
            background-color: var(--primary);
            color: var(--dark);
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .cta-button:hover {
            background-color: #e0b52b;
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            padding: 50px 0;
            background-color: var(--dark);
            color: var(--light);
        }
        
        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        
        .hero-text {
            padding-right: 20px;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            line-height: 1.1;
            margin-bottom: 30px;
        }
        
        .hero-text h1 span {
            color: var(--primary);
            display: block;
        }
        
        .hero-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 40px;
            color: #ccc;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .secondary-button {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .secondary-button:hover {
            background-color: rgba(201, 162, 39, 0.1);
        }
        
        .note {
            font-size: 0.9rem;
            color: #999;
            font-style: italic;
            margin-top: 20px;
        }
        
        /* Slider */
        .slider-container {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            height: 100%;
        }
        
        .image-slider {
            position: relative;
            width: 100%;
            height: 450px;
        }
        
        .slider-before,
        .slider-after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: contain;
            background-position: center ;
        }
        
        /* Cómo funciona el slider:
         * slider-before: imagen completa de fondo (debe ser la imagen "antes")
         * slider-after: imagen que se revela con el deslizador (debe ser la imagen "después")
         */
        .slider-before {
            /* Sin filtros */
        }
        
        .slider-after {
            clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
        }
        
        .slider-handle {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--light);
            left: 50%;
            transform: translateX(-50%);
            cursor: ew-resize;
            z-index: 10;
        }
        
        .slider-handle::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        
        .slider-label {
            position: absolute;
            bottom: 20px;
            color: var(--light);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            pointer-events: none;
        }
        
        .before-label {
            left: 20px;
        }
        
        .after-label {
            right: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-text h1 {
                font-size: 2.8rem;
            }
            
            .image-slider {
                height: 400px;
            }
        }
        
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            
            .menu {
                position: fixed;
                top: 0;
                right: -100%;
                flex-direction: column;
                background-color: var(--dark);
                width: 80%;
                height: 100vh;
                padding: 80px 30px;
                z-index: 100;
                transition: all 0.4s ease;
            }
            
            .menu.active {
                right: 0;
            }
            
            .menu li {
                margin: 15px 0;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .hero-text {
                padding-right: 0;
                order: 1;
            }
            
            .slider-container {
                order: 0;
            }
            
            .hero-text h1 {
                font-size: 2.5rem;
            }
            
            .image-slider {
                height: 350px;
            }
            
            .hero {
                padding: 30px 0;
            }
        }
        
        @media (max-width: 576px) {
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .hero-text p {
                font-size: 1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .image-slider {
                height: 300px;
            }
            
            nav {
                justify-content: space-between;
            }
            
            .nav-right {
                width: 100%;
                display: flex;
                justify-content: space-between;
                margin-top: 15px;
            }
            
            .logo {
                font-size: 1.6rem;
            }
            
            .slider-handle::after {
                width: 30px;
                height: 30px;
            }
        }
    </style>

    {{-- Contenido principal --}}
    <div class="custom-header">
        <div class="container">
            <nav>
                <a href="{{ url('/') }}" class="logo">
                    FotoGourmet<span>🍽️</span>
                </a>
                <div class="menu-toggle" id="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="menu" id="menu">
                    <li><a href="{{ url('/como-funciona') }}">Cómo Funciona</a></li>
                    <li><a href="{{ url('/ejemplos') }}">Ejemplos</a></li>
                    <li><a href="{{ url('/beneficios') }}">Beneficios</a></li>
                    <li><a href="{{ url('/testimonios') }}">Testimonios</a></li>
                    <li><a href="{{ url('/precios') }}">Precios</a></li>
                </ul>
                <a href="{{ url('/empezar') }}" class="cta-button">Empezar Ahora</a>
            </nav>
        </div>
    </div>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Fotografía gastronómica <span>profesional</span> en segundos.</h1>
                    <p>Transforma la presencia online de tu restaurante sin costosas sesiones fotográficas. Mejora las fotos de tus platos al instante.</p>
                    <div class="hero-buttons">
                        <a href="{{ url('/subir') }}" class="cta-button">Sube tu plato</a>
                        <a href="{{ url('/ejemplos') }}" class="secondary-button">Ver ejemplos</a>
                    </div>
                    <p class="note">¡Así de simple! Sin equipos costosos ni fotógrafos.</p>
                </div>
                <div class="slider-container">
                    <div class="image-slider">
                        <div class="slider-before" style="background-image: url('/img/postre-despues.png')"></div>
                        <div class="slider-after" style="background-image: url('/img/postre-antes.png')"></div>   
                        <div class="slider-handle" id="slider-handle"></div>
                        <div class="slider-label before-label">Antes</div>
                        <div class="slider-label after-label">Después</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JavaScript --}}
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');
            
            if (menuToggle && menu) {
                menuToggle.addEventListener('click', () => {
                    menuToggle.classList.toggle('active');
                    menu.classList.toggle('active');
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!menu.contains(e.target) && !menuToggle.contains(e.target) && menu.classList.contains('active')) {
                        menu.classList.remove('active');
                        menuToggle.classList.remove('active');
                    }
                });
            }
            
            // Slider functionality
            const handle = document.getElementById('slider-handle');
            const sliderAfter = document.querySelector('.slider-after');
            
            if (handle && sliderAfter) {
                let isDragging = false;
                
                // Initial position - comienza mostrando más de la imagen "después"
                updateSliderPosition(35);
                
                function updateSliderPosition(percentage) {
                    sliderAfter.style.clipPath = `polygon(0 0, ${percentage}% 0, ${percentage}% 100%, 0 100%)`;
                    handle.style.left = `${percentage}%`;
                }
                
                handle.addEventListener('mousedown', () => {
                    isDragging = true;
                });
                
                window.addEventListener('mouseup', () => {
                    isDragging = false;
                });
                
                window.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    
                    const sliderRect = document.querySelector('.image-slider').getBoundingClientRect();
                    const percentage = Math.min(100, Math.max(0, ((e.clientX - sliderRect.left) / sliderRect.width) * 100));
                    
                    updateSliderPosition(percentage);
                });
                
                // Touch support for mobile
                handle.addEventListener('touchstart', (e) => {
                    isDragging = true;
                    e.preventDefault();
                });
                
                window.addEventListener('touchend', () => {
                    isDragging = false;
                });
                
                window.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    
                    const touch = e.touches[0];
                    const sliderRect = document.querySelector('.image-slider').getBoundingClientRect();
                    const percentage = Math.min(100, Math.max(0, ((touch.clientX - sliderRect.left) / sliderRect.width) * 100));
                    
                    updateSliderPosition(percentage);
                });
            }
        });
    </script>

    
</x-app-layout>