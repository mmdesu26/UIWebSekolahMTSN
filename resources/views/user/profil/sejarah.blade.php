@extends('layouts.app')

@section('title', 'Sejarah Sekolah - MTsN 1 Magetan')

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
        --text-muted: #95a5a6;
        --border-color: #ecf0f1;
        --bg-light: #f8f9fa;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 8px 16px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 12px 24px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* ==================== HERO SECTION ==================== */
    .sejarah-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);
        color: white;
        padding: clamp(60px, 10vw, 100px) 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sejarah-hero::before {
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

    .sejarah-hero::after {
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

    .sejarah-hero-content {
        position: relative;
        z-index: 2;
        animation: slideInUp 0.8s ease-out;
        max-width: 900px;
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

    .sejarah-hero h1 {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.5px;
        font-family: 'Playfair Display', serif;
    }

    .sejarah-hero p {
        font-size: clamp(14px, 2vw, 18px);
        opacity: 0.95;
        line-height: 1.8;
        font-weight: 300;
        margin-bottom: 0;
    }

    .breadcrumb-custom {
        background: rgba(255, 255, 255, 0.15);
        padding: clamp(8px, 2vw, 12px) clamp(15px, 3vw, 25px);
        border-radius: 50px;
        display: inline-flex;
        gap: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: clamp(12px, 1.5vw, 14px);
        transition: var(--transition);
        margin-top: 20px;
    }

    .breadcrumb-custom:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    .breadcrumb-custom a {
        color: white;
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb-custom a:hover {
        opacity: 0.8;
    }

    /* ==================== CONTENT SECTION ==================== */
    .sejarah-content-section {
        padding: clamp(60px, 10vw, 100px) 20px;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    /* ==================== FEATURED IMAGE ==================== */
    .featured-image-wrapper {
        margin-bottom: 40px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.8s ease-out 0.2s both;
        position: relative;
    }

    .featured-image-wrapper img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        display: block;
        transition: var(--transition);
    }

    .featured-image-wrapper:hover img {
        transform: scale(1.05);
    }

    .featured-image-wrapper::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.3));
        pointer-events: none;
    }

    /* ==================== MAIN CARD ==================== */
    .sejarah-card {
        background: white;
        border-radius: 20px;
        padding: clamp(30px, 5vw, 50px);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
        border: 1px solid var(--border-color);
        max-width: 1000px;
        margin: 0 auto;
    }

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

    .sejarah-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--primary-color), transparent);
        transform: scaleX(0);
        animation: expandWidth 0.8s ease-out 0.3s forwards;
    }

    @keyframes expandWidth {
        from {
            transform: scaleX(0);
            transform-origin: left;
        }
        to {
            transform: scaleX(1);
            transform-origin: left;
        }
    }

    /* ==================== CARD HEADER ==================== */
    .sejarah-card-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
        animation: slideInLeft 0.8s ease-out;
    }

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

    .sejarah-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba(26, 95, 58, 0.2);
        transition: var(--transition);
    }

    .sejarah-card:hover .sejarah-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(26, 95, 58, 0.3);
    }

    .sejarah-header-text h2 {
        font-size: clamp(20px, 3vw, 32px);
        color: var(--primary-color);
        margin-bottom: 8px;
        font-weight: 700;
        line-height: 1.2;
    }

    .sejarah-header-text p {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        margin: 0;
    }

    /* ==================== CARD BODY ==================== */
    .sejarah-card-body {
        position: relative;
        z-index: 2;
    }

    .sejarah-card-body h3 {
        font-size: clamp(18px, 2.5vw, 24px);
        color: var(--primary-color);
        margin: 30px 0 20px 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
        transition: var(--transition);
    }

    .sejarah-card-body h3:first-of-type {
        margin-top: 0;
    }

    .sejarah-card-body h3 i {
        color: var(--secondary-color);
        font-size: clamp(16px, 2vw, 22px);
    }

    .sejarah-card-body h3:hover {
        padding-left: 10px;
        color: var(--primary-light);
    }

    .sejarah-card-body p {
        color: var(--text-light);
        font-size: clamp(14px, 1.5vw, 16px);
        line-height: 1.8;
        margin-bottom: 20px;
        text-align: justify;
        animation: fadeInUp 0.8s ease-out backwards;
    }

    .sejarah-card-body ul {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .sejarah-card-body li {
        padding: 12px 0 12px 35px;
        position: relative;
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
        transition: var(--transition);
    }

    .sejarah-card-body li:before {
        content: '▸';
        position: absolute;
        left: 10px;
        color: var(--secondary-color);
        font-size: 20px;
        font-weight: bold;
    }

    .sejarah-card-body li:hover {
        padding-left: 40px;
        color: var(--primary-color);
    }

    /* ==================== HIGHLIGHTS ==================== */
    .highlight-box {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(26, 95, 58, 0.1));
        border-left: 5px solid var(--secondary-color);
        padding: clamp(20px, 3vw, 30px);
        border-radius: 12px;
        margin: 30px 0;
        position: relative;
        transition: var(--transition);
        animation: slideInUp 0.8s ease-out 0.4s both;
    }

    .highlight-box:hover {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.15), rgba(26, 95, 58, 0.15));
        transform: translateX(5px);
    }

    .highlight-box p {
        color: var(--text-dark);
        margin: 0;
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
    }

    /* ==================== DIVIDER ==================== */
    .divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--secondary-color), transparent);
        margin: 40px 0;
        animation: expandWidth 1s ease-out;
    }

    /* ==================== CTA SECTION ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: clamp(40px, 7vw, 60px);
        border-radius: 15px;
        text-align: center;
        margin-top: 60px;
        animation: fadeInUp 0.8s ease-out 0.5s both;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .cta-section h3 {
        font-size: clamp(20px, 3vw, 28px);
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .cta-section p {
        font-size: clamp(14px, 1.5vw, 16px);
        margin-bottom: 25px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: clamp(12px, 2vw, 16px) clamp(25px, 4vw, 40px);
        background: var(--secondary-color);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: clamp(13px, 1.5vw, 15px);
        transition: var(--transition);
        border: 2px solid var(--secondary-color);
        cursor: pointer;
        position: relative;
        z-index: 2;
        overflow: hidden;
    }

    .cta-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--secondary-light);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .cta-btn:hover::before {
        opacity: 1;
    }

    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(243, 156, 18, 0.3);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .sejarah-hero {
            min-height: 45vh;
            padding: 50px 20px;
        }

        .sejarah-content-section {
            padding: 50px 20px;
        }

        .sejarah-card {
            padding: 25px;
            border-radius: 15px;
        }

        .sejarah-card-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .sejarah-icon {
            width: 70px;
            height: 70px;
            font-size: 35px;
        }

        .featured-image-wrapper img {
            max-height: 350px;
        }
    }

    @media (max-width: 480px) {
        .sejarah-hero {
            min-height: 40vh;
            padding: 40px 15px;
        }

        .sejarah-content-section {
            padding: 40px 15px;
        }

        .sejarah-card {
            padding: 20px;
            border-radius: 12px;
        }

        .featured-image-wrapper img {
            max-height: 250px;
        }
    }

    /* ==================== SCROLL BEHAVIOR ==================== */
    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Hero Section -->
