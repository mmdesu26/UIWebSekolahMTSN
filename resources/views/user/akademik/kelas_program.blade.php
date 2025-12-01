@extends('layouts.app')

@section('title', 'Kelas Program - MTsN 1 Magetan')

@section('content')

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary-color: #1a5f3a;
        --primary-dark: #0f3d22;
        --primary-light: #2d8659;
        --secondary-color: #f39c12;
        --secondary-light: #f5b041;
        --text-dark: #2c3e50;
        --text-light: #7f8c8d;
        --border-color: #ecf0f1;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 8px 16px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 12px 24px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ==================== HERO SECTION ==================== */
    .hero-program {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);
        padding: clamp(60px, 10vw, 100px) 20px;
        color: white;
        position: relative;
        overflow: hidden;
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-program::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .hero-program::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 10s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0) translateX(0);
        }
        50% {
            transform: translateY(-30px) translateX(20px);
        }
    }

    .hero-program-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        animation: slideInUp 0.8s ease-out;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-program h1 {
        font-size: clamp(28px, 5vw, 52px);
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
        line-height: 1.2;
    }

    .hero-program p {
        font-size: clamp(14px, 2vw, 20px);
        opacity: 0.95;
        line-height: 1.8;
        font-weight: 300;
    }

    /* ==================== PROGRAM CONTENT SECTION ==================== */
    .program-content-section {
        padding: clamp(60px, 10vw, 100px) 20px;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    /* ==================== SECTION INTRO ==================== */
    .section-intro-program {
        text-align: center;
        max-width: 800px;
        margin: 0 auto clamp(40px, 8vw, 60px);
        animation: fadeInDown 0.8s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-intro-program h2 {
        font-size: clamp(24px, 4vw, 40px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .section-intro-program h2::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--secondary-light));
        border-radius: 2px;
    }

    .section-intro-program p {
        font-size: clamp(14px, 2vw, 18px);
        color: var(--text-light);
        line-height: 1.8;
        margin-top: 30px;
    }

    /* ==================== PROGRAM GRID ==================== */
    .program-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: clamp(20px, 3vw, 35px);
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    /* ==================== PROGRAM CARD ==================== */
    .program-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .program-card:nth-child(1) { animation-delay: 0.1s; }
    .program-card:nth-child(2) { animation-delay: 0.2s; }
    .program-card:nth-child(3) { animation-delay: 0.3s; }
    .program-card:nth-child(4) { animation-delay: 0.4s; }
    .program-card:nth-child(5) { animation-delay: 0.5s; }
    .program-card:nth-child(6) { animation-delay: 0.6s; }

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

    .program-card:hover {
        transform: translateY(-12px) scale(1.01);
        box-shadow: var(--shadow-lg);
    }

    .program-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .program-card:hover::before {
        opacity: 1;
    }

    /* ==================== PROGRAM HEADER ==================== */
    .program-header {
        padding: clamp(30px, 5vw, 40px);
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 220px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .program-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.15), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .program-card:hover .program-header::before {
        opacity: 1;
    }

    /* Warna untuk setiap program */
    .program-card.sains .program-header {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    }

    .program-card.bilingual .program-header {
        background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
    }

    .program-card.religi .program-header {
        background: linear-gradient(135deg, #16a085 0%, #138d75 100%);
    }

    .program-card.olahraga .program-header {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
    }

    .program-card.it .program-header {
        background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
    }

    .program-card.reguler .program-header {
        background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
    }

    .program-icon {
        font-size: clamp(40px, 6vw, 60px);
        color: white;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
        animation: scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    @keyframes scaleIn {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .program-card:hover .program-icon {
        animation: bounce 0.6s ease-out;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .program-header h3 {
        color: white;
        font-size: clamp(20px, 3vw, 28px);
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
        line-height: 1.2;
    }

    .program-header p {
        color: rgba(255, 255, 255, 0.95);
        font-size: clamp(13px, 1.5vw, 15px);
        position: relative;
        z-index: 2;
        margin: 0;
    }

    /* ==================== PROGRAM BODY ==================== */
    .program-body {
        padding: clamp(20px, 4vw, 30px);
        flex-grow: 1;
    }

    .program-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .program-features li {
        padding: clamp(10px, 2vw, 14px) 0;
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        display: flex;
        align-items: flex-start;
        gap: 12px;
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .program-features li:last-child {
        border-bottom: none;
    }

    .program-card:hover .program-features li {
        color: var(--text-dark);
        padding-left: 5px;
    }

    .program-features i {
        color: var(--secondary-color);
        font-size: 16px;
        margin-top: 2px;
        min-width: 20px;
        transition: var(--transition);
    }

    .program-card:hover .program-features li:hover i {
        transform: scale(1.2) rotate(10deg);
    }

    /* ==================== PROGRAM FOOTER ==================== */
    .program-footer {
        padding: 0 clamp(20px, 4vw, 30px) clamp(20px, 4vw, 30px);
    }

    .btn-program-detail {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: clamp(12px, 2vw, 14px) 20px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: clamp(13px, 1.5vw, 15px);
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .btn-program-detail::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .btn-program-detail:hover::before {
        opacity: 1;
    }

    .btn-program-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 95, 58, 0.3);
    }

    .btn-program-detail:active {
        transform: translateY(0);
    }

    .btn-program-detail i {
        transition: var(--transition);
    }

    .btn-program-detail:hover i {
        transform: translateX(4px);
    }

    /* ==================== CTA SECTION ==================== */
    .cta-program-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);
        color: white;
        padding: clamp(40px, 8vw, 60px);
        border-radius: 16px;
        text-align: center;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out 0.7s both;
    }

    .cta-program-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        animation: float 10s ease-in-out infinite;
    }

    .cta-program-section::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 12s ease-in-out infinite reverse;
    }

    .cta-program-section h3 {
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
        line-height: 1.2;
    }

    .cta-program-section p {
        font-size: clamp(14px, 2vw, 18px);
        margin-bottom: 30px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
        line-height: 1.8;
    }

    .btn-program-daftar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: clamp(14px, 2vw, 18px) clamp(30px, 5vw, 50px);
        background: var(--secondary-color);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: clamp(14px, 2vw, 18px);
        font-weight: 700;
        transition: var(--transition);
        border: 2px solid var(--secondary-color);
        position: relative;
        z-index: 2;
        cursor: pointer;
        overflow: hidden;
    }

    .btn-program-daftar::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--secondary-light);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .btn-program-daftar:hover::before {
        opacity: 1;
    }

    .btn-program-daftar:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(243, 156, 18, 0.4);
    }

    .btn-program-daftar:active {
        transform: translateY(-1px);
    }

    .btn-program-daftar i {
        transition: var(--transition);
    }

    .btn-program-daftar:hover i {
        transform: scale(1.1);
    }

    /* ==================== RESPONSIVE DESIGN ==================== */
    @media (max-width: 1024px) {
        .program-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .cta-program-section {
            padding: 40px 30px;
        }
    }

    @media (max-width: 768px) {
        .hero-program {
            min-height: auto;
            padding: 50px 20px;
        }

        .program-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .program-header {
            min-height: 200px;
            padding: 30px 20px;
        }

        .program-icon {
            margin-bottom: 10px;
        }

        .section-intro-program h2 {
            margin-bottom: 25px;
        }

        .section-intro-program h2::after {
            width: 60px;
        }

        .cta-program-section h3 {
            margin-bottom: 12px;
        }

        .btn-program-daftar {
            width: 100%;
            max-width: 300px;
        }

        .hero-program::before,
        .hero-program::after,
        .cta-program-section::before,
        .cta-program-section::after {
            width: 300px;
            height: 300px;
        }
    }

    @media (max-width: 480px) {
        .hero-program {
            padding: 40px 15px;
        }

        .program-content-section {
            padding: 40px 15px;
        }

        .program-grid {
            gap: 15px;
        }

        .program-card {
            border-radius: 10px;
        }

        .program-header {
            padding: 25px 15px;
            min-height: 180px;
        }

        .program-body {
            padding: 15px;
        }

        .program-footer {
            padding: 0 15px 15px;
        }

        .program-features li {
            padding: 10px 0;
            font-size: 13px;
        }

        .cta-program-section {
            padding: 30px 15px;
            border-radius: 12px;
        }

        .cta-program-section h3 {
            margin-bottom: 10px;
        }

        .cta-program-section p {
            margin-bottom: 20px;
        }

        .btn-program-daftar {
            padding: 12px 25px;
            font-size: 14px;
        }

        .section-intro-program {
            margin-bottom: 40px;
        }
    }

    @media (max-width: 360px) {
        .hero-program h1 {
            font-size: 22px;
        }

        .hero-program p {
            font-size: 13px;
        }

        .program-header h3 {
            font-size: 18px;
        }

        .program-header p {
            font-size: 12px;
        }

        .section-intro-program h2 {
            font-size: 20px;
        }
    }

    /* ==================== ANIMATIONS & UTILITIES ==================== */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
    }

