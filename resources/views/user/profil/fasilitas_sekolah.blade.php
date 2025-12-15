@extends('layouts.app')

@section('title', 'Fasilitas Sekolah - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/fasilitas.css') }}">

<!-- Hero Section -->
<section class="hero-fasilitas">
    <div class="hero-fasilitas-wrapper">
        <div class="hero-fasilitas-content">
            <h1>
                <i class="fas fa-school" style="margin-right: 15px;"></i>
                Fasilitas Sekolah
            </h1>
            <p>Sarana dan prasarana pendukung pembelajaran berkualitas untuk masa depan gemilang</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="fasilitas-content-section">
    <div class="container">

        <!-- Section Intro -->
        <div class="section-intro">
            <h2>Fasilitas Utama</h2>
            <p>Dilengkapi dengan fasilitas modern untuk mendukung proses belajar mengajar yang optimal</p>
        </div>

        <!-- Fasilitas Grid - DYNAMIC FROM DATABASE -->
        <div class="fasilitas-grid">
            @forelse($fasilitasUtama as $fasilitas)
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="{{ $fasilitas->icon }}"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>{{ $fasilitas->nama }}</h3>
                    <p>{{ $fasilitas->deskripsi }}</p>
                    @if($fasilitas->fitur && count($fasilitas->fitur) > 0)
                    <ul class="fasilitas-features">
                        @foreach($fasilitas->fitur as $fitur)
                        <li><i class="fas fa-check-circle"></i> {{ $fitur }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                <i class="fas fa-info-circle" style="font-size: 3rem; color: #bdc3c7; margin-bottom: 20px;"></i>
                <h4 style="color: #7f8c8d;">Belum ada data fasilitas utama</h4>
                <p style="color: #95a5a6;">Data fasilitas akan ditampilkan di sini</p>
            </div>
            @endforelse
        </div>

        <!-- Divider -->
        <div class="section-divider"></div>

        <!-- Fasilitas Pendukung Lainnya -->
        <div class="section-intro">
            <h2>Fasilitas Pendukung Lainnya</h2>
            <p>Kelengkapan fasilitas untuk mendukung berbagai kegiatan siswa</p>
        </div>

        <div class="other-grid">
            @forelse($fasilitasPendukung as $fasilitas)
            <div class="other-card">
                <div class="other-icon">
                    <i class="{{ $fasilitas->icon }}"></i>
                </div>
                <h4>{{ $fasilitas->nama }}</h4>
                <p>{{ $fasilitas->deskripsi }}</p>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                <i class="fas fa-info-circle" style="font-size: 3rem; color: #bdc3c7; margin-bottom: 20px;"></i>
                <h4 style="color: #7f8c8d;">Belum ada data fasilitas pendukung</h4>
                <p style="color: #95a5a6;">Data fasilitas akan ditampilkan di sini</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script src="{{ asset('js/fasilitas.js') }}"></script>

@endsection