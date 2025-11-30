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
        <div class="kurikulum-box">
            <h3><i class="fas fa-book-open"></i> Kurikulum Merdeka</h3>
            <p>MTsN 1 Magetan menerapkan <strong>Kurikulum Merdeka</strong> yang memberikan keleluasaan kepada satuan pendidikan dan guru untuk mengembangkan potensi serta kreatifitas peserta didik sesuai dengan kebutuhan belajar mereka.</p>
            <p>Kurikulum ini dirancang untuk mengembangkan karakter dan kompetensi siswa secara holistik melalui pembelajaran berbasis proyek dan kontekstual.</p>
        </div>

        <div class="kurikulum-box">
            <h3><i class="fas fa-bullseye"></i> Tujuan Kurikulum</h3>
            <ul style="color: var(--text-muted); line-height: 1.8;">
                <li>Mengembangkan pengetahuan, keterampilan, dan sikap peserta didik</li>
                <li>Menumbuhkan karakter Profil Pelajar Pancasila</li>
                <li>Mempersiapkan siswa menghadapi tantangan abad 21</li>
                <li>Mengintegrasikan nilai-nilai Islam dalam pembelajaran</li>
            </ul>
        </div>

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

        <div class="kurikulum-box">
            <h3><i class="fas fa-project-diagram"></i> Projek Penguatan Profil Pelajar Pancasila</h3>
            <p>Pembelajaran berbasis projek yang dilaksanakan untuk menguatkan karakter dan kompetensi siswa melalui tema-tema yang kontekstual dan relevan dengan kehidupan sehari-hari.</p>
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