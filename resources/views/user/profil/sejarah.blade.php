@extends('layouts.app')

@section('title', 'Sejarah Sekolah - MTsN 1 Magetan')

@section('content')

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/user/sejarah.css') }}">

<!-- Hero Section -->
<section class="sejarah-hero">
    <div class="sejarah-hero-content">
        <h1>
            <i class="fas fa-book-open" style="margin-right: 15px;"></i>
            Sejarah MTsN 1 Magetan
        </h1>
        <p>Perjalanan madrasah dalam mendidik generasi berakhlak mulia sejak berdiri hingga kini</p>
    </div>
</section>

<!-- Content Section -->
<section class="sejarah-content-section">
    <div class="container">
        
        <!-- Featured Image -->
        @if(isset($data['image']) && $data['image'])
        <div class="featured-image-wrapper">
            <img src="{{ $data['image'] }}" alt="Sejarah MTsN 1 Magetan">
        </div>
        @endif

        <!-- Main Card -->
        <div class="sejarah-card">
            
            <!-- Card Header -->
            <div class="sejarah-card-header">
                <div class="sejarah-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="sejarah-header-text">
                    <h2>Perjalanan MTsN 1 Magetan</h2>
                    <p>Membangun generasi cerdas, beriman, dan berakhlak mulia</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Card Body -->
            <div class="sejarah-card-body">
                
                @if(!empty($data['sejarah']))
                    {!! $data['sejarah'] !!}
                @else
                    <!-- Placeholder Content -->
                    <p style="text-align: center; color: var(--text-muted); padding: 40px 20px;">
                        <i class="fas fa-info-circle" style="font-size: 48px; margin-bottom: 20px; display: block;"></i>
                        <strong>Konten sejarah belum tersedia.</strong><br>
                        Silakan hubungi administrator untuk menambahkan informasi sejarah sekolah.
                    </p>
                @endif

            </div>

        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h3>Ingin Menjadi Bagian Dari Keluarga Besar MTsN 1 Magetan?</h3>
            <p>Bergabunglah dengan ribuan siswa lainnya dalam perjalanan menuju masa depan yang cemerlang</p>
            <a href="{{ route('ppdb') }}" class="cta-btn">
                <i class="fas fa-arrow-right"></i> Daftar Sekarang
            </a>
        </div>

    </div>
</section>

<!-- Link to JS -->
<script src="{{ asset('js/user/sejarah.js') }}"></script>

@endsection