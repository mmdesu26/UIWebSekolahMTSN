@extends('layouts.app')

@section('title', 'Fasilitas Sekolah - MTsN 1 Magetan')

@section('content')
<!-- Hero Section -->
<section class="fasilitas-hero">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title" data-aos="fade-up">Fasilitas Sekolah</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">
                Sarana dan Prasarana Pendukung Pembelajaran Berkualitas
            </p>
        </div>
    </div>
</section>

<!-- Fasilitas Utama -->
<section class="fasilitas-main">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Fasilitas Unggulan</h2>
            <p class="section-subtitle">Dilengkapi dengan fasilitas modern untuk mendukung proses belajar mengajar</p>
        </div>

        <div class="fasilitas-grid">
            <!-- Ruang Belajar -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600" alt="Ruang Belajar">
                    <div class="fasilitas-badge">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Ruang Belajar Representatif</h3>
                    <p>24 ruang kelas ber-AC dengan kapasitas 32 siswa, dilengkapi proyektor LCD dan papan tulis interaktif untuk pembelajaran modern.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> AC & Ventilasi Baik</li>
                        <li><i class="fas fa-check-circle"></i> Proyektor LCD</li>
                        <li><i class="fas fa-check-circle"></i> Papan Tulis Interaktif</li>
                        <li><i class="fas fa-check-circle"></i> Meja & Kursi Ergonomis</li>
                    </ul>
                </div>
            </div>

            <!-- Lab Komputer -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="200">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=600" alt="Lab Komputer">
                    <div class="fasilitas-badge">
                        <i class="fas fa-laptop"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Laboratorium Komputer</h3>
                    <p>2 lab komputer dengan 80 unit PC modern, koneksi internet fiber optik 100 Mbps, dan software pembelajaran terkini.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> 80 Unit Komputer</li>
                        <li><i class="fas fa-check-circle"></i> Internet Fiber 100 Mbps</li>
                        <li><i class="fas fa-check-circle"></i> Software Terkini</li>
                        <li><i class="fas fa-check-circle"></i> AC & Sound System</li>
                    </ul>
                </div>
            </div>

            <!-- Lapangan 3 in 1 -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="300">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=600" alt="Lapangan">
                    <div class="fasilitas-badge">
                        <i class="fas fa-futbol"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Lapangan 3 in 1</h3>
                    <p>Lapangan multifungsi untuk sepak bola, basket, dan voli. Dilengkapi tribun penonton dan lighting system untuk kegiatan malam.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Sepak Bola</li>
                        <li><i class="fas fa-check-circle"></i> Basket</li>
                        <li><i class="fas fa-check-circle"></i> Voli</li>
                        <li><i class="fas fa-check-circle"></i> Tribun Penonton</li>
                    </ul>
                </div>
            </div>

            <!-- Perpustakaan -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=600" alt="Perpustakaan">
                    <div class="fasilitas-badge">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Perpustakaan Madrasah</h3>
                    <p>Koleksi lebih dari 10.000 buku, sistem digital library, ruang baca ber-AC, dan akses e-book & jurnal online.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> 10.000+ Koleksi Buku</li>
                        <li><i class="fas fa-check-circle"></i> Digital Library</li>
                        <li><i class="fas fa-check-circle"></i> Ruang Baca AC</li>
                        <li><i class="fas fa-check-circle"></i> E-Book & Jurnal</li>
                    </ul>
                </div>
            </div>

            <!-- Kantin -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="200">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600" alt="Kantin">
                    <div class="fasilitas-badge">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Kantin Sehat & Bersih</h3>
                    <p>Area kantin luas dengan menu makanan sehat dan halal, tempat duduk nyaman, dan standar kebersihan terjaga.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Makanan Halal</li>
                        <li><i class="fas fa-check-circle"></i> Harga Terjangkau</li>
                        <li><i class="fas fa-check-circle"></i> Area Luas</li>
                        <li><i class="fas fa-check-circle"></i> Kebersihan Terjaga</li>
                    </ul>
                </div>
            </div>

            <!-- Tempat Parkir -->
            <div class="fasilitas-card" data-aos="fade-up" data-aos-delay="300">
                <div class="fasilitas-image">
                    <img src="https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=600" alt="Parkir">
                    <div class="fasilitas-badge">
                        <i class="fas fa-parking"></i>
                    </div>
                </div>
                <div class="fasilitas-content">
                    <h3>Tempat Parkir Luas</h3>
                    <p>Area parkir terpisah untuk siswa dan guru, dilengkapi sistem keamanan CCTV dan petugas keamanan 24 jam.</p>
                    <ul class="fasilitas-features">
                        <li><i class="fas fa-check-circle"></i> Area Terpisah</li>
                        <li><i class="fas fa-check-circle"></i> CCTV 24 Jam</li>
                        <li><i class="fas fa-check-circle"></i> Petugas Keamanan</li>
                        <li><i class="fas fa-check-circle"></i> Kapasitas 500+ Motor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas Pendukung Lainnya -->
