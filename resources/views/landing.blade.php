<x-app-layout>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold-primary: #d4af37;
            --gold-light: #f0d278;
            --gold-dark: #9c7c21;
            --black-primary: #0a0a0a;
            --black-secondary: #111111;
            --white-primary: #ffffff;
            --gray-light: rgba(255, 255, 255, 0.8);
        }

        .landing-wrapper {
            background: #000000;
            color: var(--white-primary);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
            width: 100%;
        }
        
        .no-select {
            user-select: none !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
        }
        
        .landing-wrapper::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.02)' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: -1;
        }

        .gold-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }
        
        .particle {
            position: absolute;
            background: var(--gold-primary);
            width: 2px;
            height: 2px;
            border-radius: 50%;
            opacity: 0;
            animation: float 8s infinite ease-in-out;
        }
        
        .particle:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 40%; left: 30%; animation-delay: 1s; }
        .particle:nth-child(3) { top: 60%; left: 15%; animation-delay: 2s; }
        .particle:nth-child(4) { top: 80%; left: 25%; animation-delay: 3s; }
        .particle:nth-child(5) { top: 30%; left: 70%; animation-delay: 4s; }
        .particle:nth-child(6) { top: 50%; left: 85%; animation-delay: 5s; }
        .particle:nth-child(7) { top: 75%; left: 75%; animation-delay: 6s; }
        
        @keyframes float {
            0% { transform: translateY(0); opacity: 0; }
            25% { opacity: 0.3; }
            50% { transform: translateY(-100px); opacity: 0.6; }
            75% { opacity: 0.3; }
            100% { transform: translateY(-200px); opacity: 0; }
        }

        .hero {
            display: flex;
            padding: 6rem 6rem;
            max-width: 1600px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        @media screen and (max-width: 1200px) { .hero { padding: 5rem 4rem; } }
        @media screen and (max-width: 992px) {
            .hero { padding: 4rem 3rem; flex-direction: column; gap: 4rem; }
            .hero-content { padding-right: 0; }
        }
        @media screen and (max-width: 768px) { .hero { padding: 3rem 2rem; } }
        @media screen and (max-width: 480px) { .hero { padding: 2rem 1.5rem; gap: 3rem; } }

        .hero-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-right: 4rem;
            position: relative;
        }
        
        .hero-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: -4rem;
            width: 1px;
            height: 70%;
            background: linear-gradient(to bottom, transparent, var(--gold-primary), transparent);
            opacity: 0.4;
        }
        
        @media screen and (max-width: 992px) { .hero-content::before { display: none; } }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4.8rem;
            line-height: 1.1;
            margin-bottom: 1.8rem;
            font-weight: 400;
            letter-spacing: -0.5px;
            position: relative;
        }
        
        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 0;
            width: 80px;
            height: 2px;
            background: var(--gold-primary);
        }

        @media screen and (max-width: 1200px) { .hero-title { font-size: 4.2rem; } }
        @media screen and (max-width: 992px) { .hero-title { font-size: 3.8rem; } }
        @media screen and (max-width: 768px) { .hero-title { font-size: 3.2rem; } }
        @media screen and (max-width: 480px) {
            .hero-title { font-size: 2.5rem; margin-bottom: 1.5rem; }
            .hero-title::after { width: 60px; bottom: -0.8rem; }
        }

        .professional {
            color: var(--gold-primary);
            font-weight: 600;
            font-style: italic;
            display: inline-block;
        }

        .hero-text {
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 3rem;
            max-width: 520px;
            font-weight: 300;
            color: var(--gray-light);
            position: relative;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        @media screen and (max-width: 768px) {
            .hero-buttons { gap: 1rem; }
            .btn-upload, .btn-examples { padding: 0.9rem 1.8rem; font-size: 0.85rem; }
        }
        @media screen and (max-width: 480px) {
            .hero-buttons { flex-direction: column; gap: 1rem; width: 100%; }
            .btn-upload, .btn-examples { width: 100%; padding: 0.85rem 1.5rem; text-align: center; }
        }

        .btn-upload {
            padding: 1rem 2.2rem;
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
            border: none;
            color: var(--black-primary);
            border-radius: 2px;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-upload i { margin-right: 8px; }

        .btn-upload::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.05) 100%);
            z-index: -1;
        }

        .btn-upload:hover {
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 70%, var(--gold-primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.35);
        }

        .btn-examples {
            padding: 1rem 2.2rem;
            background: transparent;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            border-radius: 2px;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-examples i { margin-right: 8px; }

        .btn-examples::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(212, 175, 55, 0.05) 100%);
            transition: transform 0.4s ease;
        }

        .btn-examples:hover {
            border-color: var(--gold-light);
            color: var(--gold-light);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.15);
        }
        
        .btn-examples:hover::before { transform: translateX(100%); }

        .simple-text {
            font-size: 0.9rem;
            color: var(--gold-primary);
            opacity: 0.85;
            font-weight: 300;
            font-style: italic;
            letter-spacing: 0.5px;
        }

        .food-image-container {
            position: relative;
            width: 100%;
            height: 580px;
            overflow: hidden;
            border-radius: 3px;
            background-color: var(--black-secondary);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(212, 175, 55, 0.2);
            touch-action: none;
        }
        
        @media screen and (max-width: 1200px) { .food-image-container { height: 520px; } }
        @media screen and (max-width: 992px) { .food-image-container { height: 480px; max-width: 100%; } }
        @media screen and (max-width: 768px) { .food-image-container { height: 420px; } }
        @media screen and (max-width: 480px) {
            .food-image-container { height: 380px; }
            .before-label, .after-label { font-size: 0.7rem; padding: 0.4rem 0.9rem; bottom: 15px; }
            .before-label { left: 15px; }
            .after-label { right: 15px; }
        }
        
        .food-image-container::before, 
        .food-image-container::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 50px;
            border-color: var(--gold-primary);
            z-index: 4;
            opacity: 0.6;
            pointer-events: none;
        }
        
        .food-image-container::before { top: 10px; left: 10px; border-top: 1px solid; border-left: 1px solid; }
        .food-image-container::after { bottom: 10px; right: 10px; border-bottom: 1px solid; border-right: 1px solid; }

        .img-comp-container { position: relative; height: 100%; width: 100%; }
        .img-comp-img { position: absolute; width: 100%; height: 100%; overflow: hidden; }
        .img-comp-img img { display: block; width: 100%; height: 100%; object-fit: cover; }
        .img-comp-img.img-comp-overlay { clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%); }

        .img-comp-slider {
            position: absolute;
            z-index: 9;
            cursor: ew-resize;
            width: 2px;
            height: 100%;
            background-color: var(--gold-primary);
            left: 50%;
            transform: translateX(-50%);
        }

        .img-comp-handle {
            position: absolute;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
            border-radius: 50%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: var(--black-primary);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
            cursor: ew-resize;
            z-index: 10;
        }

        .img-comp-handle::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border-radius: 50%;
            border: 1px solid var(--gold-primary);
            opacity: 0.3;
        }

        .before-label, .after-label {
            position: absolute;
            bottom: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: var(--white-primary);
            padding: 0.5rem 1.2rem;
            border-radius: 2px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            z-index: 5;
        }

        .before-label {
            left: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: var(--white-primary);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .after-label {
            right: 20px;
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
            color: var(--black-primary);
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .scan-effect {
            position: absolute;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, 
                transparent 0%,
                rgba(212, 175, 55, 0.2) 20%,
                rgba(212, 175, 55, 0.8) 50%,
                rgba(212, 175, 55, 0.2) 80%,
                transparent 100%);
            z-index: 8;
            animation: scan 3s infinite ease-in-out;
            mix-blend-mode: overlay;
            pointer-events: none;
        }
        
        @keyframes scan {
            0% { top: 0; opacity: 1; }
            25% { opacity: 0.8; }
            50% { top: 95%; opacity: 1; }
            75% { opacity: 0.8; }
            100% { top: 0; opacity: 1; }
        }
        
        .vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, 
                transparent 60%, 
                rgba(0, 0, 0, 0.3) 100%);
            pointer-events: none;
            z-index: 6;
        }

        .upgrade-banner {
            background: linear-gradient(90deg, var(--gold-dark) 0%, var(--gold-primary) 50%, var(--gold-light) 100%);
            color: var(--black-primary);
            padding: 1.2rem;
            text-align: center;
            font-weight: 500;
            font-size: 1.05rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        
        @keyframes shine {
            0% { background-position: -100%; }
            100% { background-position: 200%; }
        }
        
        .shine-text {
            position: relative;
            display: inline-block;
            background: linear-gradient(to right, var(--black-primary) 0%, var(--black-primary) 42%, #ffffff 50%, var(--black-primary) 58%, var(--black-primary) 100%);
            background-size: 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s infinite linear;
            font-weight: 700;
        }
    </style>

    <div class="landing-wrapper">
        <div class="gold-particles">
            <div class="particle"></div> <div class="particle"></div> <div class="particle"></div> <div class="particle"></div> <div class="particle"></div> <div class="particle"></div> <div class="particle"></div>
        </div>

        <div class="hero">
            <div class="hero-content">
                <h1 class="hero-title">
                    Fotografía<br>
                    gastronómica<br>
                    <span class="professional">profesional</span> en<br>
                    segundos.
                </h1>
                <p class="hero-text">
     Eleva la presencia digital de tu restaurante con imágenes de calidad profesional. Transforma fotografías estándar en obras de arte gastronómicas con nuestra tecnología exclusiva.
</p>

                 <!--  botón  -->
                    <div class="hero-buttons">
                        <a href="{{ route('login') }}" class="btn-upload">
                            <i class="fas fa-cloud-upload-alt shine-text"></i>Probar gratis
                        </a>
                        <!-- <button class="btn-examples">
                            <i class="fas fa-images"></i>Galería Premium
                        </button> -->
                    </div>
                <p class="simple-text">Sin equipos
                    costosos. Sin sesiones fotográficas. Resultados inmediatos.</p>
            </div>
            <div class="hero-image">
                <div class="food-image-container">
                    <div class="img-comp-container">
                        <div class="img-comp-img">
                            <img src="/img/postre-despues.png" alt="Versión premium del plato">
                        </div>
                        <div class="img-comp-img img-comp-overlay">
                            <img src="/img/postre-antes.png" alt="Versión original del plato">
                        </div>
                        <div class="img-comp-slider">
                            <div class="img-comp-handle">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        <!-- <div class="before-label">Antes</div>
                        <div class="after-label">Después</div> -->
                        <div class=""></div>
                        <div class="vignette"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="upgrade-banner">
            <span class="shine-text">ChefSnap</span> — Fotografía gastronómica en segundos
        </div> -->
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.img-comp-container');
    const overlay = document.querySelector('.img-comp-overlay');
    const slider = document.querySelector('.img-comp-slider');
    const handle = document.querySelector('.img-comp-handle');
    let sliderPct = 25;

    initComparison();
    function initComparison() {
        updateSliderPosition(sliderPct);
        handle.addEventListener('mousedown', startDrag);
        slider.addEventListener('mousedown', startDrag);
        handle.addEventListener('touchstart', startDrag, { passive: false });
        slider.addEventListener('touchstart', startDrag, { passive: false });

        const btnUpload = document.querySelector('.btn-upload');
        if (btnUpload) {
            btnUpload.addEventListener('click', function() {
                // Cambiado: ahora redirige a login en lugar de mostrar alert
                window.location.href = "{{ route('login') }}";
            });
        }
        
        const btnExamples = document.querySelector('.btn-examples');
        if (btnExamples) {
            btnExamples.addEventListener('click', function() {
                alert('Galería de ejemplos en construcción. ¡Vuelve pronto!');
            });
        }
    }
    
    function updateSliderPosition(percent) {
        percent = Math.max(0, Math.min(100, percent));
        slider.style.left = percent + '%';
        overlay.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
        sliderPct = percent;
    }
    
    let isDragging = false;
    function startDrag(e) {
        e.preventDefault();
        isDragging = true;
        document.body.classList.add('no-select');
        window.addEventListener('mousemove', drag);
        window.addEventListener('touchmove', drag, { passive: false });
        window.addEventListener('mouseup', stopDrag);
        window.addEventListener('touchend', stopDrag);
        window.addEventListener('mouseleave', stopDrag);
        handle.style.transform = 'translate(-50%, -50%) scale(1.1)';
        drag(e);
    }
    
    function drag(e) {
        if (!isDragging) return;
        e.preventDefault();
        let pointerX;
        if (e.type === 'touchmove') {
            pointerX = e.touches[0].clientX;
        } else {
            pointerX = e.clientX;
        }
        
        const rect = container.getBoundingClientRect();
        let percent = ((pointerX - rect.left) / rect.width) * 100;
        updateSliderPosition(percent);
    }
    
    function stopDrag() {
        if (!isDragging) return;
        isDragging = false;
        document.body.classList.remove('no-select');
        window.removeEventListener('mousemove', drag);
        window.removeEventListener('touchmove', drag);
        window.removeEventListener('mouseup', stopDrag);
        window.removeEventListener('touchend', stopDrag);
        window.removeEventListener('mouseleave', stopDrag);
        handle.style.transform = 'translate(-50%, -50%)';
    }
    
    window.addEventListener('resize', function() {
        updateSliderPosition(sliderPct);
    });
    handle.addEventListener('mouseenter', function() {
        if (!isDragging) {
            this.style.transform = 'translate(-50%, -50%) scale(1.1)';
        }
    });
    handle.addEventListener('mouseleave', function() {
        if (!isDragging) {
            this.style.transform = 'translate(-50%, -50%)';
        }
    });
});
    </script>

