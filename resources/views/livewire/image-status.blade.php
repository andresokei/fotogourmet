<div wire:poll.5s>
    @if ($image)
        @if ($image->status === 'done')
            <div class="resultado-premium animate__fadeIn">
                <h2 style="color: #d4af37; font-family: 'Cormorant Garamond', serif; font-size: 2.3rem; font-weight: 700; margin-bottom: 1.4rem; text-align: center;">
                    Imagen Gastronómica Profesional
                </h2>
                <p style="color: #eee8c3; font-size: 1.15rem; margin-bottom: 2rem; font-weight: 400;">
                    Transformada con IA para destacar sabor, textura y presentación
                </p>
                
                <!-- Contenedor de la imagen mejorado -->
                <div class="image-container">
                    <span class="image-badge">Premium</span>
                    <img src="{{ Storage::url($image->processed_path) }}" alt="Imagen procesada" class="result-image">
                </div>
                
                <!-- Grupo de botones -->
                <div class="buttons-group">
                    <a href="{{ Storage::url($image->processed_path) }}" download class="btn-gold">
                        <span style="margin-right: 0.4rem;">⭐</span> Descargar imagen
                    </a>
                    
                </div>
                
                <div class="luxury-sub">
                    Lista para usar en tu carta, delivery, Instagram o web.
                </div>
                
                
                
                <!-- Comparación antes/después (opcional) - Descomenta si tienes acceso a la imagen original -->
                @if(isset($image->original_path))
                <div class="comparison-container">
                    <div class="comparison-image">
                        <div class="comparison-title">Original</div>
                        <img src="{{ Storage::url($image->original_path) }}" alt="Imagen original">
                    </div>
                    <div class="comparison-image">
                        <div class="comparison-title">Profesional</div>
                        <img src="{{ Storage::url($image->processed_path) }}" alt="Imagen procesada">
                    </div>
                </div>
                @endif
            </div>
        @elseif ($image->status === 'processing' || $image->status === 'pending')
            <div class="resultado-premium loading-container">
                <div class="spinner"></div>
                <h2 style="font-size: 1.8rem; color: #d4af37; font-family: 'Cormorant Garamond', serif; font-weight: 700;">Elevando tu fotografía culinaria...</h2>
                <p style="color: #eee8c3;">Nuestro chef digital está mejorando la iluminación, color y composición</p>
                
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
                
                <div class="luxury-sub">
                    Esto puede tardar unos segundos. No cierres la ventana.
                </div>
            </div>
        @elseif ($image->status === 'failed')
            <div class="error-container">
                <div class="error-icon">⚠️</div>
                <h3 style="color: #dc3545;">Ocurrió un problema</h3>
                <p>No pudimos procesar tu imagen. Por favor, intenta con otra fotografía.</p>
                <button wire:click="$refresh" class="mt-4 btn-gold error-btn">
                    Reintentar
                </button>
            </div>
        @endif
    @endif
    <style>
        .resultado-premium {
            background: linear-gradient(180deg, #19160e 0%, #10100d 100%);
            border-radius: 1.3rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 8px 32px 0 rgba(212,175,55,0.18);
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .image-container {
            position: relative;
            padding: 1rem;
            margin: 1.5rem auto;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 1rem;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);
            max-width: 90%;
            transition: transform 0.3s ease;
        }
        
        .image-container:hover {
            transform: scale(1.02);
        }
        
        .result-image {
            max-width: 100%;
            height: auto;
            border-radius: 0.8rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
            border: 2px solid #d4af37;
        }
        
        .image-badge {
            position: absolute;
            top: -15px;
            right: 20px;
            background: linear-gradient(90deg, #f6e27f, #d4af37 60%, #9c7c21 100%);
            color: #000;
            font-weight: 600;
            padding: 0.3rem 1rem;
            border-radius: 3rem;
            font-size: 0.85rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
            border: 1px solid #d4af37;
            background-size: 200% 100%;
            animation: shimmer 3s infinite linear;
        }
        
        .buttons-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 1rem 0;
        }
        
        .btn-gold {
            background: linear-gradient(90deg, #f6e27f, #d4af37 60%, #9c7c21 100%);
            color: #181818;
            font-weight: 600;
            border-radius: 0.8rem;
            padding: 0.9rem 2.3rem;
            font-size: 1.05rem;
            letter-spacing: 0.5px;
            display: inline-block;
            margin: 1.5rem 0.5rem;
            box-shadow: 0 4px 18px rgba(212,175,55,0.2);
            border: none;
            outline: none;
            transition: all 0.25s;
            text-decoration: none;
        }
        
        .btn-gold:hover {
            filter: brightness(1.1);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(212,175,55,0.25);
        }
        
        .btn-secondary {
            background: transparent;
            color: #d4af37;
            border: 1.5px solid #d4af37;
            font-weight: 500;
            border-radius: 0.8rem;
            padding: 0.85rem 1.8rem;
            font-size: 1rem;
            display: inline-block;
            margin: 0rem 0.5rem 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.25s;
            text-decoration: none;
            cursor: pointer;
        }
        
        .btn-secondary:hover {
            background-color: rgba(212,175,55,0.1);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }
        
        .luxury-sub {
            font-size: 0.95rem;
            color: #b0a36a;
            font-style: italic;
            margin: 1rem 0 0.5rem;
        }
        
        /* Badges de redes sociales */
        .social-badge {
            display: inline-block;
            background-color: rgba(0,0,0,0.7);
            color: #fff;
            padding: 0.3rem 0.8rem;
            margin: 0.3rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            border: 1px solid rgba(212,175,55,0.3);
            transition: all 0.2s;
        }
        
        .social-badge:hover {
            background-color: rgba(212,175,55,0.15);
            transform: translateY(-2px);
        }
        
        /* Comparación antes/después */
        .comparison-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            margin: 2rem 0;
        }
        
        .comparison-image {
            flex: 1 1 250px;
            max-width: 400px;
            position: relative;
            text-align: center;
        }
        
        .comparison-image img {
            max-width: 100%;
            border-radius: 0.7rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
        }
        
        .comparison-title {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(90deg, #181613 0%, #181613 100%);
            color: #d4af37;
            padding: 0.3rem 1.2rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
            border: 1px solid #d4af37;
        }
        
        /* Estilos para el estado de carga */
        .loading-container {
            padding: 3.2rem 2.2rem;
            text-align: center;
        }
        
        .spinner {
            width: 56px;
            height: 56px;
            margin: 0 auto 1.5rem;
            border: 4px solid rgba(212,175,55,0.3);
            border-top: 4px solid #d4af37;
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
        }
        
        .progress-bar {
            height: 6px;
            width: 70%;
            margin: 1.5rem auto;
            background-color: rgba(212,175,55,0.15);
            border-radius: 3px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #f6e27f, #d4af37);
            animation: fillProgress 12s ease-in-out forwards;
        }
        
        /* Estilos para el estado de error */
        .error-container {
            padding: 2rem;
            text-align: center;
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.5);
            border-radius: 1rem;
            margin: 2rem auto;
        }
        
        .error-icon {
            font-size: 2rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        
        .error-btn {
            margin-top: 1rem;
            background: linear-gradient(90deg, #f6e27f, #d4af37 90%);
        }
        
        /* Animaciones */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes fillProgress {
            0% { width: 0%; }
            20% { width: 20%; }
            50% { width: 55%; }
            80% { width: 75%; }
            100% { width: 95%; }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shimmer {
            0% { background-position: -100% 0; }
            100% { background-position: 100% 0; }
        }
        
        .animate__fadeIn {
            animation: fadeIn 0.8s ease-out;
        }
    </style>
    
    <script>
        // Función simple para copiar el enlace de la imagen al portapapeles
        function copyImageLink(imageUrl) {
            navigator.clipboard.writeText(imageUrl).then(function() {
                // Alerta sencilla para evitar manipulación compleja del DOM
                alert('¡Enlace copiado al portapapeles!');
            }).catch(function() {
                alert('No se pudo copiar el enlace');
            });
        }
    </script>
</div>
