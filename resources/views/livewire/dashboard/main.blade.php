@push('scripts')
    @if(session('nuevo_registro_google'))
        <script>
            // Solo la primera vez que entra, disparo de CompleteRegistration
                        console.log('Disparando CompleteRegistration');

            fbq('track', 'CompleteRegistration');
        </script>
    @endif
@endpush
<div class="relative bg-black text-white min-h-screen py-12 px-6" style="font-family: 'Montserrat', sans-serif;">
<!-- Fondo sutil de puntos -->
    <div style="background-image: url('data:image/svg+xml,...'); background-repeat: repeat;"></div>

    <style>
        body {
            background: #0c0c0c;
        }
        .card-premium {
            background: linear-gradient(180deg, #181613 0%, #181613 100%);
            border-radius: 1.4rem;
            box-shadow: 0 8px 32px 0 rgba(212,175,55,0.08), 0 1.5px 0 0 #d4af37;
            padding: 2.2rem 2.2rem 2rem 2.2rem;
            margin-bottom: 2.2rem;
            border-top: 1.5px solid #d4af37;
        }
        .main-title {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            letter-spacing: -1px;
            font-size: 3.3rem;
            margin-bottom: 1rem;
            color: #fff;
        }
        .main-title .gold {
            color: #d4af37;
        }
        .subtitle {
            color: #eee8c3;
            font-size: 1.15rem;
            margin-bottom: 2rem;
            font-weight: 400;
        }
        .credits-box {
            text-align: right;
            margin-bottom: 1.8rem;
            color: #d4af37;
            font-size: 1.12rem;
            letter-spacing: 0.5px;
            font-family: 'Montserrat', sans-serif;
        }
        .btn-gold {
            background: linear-gradient(90deg, #f6e27f, #d4af37 60%, #9c7c21 100%);
            color: #181818;
            font-weight: 600;
            border-radius: 0.8rem;
            padding: 0.7rem 2.2rem;
            font-size: 1rem;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 12px rgba(212,175,55,0.13);
            border: none;
            outline: none;
            transition: 0.18s;
        }
        .btn-gold:disabled,
        .btn-gold[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .btn-gold:hover {
            filter: brightness(1.08);
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 8px 16px rgba(212,175,55,0.13);
        }
        /* Galería premium */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(265px, 1fr));
            gap: 1.6rem;
        }
        .gallery-card {
            background: #181613;
            border-radius: 1.2rem;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.14);
            border: 1.5px solid #23201b;
            padding: 1.1rem 1.3rem 1.4rem 1.3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow 0.24s;
        }
        .gallery-card:hover {
            box-shadow: 0 8px 36px 0 rgba(212,175,55,0.10);
            border: 1.5px solid #d4af37;
        }
        .gallery-img {
            border-radius: 0.85rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.22);
            margin-bottom: 0.9rem;
            border: none;
            max-width: 90%;
            max-height: 170px;
        }
        .gallery-date {
            color: #d4af37;
            font-size: 0.93rem;
            margin-bottom: 0.6rem;
        }
        .gallery-download {
            margin-top: 0.8rem;
        }
        /* Tabla historial */
        .table-moves {
            width: 100%;
            background: #181613;
            border-radius: 0.7rem;
            margin-top: 0.5rem;
        }
        .table-moves th, .table-moves td {
            padding: 0.75rem 0.9rem;
            text-align: left;
            font-size: 0.98rem;
        }
        .table-moves th {
            color: #d4af37;
            font-weight: 600;
            border-bottom: 1.5px solid #23201b;
        }
        .table-moves td {
            border-bottom: 1px solid #222;
            color: #dedac6;
        }
        .table-moves tr:last-child td {
            border-bottom: none;
        }
        .type-use { color: #e25959; font-weight: 600; }
        .type-purchase { color: #6add7b; font-weight: 600; }
        .type-promo { color: #5a9fed; font-weight: 600; }
        /* Animaciones y partículas igual */
        @keyframes float { ... }
        .particle { ... }
    </style>
    <!-- Partículas doradas -->
    <div class="pointer-events-none absolute inset-0 overflow-hidden z-0">
        <script>
            const container = document.currentScript.parentElement;
            for (let i = 0; i < 40; i++) {
                const dot = document.createElement('div');
                const size = Math.random() * 3 + 2;
                dot.className = 'particle';
                dot.style.width = `${size}px`;
                dot.style.height = `${size}px`;
                dot.style.top = `${Math.random() * 100}%`;
                dot.style.left = `${Math.random() * 100}%`;
                dot.style.animationDelay = `-${Math.random() * 8}s`;
                container.appendChild(dot);
            }
        </script>
    </div>

    <div class="relative max-w-3xl mx-auto z-10">

        <!-- Créditos disponibles -->
        <!-- Opción 1: Botón pequeño y minimalista -->
<!-- <div class="credits-box">
    Créditos disponibles: <span class="font-bold">{{ $user->credits_balance }}</span>
    <a href="" class="ml-2 text-yellow-400 hover:text-yellow-300 text-sm underline transition-colors duration-200">
        + Comprar
    </a>
</div> -->

<!-- Opción 2: Icono sutil -->
<!-- 
<div class="credits-box">
    <div class="flex items-center">
        <span>Créditos disponibles: <span class="font-bold">{{ $user->credits_balance }}</span></span>
        <a href="" class="ml-2 text-yellow-400 hover:text-yellow-300 transition-colors duration-200" title="Comprar más créditos">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
        </a>
    </div>
</div>
-->

<!-- Opción 3: Texto simple -->

<!-- Créditos disponibles con emoji -->
<div class="credits-box">
    Créditos disponibles: <span class="font-bold">{{ $user->credits_balance }}</span> • 
    <a href="/subscriptions/plans" class="hover:scale-110 transition-transform duration-200" title="Comprar más créditos">
        ➕
    </a>
</div>

        <!-- Título principal -->
        <h1 class="main-title">Editor de Fotografía <span class="gold">Gastronómica</span></h1>
        <div class="subtitle">
            Transforma tus fotos de comida en imágenes de calidad profesional en segundos.
        </div>

        <!-- Mensajes de éxito/error -->
        @if(session('message'))
            <div class="mt-5 mb-4 p-4 rounded shadow" style="background: linear-gradient(90deg,#1e5b3a,#21bf73 90%);color:white">
                {{ session('message') }}
            </div>
            @livewire('image-status')
        @endif
        @if($errors->any())
            <div class="mt-5 mb-4 p-4 rounded shadow" style="background: linear-gradient(90deg,#802626,#d46a6a 90%);color:white">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de subida -->
        <!-- Formulario de subida mejorado con opción para eliminar imagen -->
<div class="card-premium">
    <h2 class="text-2xl mb-4 font-bold" style="color: #d4af37;">Sube tu foto</h2>
    <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- Área de carga de imagen con vista previa integrada y botón para eliminar -->
        <div class="relative">
            <label for="image" id="uploadArea" class="block border-2 border-dashed rounded-lg p-6 text-center cursor-pointer hover:bg-neutral-900 transition-all duration-300 min-h-48 flex flex-col items-center justify-center" style="border-color: #d4af37;">
                <!-- Este div contiene el contenido predeterminado (ícono y texto) -->
                <div id="defaultContent" class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="#d4af37">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12V4m0 0L8 8m4-4l4 4" />
                    </svg>
                    <span style="color:rgba(255,255,255,0.8)">JPG, PNG. Máx. 6MB.<br>Haz clic o arrastra tu imagen</span>
                </div>
                
                <!-- Este div contendrá la vista previa de la imagen y estará oculto inicialmente -->
                <div id="previewContainer" class="hidden w-full h-full flex items-center justify-center relative">
                    <!-- La imagen se insertará aquí mediante JavaScript -->
                </div>
                
            <input type="file" name="image" id="image" accept="image/*" capture="environment" class="hidden" required>
            </label>
            
            <!-- Botón para eliminar la imagen (oculto inicialmente) -->
            <button 
                type="button" 
                id="removeImageBtn" 
                class="hidden absolute top-2 right-2 bg-black bg-opacity-70 text-white rounded-full p-1 hover:bg-red-800 transition-all duration-200"
                title="Eliminar imagen"
                style="border: 1px solid #d4af37;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Etiqueta de estilo -->
        <div class="mt-5">
            <label class="block text-sm font-semibold mb-3 text-yellow-200">Elige un estilo</label>
            
            <!-- Selector de estilos horizontal -->
            <div class="grid grid-cols-3 gap-3">
                <!-- Estilo: Rústico -->
                <label class="style-option">
                    <input type="radio" name="style" value="rustico" class="hidden" checked>
                    <div class="p-3 text-center rounded-lg border border-gray-700 cursor-pointer transition-all duration-200 hover:border-yellow-600 style-card">
                        <div class="flex flex-col items-center">
                            <span class="font-medium style-text">Rústico</span>
                            <div class="h-1 w-16 bg-yellow-500 rounded-full mt-1 style-indicator"></div>
                        </div>
                    </div>
                </label>
                
                <!-- Estilo: Alta Cocina -->
                <label class="style-option">
                    <input type="radio" name="style" value="alta-cocina" class="hidden">
                    <div class="p-3 text-center rounded-lg border border-gray-700 cursor-pointer transition-all duration-200 hover:border-yellow-600 style-card">
                        <div class="flex flex-col items-center">
                            <span class="font-medium style-text">Alta Cocina</span>
                            <div class="h-1 w-16 bg-yellow-500 rounded-full mt-1 style-indicator hidden"></div>
                        </div>
                    </div>
                </label>
                
                <!-- Estilo: Luminoso -->
                <label class="style-option">
                    <input type="radio" name="style" value="luminoso" class="hidden">
                    <div class="p-3 text-center rounded-lg border border-gray-700 cursor-pointer transition-all duration-200 hover:border-yellow-600 style-card">
                        <div class="flex flex-col items-center">
                            <span class="font-medium style-text">Luminoso</span>
                            <div class="h-1 w-16 bg-yellow-500 rounded-full mt-1 style-indicator hidden"></div>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        
        <!-- Botón de envío -->
        <button id="submitBtn" type="submit" class="btn-gold w-full uppercase">
            Transformar en foto profesional
        </button>
    </form>
    
    <!-- Indicador de procesamiento -->
    <div id="loader" class="hidden text-center mt-6">
        <div class="animate-spin inline-block w-10 h-10 border-4 border-yellow-400 border-t-transparent rounded-full"></div>
        <p class="mt-2 text-yellow-400 font-semibold">Procesando tu imagen...</p>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    /* Estilos para el selector de estilos */
    .style-option input:checked + .style-card {
        background-color: rgba(0, 0, 0, 0.3);
        border-color: #d4af37;
    }
    
    .style-option input:checked + .style-card .style-text {
        color: #d4af37;
    }
    
    .style-option input:checked + .style-card .style-indicator {
        display: block;
    }
    
    .style-option input:not(:checked) + .style-card .style-indicator {
        display: none;
    }
    
    .style-option input:not(:checked) + .style-card .style-text {
        color: #e0e0e0;
    }
    
    /* Animación suave para la selección */
    .style-card {
        transition: all 0.2s ease-in-out;
    }
    
    .style-card:hover {
        transform: translateY(-2px);
    }
    
    /* Estilos para el área de vista previa */
    #uploadArea {
        min-height: 180px;
        position: relative;
    }
    
    #previewContainer img {
        max-height: 170px;
        max-width: 100%;
        border-radius: 8px;
        object-fit: contain;
        transition: all 0.3s ease;
    }
    
    /* Estilo para el botón de eliminar */
    #removeImageBtn {
        z-index: 10;
        opacity: 0.8;
        transform: scale(0.9);
        transition: opacity 0.2s, transform 0.2s;
    }
    
    #removeImageBtn:hover {
        opacity: 1;
        transform: scale(1);
    }
    
    /* Efecto de zoom suave en la vista previa al pasar el mouse */
    #previewContainer img:hover {
        transform: scale(1.02);
    }
