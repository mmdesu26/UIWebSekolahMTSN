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

        <!-- Prestasi Umum (Tidak Terikat Ekskul) -->
<div class="achievements-section mt-5">
    <div class="achievements-header">
        <h3><i class="fas fa-medal"></i> Prestasi Sekolah</h3>
        <p>Beberapa prestasi gemilang yang diraih oleh siswa MTsN 1 Magetan</p>
    </div>
    <div class="achievements-grid">
        @forelse($prestasi as $item)
            <div class="achievement-card">
                <div class="achievement-title">
                    <i class="fas fa-trophy"></i>
                    <h4>{{ $item->nama_prestasi }}</h4>
                </div>
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_prestasi }}" class="img-fluid mt-2 rounded" style="max-height: 150px;">
                @endif
            </div>
        @empty
            <p class="text-center col-12">Belum ada prestasi yang tercatat.</p>
        @endforelse
    </div>
</div>

    </div>
</section>

<!-- Link to the external CSS file -->
<link rel="stylesheet" href="{{ asset('css/ekstra.css') }}">
<!-- Link to the external JavaScript file -->
<script src="{{ asset('js/ekstra.js') }}"></script>

@endsection