<!-- ---FIN HERO----- -->

<!-- INICIO GALERIA -->
 <style>
.gallery-section {
    background-color: #000000;
    padding: 6rem 6rem;
    position: relative;
    overflow: hidden;
}

@media screen and (max-width: 1200px) { .gallery-section { padding: 5rem 4rem; } }
@media screen and (max-width: 992px) { .gallery-section { padding: 4rem 3rem; } }
@media screen and (max-width: 768px) { .gallery-section { padding: 3rem 2rem; } }
@media screen and (max-width: 480px) { .gallery-section { padding: 2rem 1.5rem; } }

.gallery-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.02)' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
    z-index: 0;
}

.gallery-header {
    text-align: center;
    margin-bottom: 4rem;
    position: relative;
    z-index: 1;
}

.gallery-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 3.8rem;
    font-weight: 400;
    color: var(--white-primary);
    margin-bottom: 1.5rem;
    position: relative;
    display: inline-block;
}

@media screen and (max-width: 992px) { .gallery-title { font-size: 3.4rem; } }
@media screen and (max-width: 768px) { .gallery-title { font-size: 3rem; } }
@media screen and (max-width: 480px) { .gallery-title { font-size: 2.5rem; } }

.gallery-title::after {
    content: '';
    position: absolute;
    bottom: -0.8rem;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 2px;
    background: var(--gold-primary);
}