</style>

<!-- Script para manejar la selección de estilo y la vista previa -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elementos del DOM
        const fileInput = document.getElementById('image');
        const uploadArea = document.getElementById('uploadArea');
        const defaultContent = document.getElementById('defaultContent');
        const previewContainer = document.getElementById('previewContainer');
        const removeImageBtn = document.getElementById('removeImageBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        // Variable para rastrear si hay una imagen cargada
        let imageLoaded = false;
        
        // Configurar el manejador de eventos para la selección de archivos
        fileInput.addEventListener('change', handleImageSelection);
        
        // Configurar eventos de arrastrar y soltar
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('bg-neutral-900');
        });
        
        uploadArea.addEventListener('dragleave', function() {
            uploadArea.classList.remove('bg-neutral-900');
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('bg-neutral-900');
            
            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                fileInput.files = e.dataTransfer.files;
                handleImageSelection();
            }
        });
        
        // Configurar el botón para eliminar la imagen
        removeImageBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Evitar que el evento se propague al área de carga
            resetImageSelection();
        });
        
        // Función para mostrar la vista previa de la imagen seleccionada
        function handleImageSelection() {
            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Crear la imagen de vista previa
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Vista previa";
                    img.className = "rounded shadow-lg border";
                    img.style.borderColor = "#d4af37";
                    
                    // Limpiar el contenedor de vista previa y agregar la imagen
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);
                    
                    // Mostrar la vista previa y el botón para eliminar
                    defaultContent.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                    removeImageBtn.classList.remove('hidden');
                    
                    // Actualizar estado
                    imageLoaded = true;
                    
                    // Habilitar el botón de envío si estaba deshabilitado
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Función para eliminar la imagen seleccionada
        function resetImageSelection() {
            // Resetear el input de archivo
            fileInput.value = '';
            
            // Ocultar la vista previa y mostrar el contenido predeterminado
            previewContainer.innerHTML = '';
            previewContainer.classList.add('hidden');
            defaultContent.classList.remove('hidden');
            removeImageBtn.classList.add('hidden');
            
            // Actualizar estado
            imageLoaded = false;
        }
        
        // Manejo de la selección de estilo
        const styleOptions = document.querySelectorAll('.style-option input');
        
        styleOptions.forEach(option => {
            option.addEventListener('change', function() {
                // Actualizar indicadores visuales cuando cambia la selección
                document.querySelectorAll('.style-indicator').forEach(indicator => {
                    indicator.classList.add('hidden');
                });
                
                if (this.checked) {
                    const card = this.nextElementSibling;
                    const indicator = card.querySelector('.style-indicator');
                    indicator.classList.remove('hidden');
                }
            });
        });
        
        // Configurar el comportamiento del loader en el submit
        const form = document.querySelector('form');
        const loader = document.getElementById('loader');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                // Verificar que se haya seleccionado un archivo
                if (!imageLoaded) {
                    e.preventDefault();
                    // Mostrar mensaje de error con animación suave en el área de carga
                    uploadArea.style.borderColor = '#ff4444';
                    uploadArea.classList.add('shake');
                    
                    setTimeout(() => {
                        uploadArea.style.borderColor = '#d4af37';
                        uploadArea.classList.remove('shake');
                    }, 800);
                    
                    return false;
                }
                
                // Mostrar el loader y deshabilitar el botón
                loader.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Procesando...';
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            });
        }
    });
    
    // Añadir una pequeña animación de "shake" para el área de carga cuando hay un error
    document.head.insertAdjacentHTML('beforeend', `
        <style>
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                20%, 60% { transform: translateX(-5px); }
                40%, 80% { transform: translateX(5px); }
            }
            .shake {
                animation: shake 0.5s ease-in-out;
            }
        </style>
    `);
