@extends('layouts.app')

@section('title', 'Ekstrakurikuler - MTsN 1 Magetan')

@section('content')

<!-- Hero Section -->
<div class="ekstra-hero">
    <div class="container">
        <div class="ekstra-hero-content">
            <h1><i class="fas fa-star" style="margin-right: 15px;"></i>Ekstrakurikuler MTsN 1 Magetan</h1>
            <p>Wadah pengembangan bakat dan minat siswa dalam berbagai bidang</p>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="ekstra-content-section">
    <div class="container">

        <!-- Section Header -->
        <div class="ekstra-section-header">
            <h2><i class="fas fa-list" style="margin-right: 10px;"></i>Program Ekstrakurikuler</h2>
            <p>MTsN 1 Magetan menyediakan berbagai pilihan ekstrakurikuler untuk mengembangkan potensi siswa sesuai minat dan bakat mereka</p>
        </div>

        <!-- Ekstrakurikuler Grid -->
        <div class="ekstrakurikuler-grid">
            @foreach($ekstrakurikuler as $item)
            <div class="ekstra-card">
                <div class="ekstra-card-header">
                    <i class="{{ $item->icon ?? 'fas fa-star' }}"></i> <!-- Asumsi bisa tambah field icon jika mau, default star -->
                    <h3>{{ $item->name }}</h3>
                </div>
                <div class="ekstra-card-body">
                    <div class="ekstra-info">
                        <div class="ekstra-info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <h4>Jadwal</h4>
                                <p>{{ $item->jadwal }}</p>
                            </div>
                        </div>
                        <div class="ekstra-info-item">
                            <i class="fas fa-user-tie"></i>
                            <div>
                                <h4>Pembina</h4>
                                <p>{{ $item->pembina }}</p>
                            </div>
                        </div>
                        <div class="ekstra-info-item">
                            <i class="fas fa-trophy"></i>
                            <div>
                                <h4>Prestasi</h4>
                                <p>{{ $item->prestasi }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('ekstrakurikuler.detail', $item->slug) }}" class="ekstra-btn">
                        Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="stats-ekstra">
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">12+</div>
                <div class="stat-ekstra-label">Jenis Ekstrakurikuler</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">85%</div>
                <div class="stat-ekstra-label">Siswa Aktif</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">50+</div>
                <div class="stat-ekstra-label">Penghargaan</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">100%</div>
                <div class="stat-ekstra-label">Prestasi</div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <div class="benefits-header">
                <h3><i class="fas fa-sparkles"></i> Manfaat Mengikuti Ekstrakurikuler</h3>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-star"></i></div>
                    <h4>Mengembangkan Bakat</h4>
                    <p>Ekstrakurikuler membantu siswa mengembangkan bakat dan minat mereka secara maksimal di bidang yang diminati</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-users"></i></div>
                    <h4>Membangun Karakter</h4>
                    <p>Melalui ekstrakurikuler, siswa belajar disiplin, kerja sama, tanggung jawab, dan kepemimpinan</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-trophy"></i></div>
                    <h4>Meraih Prestasi</h4>
                    <p>Siswa memiliki kesempatan berkompetisi dan meraih prestasi di berbagai tingkat kompetisi</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Memperluas Jaringan</h4>
                    <p>Membangun persahabatan dan hubungan baik dengan teman sekelas dari berbagai latar belakang</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-brain"></i></div>
                    <h4>Mengasah Kreativitas</h4>
                    <p>Mengembangkan kreativitas dan inovasi dalam berbagai bidang seni, olahraga, dan sains</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h4>Persiapan Masa Depan</h4>
                    <p>Ekstrakurikuler mempersiapkan siswa menghadapi tantangan masa depan dengan soft skills yang kuat</p>
                </div>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="achievements-section">
            <div class="achievements-header">
                <h3><i class="fas fa-medal"></i> Prestasi Ekstrakurikuler</h3>
            </div>
            <div class="achievements-grid">
                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-futbol"></i>
                        <h4>Futsal</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Turnamen Futsal Antar Sekolah 2023 & Juara 2 Kompetisi Futsal Se-Jawa Timur
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-music"></i>
                        <h4>Paduan Suara</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Festival Paduan Suara Nasional 2023 & Finalis Kompetisi Paduan Suara Tingkat Provinsi
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-microchip"></i>
                        <h4>Robotik</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 2 Kompetisi Robotik Nasional 2023 & Medali Emas dalam kategori Inovasi Teknologi
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-book-quran"></i>
                        <h4>Tahfidz Quran</h4>
                    </div>
                    <p class="achievement-text">
                        5 Siswa Hafiz Al-Quran pada 2023 & Juara 1 Kompetisi Tilawah Quran Se-Kabupaten
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-person-hiking"></i>
                        <h4>Karate</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Kata Kelas 60-65 kg & Juara 2 Kumite Tingkat Provinsi Jawa Timur
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-fire"></i>
                        <h4>Taekwondo</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 2 Pertandingan Taekwondo Se-Jawa Timur & Medali Perunggu Kompetisi Nasional
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-volleyball"></i>
                        <h4>Volley Ball</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 3 Kompetisi Volley Antar Sekolah & Juara 2 Liga Volley Tingkat Kabupaten
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-masks-theater"></i>
                        <h4>Teater & Drama</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Festival Seni Teater Kabupaten & Penampilan di Panggung Nasional Jakarta 2023
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Link to the external CSS file -->
<link rel="stylesheet" href="{{ asset('css/ekstra.css') }}">
<!-- Link to the external JavaScript file -->
<script src="{{ asset('js/ekstra.js') }}"></script>

@endsection