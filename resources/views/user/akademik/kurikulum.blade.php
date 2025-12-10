@extends('layouts.app')

@section('title', 'Kurikulum - MTsN 1 Magetan')

@section('content')
<style>
    .akademik-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    
    .akademik-hero h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Playfair Display', serif;
    }
    
    .breadcrumb {
        background: rgba(255,255,255,0.1);
        padding: 10px 20px;
        border-radius: 25px;
        display: inline-flex;
        gap: 10px;
        margin-top: 15px;
    }
    
    .breadcrumb a {
        color: white;
        text-decoration: none;
    }
    
    .content-section {
        padding: 60px 0;
        background: white;
    }
    
    .kurikulum-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        transition: all 0.3s;
    }
    
    .kurikulum-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(26,95,58,0.15);
        border-color: var(--primary-color);
    }
    
    .kurikulum-box h3 {
        color: var(--primary-color);
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .mata-pelajaran {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }
    
    .mapel-card {
        background: white;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s;
    }
    
    .mapel-card:hover {
        border-color: var(--accent-color);
        box-shadow: 0 5px 15px rgba(243,156,18,0.2);
    }
    
    .mapel-icon {
        font-size: 36px;
        color: var(--primary-color);
        margin-bottom: 10px;
    }
    
    .mapel-card h4 {
        font-size: 16px;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 5px;
    }
    
    .mapel-card p {
        font-size: 13px;
        color: var(--text-muted);
        margin: 0;
    }

    .tujuan-list {
        list-style: none;
        padding-left: 0;
    }

    .tujuan-list li {
        padding: 12px 15px;
        margin-bottom: 10px;
        background: white;
        border-left: 4px solid var(--primary-color);
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }

    .tujuan-list li:hover {
        transform: translateX(10px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .tujuan-list li::before {
        content: "✓";
        color: var(--primary-color);
        font-weight: bold;
        margin-right: 10px;
        font-size: 18px;
    }

    @media (max-width: 768px) {
        .akademik-hero h1 { font-size: 32px; }
        .mata-pelajaran { grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); }
    }
</style>

<div class="akademik-hero">
    <div class="container">
        <h1>Kurikulum MTsN 1 Magetan</h1>
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            <span>/</span>
            <span>Kurikulum</span>
        </div>
    </div>
</div>

<section class="content-section">
    <div class="container">
        <!-- Nama Kurikulum -->
        <div class="kurikulum-box">
            <h3><i class="fas fa-book-open"></i> {{ $kurikulum->nama_kurikulum ?? 'Kurikulum Merdeka' }}</h3>
            <p style="white-space: pre-line;">{{ $kurikulum->deskripsi_kurikulum ?? 'Deskripsi kurikulum belum tersedia.' }}</p>
        </div>

        <!-- Tujuan Kurikulum -->
        <div class="kurikulum-box">
            <h3><i class="fas fa-bullseye"></i> Tujuan Kurikulum</h3>
            <ul class="tujuan-list">
                @if($kurikulum && $kurikulum->tujuan_kurikulum)
                    @foreach(explode("\n", $kurikulum->tujuan_kurikulum) as $tujuan)
                        @if(trim($tujuan))
                            <li>{{ trim($tujuan) }}</li>
                        @endif
                    @endforeach
                @else
                    <li>Tujuan kurikulum belum tersedia</li>
                @endif
            </ul>
        </div>

        <!-- Struktur Mata Pelajaran (Static) -->
        <div class="kurikulum-box">
            <h3><i class="fas fa-graduation-cap"></i> Struktur Mata Pelajaran</h3>
            
            <h4 style="margin-top: 25px; margin-bottom: 15px; color: var(--dark-text);">Kelompok A (Umum)</h4>
            <div class="mata-pelajaran">
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-quran"></i></div>
                    <h4>Al-Qur'an Hadits</h4>
                    <p>4 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-mosque"></i></div>
                    <h4>Akidah Akhlak</h4>
                    <p>2 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-balance-scale"></i></div>
                    <h4>Fikih</h4>
                    <p>2 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-book"></i></div>
                    <h4>SKI</h4>
                    <p>2 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-language"></i></div>
                    <h4>Bahasa Arab</h4>
                    <p>3 Jam/Minggu</p>
                </div>
            </div>

            <h4 style="margin-top: 30px; margin-bottom: 15px; color: var(--dark-text);">Kelompok B (Umum)</h4>
            <div class="mata-pelajaran">
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-flag"></i></div>
                    <h4>PKn</h4>
                    <p>3 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-spell-check"></i></div>
                    <h4>Bahasa Indonesia</h4>
                    <p>4 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-globe"></i></div>
                    <h4>Bahasa Inggris</h4>
                    <p>3 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-calculator"></i></div>
                    <h4>Matematika</h4>
                    <p>4 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-flask"></i></div>
                    <h4>IPA</h4>
                    <p>4 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-map-marked-alt"></i></div>
                    <h4>IPS</h4>
                    <p>3 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-paint-brush"></i></div>
                    <h4>Seni Budaya</h4>
                    <p>2 Jam/Minggu</p>
                </div>
                <div class="mapel-card">
                    <div class="mapel-icon"><i class="fas fa-running"></i></div>
                    <h4>PJOK</h4>
                    <p>3 Jam/Minggu</p>
                </div>
            </div>
        </div>

        <!-- Projek Penguatan Profil Pelajar Pancasila -->
        <div class="kurikulum-box">
            <h3><i class="fas fa-project-diagram"></i> Projek Penguatan Profil Pelajar Pancasila</h3>
            <p style="white-space: pre-line;">{{ $kurikulum->projek_penguatan ?? 'Informasi projek penguatan belum tersedia.' }}</p>
        </div>
    </div>
</section>

<script>
    // Simple fade-in animation on scroll
    const boxes = document.querySelectorAll('.kurikulum-box');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    entry.target.style.transition = 'all 0.6s';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
            }
        });
    });
    
    boxes.forEach(box => observer.observe(box));
</script>
@endsection