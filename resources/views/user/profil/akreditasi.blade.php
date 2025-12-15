@extends('layouts.app')

@section('title', 'Akreditasi & Prestasi - MTsN 1 Magetan')

@section('content')

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/user/akreditasi.css') }}">

<!-- Hero Section -->
<section class="akreditasi-hero">
    <div class="container">
        <div class="akreditasi-hero-content text-center">
            <h1 data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-trophy" style="margin-right: 15px;"></i>
                Akreditasi & Prestasi
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
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
                    <p class="lead">Sekolah ini telah terakreditasi A dengan Nomor SK Akreditasi 1179/BAN-SM/SK/2021 pada tanggal 16 November 2021. Alamat MTSN 1 MAGETAN terletak di JL.RAYA MAOSPATI-NGAWI, DS.BALUK, KEC.KARANGREJO, KAB. MAGETAN, BALUK, Kec. Karangrejo, Kab. Magetan, Jawa Timur.</p>
                    
                    <div class="akreditasi-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-check"></i>
                            <div>
                                <strong>Tanggal Akreditasi</strong>
                                <p>16 November 2021</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <strong>Peringkat</strong>
                                <p>A (Sangat Baik)</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-certificate"></i>
                            <div>
                                <strong>No. SK Akreditasi</strong>
                                <p>1179/BAN-SM/SK/2021</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Lokasi</strong>
                                <p>Karangrejo, Magetan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Prestasi -->
<section class="prestasi-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Prestasi MTsN 1 Magetan</h2>
            <p class="section-subtitle">Pencapaian membanggakan siswa-siswi kami</p>
        </div>

        <div class="prestasi-grid">
            <!-- Prestasi 1 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="50">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Beregu KSM Magetan</h4>
            </div>

            <!-- Prestasi 2 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="75">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 2 KSM IPA</h4>
            </div>

            <!-- Prestasi 3 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="100">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Finalis Myres Tk Nasional</h4>
            </div>

            <!-- Prestasi 4 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="125">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Olimpiade IPA</h4>
            </div>

            <!-- Prestasi 5 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="150">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Olimpiade MTK</h4>
            </div>

            <!-- Prestasi 6 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="175">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 2 Olimpiade IPS Terpadu</h4>
            </div>

            <!-- Prestasi 7 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="200">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 2 Nembang Campursari Putri</h4>
            </div>

            <!-- Prestasi 8 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="225">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Kata Perorangan SMP 7-8 Putri</h4>
            </div>

            <!-- Prestasi 9 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="250">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 3 Bulutangkis Ganda Putra</h4>
            </div>

            <!-- Prestasi 10 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="275">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Karate Kelas 60-65 kg Piala Koni Pusat</h4>
            </div>

            <!-- Prestasi 11 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="300">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Futsal</h4>
            </div>

            <!-- Prestasi 12 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="325">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Try Out UKM</h4>
            </div>

            <!-- Prestasi 13 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="350">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Taekwondo Nasional Piala Kapolri</h4>
            </div>

            <!-- Prestasi 14 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="375">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 MTQ Porseni</h4>
            </div>

            <!-- Prestasi 15 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="400">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 3 Lomba PBB Piala Panglima TNI</h4>
            </div>

            <!-- Prestasi 16 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="425">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 1 Lari 100m Putri Porseni</h4>
            </div>

            <!-- Prestasi 17 -->
            <div class="prestasi-card" data-aos="fade-up" data-aos-delay="450">
                <div class="prestasi-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h4>Juara 2 Kata Perorangan Kejurnas Karate</h4>
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

<!-- AOS Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Link to JS -->
<script src="{{ asset('js/user/akreditasi.js') }}"></script>

@endsection