</script>

<!-- Estilos adicionales para el selector de estilos -->
<style>
    /* Estilos para el selector de estilos */
    .style-option input:checked + .style-card {
        background-color: rgba(0, 0, 0, 0.3);
        border-color: #d4af37;
    }
    
    .style-option input:checked + .style-card .style-text {
        color: #d4af37;
    }
    
    .style-option input:checked + .style-card .style-indicator {
        display: block;
    }
    
    .style-option input:not(:checked) + .style-card .style-indicator {
        display: none;
    }
    
    .style-option input:not(:checked) + .style-card .style-text {
        color: #e0e0e0;
    }
    
    /* Animación suave para la selección */
    .style-card {
        transition: all 0.2s ease-in-out;
    }
    
    .style-card:hover {
        transform: translateY(-2px);
    }
    
    /* Vista previa de imagen mejorada */
    #preview img {
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        border: 1px solid #d4af37;
        max-height: 200px;
        margin: 1rem auto;
        transition: all 0.3s ease;
    }
</style>

<!-- Script para manejar la selección de estilo -->
<script>
    // Mejora del preview de imagen existente
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        preview.innerHTML = '';
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'mx-auto mt-4 max-h-48 rounded-lg shadow-lg';
            img.style.opacity = '0';
            preview.appendChild(img);
            
            setTimeout(() => {
                img.style.transition = 'opacity 0.5s ease-in-out';
                img.style.opacity = '1';
            }, 50);
        }
    }
    
    // Manejo de la selección de estilo
    document.addEventListener('DOMContentLoaded', function() {
        const styleOptions = document.querySelectorAll('.style-option input');
        
        styleOptions.forEach(option => {
            option.addEventListener('change', function() {
                // Actualizar indicadores visuales cuando cambia la selección
                document.querySelectorAll('.style-indicator').forEach(indicator => {
                    indicator.classList.add('hidden');
                });
                
                if (this.checked) {
                    const card = this.nextElementSibling;
                    const indicator = card.querySelector('.style-indicator');
                    indicator.classList.remove('hidden');
                }
            });
        });
        
        // Mantener el comportamiento del loader en el submit
        const form = document.querySelector('form');
        const loader = document.getElementById('loader');
        const submitBtn = document.getElementById('submitBtn');
        
        if (form) {
            form.addEventListener('submit', () => {
                loader.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Procesando...';
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            });
        }
    });