.gallery-subtitle {
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
    color: var(--gray-light);
    line-height: 1.8;
    font-weight: 300;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2.5rem;
    max-width: 1400px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

@media screen and (max-width: 992px) { .gallery-grid { grid-template-columns: 1fr; gap: 3rem; } }

.gallery-item {
    position: relative;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(212, 175, 55, 0.2);
    background-color: var(--black-secondary);
    height: 500px;
}

@media screen and (max-width: 768px) { .gallery-item { height: 450px; } }
@media screen and (max-width: 480px) { .gallery-item { height: 380px; } }

.img-comp-container {
    position: relative;
    height: 100%;
    width: 100%;
}

.img-comp-img {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.img-comp-img img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.img-comp-img.img-comp-overlay {
    clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
}

.img-comp-slider {
    position: absolute;
    z-index: 9;
    cursor: ew-resize;
    width: 2px;
    height: 100%;
    background-color: var(--gold-primary);
    left: 50%;
    transform: translateX(-50%);
}

.img-comp-handle {
    position: absolute;
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
    border-radius: 50%;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    color: var(--black-primary);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
    cursor: ew-resize;
    z-index: 10;
}

.img-comp-handle::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    border: 1px solid var(--gold-primary);
    opacity: 0.3;
}

.before-label, .after-label {
    position: absolute;
    bottom: 15px;
    background-color: rgba(0, 0, 0, 0.7);
    color: var(--white-primary);
    padding: 0.5rem 1.2rem;
    border-radius: 2px;
    font-size: 0.8rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    z-index: 5;
}

.before-label {
    left: 15px;
    background-color: rgba(0, 0, 0, 0.7);
    color: var(--white-primary);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.after-label {
    right: 15px;
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
    color: var(--black-primary);
    font-weight: 600;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.dish-name {
    position: absolute;
    top: 20px;
    left: 20px;
    background-color: rgba(0, 0, 0, 0.7);
    color: var(--gold-primary);
    padding: 0.5rem 1.2rem;
    border-radius: 2px;
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 1px;
    z-index: 5;
    border: 1px solid rgba(212, 175, 55, 0.3);
}

/* Eliminados los estilos de scan-effect y su animación */

.vignette {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center, 
        transparent 60%, 
        rgba(0, 0, 0, 0.3) 100%);
    pointer-events: none;
    z-index: 6;
}

.call-to-action {
    margin-top: 4rem;
    text-align: center;
    position: relative;
    z-index: 1;
}

.btn-gallery-action {
    display: inline-block;
    padding: 1rem 2.5rem;
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
    border: none;
    color: var(--black-primary);
    border-radius: 2px;
    font-weight: 600;
    font-size: 0.9rem;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25);
    text-decoration: none;
}

.btn-gallery-action:hover {
    background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 70%, var(--gold-primary) 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(212, 175, 55, 0.35);
}

.btn-gallery-action i {
    margin-right: 8px;
}

.gallery-note {
    margin-top: 1.5rem;
    font-size: 0.9rem;
    color: var(--gold-primary);
    opacity: 0.85;
    font-weight: 300;
    font-style: italic;
    letter-spacing: 0.5px;
}
</style>

<section class="gallery-section">
    <div class="gallery-header">
        <h2 class="gallery-title">El 93% de los clientes decide con los ojos.</h2>
        <p class="gallery-subtitle">
             <p class="section-text">
    Ese restaurante que siempre está lleno también invierte en cómo se ve online.
</p>


        </p>
    </div>

    <div class="gallery-grid">
        <!-- Item 1: Burger -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Burguer Gourmet</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/burguer-despues.jpg" alt="Plato gourmet premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/burguer-antes.jpg" alt="Plato gourmet original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 2: Tarta -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Tarta de Chocolate</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/tarta-despues.png" alt="Tarta premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/tarta-antes.png" alt="Tarta original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>
<!-- Item 3: Plato Gourmet -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Pasteles Gourmet</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/pasteles-despues.jpg" alt="Plato gourmet premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/pasteles-antes.jpg" alt="Plato gourmet original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 4: Avocado Toast -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Tosta de Aguacate</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/avocado-despues.jpg" alt="avocado premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/avocado-antes.jpg" alt="avocado original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 3: tartar -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Tartar </div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/tartar-despues.png" alt="tartar premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/tartar-antes.png" alt="tartar original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>
        
        <!-- Item 4: gambas -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Gambass al ajillo</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/gambas-despues.png" alt="gambass premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/gambas-antes.png" alt="gambass original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>

        <!-- otros 6  -->

        <!-- Item 7: Langostino -->
        <div class="gallery-item">
            <!-- <div class="dish-name">langostino Gourmet</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/langostino-despues.jpg" alt="Plato gourmet premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/langostino-antes.jpg" alt="Plato gourmet original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 8: rollitos -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Rollitos</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/rollitos-despues.jpg" alt="rollitos premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/rollitos-antes.jpg" alt="rollitos original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>
<!-- Item 9: pasteleria Gourmet -->
        <div class="gallery-item">
            <!-- <div class="dish-name">pasteleria Gourmet</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/pasteleria-despues.jpg" alt="Plato gourmet premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/pasteleria-antes.jpg" alt="Plato gourmet original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 10: Bowl -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Bowl</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/bowl-despues.jpg" alt="bowl premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/bowl-antes.jpg" alt="bowl original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>

        <!-- Item 11: Burguer 2 -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Burguer </div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/burguer2-despues.jpg" alt="burguer2 premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/burguer2-antes.jpg" alt="burguer2 original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>
        
        <!-- Item 12: tarta queso -->
        <div class="gallery-item">
            <!-- <div class="dish-name">Tarta de queso</div> -->
            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img src="/img/tartaqueso-despues.png" alt="tarta queso premium">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img src="/img/tartaqueso-antes.png" alt="tarta de quedo original">
                </div>
                <div class="img-comp-slider">
                    <div class="img-comp-handle">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <!-- <div class="before-label">Antes</div>
                <div class="after-label">Después</div> -->
                <div class=""></div>
                <div class="vignette"></div>
            </div>
        </div>
    </div>
    
    <div class="call-to-action">
        <a href="{{ route('login') }}" class="btn-gallery-action "><i class="fas fa-cloud-upload-alt shine-text"></i>Transforma tus fotos ahora</a>
        <p class="gallery-note">Haz que tus platos destaquen en redes sociales, google maps, carta online... y multiplica tus ventas.</p>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initAllComparisons();
    
    function initAllComparisons() {
        const comparisons = document.querySelectorAll('.gallery-item');
        
        comparisons.forEach(item => {
            const container = item.querySelector('.img-comp-container');
            const overlay = item.querySelector('.img-comp-overlay');
            const slider = item.querySelector('.img-comp-slider');
            const handle = item.querySelector('.img-comp-handle');
            let sliderPct = 10;
            
            updateSliderPosition(sliderPct, overlay, slider);
            
            handle.addEventListener('mousedown', function(e) {
                startDrag(e, container, overlay, slider, handle);
            });
            
            slider.addEventListener('mousedown', function(e) {
                startDrag(e, container, overlay, slider, handle);
            });
            
            handle.addEventListener('touchstart', function(e) {
                startDrag(e, container, overlay, slider, handle);
            }, { passive: false });
            
            slider.addEventListener('touchstart', function(e) {
                startDrag(e, container, overlay, slider, handle);
            }, { passive: false });
            
            handle.addEventListener('mouseenter', function() {
                this.style.transform = 'translate(-50%, -50%) scale(1.1)';
            });
            
            handle.addEventListener('mouseleave', function() {
                this.style.transform = 'translate(-50%, -50%)';
            });
        });
    }
    
    function updateSliderPosition(percent, overlay, slider) {
        percent = Math.max(0, Math.min(100, percent));
        slider.style.left = percent + '%';
        overlay.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
    }
    
    function startDrag(e, container, overlay, slider, handle) {
        e.preventDefault();
        let isDragging = true;
        document.body.classList.add('no-select');
        
        window.addEventListener('mousemove', drag);
        window.addEventListener('touchmove', drag, { passive: false });
        window.addEventListener('mouseup', stopDrag);
        window.addEventListener('touchend', stopDrag);
        window.addEventListener('mouseleave', stopDrag);
        
        handle.style.transform = 'translate(-50%, -50%) scale(1.1)';
        drag(e);
        
        function drag(e) {
            if (!isDragging) return;
            e.preventDefault();
            
            let pointerX;
            if (e.type === 'touchmove') {
                pointerX = e.touches[0].clientX;
            } else {
                pointerX = e.clientX;
            }
            
            const rect = container.getBoundingClientRect();
            let percent = ((pointerX - rect.left) / rect.width) * 100;
            updateSliderPosition(percent, overlay, slider);
        }
        
        function stopDrag() {
            if (!isDragging) return;
            isDragging = false;
            document.body.classList.remove('no-select');
            
            window.removeEventListener('mousemove', drag);
            window.removeEventListener('touchmove', drag);
            window.removeEventListener('mouseup', stopDrag);
            window.removeEventListener('touchend', stopDrag);
            window.removeEventListener('mouseleave', stopDrag);
            
            handle.style.transform = 'translate(-50%, -50%)';
        }
    }
    
    // Eliminar la animación automática al hacer hover en gallery-item
    /*
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const overlay = this.querySelector('.img-comp-overlay');
            const slider = this.querySelector('.img-comp-slider');
            
            // Animar slider de 50% a 30% y volver a 50%
            let startPct = 50;
            let targetPct = 30;
            let duration = 800; // ms
            let startTime = null;
            
            function animate(currentTime) {
                if (!startTime) startTime = currentTime;
                let progress = (currentTime - startTime) / duration;
                
                if (progress < 0.5) {
                    // Primera mitad: ir de 50% a 30%
                    let currentPct = startPct - ((startPct - targetPct) * (progress * 2));
                    updateSliderPosition(currentPct, overlay, slider);
                } else if (progress < 1) {
                    // Segunda mitad: volver de 30% a 50%
                    let adjustedProgress = (progress - 0.5) * 2; // Normalizar de 0-1
                    let currentPct = targetPct + ((startPct - targetPct) * adjustedProgress);
                    updateSliderPosition(currentPct, overlay, slider);
                } else {
                    // Finalizar en 50%
                    updateSliderPosition(startPct, overlay, slider);
                    return;
                }
                
                requestAnimationFrame(animate);
            }
            
            requestAnimationFrame(animate);
        });
    });
    */
});
</script>
 <!-- FIN GALERIA -->
  <!-- INICIO SECCION COMO USAR -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cómo funciona - Simplificado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --white-primary: #ffffff;
            --black-primary: #000000;
            --gold-primary: #d4af37;
            --gold-light: #f4d03f;
            --gray-light: #b8b8b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .how-it-works-section {
            background-color: #000000;
            padding: 4rem 0;
            color: white;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: var(--white-primary);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray-light);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .step {
            text-align: center;
            padding: 1.5rem;
            background: rgba(20, 20, 20, 0.5);
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.3s ease;
        }

        .step:hover {
            border-color: var(--gold-primary);
            transform: translateY(-5px);
        }

        .step-number {
            background: var(--gold-primary);
            color: var(--black-primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin: 0 auto 1rem;
        }

        .step-icon {
            font-size: 2rem;
            color: var(--gold-primary);
            margin-bottom: 1rem;
        }

        .step-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: var(--white-primary);
        }

        .step-description {
            font-size: 0.95rem;
            color: var(--gray-light);
            line-height: 1.5;
        }

        .styles-preview {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .style-badge {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 20px;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            color: var(--gold-primary);
        }

        .cta-section {
            text-align: center;
            margin-top: 2rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold-light), var(--gold-primary));
            color: var(--black-primary);
            padding: 1rem 2rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }

        .note {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--gray-light);
            font-style: italic;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .steps-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .styles-preview {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <section class="how-it-works-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Cómo funciona</h2>
                <p class="section-subtitle">
                    Transforma tus fotos gastronómicas en 3 simples pasos. 
                    Sin conocimientos técnicos, sin equipos costosos.
                </p>
            </div>
            
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <i class="fas fa-upload step-icon"></i>
                    <h3 class="step-title">Sube tu foto</h3>
                    <p class="step-description">
                        Usa cualquier foto que tengas: del móvil, redes sociales o Google Maps. 
                        Funciona incluso con fotos de baja calidad.
                    </p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <i class="fas fa-magic step-icon"></i>
                    <h3 class="step-title">Elige tu estilo</h3>
                    <p class="step-description">
                        Selecciona entre nuestros estilos profesionales: Alta Cocina, Rústico o Luminoso. 
                        La IA transformará tu imagen en menos de 2 minutos.
                    </p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <i class="fas fa-download step-icon"></i>
                    <h3 class="step-title">Descarga y usa</h3>
                    <p class="step-description">
                        Obtén tu imagen profesional en alta resolución, 
                        lista para cartas, webs, redes sociales y delivery.
                    </p>
                </div>
            </div>
            
            <div class="cta-section">
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class="fas fa-rocket shine-text" style="margin-right: 8px;"></i>
                    Prueba gratis ahora
                </a>
                <p class="note">No necesitas tarjeta de crédito para empezar</p>
            </div>
        </div>
    </section>
</body>
</html>
<!-- --fin seccion como usar -->


<!-- -----------seccion -->
 <style>
    .roi-section {
        background-color: #000000;
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .roi-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.02)' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
        z-index: 0;
    }
    
    .roi-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 1;
    }
    
    .roi-header {
        text-align: center;
        margin-bottom: 4rem;
    }
    
    .roi-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3.2rem;
        font-weight: 400;
        color: var(--white-primary);
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
    }
    
    .roi-title::after {
        content: '';
        position: absolute;
        bottom: -0.8rem;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 2px;
        background: var(--gold-primary);
    }
    
    .roi-subtitle {
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
        color: var(--gray-light);
        line-height: 1.8;
        font-weight: 300;
    }
    
    .roi-calculator {
        margin-bottom: 4rem;
    }
    
    .calculator-controls {
        background: rgba(10, 10, 10, 0.6);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .slider-container {
        margin-bottom: 2rem;
    }
    
    .slider-label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.8rem;
    }
    
    .slider-title {
        font-size: 1.1rem;
        color: var(--white-primary);
        font-weight: 500;
    }
    
    .slider-value {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
        color: var(--black-primary);
        padding: 0.4rem 1rem;
        border-radius: 4px;
        font-weight: 600;
        min-width: 70px;
        text-align: center;
    }
    
    .slider-control {
        width: 100%;
        -webkit-appearance: none;
        height: 6px;
        background: #333;
        border-radius: 3px;
        outline: none;
    }
    
    .slider-control::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--gold-primary);
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.8);
    }
    
    .slider-control::-moz-range-thumb {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--gold-primary);
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.8);
    }
    
    .time-options {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .time-option {
        flex: 1;
        padding: 1rem;
        text-align: center;
        background: rgba(20, 20, 20, 0.7);
        border: 1px solid rgba(212, 175, 55, 0.15);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .time-option.active {
        background: rgba(212, 175, 55, 0.15);
        border-color: var(--gold-primary);
    }
    
    .time-option-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--white-primary);
        margin-bottom: 0.5rem;
    }
    
    .time-option-value {
        font-size: 0.85rem;
        color: var(--gray-light);
    }
    
    .comparison-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    @media (max-width: 992px) {
        .comparison-cards {
            grid-template-columns: 1fr;
        }
    }
    
    .comparison-card {
        background: linear-gradient(180deg, rgba(20, 20, 20, 1) 0%, rgba(10, 10, 10, 1) 100%);
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid rgba(212, 175, 55, 0.2);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .comparison-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        border-color: rgba(212, 175, 55, 0.5);
    }
    
    .card-recommended {
        border: 2px solid var(--gold-primary);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
    }
    
    .recommended-badge {
        position: absolute;
        top: -10px;
        right: 20px;
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
        color: var(--black-primary);
        font-weight: 700;
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        z-index: 2;
    }
    
    .card-header {
        padding: 2rem 1.5rem 1.5rem;
        text-align: center;
        position: relative;
    }
    
    .card-icon {
        width: 60px;
        height: 60px;
        background: rgba(212, 175, 55, 0.1);
        border-radius: 50%;
        margin: 0 auto 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--gold-primary);
        font-size: 1.5rem;
    }
    
    .card-riquin {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
        color: var(--black-primary);
    }
    
    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--white-primary);
        margin-bottom: 0.5rem;
    }
    
    .card-price {
        margin-top: 1.5rem;
    }
    
    .price-value {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--white-primary);
        letter-spacing: -1px;
    }
    
    .price-value.highlighted {
        color: var(--gold-primary);
    }
    
    .price-value.alternative {
        color: #e74c3c;
        position: relative;
    }
    
    .price-value.alternative::after {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        height: 2px;
        background: rgba(231, 76, 60, 0.5);
        transform: rotate(-5deg);
    }
    
    .price-period {
        font-size: 0.9rem;
        color: var(--gray-light);
        margin-left: 0.5rem;
    }
    
    .card-list {
        padding: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .card-item {
        display: flex;
        align-items: flex-start;
        gap: 0.8rem;
        padding: 0.8rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .card-item:last-child {
        border-bottom: none;
    }
    
    .item-icon {
        color: var(--gold-primary);
        font-size: 0.9rem;
        margin-top: 0.2rem;
    }
    
    .negative .item-icon {
        color: #e74c3c;
    }
    
    .item-text {
        font-size: 0.9rem;
        line-height: 1.5;
        color: var(--gray-light);
    }
    
    .savings-container {
        text-align: center;
        padding: 2.5rem;
        background: linear-gradient(180deg, rgba(20, 20, 20, 0.7) 0%, rgba(10, 10, 10, 0.7) 100%);
        border-radius: 8px;
        border: 1px solid rgba(212, 175, 55, 0.3);
        margin-bottom: 3rem;
    }
    
    .savings-title {
        font-size: 1.6rem;
        color: var(--white-primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .savings-value {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
        line-height: 1;
    }
    
    .savings-subtitle {
        font-size: 1.1rem;
        color: var(--gray-light);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .roi-cta {
        text-align: center;
    }
    
    .btn-roi-action {
        display: inline-block;
        padding: 1rem 2.5rem;
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
        border: none;
        color: var(--black-primary);
        border-radius: 2px;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25);
        text-decoration: none;
    }
    
    .btn-roi-action:hover {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 70%, var(--gold-primary) 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.35);
    }
    
    .btn-roi-action i {
        margin-right: 8px;
    }
    
    .roi-guarantee {
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: var(--gold-primary);
        opacity: 0.85;
        font-weight: 300;
        font-style: italic;
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .roi-section {
            padding: 4rem 0;
        }
        
        .roi-title {
            font-size: 2.5rem;
        }
        
        .roi-subtitle {
            font-size: 1rem;
        }
        
        .price-value {
            font-size: 2.2rem;
        }
        
        .savings-title {
            font-size: 1.4rem;
        }
        
        .savings-value {
            font-size: 2.8rem;
        }
        
        .savings-subtitle {
            font-size: 1rem;
        }
        
        .time-options {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<section class="roi-section">
    <div class="roi-container">
        <div class="roi-header">
            <h2 class="roi-title">Fotografía profesional por una fracción del coste</h2>
            <p class="roi-subtitle">
                Descubre cuánto puedes ahorrar con ChefSnap respecto a otros métodos de fotografía gastronómica.
            </p>
        </div>
        
        <div class="roi-calculator">
            <div class="calculator-controls">
                <div class="slider-container">
                    <div class="slider-label">
                        <span class="slider-title">Número de platos</span>
                        <span class="slider-value" id="platos-value">15</span>
                    </div>
                    <input type="range" min="5" max="50" value="15" class="slider-control" id="platos-slider">
                </div>
                
                <div class="time-options">
                    <div class="time-option active" data-value="1">
                        <div class="time-option-title">1 mes</div>
                        <div class="time-option-value">Para carta temporal</div>
                    </div>
                    <div class="time-option" data-value="3">
                        <div class="time-option-title">3 meses</div>
                        <div class="time-option-value">Temporada</div>
                    </div>
                    <div class="time-option" data-value="12">
                        <div class="time-option-title">12 meses</div>
                        <div class="time-option-value">Carta completa anual</div>
                    </div>
                </div>
            </div>
            
            <div class="comparison-cards">
                <div class="comparison-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="card-title">Sesión Fotográfica Profesional</h3>
                        <div class="card-price">
                            <span class="price-value alternative" id="professional-price">€1.200</span>
                            <span class="price-period">por sesión</span>
                        </div>
                    </div>
                    <div class="card-list">
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Requiere planificación previa y sesión programada</span>
                        </div>
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Límite de 8-12 platos por sesión</span>
                        </div>
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Necesita estilismo profesional adicional</span>
                        </div>
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Resultados profesionales</span>
                        </div>
                    </div>
                </div>
                
                <div class="comparison-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="card-title">Equipamiento DIY</h3>
                        <div class="card-price">
                            <span class="price-value alternative" id="diy-price">€1.000</span>
                            <span class="price-period">inversión inicial</span>
                        </div>
                    </div>
                    <div class="card-list">
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Requiere conocimientos técnicos y práctica</span>
                        </div>
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Curva de aprendizaje de meses</span>
                        </div>
                        <div class="card-item negative">
                            <span class="item-icon"><i class="fas fa-times"></i></span>
                            <span class="item-text">Resultados variables según habilidad</span>
                        </div>
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Disponible cuando lo necesites</span>
                        </div>
                    </div>
                </div>
                
                <div class="comparison-card card-recommended">
                    <div class="recommended-badge">Recomendado</div>
                    <div class="card-header">
                        <div class="card-icon card-riquin">
                            <i class="fas fa-magic"></i>
                        </div>
                        <h3 class="card-title">ChefSnap</h3>
                        <div class="card-price">
                            <span class="price-value highlighted" id="riquin-price">€9,90</span>
                            <span class="price-period">/mes</span>
                        </div>
                    </div>
                    <div class="card-list">
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Sin equipos ni conocimientos técnicos</span>
                        </div>
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Fotografía ilimitada de todos tus platos</span>
                        </div>
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Resultados profesionales en segundos</span>
                        </div>
                        <div class="card-item">
                            <span class="item-icon"><i class="fas fa-check"></i></span>
                            <span class="item-text">Disponible 24/7, cancelable en cualquier momento</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="savings-container">
                <h3 class="savings-title">Tu ahorro estimado:</h3>
                <div class="savings-value" id="savings-value">92%</div>
                <p class="savings-subtitle" id="savings-subtitle">
                    Ahorras €1.190,10 comparado con una sesión fotográfica profesional para tus 15 platos.
                </p>
            </div>
        </div>
        
        <div class="roi-cta">
            <a href="{{ route('login') }}" class="btn-roi-action">
                <i class="fas fa-bolt shine-text"></i>Pruebalo Gratis Ahora
            </a>
            <p class="roi-guarantee">2 créditos gratis · Sin Tarjeta · Sin permanencia</p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos DOM
    const platosSlider = document.getElementById('platos-slider');
    const platosValue = document.getElementById('platos-value');
    const timeOptions = document.querySelectorAll('.time-option');
    const professionalPrice = document.getElementById('professional-price');
    const diyPrice = document.getElementById('diy-price');
    const riquinPrice = document.getElementById('riquin-price');
    const savingsValue = document.getElementById('savings-value');
    const savingsSubtitle = document.getElementById('savings-subtitle');
    
    // Valores iniciales
    let numPlatos = parseInt(platosSlider.value);
    let meses = 1; // Opción predeterminada: 1 mes
    
    // Precios base
    const PRECIO_SESION_PROFESIONAL = 1200; // €1200 por sesión
    const PRECIO_EQUIPO_DIY = 1000; // €1000 inversión inicial
    const PRECIOS_RIQUIN = {
        'starter': 9.90,
        'pro': 24.90,
        'business': 49.00
    };
    
    // Actualizar slider de platos
    platosSlider.addEventListener('input', function() {
        numPlatos = parseInt(this.value);
        platosValue.textContent = numPlatos;
        actualizarPrecios();
    });
    
    // Manejar opciones de tiempo
    timeOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remover clase activa de todas las opciones
            timeOptions.forEach(opt => opt.classList.remove('active'));
            // Agregar clase activa a la opción seleccionada
            this.classList.add('active');
            // Actualizar valor de meses
            meses = parseInt(this.getAttribute('data-value'));
            actualizarPrecios();
        });
    });
    
    // Función para calcular y actualizar precios
    function actualizarPrecios() {
        // Calcular precio profesional
        let sesionesNecesarias = Math.ceil(numPlatos / 10); // Asumiendo 10 platos por sesión
        let precioProTotal = sesionesNecesarias * PRECIO_SESION_PROFESIONAL;
        professionalPrice.textContent = '€' + precioProTotal.toLocaleString();
        
        // El precio DIY es fijo (inversión inicial)
        diyPrice.textContent = '€' + PRECIO_EQUIPO_DIY.toLocaleString();
        
        // Calcular precio Riquín según número de platos
        let planRiquin = 'starter'; // Plan predeterminado
        if (numPlatos > 90) {
            planRiquin = 'business';
        } else if (numPlatos > 30) {
            planRiquin = 'pro';
        }
        
        let precioRiquinMensual = PRECIOS_RIQUIN[planRiquin];
        let precioRiquinTotal = precioRiquinMensual * meses;
        
        // Actualizar precio de Riquín
        riquinPrice.textContent = '€' + precioRiquinMensual.toFixed(2).replace('.', ',');
        
        // Calcular y mostrar ahorro (comparado con profesional)
        let ahorroPorcentaje = Math.floor(((precioProTotal - precioRiquinTotal) / precioProTotal) * 100);
        let ahorroAbsoluto = precioProTotal - precioRiquinTotal;
        
        savingsValue.textContent = ahorroPorcentaje + '%';
        savingsSubtitle.textContent = `Ahorras €${ahorroAbsoluto.toLocaleString()} comparado con una sesión fotográfica profesional para tus ${numPlatos} platos.`;
    }
    
    // Inicializar precios
    actualizarPrecios();
});
</script>
 <!-- fin seccion -->




