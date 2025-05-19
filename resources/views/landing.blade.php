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
                    Eleva la presencia digital de tu restaurante con imágenes de calidad editorial.
                    Transforma fotografías estándar en obras de arte gastronómicas con nuestra tecnología exclusiva.
                </p>
                <div class="hero-buttons">
                    <button class="btn-upload"><i class="fas fa-cloud-upload-alt"></i>Transformar imagen</button>
                    <button class="btn-examples"><i class="fas fa-images"></i>Galería Premium</button>
                </div>
                <p class="simple-text">Sin equipos costosos. Sin sesiones fotográficas. Resultados inmediatos.</p>
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
                        <div class="before-label">Original</div>
                        <div class="after-label">Premium</div>
                        <div class="scan-effect"></div>
                        <div class="vignette"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="upgrade-banner">
            <span class="shine-text">Riquín Elite</span> — Fotografía gastronómica de clase mundial
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.img-comp-container');
            const overlay = document.querySelector('.img-comp-overlay');
            const slider = document.querySelector('.img-comp-slider');
            const handle = document.querySelector('.img-comp-handle');
            let sliderPct = 50;

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
                        alert('¡Pronto podrás subir tus propias imágenes gastronómicas para transformarlas!');
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

</x-app-layout>