</script>
        
        <!-- Botón para conseguir más créditos -->
            <!-- <div class="mt-6 text-center">
                <button class="btn-gold opacity-70 cursor-not-allowed" disabled>
                    Consigue más créditos (próximamente)
                </button>
                <p class="text-xs mt-2 text-neutral-400">Pronto podrás recargar créditos aquí</p>
            </div> -->
        

        <!-- Galería de imágenes procesadas -->
       
        <!-- Testimonio -->
        <!-- <div class="mt-16 text-sm text-neutral-400 italic text-center">
            “Pensaba que era IA genérica… pero me entregaron una imagen digna de portada. — Chef María A.”
        </div> -->

    </div> <!-- FIN del contenedor principal -->

    <!-- Estilos específicos de la galería y tablas premium -->
    <style>
        .credits-box {
            background: rgba(30, 24, 4, 0.92);
            border-radius: 0.8rem;
            border: 1.5px solid #d4af37;
            padding: 0.7rem 1.5rem;
            font-weight: 600;
            text-align: right;
            color: #f6e27f;
            margin-bottom: 2.3rem;
            box-shadow: 0 1px 16px rgba(212,175,55,0.08);
        }
        .main-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.9rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem;
            color: #fff;
        }
        .main-title .gold {
            color: #d4af37;
            letter-spacing: 0.2px;
        }
        .subtitle {
            color: rgba(255,255,255,0.82);
            font-weight: 300;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }
        .card-premium {
            background: linear-gradient(180deg, #19160e 0%, #10100d 100%);
            border-radius: 1.3rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 4px 32px 0 rgba(212, 175, 55, 0.13);
            padding: 2.2rem 2rem;
            margin-bottom: 2.5rem;
        }
        .table-moves {
            width: 100%;
            border-collapse: collapse;
        }
        .table-moves th, .table-moves td {
            padding: 0.5rem 0.6rem;
        }
        .table-moves th {
            border-bottom: 1.3px solid #d4af37;
            color: #d4af37;
            font-weight: 600;
            font-size: 1rem;
            background: transparent;
        }
        .table-moves td {
            background: transparent;
            color: #f8eeb3;
        }
        .type-use { color: #ff8383; }
        .type-purchase { color: #6fe173; }
        .type-promo { color: #4bbcff; }
        .gallery-title {
            color: #ffd46c;
            font-size: 1.4rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 1.7rem;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2.1rem;
        }
        .gallery-card {
            background: linear-gradient(175deg,#15120a 60%, #201a0c 100%);
            border: 1.5px solid #d4af37;
            border-radius: 1.4rem;
            box-shadow: 0 2px 18px rgba(212,175,55,0.10);
            padding: 1.4rem 1.1rem 1.2rem 1.1rem;
            text-align: center;
            transition: transform 0.24s cubic-bezier(0.4,0,0.2,1), box-shadow 0.24s;
        }
        .gallery-card:hover {
            transform: scale(1.035) translateY(-5px);
            box-shadow: 0 6px 32px rgba(212,175,55,0.18);
            border-color: #ffe08b;
        }
        .gallery-image {
            border-radius: 1rem;
            border: 2px solid #ffd46c;
            background: #252012;
            max-height: 10.6rem;
            margin-bottom: 0.9rem;
            box-shadow: 0 4px 18px rgba(212,175,55,0.11);
            transition: box-shadow 0.32s, border-color 0.2s;
        }
        .gallery-card:hover .gallery-image {
            border-color: #fffbe6;
            box-shadow: 0 7px 32px 5px rgba(212,175,55,0.15);
        }
        .gallery-date {
            font-size: 0.90rem;
            color: #d7c791;
            margin-bottom: 0.6rem;
            font-style: italic;
        }
    </style>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            preview.innerHTML = '';
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = 'mx-auto mt-6 max-h-64 rounded shadow-lg';
                img.onload = () => {
                    img.style.opacity = '0';
                    preview.appendChild(img);
                    requestAnimationFrame(() => {
                        img.style.transition = 'opacity 1s ease-in-out';
                        img.style.opacity = '1';
                    });
                };
            }
        }

        // Loader en submit
        const form = document.querySelector('form');
        const loader = document.getElementById('loader');
        const submitBtn = document.getElementById('submitBtn');
        if(form) {
            form.addEventListener('submit', () => {
                loader.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.innerText = 'Procesando...';
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            });
        }
    </script>
</div>
