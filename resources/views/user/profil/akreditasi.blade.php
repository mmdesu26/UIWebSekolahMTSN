@extends('layouts.app')

@section('title', 'Akreditasi & Sertifikasi - MTsN 1 Magetan')

@section('content')
<!-- Hero Section -->
<section class="akreditasi-hero">
    <div class="container">
        <div class="hero-content text-center">
            <div class="hero-badge" data-aos="zoom-in">
                <i class="fas fa-award"></i>
            </div>
            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">Akreditasi & Sertifikasi</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Komitmen Kami Terhadap Standar Pendidikan Berkualitas
            </p>
        </div>
    </div>
</section>

<!-- Akreditasi Utama -->
<section class="akreditasi-main">
    <div class="container">
        <div class="akreditasi-showcase" data-aos="fade-up">
            <div class="showcase-content">
                <div class="akreditasi-letter-wrap">
                    <div class="akreditasi-letter">A</div>
                    <div class="akreditasi-glow"></div>
                </div>
                <div class="showcase-text">
                    <h2>Terakreditasi A</h2>
                    <h3>Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M)</h3>
                    <p class="lead">MTsN 1 Magetan telah meraih Akreditasi A dari BAN-S/M, menunjukkan komitmen kami dalam memberikan pendidikan berkualitas tinggi yang memenuhi standar nasional pendidikan.</p>
                    
                    <div class="akreditasi-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-check"></i>
                            <div>
                                <strong>Tahun Akreditasi</strong>
                                <p>2023</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <strong>Nilai Akreditasi</strong>
                                <p>95.5 (Sangat Baik)</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong>Masa Berlaku</strong>
                                <p>2023 - 2028</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <strong>No. Sertifikat</strong>
                                <p>123/BAN-S/M/SK/2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sertifikasi Lainnya -->
<section class="sertifikasi-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Sertifikasi & Penghargaan</h2>
            <p class="section-subtitle">Pencapaian dan pengakuan yang telah diraih</p>
        </div>

        <div class="sertifikasi-grid">
            <!-- ISO 9001:2015 -->
            <div class="sertifikasi-card" data-aos="fade-up" data-aos-delay="100">
                <div class="sertifikasi-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>ISO 9001:2015</h3>
                <p>Sertifikasi Sistem Manajemen Mutu Pendidikan</p>
                <span class="sertifikasi-year">2022</span>
            </div>

            <!-- Sekolah Adiwiyata -->
            <div class="sertifikasi-card" data-aos="fade-up" data-aos-delay="150">
                <div class="sertifikasi-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Adiwiyata Nasional</h3>
                <p>Sekolah Peduli dan Berbudaya Lingkungan</p>
                <span class="sertifikasi-year">2023</span>
            </div>

            <!-- Madrasah Digital -->
            <div class="sertifikasi-card" data-aos="fade-up" data-aos-delay="200">
                <div class="sertifikasi-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3>Madrasah Digital</h3>
                <p>Penerapan Teknologi dalam Pembelajaran</p>
                <span class="sertifikasi-year">2024</span>
            </div>

            <!-- Sekolah Sehat -->
            <div class="sertifikasi-card" data-aos="fade-up" data-aos-delay="250">
                <div class="sertifikasi-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Sekolah Sehat</h3>
                <p>Program Kesehatan Sekolah Terbaik</p>
                <span class="sertifikasi-year">2023</span>
            </div>
        </div>
    </div>
</section>

<!-- Prestasi -->
<section class="prestasi-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Prestasi & Penghargaan</h2>
            <p class="section-subtitle">Bukti dedikasi kami dalam dunia pendidikan</p>
        </div>

        <div class="prestasi-timeline">
            <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                <div class="timeline-year">2024</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4>Juara 1 Olimpiade Sains Nasional</h4>
                    <p>Bidang Matematika Tingkat Provinsi Jawa Timur</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left" data-aos-delay="150">
                <div class="timeline-year">2023</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h4>Madrasah Berprestasi Tingkat Nasional</h4>
                    <p>Penghargaan dari Kementerian Agama RI</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right" data-aos-delay="200">
                <div class="timeline-year">2023</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Juara Umum MTQ Tingkat Kabupaten</h4>
                    <p>Musabaqah Tilawatil Quran Magetan</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left" data-aos-delay="250">
                <div class="timeline-year">2022</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4>Sekolah Rujukan Nasional</h4>
                    <p>Kategori Implementasi Kurikulum Merdeka</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="akreditasi-cta">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <div class="cta-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h2>Bergabunglah dengan Madrasah Terakreditasi A</h2>
            <p>Dapatkan pendidikan berkualitas dengan standar nasional</p>
            <a href="{{ route('ppdb') }}" class="btn btn-primary btn-large">
                <i class="fas fa-arrow-right"></i> Daftar Sekarang
            </a>
        </div>
    </div>
</section>

<style>
/* Akreditasi Hero */
.akreditasi-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: 120px 0 80px;
    color: white;
    position: relative;
    overflow: hidden;
}