<style>
    body, .premium-section {
        background-color: #000000; /* Explicitly setting plans section background to black */
        color: var(--gray-light);
    }

    .premium-section {
        min-height: 100vh;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .premium-title {
        color: var(--gold-primary);
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.4rem;
        font-weight: 700;
        margin-top: 3.5rem;
        margin-bottom: 0.5rem;
        letter-spacing: 0.01em;
        text-align: center;
    }
    .premium-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.18rem;
        margin-bottom: 2.5rem;
        font-weight: 400;
        text-align: center;
        letter-spacing: 0.01em;
    }
    .plans-container {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        margin-bottom: 2.2rem;
        width: 100%;
        max-width: 1100px;
    }
    .plan-wrapper {
        flex: 1 1 310px;
        max-width: 340px;
        min-width: 275px;
        display: flex;
        flex-direction: column;
    }
    .plan-card {
        background: linear-gradient(180deg, var(--black-secondary) 0%, var(--black-primary) 100%);
        border-radius: 1.2rem;
        border: 1.5px solid var(--gold-primary);
        box-shadow: 0 8px 32px 0 rgba(212,175,55,0.13), 0 1.5px 0 0 var(--gold-primary);
        padding: 2.1rem 1.1rem 2.4rem 1.1rem;
        margin-bottom: 1.2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 510px;
        transition: transform .21s cubic-bezier(.4,2,.3,1), box-shadow .2s;
    }
    .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 44px 0 rgba(212,175,55,0.24);
    }
    .plan-badge {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 22px;
        background: var(--gold-light);
        color: var(--black-primary);
        font-weight: 700;
        padding: 0.42rem 1.1rem;
        border-radius: 2.5rem;
        font-size: 0.92rem;
        letter-spacing: 0.01em;
        box-shadow: 0 2px 10px rgba(0,0,0,0.09);
        border: 1.2px solid var(--gold-primary);
        z-index: 2;
    }
    .plan-badge.plan-popular {
        background: var(--gold-light); 
        color: var(--black-primary);
        font-weight: 900;
        border-width: 2.1px;
        border-color: var(--gold-primary);
        font-size: 1.01rem;
    }
    .plan-popular-label {
        position: absolute;
        top: 60px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--gold-primary);
        color: var(--black-primary);
        font-size: .92rem;
        font-weight: 700;
        border-radius: 2rem;
        padding: 0.19rem 0.98rem;
        box-shadow: 0 1.5px 8px rgba(212,175,55,0.17);
        z-index: 2;
        letter-spacing: 0.01em;
    }
    .plan-price {
        margin: 2.1rem 0 1.1rem;
        font-family: 'Montserrat', Arial, sans-serif;
    }
    .price-amount {
        font-size: 2.95rem;
        font-weight: 800;
        color: var(--gold-light);
        letter-spacing: -0.04em;
    }
    .price-currency {
        font-size: 1.6rem;
        font-weight: 600;
        color: var(--gold-light);
        margin-left: 0.22rem;
    }
    .price-period {
        font-size: 1.09rem;
        color: var(--gray-light);
        opacity: 0.8;
        margin-left: 0.45rem;
        font-weight: 500;
    }
    .features-list {
        list-style: none;
        padding: 0;
        margin: 1.1rem 0 0.5rem 0;
        text-align: left;
    }
    .feature-item {
        color: var(--gray-light);
        font-size: 1.08rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.69rem 0;
        border-bottom: 1px solid rgba(212,175,55,0.13);
    }
    .feature-item:last-child {
        border-bottom: none;
    }
    .feature-icon {
        width: 1.25em;
        height: 1.25em;
        color: var(--gold-light);
        flex-shrink: 0;
    }
    .plan-action {
        margin-top: 1.95rem;
    }
    .btn-gold {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 50%, var(--gold-dark) 100%);
        color: var(--black-primary);
        font-weight: 600;
        border-radius: 2px;
        padding: 1rem 2.2rem;
        font-size: 0.9rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border: none;
        outline: none;
        transition: all 0.4s ease;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25);
        text-decoration: none;
        width: 100%;
        cursor: pointer;
    }
    .btn-gold:hover {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-primary) 70%, var(--gold-primary) 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.35);
    }
    @media (max-width: 1050px) {
        .plans-container { gap: 1.1rem; }
        .plan-wrapper { min-width: 220px; }
    }
    @media (max-width: 880px) {
        .plans-container { flex-wrap: wrap; gap: 1.1rem;}
        .plan-wrapper { flex: 1 1 90vw; max-width: 450px;}
    }
    @media (max-width: 600px) {
        .premium-title { font-size: 1.55rem; }
        .premium-subtitle { font-size: 1.01rem; }
        .plan-card { padding: 1.5rem 0.7rem 2rem 0.7rem; min-height: 410px;}
        .price-amount { font-size: 2.15rem;}
        .plan-wrapper { min-width: 99vw; max-width: 99vw;}
    }
    .premium-footer {
        text-align: center;
        color: var(--gray-light);
        opacity: 0.85;
        font-size: 0.99rem;
        margin-top: 0.6rem;
        margin-bottom: 2.6rem;
        letter-spacing: 0.01em;
    }
    .free-trial-container {
        margin-top: 1rem;
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .btn-free-trial {
        background: transparent;
        color: var(--gold-primary);
        font-weight: 500;
        border-radius: 2px;
        padding: 1rem 2.2rem;
        font-size: 0.9rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border: 1px solid var(--gold-primary);
        outline: none;
        transition: all .18s ease; 
        box-shadow: 0 3px 15px rgba(212,175,55,0.07);
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        margin-bottom: 0.7rem;
    }
    
    .btn-free-trial:hover {
        border-color: var(--gold-light);
        color: var(--gold-light);
        background: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.15);
    }
    
    .free-trial-info {
        color: var(--gray-light);
        opacity: 0.8;
        font-size: 0.98rem;
        margin-top: 0.4rem;
    }
