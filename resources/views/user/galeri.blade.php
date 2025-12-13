@extends('layouts.app')

@section('title', 'Galeri - MTsN 1 Magetan')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #2d6a4f 0%, #52b788 100%);
        padding: 80px 0 60px;
        color: white;
        margin-bottom: 50px;
    }

    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero-section p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        cursor: pointer;
        background: white;
        height: 320px;
    }

    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(45, 106, 79, 0.3);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.15);
    }

    .gallery-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background: linear-gradient(to top, rgba(45, 106, 79, 0.95), rgba(45, 106, 79, 0.7), transparent);
        color: white;
        transform: translateY(100%);
        transition: all 0.4s ease;
    }

    .gallery-item:hover .gallery-caption {
        transform: translateY(0);
    }

    .gallery-caption h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 8px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .gallery-caption .date {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.9);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .embed-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 59, 48, 0.95);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        z-index: 2;
    }

    .embed-badge.youtube {
        background: rgba(255, 0, 0, 0.95);
    }

    .embed-badge.tiktok {
        background: rgba(0, 0, 0, 0.95);
    }

    .embed-badge.instagram {
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    }

    /* Modal Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.95);
        animation: fadeIn 0.3s ease;
    }

    .lightbox.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .lightbox-content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
        animation: zoomIn 0.3s ease;
    }

    .lightbox-content img {
        width: 100%;
        height: auto;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 10px;
    }

    .lightbox-embed {
        width: 90vw;
        max-width: 800px;
        height: 80vh;
        max-height: 600px;
        background: #000;
        border-radius: 10px;
        overflow: hidden;
    }

    .lightbox-embed iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    .lightbox-caption {
        color: white;
        text-align: center;
        padding: 20px;
        font-size: 1.2rem;
    }

    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 40px;
        color: white;
        cursor: pointer;
        z-index: 10000;
        transition: all 0.3s ease;
    }

    .lightbox-close:hover {
        color: #52b788;
        transform: rotate(90deg);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 40px;
        color: white;
        cursor: pointer;
        padding: 20px;
        transition: all 0.3s ease;
        user-select: none;
    }

    .lightbox-nav:hover {
        color: #52b788;
        transform: translateY(-50%) scale(1.2);
    }

    .lightbox-prev {
        left: 20px;
    }

    .lightbox-next {
        right: 20px;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.5);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .gallery-item {
            height: 280px;
        }

        .lightbox-nav {
            font-size: 30px;
            padding: 10px;
        }

        .lightbox-close {
            font-size: 30px;
            top: 10px;
            right: 15px;
        }

        .lightbox-embed {
            width: 95vw;
            height: 70vh;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            padding: 60px 0 40px;
        }

        .hero-section h1 {
            font-size: 1.5rem;
        }

        .hero-section p {
            font-size: 1rem;
        }

        .gallery-grid {
            gap: 15px;
        }

        .gallery-item {
            height: 250px;
        }

        .gallery-caption h3 {
            font-size: 1rem;
        }

        .gallery-caption .date {
            font-size: 0.85rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container text-center">
        <h1>Galeri MTsN 1 Magetan</h1>
        <p>Dokumentasi kegiatan di MTsN 1 Magetan</p>
    </div>
</div>

<!-- Gallery Grid -->
<div class="container">
    <div class="gallery-grid">
        @foreach($galeri as $item)
        <div class="gallery-item" onclick="openLightbox({{ $item['id'] }})">
            @if(!empty($item['gambar']))
                <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" loading="lazy">
            @else
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0;">
                    <i class="fas fa-image" style="font-size: 48px; color: #999;"></i>
                </div>
            @endif
            
            @if($item['tipe'] === 'embed' && !empty($item['embed_link']))
                @php
                    $platform = 'embed';
                    if (strpos($item['embed_link'], 'youtube.com') !== false || strpos($item['embed_link'], 'youtu.be') !== false) {
                        $platform = 'youtube';
                    } elseif (strpos($item['embed_link'], 'tiktok.com') !== false) {
                        $platform = 'tiktok';
                    } elseif (strpos($item['embed_link'], 'instagram.com') !== false) {
                        $platform = 'instagram';
                    }
                @endphp
                <span class="embed-badge {{ $platform }}">
                    @if($platform === 'youtube')
                        <i class="fab fa-youtube"></i> YOUTUBE
                    @elseif($platform === 'tiktok')
                        <i class="fab fa-tiktok"></i> TIKTOK
                    @elseif($platform === 'instagram')
                        <i class="fab fa-instagram"></i> INSTAGRAM
                    @else
                        <i class="fas fa-link"></i> EMBED
                    @endif
                </span>
            @endif

            <div class="gallery-caption">
                <h3>{{ $item['judul'] }}</h3>
                <div class="date">
                    📅 {{ date('d F Y', strtotime($item['tanggal'])) }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Lightbox Modal -->
<div class="lightbox" id="lightbox" onclick="closeLightbox(event)">
    <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
    <span class="lightbox-nav lightbox-prev" onclick="changeImage(-1, event)">&#10094;</span>
    <span class="lightbox-nav lightbox-next" onclick="changeImage(1, event)">&#10095;</span>
    
    <div class="lightbox-content" id="lightbox-content">
        <!-- Content will be dynamically inserted here -->
    </div>
    <div class="lightbox-caption" id="lightbox-caption"></div>
</div>

<script>
    const galeriData = @json($galeri);
    let currentIndex = 0;

    function openLightbox(id) {
        currentIndex = galeriData.findIndex(item => item.id === id);
        showImage(currentIndex);
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(event) {
        if (event.target.id === 'lightbox' || event.target.classList.contains('lightbox-close')) {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    function changeImage(direction, event) {
        event.stopPropagation();
        currentIndex += direction;
        
        if (currentIndex >= galeriData.length) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = galeriData.length - 1;
        }
        
        showImage(currentIndex);
    }

    function showImage(index) {
        const item = galeriData[index];
        const contentDiv = document.getElementById('lightbox-content');
        
        // Clear previous content
        contentDiv.innerHTML = '';
        
        if (item.tipe === 'embed' && item.embed_link) {
            // Show embed content
            const embedDiv = document.createElement('div');
            embedDiv.className = 'lightbox-embed';
            embedDiv.innerHTML = getEmbedHTML(item.embed_link);
            contentDiv.appendChild(embedDiv);
        } else {
            // Show image
            const img = document.createElement('img');
            img.src = item.gambar;
            img.alt = item.judul;
            contentDiv.appendChild(img);
        }
        
        document.getElementById('lightbox-caption').textContent = item.judul;
    }

    function getEmbedHTML(url) {
        // YouTube
        if (url.includes('youtube.com') || url.includes('youtu.be')) {
            let videoId = '';
            if (url.includes('youtube.com/watch?v=')) {
                videoId = url.split('v=')[1].split('&')[0];
            } else if (url.includes('youtu.be/')) {
                videoId = url.split('youtu.be/')[1].split('?')[0];
            }
            return `<iframe src="https://www.youtube.com/embed/${videoId}" allowfullscreen></iframe>`;
        }
        
        // TikTok
        if (url.includes('tiktok.com')) {
            return `<iframe src="${url}" allowfullscreen></iframe>`;
        }
        
        // Instagram
        if (url.includes('instagram.com')) {
            return `<iframe src="${url}/embed" allowfullscreen></iframe>`;
        }
        
        // Default
        return `<iframe src="${url}" allowfullscreen></iframe>`;
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox');
        if (lightbox.classList.contains('active')) {
            if (e.key === 'Escape') {
                lightbox.classList.remove('active');
                document.body.style.overflow = 'auto';
            } else if (e.key === 'ArrowLeft') {
                changeImage(-1, e);
            } else if (e.key === 'ArrowRight') {
                changeImage(1, e);
            }
        }
    });
</script>
@endsection