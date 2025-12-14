@extends('layouts.app')

@section('title', 'Fasilitas Sekolah - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/fasilitas.css') }}">

<!-- Hero Section -->
<section class="hero-fasilitas">
    <div class="container d-flex align-items-center justify-content-center min-vh-50">
        <div class="hero-fasilitas-content text-center w-100">
            <h1>Fasilitas Sekolah</h1>
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

        <!-- Fasilitas Grid -->
        <div class="fasilitas-grid">

            <!-- Ruang Belajar -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Ruang Belajar yang Representatif</h3>
                    <p>Ruang kelas yang nyaman dan papan tulis interaktif untuk pembelajaran.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Ventilasi Baik</li>
                        <li><i class="fas fa-check-circle"></i> Proyektor LCD</li>
                        <li><i class="fas fa-check-circle"></i> Papan Tulis Interaktif</li>
                        <li><i class="fas fa-check-circle"></i> Meja & Kursi Ergonomis</li>
                    </ul>
                </div>
            </div>

            <!-- Lab Komputer -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-laptop"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Laboratorium Komputer</h3>
                    <p>Lab komputer dengan PC modern, koneksi internet stabil, dan software pembelajaran terkini.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Unit Komputer</li>
                        <li><i class="fas fa-check-circle"></i> Internet Stabil</li>
                        <li><i class="fas fa-check-circle"></i> Software Terkini</li>
                        <li><i class="fas fa-check-circle"></i> AC</li>
                    </ul>
                </div>
            </div>

            <!-- Lapangan 3 in 1 -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Lapangan 3 in 1</h3>
                    <p>Lapangan multifungsi untuk sepak bola, basket, dan voli.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Sepak Bola</li>
                        <li><i class="fas fa-check-circle"></i> Basket</li>
                        <li><i class="fas fa-check-circle"></i> Voli</li>
                    </ul>
                </div>
            </div>

            <!-- Perpustakaan -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-book"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Perpustakaan Ibnu Sina MTsN 1 Magetan</h3>
                    <p>Koleksi lebih dari 10.000 buku, sistem digital library, ruang baca ber-AC.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Koleksi Buku Lengkap</li>
                        <li><i class="fas fa-check-circle"></i> Digital Library</li>
                        <li><i class="fas fa-check-circle"></i> Ruang Baca AC</li>
                        <li><i class="fas fa-check-circle"></i> E-Book & Jurnal</li>
                    </ul>
                </div>
            </div>

            <!-- Madrasah Literasi -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Madrasah Literasi</h3>
                    <p>Belajar untuk berliterasi, menulis juga membaca.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Copy Writing</li>
                        <li><i class="fas fa-check-circle"></i> Diskusi</li>
                        <li><i class="fas fa-check-circle"></i> Bedah Buku</li>
                    </ul>
                </div>
            </div>

            <!-- Koperasi Siswa -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-store"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Koperasi Siswa</h3>
                    <p>Koperasi siswa yang menyediakan berbagai kebutuhan sekolah, alat tulis, seragam, dan makanan ringan dengan harga terjangkau.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Alat Tulis Lengkap</li>
                        <li><i class="fas fa-check-circle"></i> Harga Terjangkau</li>
                    </ul>
                </div>
            </div>

            <!-- Tempat Parkir -->
            <div class="fasilitas-card">
                <div class="fasilitas-badge">
                    <i class="fas fa-parking"></i>
                </div>
                <div class="fasilitas-content">
                    <h3>Tempat Parkir</h3>
                    <p>Area parkir terpisah untuk siswa dan guru, dilengkapi sistem keamanan CCTV dan petugas keamanan 24 jam.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Area Terpisah</li>
                        <li><i class="fas fa-check-circle"></i> CCTV</li>
                        <li><i class="fas fa-check-circle"></i> Petugas Keamanan</li>
                        <li><i class="fas fa-check-circle"></i> Kapasitas 100+ Motor</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Divider -->
        <div class="section-divider"></div>

        <!-- Fasilitas Pendukung Lainnya -->
        <div class="section-intro">
            <h2>Fasilitas Pendukung Lainnya</h2>
            <p>Kelengkapan fasilitas untuk mendukung berbagai kegiatan siswa</p>
        </div>

        <div class="other-grid">

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-mosque"></i>
                </div>
                <h4>Masjid</h4>
                <p>Masjid luas untuk ibadah harian dan kajian</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h4>Lab IPA</h4>
                <p>Laboratorium IPA lengkap untuk praktikum</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-language"></i>
                </div>
                <h4>Lab Bahasa</h4>
                <p>Lab bahasa multimedia untuk pembelajaran</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <h4>UKS</h4>
                <p>Unit Kesehatan Sekolah dengan peralatan lengkap</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-restroom"></i>
                </div>
                <h4>Toilet Bersih</h4>
                <p>Toilet terpisah putra-putri yang bersih</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h4>WiFi Gratis</h4>
                <p>Akses internet gratis di seluruh area</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h4>CCTV</h4>
                <p>Sistem keamanan CCTV 24 jam</p>
            </div>

            <div class="other-card">
                <div class="other-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <h4>Aula</h4>
                <p>Aula serbaguna untuk berbagai kegiatan</p>
            </div>

        </div>
    </div>
</section>

<script src="{{ asset('js/fasilitas.js') }}"></script>

@endsection