<div class="sejarah-hero">
    <div class="container">
        <div class="sejarah-hero-content">
            <h1><i class="fas fa-book-open" style="margin-right: 15px;"></i>Sejarah Sekolah</h1>
            <p>Perjalanan panjang pendidikan MTsN 1 Magetan dari masa lalu hingga sekarang</p>
            <div class="breadcrumb-custom">
                <a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="#">Profil</a>
                <span>/</span>
                <span>Sejarah Sekolah</span>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="sejarah-content-section">
    <div class="container">
        
        <!-- Featured Image -->
        @if(isset($data['image']) && $data['image'])
        <div class="featured-image-wrapper">
            <img src="{{ $data['image'] }}" alt="Sejarah MTsN 1 Magetan">
        </div>
        @endif

        <!-- Main Card -->
        <div class="sejarah-card">
            
            <!-- Card Header -->
            <div class="sejarah-card-header">
                <div class="sejarah-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="sejarah-header-text">
                    <h2>Perjalanan MTsN 1 Magetan</h2>
                    <p>Membangun generasi cerdas, beriman, dan berakhlak mulia</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Card Body -->
            <div class="sejarah-card-body">
                
                @if(!empty($data['sejarah']))
                    {!! $data['sejarah'] !!}
                @else
                    <!-- Placeholder Content -->
                    <p style="text-align: center; color: var(--text-muted); padding: 40px 20px;">
                        <i class="fas fa-info-circle" style="font-size: 48px; margin-bottom: 20px; display: block;"></i>
                        <strong>Konten sejarah belum tersedia.</strong><br>
                        Silakan hubungi administrator untuk menambahkan informasi sejarah sekolah.
                    </p>
                @endif

            </div>

        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h3>Ingin Menjadi Bagian Dari Keluarga Besar MTsN 1 Magetan?</h3>
            <p>Bergabunglah dengan ribuan siswa lainnya dalam perjalanan menuju masa depan yang cemerlang</p>
            <a href="{{ route('ppdb') }}" class="cta-btn">
                <i class="fas fa-arrow-right"></i> Daftar Sekarang
            </a>
        </div>

    </div>
</section>

<script>
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

    // Observe elements
    document.querySelectorAll('.sejarah-card-body > *').forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = `all 0.6s ease ${index * 0.05}s`;
        observer.observe(el);
    });

    // ==================== SMOOTH SCROLL ==================== 
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '') return;
            
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
</script>

@endsection