.akreditasi-hero::before {
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

.hero-badge {
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    font-size: 50px;
    border: 3px solid rgba(255,255,255,0.3);
}

/* Akreditasi Main */
.akreditasi-main {
    padding: 80px 0;
    background: white;
}

.akreditasi-showcase {
    max-width: 1000px;
    margin: 0 auto;
}

.showcase-content {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 60px;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
}

.akreditasi-letter-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.akreditasi-letter {
    width: 250px;
    height: 250px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    font-size: 150px;
    font-weight: 900;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 30px;
    box-shadow: 0 20px 50px rgba(26,95,58,0.4);
    position: relative;
    z-index: 2;
    animation: letterPulse 3s ease-in-out infinite;
    font-family: 'Playfair Display', serif;
}

@keyframes letterPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.akreditasi-glow {
    position: absolute;
    width: 280px;
    height: 280px;
    background: radial-gradient(circle, var(--accent-color), transparent);
    opacity: 0.3;
    border-radius: 50%;
    animation: glowPulse 2s ease-in-out infinite;
    z-index: 1;
}

@keyframes glowPulse {
    0%, 100% { transform: scale(0.8); opacity: 0.3; }
    50% { transform: scale(1.2); opacity: 0.5; }
}

.showcase-text h2 {
    font-size: 36px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 10px;
    font-family: 'Playfair Display', serif;
}

.showcase-text h3 {
    font-size: 20px;
    color: var(--text-muted);
    margin-bottom: 20px;
    font-weight: 500;
}

.showcase-text .lead {
    font-size: 16px;
    line-height: 1.8;
    color: var(--text-muted);
    margin-bottom: 30px;
}

.akreditasi-details {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.detail-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.detail-item i {
    font-size: 28px;
    color: var(--accent-color);
    margin-top: 5px;
}

.detail-item strong {
    display: block;
    font-size: 14px;
    color: var(--dark-text);
    margin-bottom: 5px;
}

.detail-item p {
    margin: 0;
    color: var(--text-muted);
    font-size: 15px;
}

/* Sertifikasi Section */
.sertifikasi-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.sertifikasi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.sertifikasi-card {
    background: white;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    transition: all 0.4s;
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.sertifikasi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    transform: scaleX(0);
    transition: transform 0.4s;
}

.sertifikasi-card:hover::before {
    transform: scaleX(1);
}

.sertifikasi-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(26,95,58,0.15);
    border-color: var(--primary-color);
}

.sertifikasi-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    margin: 0 auto 20px;
    transition: all 0.4s;
}

.sertifikasi-card:hover .sertifikasi-icon {
    transform: rotateY(360deg);
    background: linear-gradient(135deg, var(--accent-color), #e67e22);
}

.sertifikasi-card h3 {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 12px;
}

.sertifikasi-card p {
    font-size: 14px;
    color: var(--text-muted);
    margin-bottom: 15px;
    line-height: 1.6;
}

.sertifikasi-year {
    display: inline-block;
    background: var(--accent-color);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

/* Prestasi Section */
.prestasi-section {
    padding: 80px 0;
    background: white;
}

.prestasi-timeline {
    max-width: 900px;
    margin: 50px auto 0;
    position: relative;
}

.prestasi-timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
    transform: translateX(-50%);
}

.timeline-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-bottom: 60px;
    position: relative;
}

.timeline-item:nth-child(even) .timeline-year {
    order: 2;
}

.timeline-item:nth-child(even) .timeline-content {
    order: 1;
    text-align: right;
}

.timeline-year {
    font-size: 48px;
    font-weight: 700;
    color: var(--primary-color);
    opacity: 0.3;
    font-family: 'Playfair Display', serif;
    display: flex;
    align-items: center;
    justify-content: center;
}

.timeline-content {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px solid var(--light-bg);
    transition: all 0.3s;
    position: relative;
}

.timeline-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(26,95,58,0.2);
    border-color: var(--primary-color);
}

.timeline-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--accent-color), #e67e22);
    color: white;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 15px;
    box-shadow: 0 5px 15px rgba(243,156,18,0.3);
}

.timeline-content h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 10px;
}

.timeline-content p {
    font-size: 14px;
    color: var(--text-muted);
    margin: 0;
    line-height: 1.6;
}

/* CTA Section */
.akreditasi-cta {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: 80px 0;
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.akreditasi-cta::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 400px;
    height: 400px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
}

.cta-content {
    position: relative;
    z-index: 2;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
    margin: 0 auto 30px;
    border: 3px solid rgba(255,255,255,0.3);
}

.cta-content h2 {
    font-size: 38px;
    font-weight: 700;
    margin-bottom: 15px;
    font-family: 'Playfair Display', serif;
}

.cta-content p {
    font-size: 18px;
    margin-bottom: 35px;
    opacity: 0.95;
}

/* Responsive */
@media (max-width: 768px) {
    .akreditasi-hero {
        padding: 80px 0 60px;
    }
    
    .hero-title {
        font-size: 32px;
    }
    
    .showcase-content {
        grid-template-columns: 1fr;
        padding: 30px;
        gap: 30px;
        text-align: center;
    }
    
    .akreditasi-letter {
        width: 200px;
        height: 200px;
        font-size: 120px;
        margin: 0 auto;
    }
    
    .akreditasi-glow {
        width: 230px;
        height: 230px;
    }
    
    .akreditasi-details {
        grid-template-columns: 1fr;
    }
    
    .detail-item {
        justify-content: center;
    }
    
    .sertifikasi-grid {
        grid-template-columns: 1fr;
    }
    
    .prestasi-timeline::before {
        left: 30px;
    }
    
    .timeline-item {
        grid-template-columns: 1fr;
        padding-left: 60px;
    }
    
    .timeline-item:nth-child(even) .timeline-year {
        order: 1;
    }
    
    .timeline-item:nth-child(even) .timeline-content {
        order: 2;
        text-align: left;
    }
    
    .timeline-year {
        font-size: 32px;
        justify-content: flex-start;
    }
    
    .cta-content h2 {
        font-size: 28px;
    }
}
</style>

<!-- AOS Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
    });
</script>
@endsection