</style>







<!-- <div class="premium-section"> 
    <h2 class="premium-title">Elige tu Plan</h2>
    <div class="premium-subtitle">
        Llévate fotos irresistibles para tu carta, RRSS o delivery.<br>
        Paga solo por los créditos que realmente necesitas.
    </div>
    
    <div class="plans-container">
        <div class="plan-wrapper">
            <div class="plan-card">
                <div class="plan-badge">Starter</div>
                <div class="plan-price">
                    <span class="price-amount">9</span><span class="price-currency">,90 €</span>
                    <span class="price-period">/mes</span>
                </div>
                <ul class="features-list">
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        30 créditos/mes
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Calidad profesional IA
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Descarga HD ilimitada
                    </li>
                </ul>
                <div class="plan-action">
                    <a href="{{ route('subscriptions.plans') }}" class="btn-gold">Suscribirse</a>
                </div>
            </div>
        </div>
        
        <div class="plan-wrapper">
            <div class="plan-card" style="box-shadow:0 12px 40px 0 rgba(212,175,55,0.23);
                                         border:2.3px solid var(--gold-primary);">
                <div class="plan-badge plan-popular">Pro</div>
                <div class="plan-price">
                    <span class="price-amount">24</span><span class="price-currency">,90 €</span>
                    <span class="price-period">/mes</span>
                </div>
                <ul class="features-list">
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        90 créditos/mes
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Calidad profesional IA
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Descarga HD ilimitada
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Soporte prioritario
                    </li>
                </ul>
                <div class="plan-action">
                    <a href="{{ route('subscriptions.plans') }}" class="btn-gold">Empezar ahora</a>
                </div>
            </div>
        </div>
        
        <div class="plan-wrapper">
            <div class="plan-card">
                <div class="plan-badge">Business</div>
                <div class="plan-price">
                    <span class="price-amount">49</span><span class="price-currency">,00 €</span>
                    <span class="price-period">/mes</span>
                </div>
                <ul class="features-list">
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        220 créditos/mes
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Calidad profesional IA
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Descarga HD ilimitada
                    </li>
                    <li class="feature-item">
                        <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                        Soporte VIP
                    </li>
                </ul>
                <div class="plan-action">
                    <a href="{{ route('subscriptions.plans') }}" class="btn-gold">Suscribirse</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="premium-footer">
        Cancela cuando quieras &middot;
        IVA incluido &middot; Sin permanencia
    </div>
    
    <div class="free-trial-container">
        <a href="{{ route('login') }}" class="btn-free-trial">Comenzar prueba gratuita</a>
        <p class="free-trial-info">Prueba gratis durante 7 días con 3 créditos</p>
    </div>
</div> -->


</x-app-layout>