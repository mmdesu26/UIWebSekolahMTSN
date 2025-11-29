<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTSN Magetan - Madrasah Tsanawiyah Negeri Magetan</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header & Navigation -->
    <header class="header">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="contact-info">
                        <span><i class="fas fa-phone"></i> (0351) 123456</span>
                        <span><i class="fas fa-envelope"></i> info@mtsnmagetan.sch.id</span>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="navbar">
            <div class="container">
                <div class="nav-wrapper">
                    <div class="logo">
                        <img src="https://via.placeholder.com/60x60?text=LOGO" alt="Logo MTSN Magetan">
                        <div class="logo-text">
                            <h2>MTSN MAGETAN</h2>
                            <p>Madrasah Tsanawiyah Negeri</p>
                        </div>
                    </div>
                    
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
                    <ul class="nav-menu" id="navMenu">
                        <li><a href="#home" class="active">Beranda</a></li>
                        <li class="dropdown">
                            <a href="#profil">Profil <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#sejarah">Sejarah Sekolah</a></li>
                                <li><a href="#visi-misi">Visi & Misi</a></li>
                                <li><a href="#struktur">Struktur Organisasi</a></li>
                                <li><a href="#guru">Guru</a></li>
                                <li><a href="#fasilitas">Fasilitas</a></li>
                                <li><a href="#akreditasi">Akreditasi & Sertifikasi</a></li>
                            </ul>
                        </li>
                        <li><a href="#berita">Berita & Pengumuman</a></li>
                        <li class="dropdown">
                            <a href="#akademik">Akademik <i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#kurikulum">Kurikulum</a></li>
                                <li><a href="#kalender">Kalender Pendidikan</a></li>
                                <li><a href="#jadwal">Jadwal Pelajaran</a></li>
                            </ul>
                        </li>
                        <li><a href="#ppdb">PPDB</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                        <li><a href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="#kelas">Kelas</a></li>
                        <li><a href="#program">Program</a></li>
                        <li><a href="#sosial-media">Sosial Media</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-slider">
            <div class="hero-slide active" style="background-image: url('https://via.placeholder.com/1920x800/1a5f3a/ffffff?text=MTSN+Magetan');">
                <div class="hero-overlay"></div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">Selamat Datang di MTSN Magetan</h1>
                        <p class="hero-subtitle">Membentuk Generasi Berakhlak Mulia, Berprestasi, dan Berwawasan Global</p>
                        <div class="hero-buttons">
                            <a href="#ppdb" class="btn btn-primary">Daftar Sekarang</a>
                            <a href="#profil" class="btn btn-secondary">Tentang Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-indicators">
            <span class="indicator active"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
        </div>
    </section>

    <!-- Quick Info Section -->
    <section class="quick-info">
        <div class="container">
            <div class="info-cards">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Akreditasi A</h3>
                    <p>Terakreditasi A oleh BAN-S/M</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>1200+ Siswa</h3>
                    <p>Siswa aktif berprestasi</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3>80+ Guru</h3>
                    <p>Tenaga pendidik profesional</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>100+ Prestasi</h3>
                    <p>Prestasi akademik & non-akademik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="profil">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tentang MTSN Magetan</h2>
                <p class="section-subtitle">Madrasah Tsanawiyah Negeri unggulan di Kabupaten Magetan</p>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <img src="https://via.placeholder.com/600x400/1a5f3a/ffffff?text=Gedung+MTSN" alt="MTSN Magetan">
                </div>
                <div class="about-text">
                    <h3>Visi Kami</h3>
                    <p>"Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan"</p>
                    
                    <h3>Misi Kami</h3>
                    <ul>
                        <li>Menyelenggarakan pendidikan yang berkualitas dan berorientasi pada prestasi</li>
                        <li>Membentuk peserta didik yang berakhlak mulia dan berkarakter Islami</li>
                        <li>Mengembangkan potensi akademik dan non-akademik siswa</li>
                        <li>Menciptakan lingkungan madrasah yang kondusif dan ramah lingkungan</li>
                    </ul>
                    
                    <a href="#visi-misi" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Announcement Section -->
    <section class="news-section" id="berita">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Berita & Pengumuman</h2>
                <p class="section-subtitle">Informasi terkini dari MTSN Magetan</p>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image">
                        <img src="https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita+1" alt="Berita">
                        <span class="news-badge">Berita</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 25 November 2025</span>
                            <span><i class="fas fa-user"></i> Admin</span>
                        </div>
                        <h3>MTSN Magetan Raih Juara 1 Lomba KSM Tingkat Provinsi</h3>
                        <p>Siswa MTSN Magetan berhasil meraih juara 1 dalam Kompetisi Sains Madrasah tingkat Provinsi Jawa Timur...</p>
                        <a href="#" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-image">
                        <img src="https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Pengumuman" alt="Pengumuman">
                        <span class="news-badge pengumuman">Pengumuman</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 20 November 2025</span>
                            <span><i class="fas fa-user"></i> Admin</span>
                        </div>
                        <h3>Pengumuman PPDB Tahun Ajaran 2026/2027</h3>
                        <p>Pendaftaran Peserta Didik Baru untuk tahun ajaran 2026/2027 akan dibuka mulai tanggal 1 Januari 2026...</p>
                        <a href="#ppdb" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-image">
                        <img src="https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Kegiatan" alt="Kegiatan">
                        <span class="news-badge kegiatan">Kegiatan</span>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-calendar"></i> 15 November 2025</span>
                            <span><i class="fas fa-user"></i> Admin</span>
                        </div>
                        <h3>Pelaksanaan Peringatan Hari Guru Nasional</h3>
                        <p>MTSN Magetan mengadakan serangkaian kegiatan dalam rangka memperingati Hari Guru Nasional...</p>
                        <a href="#" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PPDB Section -->
    <section class="ppdb-section" id="ppdb">
        <div class="container">
            <div class="ppdb-content">
                <div class="ppdb-info">
                    <h2>Penerimaan Peserta Didik Baru</h2>
                    <h3>Tahun Ajaran 2026/2027</h3>
                    <p>Bergabunglah dengan MTSN Magetan dan wujudkan masa depan gemilang bersama kami!</p>
                    
                    <div class="ppdb-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Pendaftaran Online</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Seleksi Transparan</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Biaya Terjangkau</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Fasilitas Lengkap</span>
                        </div>
                    </div>
                    
                    <div class="ppdb-buttons">
                        <a href="#" class="btn btn-primary btn-large">Daftar Sekarang</a>
                        <a href="#" class="btn btn-secondary btn-large">Info Lengkap</a>
                    </div>
                </div>
                <div class="ppdb-image">
                    <img src="https://via.placeholder.com/600x500/1a5f3a/ffffff?text=PPDB+2026" alt="PPDB">
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="galeri">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Galeri</h2>
                <p class="section-subtitle">Dokumentasi kegiatan dan fasilitas MTSN Magetan</p>
            </div>
            
            <div class="gallery-tabs">
                <button class="gallery-tab active" data-category="all">Semua</button>
                <button class="gallery-tab" data-category="kegiatan">Kegiatan</button>
                <button class="gallery-tab" data-category="fasilitas">Fasilitas</button>
                <button class="gallery-tab" data-category="prestasi">Prestasi</button>
            </div>
            
            <div class="gallery-grid">
                <div class="gallery-item" data-category="kegiatan">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Kegiatan+1" alt="Kegiatan">
                    <div class="gallery-overlay">
                        <h4>Upacara Bendera</h4>
                        <p>Kegiatan rutin setiap Senin</p>
                    </div>
                </div>
                <div class="gallery-item" data-category="fasilitas">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Lab+Komputer" alt="Fasilitas">
                    <div class="gallery-overlay">
                        <h4>Laboratorium Komputer</h4>
                        <p>Fasilitas pembelajaran modern</p>
                    </div>
                </div>
                <div class="gallery-item" data-category="prestasi">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Prestasi" alt="Prestasi">
                    <div class="gallery-overlay">
                        <h4>Juara Olimpiade</h4>
                        <p>Prestasi tingkat provinsi</p>
                    </div>
                </div>
                <div class="gallery-item" data-category="kegiatan">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Kegiatan+2" alt="Kegiatan">
                    <div class="gallery-overlay">
                        <h4>Kegiatan Pramuka</h4>
                        <p>Pembentukan karakter siswa</p>
                    </div>
                </div>
                <div class="gallery-item" data-category="fasilitas">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Perpustakaan" alt="Fasilitas">
                    <div class="gallery-overlay">
                        <h4>Perpustakaan</h4>
                        <p>Koleksi buku lengkap</p>
                    </div>
                </div>
                <div class="gallery-item" data-category="kegiatan">
                    <img src="https://via.placeholder.com/400x300/1a5f3a/ffffff?text=Olahraga" alt="Kegiatan">
                    <div class="gallery-overlay">
                        <h4>Kegiatan Olahraga</h4>
                        <p>Mengembangkan fisik siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section class="ekskul-section" id="ekstrakurikuler">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Ekstrakurikuler</h2>
                <p class="section-subtitle">Wadah pengembangan bakat dan minat siswa</p>
            </div>
            <div class="ekskul-grid">
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-book-quran"></i>
                    </div>
                    <h3>Tahfidz Quran</h3>
                    <p>Program menghafal Al-Quran dengan bimbingan ustadz berpengalaman</p>
                </div>
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-futbol"></i>
                    </div>
                    <h3>Olahraga</h3>
                    <p>Sepak bola, basket, voli, bulu tangkis, dan pencak silat</p>
                </div>
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Sains Club</h3>
                    <p>Mengembangkan minat dan bakat di bidang sains dan teknologi</p>
                </div>
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Seni & Budaya</h3>
                    <p>Seni musik, tari, teater, dan kaligrafi</p>
                </div>
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <h3>Bahasa</h3>
                    <p>English Club, Arabic Club, dan Japanese Club</p>
                </div>
                <div class="ekskul-card">
                    <div class="ekskul-icon">
                        <i class="fas fa-campground"></i>
                    </div>
                    <h3>Pramuka</h3>
                    <p>Membentuk karakter kepemimpinan dan kemandirian</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-media-section" id="sosial-media">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Ikuti Kami</h2>
                <p class="section-subtitle">Dapatkan update terbaru dari media sosial kami</p>
            </div>
            <div class="social-grid">
                <a href="#" class="social-box facebook">
                    <i class="fab fa-facebook-f"></i>
                    <h3>Facebook</h3>
                    <p>@MTSNMagetan</p>
                </a>
                <a href="#" class="social-box instagram">
                    <i class="fab fa-instagram"></i>
                    <h3>Instagram</h3>
                    <p>@mtsnmagetan</p>
                </a>
                <a href="#" class="social-box youtube">
                    <i class="fab fa-youtube"></i>
                    <h3>YouTube</h3>
                    <p>MTSN Magetan Official</p>
                </a>
                <a href="#" class="social-box twitter">
                    <i class="fab fa-twitter"></i>
                    <h3>Twitter</h3>
                    <p>@MTSNMagetan</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="kontak">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="section-subtitle">Kami siap membantu Anda</p>
            </div>
            <div class="contact-content">
                <div class="contact-info-box">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Alamat</h4>
                            <p>Jl. Pendidikan No. 123, Magetan<br>Jawa Timur 63381</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Telepon</h4>
                            <p>(0351) 123456<br>(0351) 654321</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>info@mtsnmagetan.sch.id<br>admin@mtsnmagetan.sch.id</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 07.00 - 16.00<br>Sabtu: 07.00 - 12.00</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-box">
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="No. Telepon" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Subjek" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
                    </form>
                </div>
            </div>
            
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60648379024!2d111.30889385!3d-7.6443665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c14e84c978ad%3A0x5027a76e356fd30!2sMagetan%2C%20Magetan%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h3>MTSN Magetan</h3>
                    <p>Madrasah Tsanawiyah Negeri Magetan adalah lembaga pendidikan Islam tingkat menengah pertama yang berkomitmen menghasilkan generasi berakhlak mulia dan berprestasi.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Link Cepat</h4>
                    <ul>
                        <li><a href="#profil">Profil Sekolah</a></li>
                        <li><a href="#berita">Berita & Pengumuman</a></li>
                        <li><a href="#ppdb">PPDB</a></li>
                        <li><a href="#galeri">Galeri</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#akademik">Akademik</a></li>
                        <li><a href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="#fasilitas">Fasilitas</a></li>
                        <li><a href="#prestasi">Prestasi</a></li>
                        <li><a href="#kelas">Program Kelas</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Pendidikan No. 123, Magetan</li>
                        <li><i class="fas fa-phone"></i> (0351) 123456</li>
                        <li><i class="fas fa-envelope"></i> info@mtsnmagetan.sch.id</li>
                        <li><i class="fas fa-clock"></i> Sen-Jum: 07.00-16.00</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 MTSN Magetan. All Rights Reserved. | Designed with <i class="fas fa-heart"></i> by MTSN Magetan IT Team</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>