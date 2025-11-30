@extends('layouts.app')  

@section('title', 'Beranda - MTsN 1 Magetan')  

@section('content')  
    <!-- Hero Section -->  
    <section class="hero" id="home">  
        <div class="container">  
            <div class="hero-content">  
                <h1 class="hero-title">Selamat Datang di MTsN 1 Magetan</h1>  
                <p class="hero-subtitle">Membentuk Generasi Berakhlak Mulia, Berprestasi, dan Berwawasan Global</p>  
                <div class="btn-group-hero">  
                    <a href="{{ route('ppdb') }}" class="btn btn-primary">Daftar PPDB Sekarang</a>  
                    <a href="{{ route('profil.sejarah') }}" class="btn btn-secondary">Tentang Kami</a>  
                </div>  
            </div>  
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
                        <i class="fas fa-chalkboard-user"></i>  
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
                <h2 class="section-title">Tentang MTsN 1 Magetan</h2>  
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

                    <a href="{{ route('profil.visi-misi') }}" class="btn btn-primary">Selengkapnya</a>  
                </div>  
            </div>  
        </div>  
    </section>  

    <!-- News Section -->  
    <section class="news-section" id="berita">  
        <div class="container">  
            <div class="section-header">  
                <h2 class="section-title">Berita & Pengumuman</h2>  
                <p class="section-subtitle">Informasi terkini dari MTsN 1 Magetan</p>  
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
                        <h3>MTsN 1 Magetan Raih Juara 1 Lomba KSM Tingkat Provinsi</h3>  
                        <p>Siswa MTsN 1 Magetan berhasil meraih juara 1 dalam Kompetisi Sains Madrasah tingkat Provinsi Jawa Timur...</p>  
                        <a href="{{ route('berita') }}" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>  
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
                        <a href="{{ route('ppdb') }}" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>  
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
                        <p>MTsN 1 Magetan mengadakan serangkaian kegiatan dalam rangka memperingati Hari Guru Nasional...</p>  
                        <a href="{{ route('berita') }}" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>  
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
                    <p>Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!</p>  

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
                        <a href="{{ route('ppdb') }}" class="btn btn-primary btn-large">Daftar Sekarang</a>  
                        <a href="{{ route('ppdb') }}" class="btn btn-secondary btn-large">Info Lengkap</a>  
                    </div>  
                </div>  
                <div class="ppdb-image">  
                    <img src="https://via.placeholder.com/600x500/1a5f3a/ffffff?text=PPDB+2026" alt="PPDB">  
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
            <div style="text-align: center; margin-top: 40px;">  
                <a href="{{ route('ekstrakurikuler') }}" class="btn btn-primary">Lihat Semua Ekstrakurikuler</a>  
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
                    <p>@MTsN1Magetan</p>  
                </a>  
                <a href="#" class="social-box instagram">  
                    <i class="fab fa-instagram"></i>  
                    <h3>Instagram</h3>  
                    <p>@mtsn1magetan</p>  
                </a>  
                <a href="#" class="social-box youtube">  
                    <i class="fab fa-youtube"></i>  
                    <h3>YouTube</h3>  
                    <p>MTsN 1 Magetan Official</p>  
                </a>  
                <a href="#" class="social-box twitter">  
                    <i class="fab fa-twitter"></i>  
                    <h3>Twitter</h3>  
                    <p>@MTsN1Magetan</p>  
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
                            <i                    <div class="contact-item">
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
                        <button type="submit" class="btn btn-primary" style="width: 100%; text-align: center;">Kirim Pesan</button>
                    </form>
                </div>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60648379024!2d111.30889385!3d-7.6443665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c14e84c978ad%3A0x5027a76e356fd30!2sMagetan%2C%20Magetan%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection