<div class="relative bg-black text-white min-h-screen py-12 px-6" style="font-family: 'Montserrat', sans-serif; background-color: #000;
    background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'rgba(255,255,255,0.02)\' fill-opacity=\'0.02\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');">

    <!-- Golden Particles -->
    <style>
        @keyframes float {
            0% { transform: translateY(0) scale(1); opacity: 0; }
            20% { opacity: 0.4; }
            50% { transform: translateY(-100px) scale(1.4); opacity: 0.7; }
            80% { opacity: 0.4; }
            100% { transform: translateY(-200px) scale(1); opacity: 0; }
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            background-color: #f6e27f;
            box-shadow: 0 0 4px rgba(212, 175, 55, 0.5), 0 0 8px rgba(212, 175, 55, 0.2);
            animation: float 8s infinite ease-in-out;
            animation-fill-mode: both;
            will-change: transform, opacity;
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

    <div class="relative max-w-4xl mx-auto z-10">
        <!-- ...rest of the content remains unchanged -->



<div class="bg-black text-white min-h-screen py-12 px-6" style="font-family: 'Montserrat', sans-serif; background-color: #000;
    background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'rgba(255,255,255,0.02)\' fill-opacity=\'0.02\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-5xl font-bold leading-tight mb-4" style="font-family: 'Cormorant Garamond', serif; letter-spacing: -0.5px;">
            Editor de Fotografía <span style="color: #d4af37">Gastronómica</span>
        </h1>
        <p class="mt-2" style="color: rgba(255,255,255,0.8); font-weight: 300;">
            Transforma tus fotos de comida en imágenes de calidad profesional en segundos.
        </p>

        <div class="mt-10 p-8 rounded-xl" style="background-color: #111111; border: 1px solid #d4af37;">
            <h2 class="text-2xl mb-4" style="color: #d4af37; font-weight: 500;">Sube tu foto</h2>
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

                <button type="submit" class="w-full py-3 px-6 rounded transition" style="background: linear-gradient(135deg, #f0d278 0%, #d4af37 50%, #9c7c21 100%); color: #0a0a0a; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);">
                    ✏️ Transformar en foto profesional
                </button>
            </form>
        </div>
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
            preview.appendChild(img);
        }
    }
</script>
