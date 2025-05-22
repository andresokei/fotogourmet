<x-app-layout>
    <style>
        body, .premium-gallery-section {
            background: #0a0a08 !important;
            color: #eee8c3;
        }
        .premium-gallery-section {
            min-height: 100vh;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .gallery-title {
            color: #d4af37;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.4rem;
            font-weight: 700;
            margin-top: 3.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
            text-align: center;
        }
        .gallery-subtitle {
            color: #b7ad7a;
            font-size: 1.18rem;
            margin-bottom: 2.5rem;
            font-weight: 400;
            text-align: center;
            letter-spacing: 0.01em;
        }
        .gallery-container {
            width: 100%;
            max-width: 1200px;
            margin-bottom: 2.2rem;
            padding: 0 1.5rem;
        }
        .gallery-stats {
            background: linear-gradient(180deg, #19160e 0%, #10100d 100%);
            border-radius: 1.2rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 8px 32px 0 rgba(212,175,55,0.13), 0 1.5px 0 0 #d4af37;
            padding: 1.5rem 2rem;
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .stats-item {
            text-align: center;
        }
        .stats-number {
            color: #ffe291;
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .stats-label {
            color: #b7ad7a;
            font-size: 0.9rem;
            margin-top: 0.2rem;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }
        .gallery-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .filter-btn {
            background: transparent;
            color: #b7ad7a;
            border: 1.5px solid #6b6350;
            border-radius: 2rem;
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .18s ease;
            letter-spacing: 0.02em;
        }
        .filter-btn.active,
        .filter-btn:hover {
            background: rgba(212,175,55,0.1);
            border-color: #d4af37;
            color: #ffe291;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .gallery-card {
            background: linear-gradient(175deg, #15120a 60%, #201a0c 100%);
            border: 1.5px solid #d4af37;
            border-radius: 1.4rem;
            box-shadow: 0 2px 18px rgba(212,175,55,0.10);
            padding: 1.4rem 1.1rem 1.2rem 1.1rem;
            text-align: center;
            transition: transform 0.24s cubic-bezier(0.4,0,0.2,1), box-shadow 0.24s;
            position: relative;
            overflow: hidden;
        }
        .gallery-card:hover {
            transform: scale(1.035) translateY(-5px);
            box-shadow: 0 6px 32px rgba(212,175,55,0.18);
            border-color: #ffe08b;
        }
        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 1rem;
            border: 2px solid #ffd46c;
            background: #252012;
            margin-bottom: 1rem;
            box-shadow: 0 4px 18px rgba(212,175,55,0.11);
            transition: all 0.32s ease;
            cursor: pointer;
        }
        .gallery-card:hover .gallery-image {
            border-color: #fffbe6;
            box-shadow: 0 7px 32px 5px rgba(212,175,55,0.15);
            transform: scale(1.02);
        }
        .gallery-date {
            font-size: 0.85rem;
            color: #8a8265;
            margin-bottom: 0.8rem;
            font-style: italic;
        }
        .gallery-style {
            background: rgba(212,175,55,0.15);
            color: #d4af37;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            margin-bottom: 0.8rem;
            display: inline-block;
        }
        .gallery-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .btn-download {
            background: #f9d24c;
            color: #19160e;
            font-weight: 600;
            border-radius: 0.8rem;
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
            letter-spacing: 0.02em;
            border: none;
            outline: none;
            transition: all .18s ease;
            box-shadow: 0 2px 10px rgba(212,175,55,0.1);
            text-decoration: none;
            cursor: pointer;
            flex: 1;
            text-align: center;
        }
        .btn-download:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(212,175,55,0.15);
        }
        .btn-view {
            background: transparent;
            color: #d4af37;
            border: 1.5px solid #d4af37;
            border-radius: 0.8rem;
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .18s ease;
            text-decoration: none;
            flex: 1;
            text-align: center;
        }
        .btn-view:hover {
            background: rgba(212,175,55,0.1);
            color: #ffe291;
        }
        .empty-gallery {
            text-align: center;
            padding: 4rem 2rem;
            color: #8a8265;
        }
        .empty-gallery-icon {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1.5rem;
            color: #6b6350;
        }
        .empty-gallery h3 {
            color: #b7ad7a;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            font-family: 'Cormorant Garamond', serif;
        }
        .btn-upload {
            background: #f9d24c;
            color: #19160e;
            font-weight: 700;
            border-radius: 1.05rem;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
            border: none;
            outline: none;
            transition: all .18s ease;
            box-shadow: 0 3px 15px rgba(212,175,55,0.14);
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }
        .btn-upload:hover {
            filter: brightness(1.11);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(212,175,55,0.17);
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            margin-bottom: 3rem;
        }
        /* Modal para vista completa */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            padding: 2rem;
        }
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            border-radius: 1rem;
            border: 2px solid #d4af37;
        }
        .modal-close {
            position: absolute;
            top: 2rem;
            right: 3rem;
            color: #d4af37;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }
        .modal-close:hover {
            color: #ffe291;
        }
        @media (max-width: 768px) {
            .gallery-title { font-size: 1.8rem; }
            .gallery-subtitle { font-size: 1rem; }
            .gallery-stats { 
                flex-direction: column; 
                text-align: center; 
            }
            .gallery-grid { 
                grid-template-columns: 1fr; 
                gap: 1.5rem; 
            }
            .gallery-filters {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }
            .filter-btn {
                white-space: nowrap;
            }
        }
    </style>

    <div class="premium-gallery-section">
        <h2 class="gallery-title">Mi Galería</h2>
        <p class="gallery-subtitle">
            Todas tus creaciones gastronómicas transformadas
        </p>

        <div class="gallery-container">
            @if(isset($gallery) && $gallery->count() > 0)
                <!-- Estadísticas -->
                

                
                <!-- Grid de imágenes -->
                <div class="gallery-grid" id="galleryGrid">
                    @foreach($gallery as $img)
                        <div class="gallery-card" data-style="{{ $img->style ?? 'general' }}" data-date="{{ $img->created_at->timestamp }}">
                            <img src="{{ asset('storage/' . $img->processed_path) }}" 
                                 alt="Imagen procesada" 
                                 class="gallery-image"
                                 onclick="openModal(this.src)">
                            
                            @if(isset($img->style))
                                <div class="gallery-style">{{ ucfirst(str_replace('-', ' ', $img->style)) }}</div>
                            @endif
                            
                            <div class="gallery-date">
                                {{ $img->created_at->format('d M Y, H:i') }}
                            </div>
                            
                            <div class="gallery-actions">
                                <a href="{{ asset('storage/' . $img->processed_path) }}" 
                                   target="_blank" 
                                   class="btn-view">
                                    Ver
                                </a>
                                <a href="{{ asset('storage/' . $img->processed_path) }}" 
                                   download 
                                   class="btn-download">
                                    Descargar
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginación si es necesaria -->
                @if(method_exists($gallery, 'links'))
                    <div class="pagination-container">
                        {{ $gallery->links() }}
                    </div>
                @endif

            @else
                <!-- Estado vacío -->
                <div class="empty-gallery">
                    <svg class="empty-gallery-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3>Tu galería está vacía</h3>
                    <p>Aún no has procesado ninguna imagen. ¡Comienza creando tu primera obra maestra!</p>
                    
                </div>
            @endif
        </div>
    </div>

    <!-- Modal para vista completa -->
    <div id="imageModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
        // Filtros de galería
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const galleryCards = document.querySelectorAll('.gallery-card');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Actualizar botón activo
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.dataset.filter;
                    
                    galleryCards.forEach(card => {
                        if (filter === 'all') {
                            card.style.display = 'block';
                        } else if (filter === 'recent') {
                            // Mostrar imágenes de los últimos 7 días
                            const cardDate = parseInt(card.dataset.date);
                            const weekAgo = Date.now() / 1000 - (7 * 24 * 60 * 60);
                            card.style.display = cardDate > weekAgo ? 'block' : 'none';
                        } else {
                            const cardStyle = card.dataset.style;
                            card.style.display = cardStyle === filter ? 'block' : 'none';
                        }
                    });
                    
                    // Animación suave
                    galleryCards.forEach(card => {
                        if (card.style.display === 'block') {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 100);
                        }
                    });
                });
            });
        });

        // Modal para vista completa
        function openModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modal.style.display = 'block';
            modalImg.src = src;
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // Cerrar modal con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</x-app-layout>