</style>

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
        
        <!-- Intro -->
        <div class="section-intro-program">
            <h2>Pilih Program Sesuai Minat Anda</h2>
            <p>
                MTsN 1 Magetan menyediakan berbagai program kelas unggulan yang dirancang khusus 
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
                <div class="program-footer">
                    <a href="#sains" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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
                <div class="program-footer">
                    <a href="#bilingual" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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
                <div class="program-footer">
                    <a href="#religi" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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
                            <span>Pembinaan kompetisi nasional</span>
                        </li>
                    </ul>
                </div>
                <div class="program-footer">
                    <a href="#olahraga" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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
                <div class="program-footer">
                    <a href="#it" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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
                <div class="program-footer">
                    <a href="#reguler" class="btn-program-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
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

<script>
    // ==================== SMOOTH SCROLL ==================== 
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const targetId = href.substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        });
    });

    // ==================== INTERSECTION OBSERVER ==================== 
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
    document.querySelectorAll('.program-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // ==================== CARD HOVER EFFECTS ==================== 
    document.querySelectorAll('.program-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            document.querySelectorAll('.program-card').forEach(c => {
                if (c !== this) {
                    c.style.opacity = '0.7';
                    c.style.transform = 'scale(0.98)';
                }
            });
        });
        
        card.addEventListener('mouseleave', function() {
            document.querySelectorAll('.program-card').forEach(c => {
                c.style.opacity = '1';
                c.style.transform = 'scale(1)';
            });
        });
    });

    // ==================== BUTTON CLICK EFFECTS ==================== 
    document.querySelectorAll('.btn-program-detail, .btn-program-daftar').forEach(btn => {
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.95)';
        });
        
        btn.addEventListener('mouseup', function() {
            this.style.transform = '';
        });
    });

    // ==================== KEYBOARD NAVIGATION ==================== 
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') {
            window.scrollBy({ top: 100, behavior: 'smooth' });
        } else if (e.key === 'ArrowUp') {
            window.scrollBy({ top: -100, behavior: 'smooth' });
        }
    });

    // ==================== ACCESSIBILITY ==================== 
    document.querySelectorAll('.btn-program-detail, .btn-program-daftar').forEach(btn => {
        btn.setAttribute('role', 'button');
        btn.setAttribute('tabindex', '0');
        
        btn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                btn.click();
            }
        });
    });
</script>

@endsection