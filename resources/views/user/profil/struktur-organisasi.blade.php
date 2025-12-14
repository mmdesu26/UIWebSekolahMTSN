@extends('layouts.app')

@section('title', 'Struktur Organisasi - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/struktur_organisasi.css') }}">

<!-- Hero Section -->
<section class="hero-struktur">
    <div class="container d-flex align-items-center justify-content-center min-vh-50">
        <div class="hero-struktur-content text-center w-100">
            <h1>Struktur Organisasi</h1>
            <p>Manajemen dan kepemimpinan yang profesional untuk pendidikan berkualitas</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="struktur-content-section">
    <div class="container">

        @if($strukturGambar)
        <!-- Bagan Struktur Organisasi -->
        <div class="struktur-bagan-box">
            <div class="struktur-bagan-header">
                <i class="fas fa-sitemap"></i>
                <h3>Bagan Struktur Organisasi Sekolah</h3>
                <p>Klik gambar untuk memperbesar</p>
            </div>

            <div class="struktur-bagan-image" onclick="openImageModal()">
                <img 
                    src="{{ asset('storage/' . $strukturGambar) }}" 
                    alt="Struktur Organisasi MTsN 1 Magetan"
                >
                <div class="zoom-indicator">
                    <i class="fas fa-search-plus"></i> Klik untuk zoom
                </div>
            </div>
        </div>

        <!-- Modal Zoom Gambar -->
        <div id="imageModal" class="image-modal" onclick="closeImageModal()">
            <div class="modal-content">
                <button class="modal-close" onclick="closeImageModal()">
                    <i class="fas fa-times"></i>
                </button>
                <img 
                    src="{{ asset('storage/' . $strukturGambar) }}" 
                    alt="Struktur Organisasi MTsN 1 Magetan"
                >
                <div class="modal-info">
                    <i class="fas fa-info-circle"></i> Klik di luar gambar untuk menutup
                </div>
            </div>
        </div>

        <!-- Info Boxes -->
        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon kepemimpinan">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h4>Kepemimpinan</h4>
                <p>Struktur organisasi kami dirancang untuk memastikan koordinasi yang efektif antara berbagai bidang dalam mencapai visi dan misi sekolah.</p>
            </div>

            <div class="info-card">
                <div class="info-icon koordinasi">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h4>Koordinasi</h4>
                <p>Setiap bagian memiliki peran dan tanggung jawab yang jelas untuk memastikan kelancaran operasional sekolah.</p>
            </div>

            <div class="info-card">
                <div class="info-icon transparansi">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Transparansi</h4>
                <p>Kami berkomitmen pada transparansi dalam manajemen untuk membangun kepercayaan dengan seluruh stakeholder.</p>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-struktur">
            <i class="fas fa-sitemap"></i>
            <h3>Struktur Organisasi Belum Tersedia</h3>
            <p>Data struktur organisasi sekolah sedang dalam proses penyusunan oleh administrator.</p>
        </div>
        @endif

        <!-- Section Tenaga Pengajar -->
        <div class="guru-section">
            <div class="section-intro">
                <h2>Tenaga Pengajar</h2>
                <p>Tim pengajar profesional dan berpengalaman di MTsN 1 Magetan</p>
            </div>

            @if(count($guru) > 0)
            <!-- Filter Mata Pelajaran -->
            <div class="filter-mapel">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-users"></i> Semua Guru
                </button>
                <button class="filter-btn" data-filter="matematika">
                    <i class="fas fa-calculator"></i> Matematika
                </button>
                <button class="filter-btn" data-filter="ipa">
                    <i class="fas fa-flask"></i> IPA
                </button>
                <button class="filter-btn" data-filter="bahasa">
                    <i class="fas fa-book"></i> Bahasa
                </button>
                <button class="filter-btn" data-filter="agama">
                    <i class="fas fa-mosque"></i> Agama
                </button>
                <button class="filter-btn" data-filter="seni">
                    <i class="fas fa-palette"></i> Seni & Olahraga
                </button>
            </div>

            <!-- Grid Daftar Guru -->
            <div class="guru-grid">
                @foreach($guru as $g)
                <div class="guru-card" data-category="{{ $g->kategori }}">
                    <div class="guru-image">
                        @if($g->foto_url)
                            <img src="{{ $g->foto_url }}" alt="{{ $g->nama }}">
                        @else
                            <div class="guru-image-placeholder">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        @endif
                        <div class="guru-badge">
                            <span>{{ $g->mata_pelajaran }}</span>
                        </div>
                    </div>
                    <div class="guru-info">
                        <h4>{{ $g->nama }}</h4>
                        <p class="guru-jabatan">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Guru {{ $g->mata_pelajaran }}
                        </p>
                        <div class="guru-nip">
                            <i class="fas fa-id-card"></i>
                            <code>NIP: {{ $g->nip_display }}</code>
                        </div>
                        <div class="guru-actions">
                            <a href="mailto:{{ $g->email_auto }}" class="guru-email-btn">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Stats Summary -->
            <div class="stats-summary">
                <div class="stats-header">
                    <h3>Statistik Tenaga Pengajar</h3>
                    <p>Komposisi dan kualifikasi guru MTsN 1 Magetan</p>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-card total">
                        <div class="stat-number">{{ $jumlah_guru }}</div>
                        <div class="stat-label">Total Guru</div>
                    </div>
                    
                    <div class="stat-card pendidikan">
                        <div class="stat-number">95%</div>
                        <div class="stat-label">S1</div>
                    </div>
                    
                    <div class="stat-card sertifikat">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Bersertifikat</div>
                    </div>
                </div>
            </div>

            @else
            <!-- Empty State Guru -->
            <div class="empty-guru">
                <i class="fas fa-user-friends"></i>
                <h3>Data Guru Belum Tersedia</h3>
                <p>Saat ini data guru belum dimasukkan oleh administrator. Silakan hubungi admin sekolah untuk informasi lebih lanjut.</p>
                <div class="empty-actions">
                    <a href="{{ route('kontak') }}" class="btn-empty-primary">
                        <i class="fas fa-phone"></i> Hubungi Admin
                    </a>
                    <a href="{{ route('home') }}" class="btn-empty-secondary">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
            @endif

        </div>

    </div>
</section>

<script src="{{ asset('js/struktur_organisasi.js') }}"></script>

@endsection