<section class="fasilitas-other">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Fasilitas Pendukung Lainnya</h2>
            <p class="section-subtitle">Kelengkapan fasilitas untuk mendukung berbagai kegiatan</p>
        </div>

        <div class="other-grid">
            <div class="other-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="other-icon">
                    <i class="fas fa-mosque"></i>
                </div>
                <h4>Masjid</h4>
                <p>Masjid luas untuk ibadah harian dan kajian</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="150">
                <div class="other-icon">
                    <i class="fas fa-flask"></i>
                </div>
                <h4>Lab IPA</h4>
                <p>Laboratorium IPA lengkap untuk praktikum</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="other-icon">
                    <i class="fas fa-language"></i>
                </div>
                <h4>Lab Bahasa</h4>
                <p>Lab bahasa multimedia untuk pembelajaran</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="250">
                <div class="other-icon">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <h4>UKS</h4>
                <p>Unit Kesehatan Sekolah dengan peralatan lengkap</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="other-icon">
                    <i class="fas fa-restroom"></i>
                </div>
                <h4>Toilet Bersih</h4>
                <p>Toilet terpisah putra-putri yang bersih</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="350">
                <div class="other-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h4>WiFi Gratis</h4>
                <p>Akses internet gratis di seluruh area</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="other-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h4>CCTV</h4>
                <p>Sistem keamanan CCTV 24 jam</p>
            </div>

            <div class="other-item" data-aos="zoom-in" data-aos-delay="450">
                <div class="other-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <h4>Aula</h4>
                <p>Aula serbaguna kapasitas 500 orang</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="fasilitas-cta">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <h2>Ingin Melihat Langsung Fasilitas Kami?</h2>
            <p>Kunjungi sekolah kami dan lihat sendiri kelengkapan fasilitasnya</p>
            <div class="cta-buttons">
                <a href="{{ route('ppdb') }}" class="btn btn-primary btn-large">Daftar Sekarang</a>
                <a href="#" class="btn btn-secondary btn-large">Jadwalkan Kunjungan</a>
            </div>
        </div>
    </div>
</section>

<style>
/* Fasilitas Hero */
.fasilitas-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: 100px 0 80px;
    color: white;
    position: relative;
    overflow: hidden;
}

.fasilitas-hero::before {
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

/* Fasilitas Main */
.fasilitas-main {
    padding: 80px 0;
    background: white;
}

.fasilitas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.fasilitas-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #f0f0f0;
}

.fasilitas-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(26,95,58,0.2);
}

.fasilitas-image {
    position: relative;
    height: 280px;
    overflow: hidden;
}

.fasilitas-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.fasilitas-card:hover .fasilitas-image img {
    transform: scale(1.15);
}

.fasilitas-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--accent-color), #e67e22);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 26px;
    box-shadow: 0 8px 25px rgba(243,156,18,0.4);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.08); }
}

.fasilitas-content {
    padding: 30px;
}

.fasilitas-content h3 {
    font-size: 24px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 15px;
    font-family: 'Playfair Display', serif;
}

.fasilitas-content > p {
    color: var(--text-muted);
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 15px;
}

.fasilitas-features {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.fasilitas-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: var(--text-muted);
}

.fasilitas-features i {
    color: var(--primary-color);
    font-size: 16px;
}

/* Fasilitas Other */
.fasilitas-other {
    padding: 80px 0;
    background: var(--light-bg);
}

.other-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.other-item {
    background: white;
    padding: 40px 25px;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s;
    border: 2px solid transparent;
}

.other-item:hover {
    transform: translateY(-10px);
    border-color: var(--primary-color);
    box-shadow: 0 15px 40px rgba(26,95,58,0.15);
}

.other-icon {
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
    transition: all 0.3s;
}

.other-item:hover .other-icon {
    transform: rotateY(360deg);
    background: linear-gradient(135deg, var(--accent-color), #e67e22);
}

.other-item h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 10px;
}

.other-item p {
    font-size: 14px;
    color: var(--text-muted);
    margin: 0;
    line-height: 1.6;
}

/* CTA Section */
.fasilitas-cta {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: 80px 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.fasilitas-cta::before {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -5%;
    width: 400px;
    height: 400px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}

.cta-content {
    text-align: center;
    position: relative;
    z-index: 2;
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

.cta-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Responsive */
@media (max-width: 768px) {
    .fasilitas-hero {
        padding: 70px 0 50px;
    }
    
    .hero-title {
        font-size: 36px;
    }
    
    .fasilitas-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .other-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
    }
    
    .fasilitas-features {
        grid-template-columns: 1fr;
    }
    
    .cta-content h2 {
        font-size: 28px;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .btn-large {
        width: 100%;
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