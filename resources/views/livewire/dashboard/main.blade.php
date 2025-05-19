
<div class="relative bg-black text-white min-h-screen py-12 px-6" style="font-family: 'Montserrat', sans-serif;">
    <!-- Fondo sutil de puntos -->
    <div style="background-image: url('data:image/svg+xml,...'); background-repeat: repeat;"></div>

    <!-- Partículas doradas -->
    <style>
        @keyframes float {
            0%   { transform: translateY(0) scale(1); opacity: 0; }
            25%  { opacity: 0.6; }
            50%  { transform: translateY(-120px) scale(1.3) rotate(10deg); opacity: 0.9; }
            75%  { opacity: 0.5; }
            100% { transform: translateY(-250px) scale(1) rotate(-10deg); opacity: 0; }
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            background-color: #f6e27f;
            box-shadow: 0 0 6px rgba(212, 175, 55, 0.5), 0 0 12px rgba(212, 175, 55, 0.2);
            animation: float 8s infinite ease-in-out;
            will-change: transform, opacity;
            pointer-events: none;
            mix-blend-mode: screen;
        }
    </style>
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

    <!-- Contenido -->
    <div class="relative max-w-4xl mx-auto z-10">
        <h1 class="text-5xl font-bold leading-tight mb-4" style="font-family: 'Cormorant Garamond', serif; letter-spacing: -0.5px;">
            Editor de Fotografía <span style="color: #d4af37">Gastronómica</span>
        </h1>
        <p class="mt-2" style="color: rgba(255,255,255,0.8); font-weight: 300; line-height: 1.6;">
            Transforma tus fotos de comida en imágenes de calidad profesional en segundos.
        </p>

        @if(session('message'))
            <div class="mt-6 p-4 rounded bg-green-600 text-white shadow">
                {{ session('message') }}
            </div>
        @endif

        @if(session('result_url'))
    <div class="mt-10 text-center">
        <h2 class="text-2xl mb-4 text-yellow-400">Resultado</h2>
        <img src="{{ session('result_url') }}" alt="Imagen procesada" class="mx-auto max-h-96 rounded shadow-lg">
        <a href="{{ session('result_url') }}" download class="inline-block mt-4 px-6 py-2 bg-yellow-500 text-black font-semibold rounded shadow hover:bg-yellow-400 transition">
            Descargar imagen
        </a>
    </div>
@endif


        @if($errors->any())
            <div class="mt-6 p-4 rounded bg-red-600 text-white shadow">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-10 p-8 rounded-xl" style="background-color: #111; border: 1px solid #d4af37;">
            <h2 class="text-2xl mb-4" style="color: #d4af37;">Sube tu foto</h2>
            <p class="text-sm mb-6" style="color: rgba(255,255,255,0.6);">
                Formatos permitidos: JPG, PNG. Tamaño máximo: 6MB.
            </p>

            <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <label for="image" class="block border-2 border-dashed rounded-md p-6 text-center cursor-pointer hover:bg-neutral-800 transition" style="border-color: #d4af37;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="#d4af37">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12V4m0 0L8 8m4-4l4 4" />
                    </svg>
                    <p class="text-sm" style="color: rgba(255,255,255,0.8);">Haz clic para seleccionar o arrastra tu imagen aquí</p>
                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)" required>
                </label>

                <div id="preview" class="text-center"></div>

                <div class="mt-6">
                    <label for="style" class="block text-sm font-semibold mb-2 text-white">Estilo</label>
                    <select name="style" id="style" required class="w-full bg-black border border-yellow-500 text-white rounded p-2">
                        <option value="rustico">Rústico</option>
                        <option value="alta-cocina">Alta Cocina</option>
                        <option value="luminoso">Luminoso</option>
                    </select>
                </div>

                <button id="submitBtn" type="submit" class="w-full py-3 px-6 rounded transition" style="background: linear-gradient(135deg, #f0d278 0%, #d4af37 50%, #9c7c21 100%); color: #0a0a0a; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);">
                    ✏️ Transformar en foto profesional
                </button>

            </form>
            <div id="loader" class="hidden text-center mt-6">
    <div class="animate-spin inline-block w-12 h-12 border-4 border-yellow-400 border-t-transparent rounded-full"></div>
    <p class="mt-2 text-yellow-400 font-semibold">Procesando tu imagen gastronómica...</p>
</div>

        </div>

        <!-- Testimonio -->
        <div class="mt-16 text-sm text-neutral-400 italic text-center">
            “Pensaba que era IA genérica… pero me entregaron una imagen digna de portada. — Chef María A.”
        </div>
    </div>

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
    </script>
</div>
<script>
    const form = document.querySelector('form');
    const loader = document.getElementById('loader');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', () => {
        // Mostrar loader
        loader.classList.remove('hidden');

        // Desactivar botón
        submitBtn.disabled = true;
        submitBtn.innerText = 'Procesando...';
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    });
</script>

