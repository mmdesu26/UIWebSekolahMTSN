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

    .sejarah-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(243, 156, 18, 0.08), transparent);
        border-radius: 50%;
        transition: var(--transition);
    }

    .sejarah-card:hover::after {
        top: -30%;
        right: -30%;
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

    .sejarah-card-body p:nth-of-type(1) { animation-delay: 0.1s; }
    .sejarah-card-body p:nth-of-type(2) { animation-delay: 0.2s; }
    .sejarah-card-body p:nth-of-type(3) { animation-delay: 0.3s; }
    .sejarah-card-body p:nth-of-type(4) { animation-delay: 0.4s; }
    .sejarah-card-body p:nth-of-type(5) { animation-delay: 0.5s; }

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

    .highlight-box h4 {
        color: var(--primary-color);
        margin-bottom: 12px;
        font-weight: 700;
        font-size: clamp(14px, 1.5vw, 16px);
    }

    .highlight-box p {
        color: var(--text-dark);
        margin: 0;
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
    }

    /* ==================== TIMELINE ==================== */
    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, var(--secondary-color), var(--primary-color), transparent);
        border-radius: 2px;
        animation: growDown 1s ease-out 0.5s both;
    }

    @keyframes growDown {
        from {
            height: 0;
            top: 0;
        }
        to {
            height: 100%;
            top: 0;
        }
    }

    .timeline-item {
        margin-left: 30px;
        margin-bottom: 30px;
        position: relative;
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .timeline-item:nth-child(1) { animation-delay: 0.1s; }
    .timeline-item:nth-child(2) { animation-delay: 0.2s; }
    .timeline-item:nth-child(3) { animation-delay: 0.3s; }
    .timeline-item:nth-child(4) { animation-delay: 0.4s; }
    .timeline-item:nth-child(5) { animation-delay: 0.5s; }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -38px;
        top: 5px;
        width: 12px;
        height: 12px;
        background: var(--secondary-color);
        border: 3px solid white;
        border-radius: 50%;
        box-shadow: 0 0 0 3px var(--secondary-color);
        transition: var(--transition);
    }

    .timeline-item:hover::before {
        transform: scale(1.3);
        box-shadow: 0 0 0 5px var(--secondary-color);
    }

    .timeline-year {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: clamp(14px, 1.5vw, 16px);
        margin-bottom: 5px;
    }

    .timeline-text {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
    }

    /* ==================== INFO GRID ==================== */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        margin: 40px 0;
    }

    .info-item {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: clamp(20px, 3vw, 30px);
        border-radius: 12px;
        border: 1px solid var(--border-color);
        text-align: center;
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .info-item:nth-child(1) { animation-delay: 0.1s; }
    .info-item:nth-child(2) { animation-delay: 0.2s; }
    .info-item:nth-child(3) { animation-delay: 0.3s; }

    .info-item:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-md);
        background: white;
    }

    .info-icon-item {
        font-size: 36px;
        margin-bottom: 15px;
        color: var(--secondary-color);
    }

    .info-item h4 {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 10px;
        font-size: clamp(16px, 2vw, 18px);
    }

    .info-item p {
        color: var(--text-light);
        font-size: clamp(12px, 1.5vw, 14px);
        margin: 0;
        line-height: 1.6;
    }

    /* ==================== STATS ==================== */
    .stats-container {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        color: white;
        padding: clamp(30px, 5vw, 50px);
        border-radius: 15px;
        margin: 40px 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        text-align: center;
        animation: fadeInUp 0.8s ease-out 0.3s both;
    }

    .stat-item {
        animation: scaleIn 0.6s ease-out backwards;
    }

    .stat-item:nth-child(1) { animation-delay: 0.1s; }
    .stat-item:nth-child(2) { animation-delay: 0.2s; }
    .stat-item:nth-child(3) { animation-delay: 0.3s; }
    .stat-item:nth-child(4) { animation-delay: 0.4s; }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .stat-number {
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: clamp(12px, 1.5vw, 14px);
        opacity: 0.9;
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
    @media (max-width: 1024px) {
        .sejarah-hero {
            min-height: 50vh;
        }

        .sejarah-card {
            padding: 30px;
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

        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

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

        .sejarah-hero h1 {
            font-size: 28px;
        }

        .sejarah-hero p {
            font-size: 14px;
        }

        .breadcrumb-custom {
            flex-wrap: wrap;
            justify-content: center;
        }

        .sejarah-card-body h3 {
            font-size: 20px;
            margin: 25px 0 15px 0;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .stats-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .stat-number {
            font-size: 32px;
        }

        .timeline::before {
            left: 0;
        }

        .timeline-item {
            margin-left: 20px;
        }

        .timeline-item::before {
            left: -28px;
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

        .sejarah-hero h1 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .sejarah-hero p {
            font-size: 12px;
        }

        .breadcrumb-custom {
            font-size: 11px;
            padding: 6px 12px;
            gap: 8px;
        }

        .sejarah-icon {
            width: 60px;
            height: 60px;
            font-size: 30px;
        }

        .sejarah-header-text h2 {
            font-size: 18px;
        }

        .sejarah-header-text p {
            font-size: 12px;
        }

        .sejarah-card-body h3 {
            font-size: 18px;
            margin: 20px 0 12px 0;
        }

        .sejarah-card-body p {
            font-size: 13px;
            line-height: 1.6;
        }

        .highlight-box {
            padding: 15px;
            margin: 20px 0;
        }

        .highlight-box h4 {
            font-size: 13px;
        }

        .stats-container {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding: 25px;
        }

        .stat-number {
            font-size: 24px;
        }

        .stat-label {
            font-size: 11px;
        }

        .info-grid {
            gap: 15px;
            margin: 30px 0;
        }

        .info-item {
            padding: 15px;
        }

        .info-icon-item {
            font-size: 32px;
        }

        .timeline-item {
            margin-left: 15px;
            margin-bottom: 25px;
        }

        .timeline-item::before {
            left: -22px;
            width: 10px;
            height: 10px;
        }

        .cta-section {
            padding: 30px 15px;
            margin-top: 40px;
        }

        .cta-section h3 {
            font-size: 20px;
        }

        .cta-btn {
            padding: 10px 20px;
            font-size: 13px;
        }

        .divider {
            margin: 30px 0;
        }
    }

    @media (max-width: 360px) {
        .sejarah-hero h1 {
            font-size: 18px;
        }

        .sejarah-card-body h3 {
            font-size: 16px;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }

        .sejarah-card-header {
            gap: 10px;
        }
    }

    /* ==================== SCROLL BEHAVIOR ==================== */
    html {
        scroll-behavior: smooth;
    }

    /* ==================== ACCESSIBILITY ==================== */
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

    /* ==================== DARK MODE ==================== */
    @media (prefers-color-scheme: dark) {
        .sejarah-card,
        .info-item,
        .highlight-box {
            background: #2c3e50;
            color: #ecf0f1;
            border-color: #34495e;
        }

        .sejarah-card-body h3 {
            color: #f39c12;
            border-color: #34495e;
        }

        .sejarah-card-body p,
        .sejarah-card-body li,
        .highlight-box p {
            color: #bdc3c7;
        }

        .sejarah-header-text h2 {
            color: #f39c12;
        }

        .info-item {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .info-item h4 {
            color: #f39c12;
        }
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
                    <h3><i class="fas fa-calendar-alt"></i> Asal-Usul Pendirian</h3>
                    <p>
                        MTsN 1 Magetan didirikan dengan visi untuk memberikan pendidikan berkualitas kepada masyarakat Magetan. 
                        Perjalanan ini dimulai dari sebuah komitmen untuk menciptakan generasi penerus bangsa yang cerdas, 
                        beriman kepada Tuhan Yang Maha Esa, dan berakhlak mulia.
                    </p>

                    <div class="highlight-box">
                        <h4><i class="fas fa-lightbulb"></i> Misi Awal</h4>
                        <p>
                            Mendirikan sekolah menengah pertama Islam yang mampu memberikan pendidikan umum dan agama 
                            secara seimbang, serta menghasilkan lulusan yang siap melanjutkan ke jenjang pendidikan yang lebih tinggi.
                        </p>
                    </div>

                    <h3><i class="fas fa-chart-line"></i> Perkembangan Institusi</h3>
                    <p>
                        Sejak awal berdirinya, MTsN 1 Magetan terus mengalami perkembangan pesat. Dengan dukungan dari 
                        pemerintah, orangtua siswa, dan masyarakat, sekolah ini berhasil membangun sarana dan prasarana 
                        yang mendukung proses pembelajaran berkualitas.
                    </p>

                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">1990</div>
                            <div class="timeline-text">Pendirian SMP Negeri Magetan dengan 3 ruang kelas dan 50 siswa</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2000</div>
                            <div class="timeline-text">Perubahan status menjadi Madrasah Tsanawiyah Negeri (MTsN) Magetan</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2010</div>
                            <div class="timeline-text">Penambahan fasilitas: laboratorium, perpustakaan digital, dan lap olahraga</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2018</div>
                            <div class="timeline-text">Akreditasi A dan pembukaan program unggulan (Sains, IT, Bilingual)</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2024</div>
                            <div class="timeline-text">Menjadi sekolah dengan standar internasional dan teknologi terkini</div>
                        </div>
                    </div>

                    <h3><i class="fas fa-people-group"></i> Tokoh-Tokoh Pendiri</h3>
                    <p>
                        MTsN 1 Magetan didirikan berkat kerja keras dan dedikasi berbagai tokoh masyarakat, pendidik, 
                        dan pejabat pemerintah yang percaya pada pentingnya pendidikan berkualitas bagi generasi muda.
                    </p>

                    <div class="highlight-box">
                        <h4><i class="fas fa-award"></i> Prestasi & Pengakuan</h4>
                        <p>
                            Sekolah telah menerima berbagai penghargaan dari pemerintah dan organisasi pendidikan internasional 
                            atas dedikasi dalam meningkatkan kualitas pendidikan dan menghasilkan lulusan berprestasi.
                        </p>
                    </div>

                    <h3><i class="fas fa-users"></i> Kontribusi Terhadap Masyarakat</h3>
                    <p>
                        Sepanjang perjalanannya, MTsN 1 Magetan telah berkontribusi signifikan dalam:
                    </p>
                    <ul>
                        <li>Menghasilkan lulusan yang tersebar di berbagai profesi dan bidang industri</li>
                        <li>Memberikan beasiswa kepada siswa berprestasi namun kurang mampu</li>
                        <li>Aktif dalam kegiatan sosial dan pemberdayaan masyarakat lokal</li>
                        <li>Menjadi pusat kegiatan olahraga dan seni di tingkat kabupaten</li>
                        <li>Membangun kerjasama dengan institusi pendidikan nasional dan internasional</li>
                    </ul>

                @endif

            </div>

        </div>

        <!-- Stats Container -->
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">34+</div>
                <div class="stat-label">Tahun Berdiri</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">850+</div>
                <div class="stat-label">Siswa Aktif</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">80+</div>
                <div class="stat-label">Pendidik</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">3000+</div>
                <div class="stat-label">Alumni Sukses</div>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon-item">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h4>Pendidikan Berkualitas</h4>
                <p>Menyediakan pendidikan dengan standar nasional dan internasional yang terus ditingkatkan</p>
            </div>
            <div class="info-item">
                <div class="info-icon-item">
                    <i class="fas fa-mosque"></i>
                </div>
                <h4>Nilai Islami</h4>
                <p>Mengintegrasikan nilai-nilai Islam dalam setiap aspek pendidikan dan pembentukan karakter</p>
            </div>
            <div class="info-item">
                <div class="info-icon-item">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Inovasi Terus-Menerus</h4>
                <p>Selalu berinovasi dalam metode pembelajaran dan pengembangan teknologi pendidikan</p>
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
    document.querySelectorAll('.info-item, .timeline-item, .stat-item').forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = `all 0.6s ease ${index * 0.1}s`;
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

    // ==================== KEYBOARD NAVIGATION ==================== 
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') {
            window.scrollBy({ top: 100, behavior: 'smooth' });
        } else if (e.key === 'ArrowUp') {
            window.scrollBy({ top: -100, behavior: 'smooth' });
        }
    });

    // ==================== ACCESSIBILITY ==================== 
    document.querySelectorAll('.cta-btn').forEach(btn => {
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