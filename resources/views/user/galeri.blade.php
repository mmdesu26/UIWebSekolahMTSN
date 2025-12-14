@extends('layouts.app')

@section('title', 'Galeri - MTsN 1 Magetan')

@section('content')

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/user/galeri.css') }}">

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

<!-- Link to JS -->
<script src="{{ asset('js/user/galeri.js') }}"></script>
<script>
    // Initialize gallery data
    initGaleriData(@json($galeri));
</script>

@endsection