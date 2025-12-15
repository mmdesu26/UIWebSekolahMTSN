@extends('layouts.app')

@section('title', 'Kelas Program - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/kelas_program.css') }}">

<!-- Hero Section -->
<section class="hero-program" id="hero">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="hero-program-content text-center w-100">
            <h1>Kelas-Kelas Program MTsN 1 Magetan</h1>
            <p>Program unggulan yang dirancang untuk mengembangkan potensi siswa sesuai minat dan bakat mereka</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="program-content-section">
    <div class="container">
        
        <!-- Program Unggulan Section -->
        <div class="section-intro-program">
            <h2>Program Unggulan MTsN 1 Magetan</h2>
            <p>
                Program-program unggulan yang telah terbukti menghasilkan lulusan berkualitas dan berprestasi. 
                Setiap program dirancang dengan standar tinggi untuk mempersiapkan siswa menghadapi tantangan masa depan.
            </p>
        </div>

        <div class="program-unggulan-grid">
            
            <!-- Layanan Peserta Didik Cerdas Istimewa -->
            <div class="program-unggulan-card lpdc">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Layanan Peserta Didik Cerdas Istimewa</h3>
                    <p>Bisa Lulus 2 Tahun</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Program akselerasi untuk siswa berprestasi</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Kurikulum dipercepat dengan pendampingan khusus</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pembelajaran intensif dan terstruktur</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Seleksi ketat untuk siswa berbakat</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tahfiz Qur'an -->
            <div class="program-unggulan-card tahfiz">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-quran"></i>
                    </div>
                    <h3>Tahfiz Qur'an</h3>
                    <p>Program Penghafal Al-Qur'an</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Target hafalan minimal 3 juz</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Metode tahfidz terbukti efektif</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pembimbing hafalan berpengalaman</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Evaluasi hafalan berkala</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tahfidzul Hadist -->
            <div class="program-unggulan-card hadist">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Tahfidzul Hadist</h3>
                    <p>Penghafalan Hadist Pilihan</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Hafalan hadist shahih pilihan</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pemahaman makna dan konteks hadist</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Target minimal 40 hadist</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Aplikasi hadist dalam kehidupan</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Program Bahasa Inggris -->
            <div class="program-unggulan-card english">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h3>Program Bahasa Inggris</h3>
                    <p>English Mastery Program</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pembelajaran 4 skills comprehensif</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Native speaker conversation class</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Persiapan sertifikasi internasional</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>English day dan English camp</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Program Sains -->
            <div class="program-unggulan-card sains-unggulan">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-atom"></i>
                    </div>
                    <h3>Program Sains</h3>
                    <p>Pengembangan Sains & Riset</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Laboratorium IPA lengkap</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pembinaan olimpiade sains</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Praktikum dan riset siswa</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Kompetisi sains nasional</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Program Olahraga -->
            <div class="program-unggulan-card olahraga-unggulan">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Program Olahraga</h3>
                    <p>Pembinaan Atlet Berprestasi</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pelatih bersertifikat nasional</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Fasilitas olahraga standar kompetisi</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Program latihan terstruktur</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Prestasi tingkat nasional</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Program IT -->
            <div class="program-unggulan-card it-unggulan">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <h3>Program Multimedia</h3>
                    <p>Pengolahan media digital</p>
                </div>
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Pemanfaatan software multimedia</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Lab komputer</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Project multimedia & pengembangan portofolio</span>
                        </li>
                        <li>
                            <i class="fas fa-star"></i>
                            <span>Mengembangkan Soft Skills</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Divider -->
        <div class="section-divider"></div>
        
        <!-- Intro Kelas -->
        <div class="section-intro-program">
            <h2>Pilih Kelas Sesuai Minat Anda</h2>
            <p>
                MTsN 1 Magetan menyediakan berbagai kelas unggulan yang dirancang khusus 
                untuk mengoptimalkan potensi siswa. Setiap program dilengkapi dengan fasilitas modern, 
                tenaga pengajar profesional, dan kurikulum yang telah disesuaikan dengan kebutuhan masa depan.
            </p>
        </div>
        
        <!-- Program Grid -->
        <div class="program-grid">
            
            <!-- Program Sains -->
            <div class="program-card sains">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Kelas Sains</h3>
                    <p>Program Berbasis Sains dan Teknologi</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
            </div>
            
            <!-- Program Bilingual -->
            <div class="program-card bilingual">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <h3>Kelas Bilingual</h3>
                    <p>Pembelajaran Dwibahasa (Indonesia - Inggris)</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
            </div>
            
            <!-- Program Religi -->
            <div class="program-card religi">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h3>Kelas Religi</h3>
                    <p>Pendalaman Ilmu Agama Islam</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
            </div>
            
            <!-- Program Olahraga -->
            <div class="program-card olahraga">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3>Kelas Olahraga</h3>
                    <p>Program Pembinaan Atlet Berprestasi</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
                            <span>Pembinaan kompetisi</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Program IT -->
            <div class="program-card it">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Kelas IT</h3>
                    <p>Program Teknologi Informasi dan Komputer</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
            </div>
            
            <!-- Program Reguler -->
            <div class="program-card reguler">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Kelas Reguler</h3>
                    <p>Program Pembelajaran Standar Nasional</p>
                </div>
                <div class="program-body">
                    <ul class="program-features">
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
            </div>
            
        </div>
        
        <!-- CTA Section -->
        <div class="cta-program-section">
            <h3>Siap Bergabung dengan Kami?</h3>
            <p>Daftarkan diri Anda sekarang dan raih masa depan gemilang bersama MTsN 1 Magetan!</p>
            <a href="{{ route('ppdb') }}" class="btn-program-daftar">
                <i class="fas fa-edit"></i> Daftar Sekarang
            </a>
        </div>
        
    </div>
</section>

<script src="{{ asset('js/kelas_program.js') }}"></script>

@endsection