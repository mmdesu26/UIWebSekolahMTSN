@extends('layouts.app')

@section('title', 'Kelas Program - MTsN 1 Magetan')

@section('content')

<style>
    /* Hero Section */
    .program-hero {
        background: linear-gradient(135deg, #1a5f3a 0%, #2d8659 100%);
        padding: 100px 0 60px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .program-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-30px); }
    }
    
    .program-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }
    
    .program-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Playfair Display', serif;
    }
    
    .program-hero p {
        font-size: 20px;
        opacity: 0.95;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Content Section */
    .program-content {
        padding: 80px 0;
        background: #f8f9fa;
    }
    
    .section-intro {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 60px;
    }
    
    .section-intro h2 {
        font-size: 36px;
        font-weight: 700;
        color: #1a5f3a;
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
    }
    
    .section-intro p {
        font-size: 18px;
        color: #6c757d;
        line-height: 1.8;
    }
    
    /* Kelas Grid */
    .kelas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .kelas-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .kelas-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }
    
    .kelas-header {
        padding: 40px 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .kelas-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.1;
        z-index: 1;
    }
    
    /* Warna untuk setiap kelas */
    .kelas-card.sains .kelas-header {
        background: linear-gradient(135deg, #3498db, #2980b9);
    }
    
    .kelas-card.bilingual .kelas-header {
        background: linear-gradient(135deg, #27ae60, #229954);
    }
    
    .kelas-card.religi .kelas-header {
        background: linear-gradient(135deg, #16a085, #138d75);
    }
    
    .kelas-card.olahraga .kelas-header {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }
    
    .kelas-card.it .kelas-header {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }
    
    .kelas-card.reguler .kelas-header {
        background: linear-gradient(135deg, #34495e, #2c3e50);
    }
    
    .kelas-icon {
        font-size: 60px;
        color: white;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    .kelas-header h3 {
        color: white;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }
    
    .kelas-header p {
        color: rgba(255,255,255,0.95);
        font-size: 15px;
        position: relative;
        z-index: 2;
        margin: 0;
    }
    
    .kelas-body {
        padding: 30px;
    }
    
    .kelas-features {
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
    }
    
    .kelas-features li {
        padding: 12px 0;
        color: #6c757d;
        font-size: 15px;
        display: flex;
        align-items: start;
        gap: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .kelas-features li:last-child {
        border-bottom: none;
    }
    
    .kelas-features i {
        color: #f39c12;
        font-size: 18px;
        margin-top: 2px;
        min-width: 20px;
    }
    
    .kelas-footer {
        padding: 0 30px 30px;
    }
    
    .btn-detail {
        display: block;
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #1a5f3a, #2d8659);
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn-detail:hover {
        background: linear-gradient(135deg, #2d8659, #1a5f3a);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26,95,58,0.3);
        color: white;
    }
    
    .btn-detail i {
        margin-left: 8px;
    }
    
    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #1a5f3a, #2d8659);
        color: white;
        padding: 60px;
        border-radius: 15px;
        text-align: center;
        margin-top: 40px;
    }
    
    .cta-section h3 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .cta-section p {
        font-size: 18px;
        margin-bottom: 30px;
        opacity: 0.95;
    }
    
    .btn-daftar {
        display: inline-block;
        padding: 15px 50px;
        background: #f39c12;
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 18px;
        font-weight: 700;
        transition: all 0.3s ease;
    }
    
    .btn-daftar:hover {
        background: #e67e22;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(243,156,18,0.4);
        color: white;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .program-hero {
            padding: 80px 0 40px;
        }
        
        .program-hero h1 {
            font-size: 36px;
        }
        
        .program-hero p {
            font-size: 16px;
        }
        
        .kelas-grid {
            grid-template-columns: 1fr;
        }
        
        .section-intro h2 {
            font-size: 28px;
        }
        
        .cta-section {
            padding: 40px 20px;
        }
        
        .cta-section h3 {
            font-size: 24px;
        }
    }
    
    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .kelas-card {
        animation: fadeInUp 0.6s ease backwards;
    }
    
    .kelas-card:nth-child(1) { animation-delay: 0.1s; }
    .kelas-card:nth-child(2) { animation-delay: 0.2s; }
    .kelas-card:nth-child(3) { animation-delay: 0.3s; }
    .kelas-card:nth-child(4) { animation-delay: 0.4s; }
    .kelas-card:nth-child(5) { animation-delay: 0.5s; }
    .kelas-card:nth-child(6) { animation-delay: 0.6s; }
</style>

<!-- Hero Section -->
<section class="program-hero">
    <div class="container">
        <div class="program-hero-content">
            <h1>Kelas-kelas Yang Ada di MTsN 1 Magetan</h1>
            <p>Program unggulan yang dirancang untuk mengembangkan potensi siswa sesuai minat dan bakat</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="program-content">
    <div class="container">
        
        <!-- Intro -->
        <div class="section-intro">
            <h2>Pilih Program Kelas Sesuai Minat Anda</h2>
            <p>
                MTsN 1 Magetan menyediakan berbagai program kelas unggulan yang dirancang khusus 
                untuk mengoptimalkan potensi siswa. Setiap program dilengkapi dengan fasilitas modern, 
                tenaga pengajar profesional, dan kurikulum yang telah disesuaikan dengan kebutuhan masa depan.
            </p>
        </div>
        
        <!-- Kelas Grid -->
        <div class="kelas-grid">
            
            <!-- Kelas Sains -->
            <div class="kelas-card sains">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Kelas Sains</h3>
                    <p>Program Berbasis Sains dan Teknologi</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Laboratorium lengkap dan modern</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Praktikum rutin setiap minggu</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pembinaan olimpiade sains</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Kurikulum sains yang diperkaya</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-sains" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Kelas Bilingual -->
            <div class="kelas-card bilingual">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <h3>Kelas Bilingual</h3>
                    <p>Pembelajaran Dwibahasa (Indonesia - Inggris)</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pengajaran dengan 2 bahasa</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Native speaker berpengalaman</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Sertifikasi TOEFL/IELTS</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Program pertukaran pelajar</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-bilingual" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Kelas Religi -->
            <div class="kelas-card religi">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h3>Kelas Religi</h3>
                    <p>Pendalaman Ilmu Agama Islam</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Tahfidz Al-Qur'an intensif</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Kajian kitab kuning</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Bahasa Arab aktif</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pembinaan akhlak dan adab</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-religi" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Kelas Olahraga -->
            <div class="kelas-card olahraga">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3>Kelas Olahraga</h3>
                    <p>Program Pembinaan Atlet Berprestasi</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Fasilitas olahraga lengkap</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pelatih profesional bersertifikat</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Jadwal latihan terstruktur</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pembinaan kompetisi nasional</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-olahraga" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Kelas IT -->
            <div class="kelas-card it">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Kelas IT (Informasi Teknologi)</h3>
                    <p>Program Teknologi Informasi dan Komputer</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pembelajaran coding dan programming</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Lab komputer dengan PC modern</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Sertifikasi IT internasional</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Project-based learning</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-it" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- Kelas Reguler -->
            <div class="kelas-card reguler">
                <div class="kelas-header">
                    <div class="kelas-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Kelas Reguler</h3>
                    <p>Program Pembelajaran Standar Nasional</p>
                </div>
                <div class="kelas-body">
                    <ul class="kelas-features">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Kurikulum nasional lengkap</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Guru berpengalaman dan kompeten</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Fasilitas belajar memadai</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Ekstrakurikuler beragam</span>
                        </li>
                    </ul>
                </div>
                <div class="kelas-footer">
                    <a href="#kelas-reguler" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
        </div>
        
        <!-- CTA -->
        <div class="cta-section">
            <h3>Siap Bergabung dengan Kami?</h3>
            <p>Daftarkan diri Anda sekarang dan raih masa depan gemilang bersama MTsN 1 Magetan!</p>
            <a href="{{ route('ppdb.pendaftaran') }}" class="btn-daftar">
                <i class="fas fa-edit"></i> Daftar Sekarang
            </a>
        </div>
        
    </div>
</section>

<script>
// Smooth scroll untuk link internal
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        }
    });
});

// Animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe cards
document.querySelectorAll('.kelas-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(card);
});

// Hover effect untuk cards
document.querySelectorAll('.kelas-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Button detail click handler
document.querySelectorAll('.btn-detail').forEach(btn => {
    btn.addEventListener('click', function(e) {
        // Smooth scroll sudah ditangani di atas
        // Tambahkan efek visual jika perlu
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 100);
    });
});
</script>

@endsection