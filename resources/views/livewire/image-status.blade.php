<div wire:poll.5s>
    @if ($image)
        @if ($image->status === 'done')
            <div class="resultado-premium animate__animated animate__fadeIn">
                <h2 style="color: #d4af37; font-family: 'Cormorant Garamond', serif; font-size: 2.1rem; font-weight: 700; margin-bottom: 1.7rem;">
                    Imagen profesional creada con IA
                </h2>
                <img src="{{ Storage::url($image->processed_path) }}" alt="Imagen procesada">
                <a href="{{ Storage::url($image->processed_path) }}" download class="btn-gold mt-4">
                    <span style="margin-right: 0.6rem;">&#11088;</span> Descargar imagen
                </a>
                <div class="luxury-sub">
                    Lista para usar en tu carta, delivery, Instagram o web.
                </div>
            </div>
        @elseif ($image->status === 'processing' || $image->status === 'pending')
            <div class="resultado-premium" style="padding:3.2rem 2.2rem;">
                <div class="animate-spin mx-auto w-14 h-14 border-4 border-yellow-400 border-t-transparent rounded-full"></div>
                <p class="mt-6 text-lg font-medium" style="color: #d4af37;">
                    Procesando tu imagen gastronómica...
                </p>
                <div class="luxury-sub">Esto puede tardar unos segundos. No cierres la ventana.</div>
            </div>
        @elseif ($image->status === 'failed')
            <div class="mt-10 p-4 rounded bg-red-600 text-white shadow text-center">
                Hubo un problema al procesar tu imagen. <br>
                <button wire:click="$refresh" class="mt-2 px-4 py-2 bg-yellow-500 text-black rounded shadow">Reintentar</button>
            </div>
        @endif
    @endif
</div>
