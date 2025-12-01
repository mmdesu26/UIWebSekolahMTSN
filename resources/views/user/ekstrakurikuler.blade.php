@extends('layouts.app')

@section('title', 'Ekstrakurikuler - MTsN 1 Magetan')

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
        --light-bg: #f8f9fa;
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
    .ekstra-hero {
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

    .ekstra-hero::before {
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

    .ekstra-hero::after {
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
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-30px) translateX(20px); }
    }

    .ekstra-hero-content {
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

    .ekstra-hero h1 {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .ekstra-hero p {
        font-size: clamp(14px, 2vw, 18px);
        opacity: 0.95;
        line-height: 1.8;
        margin-bottom: 0;
    }

    .breadcrumb-ekstra {
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

    .breadcrumb-ekstra a {
        color: white;
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb-ekstra a:hover {
        opacity: 0.8;
    }

    /* ==================== CONTENT SECTION ==================== */
    .ekstra-content-section {
        padding: clamp(60px, 10vw, 100px) 20px;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    /* ==================== SECTION HEADER ==================== */
    .ekstra-section-header {
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

    .ekstra-section-header h2 {
        font-size: clamp(24px, 4vw, 40px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .ekstra-section-header h2::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
        border-radius: 2px;
    }

    .ekstra-section-header p {
        font-size: clamp(14px, 2vw, 18px);
        color: var(--text-light);
        line-height: 1.8;
        margin-top: 30px;
    }

    /* ==================== EKSTRAKURIKULER GRID ==================== */
    .ekstrakurikuler-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: clamp(20px, 3vw, 35px);
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    /* ==================== EKSTRAKURIKULER CARD ==================== */
    .ekstra-card {
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

    .ekstra-card:nth-child(1) { animation-delay: 0.1s; }
    .ekstra-card:nth-child(2) { animation-delay: 0.2s; }
    .ekstra-card:nth-child(3) { animation-delay: 0.3s; }
    .ekstra-card:nth-child(4) { animation-delay: 0.4s; }
    .ekstra-card:nth-child(5) { animation-delay: 0.5s; }
    .ekstra-card:nth-child(6) { animation-delay: 0.6s; }

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

    .ekstra-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    .ekstra-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, var(--secondary-color), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .ekstra-card:hover::before {
        opacity: 1;
    }

    /* ==================== EKSTRA HEADER ==================== */
    .ekstra-card-header {
        padding: clamp(30px, 5vw, 40px);
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    }

    .ekstra-card-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.15), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .ekstra-card:hover .ekstra-card-header::before {
        opacity: 1;
    }

    .ekstra-icon {
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

    .ekstra-card:hover .ekstra-icon {
        animation: bounce 0.6s ease-out;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .ekstra-card-header h3 {
        color: white;
        font-size: clamp(18px, 3vw, 24px);
        font-weight: 700;
        margin: 0;
        position: relative;
        z-index: 2;
        line-height: 1.2;
    }

    /* ==================== EKSTRA BODY ==================== */
    .ekstra-card-body {
        padding: clamp(20px, 4vw, 30px);
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .ekstra-info {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        color: var(--text-light);
        font-size: clamp(12px, 1.5vw, 14px);
        transition: var(--transition);
    }

    .ekstra-card:hover .ekstra-info {
        color: var(--primary-color);
        padding-left: 5px;
    }

    .ekstra-info i {
        color: var(--secondary-color);
        font-size: 16px;
        min-width: 20px;
        transition: var(--transition);
    }

    .ekstra-card:hover .ekstra-info i {
        transform: scale(1.2) rotate(10deg);
    }

    /* ==================== PRESTASI BOX ==================== */
    .prestasi-box {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(26, 95, 58, 0.1));
        padding: clamp(12px, 2vw, 18px);
        border-radius: 10px;
        border-left: 4px solid var(--secondary-color);
        margin: 15px 0;
        transition: var(--transition);
    }

    .ekstra-card:hover .prestasi-box {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.15), rgba(26, 95, 58, 0.15));
        transform: translateX(5px);
    }

    .prestasi-box p {
        font-size: clamp(12px, 1.5vw, 14px);
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        line-height: 1.5;
    }

    .prestasi-box i {
        color: var(--secondary-color);
        margin-top: 2px;
        flex-shrink: 0;
    }

    /* ==================== BUTTON ==================== */
    .daftar-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: clamp(10px, 2vw, 14px) 20px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: clamp(12px, 1.5vw, 14px);
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin-top: auto;
    }

    .daftar-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .daftar-btn:hover::before {
        opacity: 1;
    }

    .daftar-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 95, 58, 0.3);
    }

    .daftar-btn i {
        transition: var(--transition);
    }

    .daftar-btn:hover i {
        transform: translateX(4px);
    }

    /* ==================== BENEFITS SECTION ==================== */
    .benefits-section {
        background: white;
        padding: clamp(40px, 6vw, 60px);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.8s ease-out 0.5s both;
        border: 1px solid var(--border-color);
    }

    .benefits-header {
        text-align: center;
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .benefits-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .benefits-header h3 i {
        color: var(--secondary-color);
        font-size: clamp(24px, 4vw, 32px);
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: clamp(20px, 3vw, 30px);
    }

    .benefit-item {
        text-align: center;
        padding: clamp(20px, 3vw, 30px);
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        border-radius: 15px;
        border: 1px solid var(--border-color);
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .benefit-item:nth-child(1) { animation-delay: 0.1s; }
    .benefit-item:nth-child(2) { animation-delay: 0.2s; }
    .benefit-item:nth-child(3) { animation-delay: 0.3s; }
    .benefit-item:nth-child(4) { animation-delay: 0.4s; }
    .benefit-item:nth-child(5) { animation-delay: 0.5s; }
    .benefit-item:nth-child(6) { animation-delay: 0.6s; }

    .benefit-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-md);
        background: white;
    }

    .benefit-icon {
        width: clamp(60px, 8vw, 80px);
        height: clamp(60px, 8vw, 80px);
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto clamp(15px, 3vw, 20px);
        color: white;
        font-size: clamp(28px, 4vw, 40px);
        box-shadow: 0 8px 20px rgba(26, 95, 58, 0.2);
        transition: var(--transition);
    }

    .benefit-item:hover .benefit-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(26, 95, 58, 0.3);
    }

    .benefit-item h4 {
        font-size: clamp(16px, 2vw, 20px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .benefit-item p {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
        margin: 0;
    }

    /* ==================== ACHIEVEMENTS SECTION ==================== */
    .achievements-section {
        margin-top: clamp(60px, 10vw, 100px);
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .achievements-header {
        text-align: center;
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .achievements-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .achievements-header h3 i {
        color: var(--secondary-color);
        font-size: clamp(24px, 4vw, 32px);
    }

    .achievements-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: clamp(20px, 3vw, 30px);
    }

    .achievement-card {
        background: white;
        border-radius: 15px;
        padding: clamp(20px, 4vw, 30px);
        box-shadow: var(--shadow-md);
        border-left: 5px solid var(--secondary-color);
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .achievement-card:nth-child(1) { animation-delay: 0.1s; }
    .achievement-card:nth-child(2) { animation-delay: 0.2s; }
    .achievement-card:nth-child(3) { animation-delay: 0.3s; }
    .achievement-card:nth-child(4) { animation-delay: 0.4s; }
    .achievement-card:nth-child(5) { animation-delay: 0.5s; }
    .achievement-card:nth-child(6) { animation-delay: 0.6s; }
    .achievement-card:nth-child(7) { animation-delay: 0.7s; }
    .achievement-card:nth-child(8) { animation-delay: 0.8s; }

    .achievement-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-left-width: 8px;
    }

    .achievement-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .achievement-title i {
        color: var(--secondary-color);
        font-size: clamp(18px, 2vw, 24px);
    }

    .achievement-title h4 {
        font-size: clamp(15px, 2vw, 18px);
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .achievement-text {
        color: var(--text-light);
        font-size: clamp(12px, 1.5vw, 14px);
        line-height: 1.6;
        margin: 0;
    }

    /* ==================== STATS ==================== */
    .stats-ekstra {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        color: white;
        padding: clamp(30px, 5vw, 50px);
        border-radius: 15px;
        margin: clamp(40px, 8vw, 60px) 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        text-align: center;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .stat-ekstra-item {
        animation: scaleIn 0.6s ease-out backwards;
    }

    .stat-ekstra-item:nth-child(1) { animation-delay: 0.1s; }
    .stat-ekstra-item:nth-child(2) { animation-delay: 0.2s; }
    .stat-ekstra-item:nth-child(3) { animation-delay: 0.3s; }
    .stat-ekstra-item:nth-child(4) { animation-delay: 0.4s; }

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

    .stat-ekstra-number {
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .stat-ekstra-label {
        font-size: clamp(12px, 1.5vw, 14px);
        opacity: 0.9;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .ekstrakurikuler-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .benefits-section {
            padding: 40px 30px;
        }
    }

    @media (max-width: 768px) {
        .ekstra-hero {
            min-height: 50vh;
            padding: 50px 20px;
        }

        .ekstrakurikuler-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .ekstra-card-header {
            min-height: 180px;
            padding: 25px 20px;
        }

        .benefits-section {
            padding: 30px 20px;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .achievements-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stats-ekstra {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }

    @media (max-width: 480px) {
        .ekstra-hero {
            min-height: 45vh;
            padding: 40px 15px;
        }

        .ekstra-content-section {
            padding: 40px 15px;
        }

        .ekstrakurikuler-grid {
            gap: 15px;
        }

        .ekstra-card {
            border-radius: 12px;
        }

        .ekstra-card-header {
            padding: 20px 15px;
            min-height: 170px;
        }

        .ekstra-card-body {
            padding: 15px;
        }

        .ekstra-info {
            font-size: 12px;
            margin-bottom: 12px;
        }

        .prestasi-box {
            padding: 10px;
            margin: 12px 0;
        }

        .prestasi-box p {
            font-size: 12px;
        }

        .daftar-btn {
            padding: 10px 15px;
            font-size: 12px;
        }

        .benefits-header h3 {
            font-size: 20px;
        }

        .benefit-item {
            padding: 15px;
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            font-size: 28px;
            margin-bottom: 12px;
        }

        .achievements-header h3 {
            font-size: 20px;
        }

        .achievement-card {
            padding: 15px;
        }

        .achievement-title h4 {
            font-size: 15px;
        }

        .achievement-text {
            font-size: 12px;
        }

        .stats-ekstra {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding: 20px;
        }

        .stat-ekstra-number {
            font-size: 24px;
        }

        .stat-ekstra-label {
            font-size: 11px;
        }

        .breadcrumb-ekstra {
            font-size: 11px;
            padding: 6px 10px;
            gap: 6px;
        }
    }

    @media (max-width: 360px) {
        .ekstra-hero h1 {
            font-size: 22px;
        }

        .ekstra-card-header h3 {
            font-size: 16px;
        }

        .stats-ekstra {
            grid-template-columns: 1fr;
        }
    }

    /* ==================== ANIMATIONS ==================== */
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

    .divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--secondary-color), transparent);
        margin: 40px 0;
        animation: expandWidth 1s ease-out;
    }

    /* ==================== ACCESSIBILITY ==================== */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* ==================== DARK MODE ==================== */
    @media (prefers-color-scheme: dark) {
        .ekstra-card,
        .benefits-section,
        .achievement-card,
        .benefit-item {
            background: #2c3e50;
            color: #ecf0f1;
            border-color: #34495e;
        }

        .ekstra-card-body {
            color: #ecf0f1;
        }

        .ekstra-info,
        .achievement-text,
        .benefit-item p {
            color: #bdc3c7;
        }

        .ekstra-card-header h3,
        .achievement-title h4,
        .benefit-item h4,
        .benefits-header h3,
        .achievements-header h3 {
            color: #f39c12;
        }

        .prestasi-box {
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.2), rgba(26, 95, 58, 0.2));
            border-color: var(--secondary-color);
        }
    }

</style>

<!-- Hero Section -->
<div class="ekstra-hero">
    <div class="container">
        <div class="ekstra-hero-content">
            <h1><i class="fas fa-star" style="margin-right: 15px;"></i>Ekstrakurikuler MTsN 1 Magetan</h1>
            <p>Wadah pengembangan bakat dan minat siswa dalam berbagai bidang</p>
            <div class="breadcrumb-ekstra">
                <a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="#">Akademik</a>
                <span>/</span>
                <span>Ekstrakurikuler</span>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="ekstra-content-section">
    <div class="container">

        <!-- Section Header -->
        <div class="ekstra-section-header">
            <h2><i class="fas fa-list" style="margin-right: 10px;"></i>Program Ekstrakurikuler</h2>
            <p>MTsN 1 Magetan menyediakan berbagai pilihan ekstrakurikuler untuk mengembangkan potensi siswa sesuai minat dan bakat mereka</p>
        </div>

        <!-- Ekstrakurikuler Grid -->
        <div class="ekstrakurikuler-grid">
            @php
            $ekstrakurikuler = [
                [
                    'name' => 'Az-Zuhra Futsal',
                    'icon' => 'fas fa-futbol',
                    'jadwal' => 'Senin & Rabu, 15:30-17:00',
                    'pembina' => 'Iwan Setyawan',
                    'prestasi' => 'Juara 1 Turnamen Futsal Antar Sekolah 2023'
                ],
                [
                    'name' => 'Paskibraka',
                    'icon' => 'fas fa-flag',
                    'jadwal' => 'Selasa, 15:30-17:00',
                    'pembina' => 'Dewi Lestari',
                    'prestasi' => 'Juara Harapan 2 Paskibraka Se-Magetan 2023'
                ],
                [
                    'name' => 'Paduan Suara',
                    'icon' => 'fas fa-music',
                    'jadwal' => 'Kamis, 15:30-17:00',
                    'pembina' => 'Hendra Gunawan',
                    'prestasi' => 'Juara 1 Festival Paduan Suara 2023'
                ],
                [
                    'name' => 'Robotik',
                    'icon' => 'fas fa-microchip',
                    'jadwal' => 'Jumat, 15:30-17:30',
                    'pembina' => 'Tri Handoko',
                    'prestasi' => 'Juara 2 Kompetisi Robotik Nasional 2023'
                ],
                [
                    'name' => 'Tahfidz Quran',
                    'icon' => 'fas fa-book-quran',
                    'jadwal' => 'Senin-Jumat, 06:00-07:00',
                    'pembina' => 'Ustadz Ahmad',
                    'prestasi' => 'Hafiz Al-Quran 5 Siswa 2023'
                ],
                [
                    'name' => 'English Club',
                    'icon' => 'fas fa-language',
                    'jadwal' => 'Rabu, 15:30-17:00',
                    'pembina' => 'Siti Nurhaliza',
                    'prestasi' => 'Juara Kompetisi Pidato Bahasa Inggris'
                ],
                [
                    'name' => 'Teater & Drama',
                    'icon' => 'fas fa-masks-theater',
                    'jadwal' => 'Sabtu, 09:00-11:00',
                    'pembina' => 'Bambang Sutrisno',
                    'prestasi' => 'Juara 1 Festival Seni Teater Kabupaten'
                ],
                [
                    'name' => 'Volley Ball',
                    'icon' => 'fas fa-volleyball',
                    'jadwal' => 'Selasa & Kamis, 15:30-17:30',
                    'pembina' => 'Suci Rahmawati',
                    'prestasi' => 'Juara 3 Kompetisi Volley Antar Sekolah'
                ],
                [
                    'name' => 'Karate',
                    'icon' => 'fas fa-person-hiking',
                    'jadwal' => 'Senin & Rabu, 16:00-17:30',
                    'pembina' => 'Ahmad Rifai',
                    'prestasi' => 'Juara 1 Kata Kelas 60-65 kg Kab Magetan'
                ],
                [
                    'name' => 'Taekwondo',
                    'icon' => 'fas fa-fire',
                    'jadwal' => 'Selasa & Jumat, 16:00-17:30',
                    'pembina' => 'Yoga Pratama',
                    'prestasi' => 'Juara 2 Pertandingan Taekwondo Se-Jatim'
                ],
                [
                    'name' => 'Pramuka',
                    'icon' => 'fas fa-campground',
                    'jadwal' => 'Sabtu, 14:00-16:00',
                    'pembina' => 'Anang Hidayat',
                    'prestasi' => 'Juara 1 Lomba Pramuka Penggalang Se-Magetan'
                ],
                [
                    'name' => 'Seni Musik',
                    'icon' => 'fas fa-guitar',
                    'jadwal' => 'Selasa & Kamis, 14:00-15:30',
                    'pembina' => 'Budi Santoso',
                    'prestasi' => 'Penampilan di Festival Musik Nasional'
                ]
            ];
            @endphp

            @foreach($ekstrakurikuler as $ekstra)
            <div class="ekstra-card">
                <div class="ekstra-card-header">
                    <i class="{{ $ekstra['icon'] }} ekstra-icon"></i>
                    <h3>{{ $ekstra['name'] }}</h3>
                </div>
                <div class="ekstra-card-body">
                    <div class="ekstra-info">
                        <i class="fas fa-clock"></i>
                        <span>{{ $ekstra['jadwal'] }}</span>
                    </div>
                    <div class="ekstra-info">
                        <i class="fas fa-user"></i>
                        <span><strong>Pembina:</strong> {{ $ekstra['pembina'] }}</span>
                    </div>
                    <div class="prestasi-box">
                        <p>
                            <i class="fas fa-medal"></i>
                            <strong>{{ $ekstra['prestasi'] }}</strong>
                        </p>
                    </div>
                    <button class="daftar-btn" onclick="alert('Hubungi sekolah untuk mendaftar ekstrakurikuler')">
                        <i class="fas fa-clipboard-check"></i> Daftar
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="stats-ekstra">
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">12+</div>
                <div class="stat-ekstra-label">Jenis Ekstrakurikuler</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">85%</div>
                <div class="stat-ekstra-label">Siswa Aktif</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">50+</div>
                <div class="stat-ekstra-label">Penghargaan</div>
            </div>
            <div class="stat-ekstra-item">
                <div class="stat-ekstra-number">100%</div>
                <div class="stat-ekstra-label">Prestasi</div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <div class="benefits-header">
                <h3><i class="fas fa-sparkles"></i> Manfaat Mengikuti Ekstrakurikuler</h3>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-star"></i></div>
                    <h4>Mengembangkan Bakat</h4>
                    <p>Ekstrakurikuler membantu siswa mengembangkan bakat dan minat mereka secara maksimal di bidang yang diminati</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-users"></i></div>
                    <h4>Membangun Karakter</h4>
                    <p>Melalui ekstrakurikuler, siswa belajar disiplin, kerja sama, tanggung jawab, dan kepemimpinan</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-trophy"></i></div>
                    <h4>Meraih Prestasi</h4>
                    <p>Siswa memiliki kesempatan berkompetisi dan meraih prestasi di berbagai tingkat kompetisi</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Memperluas Jaringan</h4>
                    <p>Membangun persahabatan dan hubungan baik dengan teman sekelas dari berbagai latar belakang</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-brain"></i></div>
                    <h4>Mengasah Kreativitas</h4>
                    <p>Mengembangkan kreativitas dan inovasi dalam berbagai bidang seni, olahraga, dan sains</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h4>Persiapan Masa Depan</h4>
                    <p>Ekstrakurikuler mempersiapkan siswa menghadapi tantangan masa depan dengan soft skills yang kuat</p>
                </div>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="achievements-section">
            <div class="achievements-header">
                <h3><i class="fas fa-medal"></i> Prestasi Ekstrakurikuler</h3>
            </div>
            <div class="achievements-grid">
                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-futbol"></i>
                        <h4>Futsal</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Turnamen Futsal Antar Sekolah 2023 & Juara 2 Kompetisi Futsal Se-Jawa Timur
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-music"></i>
                        <h4>Paduan Suara</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Festival Paduan Suara Nasional 2023 & Finalis Kompetisi Paduan Suara Tingkat Provinsi
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-microchip"></i>
                        <h4>Robotik</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 2 Kompetisi Robotik Nasional 2023 & Medali Emas dalam kategori Inovasi Teknologi
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-book-quran"></i>
                        <h4>Tahfidz Quran</h4>
                    </div>
                    <p class="achievement-text">
                        5 Siswa Hafiz Al-Quran pada 2023 & Juara 1 Kompetisi Tilawah Quran Se-Kabupaten
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-person-hiking"></i>
                        <h4>Karate</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Kata Kelas 60-65 kg & Juara 2 Kumite Tingkat Provinsi Jawa Timur
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-fire"></i>
                        <h4>Taekwondo</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 2 Pertandingan Taekwondo Se-Jawa Timur & Medali Perunggu Kompetisi Nasional
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-volleyball"></i>
                        <h4>Volley Ball</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 3 Kompetisi Volley Antar Sekolah & Juara 2 Liga Volley Tingkat Kabupaten
                    </p>
                </div>

                <div class="achievement-card">
                    <div class="achievement-title">
                        <i class="fas fa-masks-theater"></i>
                        <h4>Teater & Drama</h4>
                    </div>
                    <p class="achievement-text">
                        Juara 1 Festival Seni Teater Kabupaten & Penampilan di Panggung Nasional Jakarta 2023
                    </p>
                </div>
            </div>
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
    document.querySelectorAll('.benefit-item, .achievement-card, .stat-ekstra-item').forEach((el, index) => {
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
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
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
</script>

@endsection