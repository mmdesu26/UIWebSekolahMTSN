@extends('layouts.app')  

@section('title', 'Beranda - MTsN 1 Magetan')  

@section('content')  

<style>  
    /* ==================== VARIABLES ==================== */  
    :root {  
        --primary-color: #1a5f3a;  
        --primary-dark: #0f3d22;  
        --primary-light: #2d8659;  
        --secondary-color: #f39c12;  
        --secondary-light: #f5b041;  
        --accent-color: #e74c3c;  
        --success-color: #27ae60;  
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

    html {  
        scroll-behavior: smooth;  
    }  

    body {  
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
        color: var(--text-dark);  
        line-height: 1.6;  
    }  

    /* ==================== HERO SECTION ==================== */  
    .hero {  
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);  
        color: white;  
        padding: clamp(80px, 15vw, 150px) 20px;  
        position: relative;  
        overflow: hidden;  
        min-height: 70vh;  
        display: flex;  
        align-items: center;  
        justify-content: center;  
    }  

    .hero::before {  
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

    .hero::after {  
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

    .hero-content {  
        position: relative;  
        z-index: 2;  
        text-align: center;  
        max-width: 900px;  
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

    .hero-title {  
        font-size: clamp(32px, 6vw, 56px);  
        font-weight: 700;  
        margin-bottom: 20px;  
        line-height: 1.2;  
        letter-spacing: -0.5px;  
    }  

    .hero-subtitle {  
        font-size: clamp(16px, 2.5vw, 22px);  
        opacity: 0.95;  
        margin-bottom: 40px;  
        line-height: 1.6;  
        font-weight: 300;  
    }  

    .btn-group-hero {  
        display: flex;  
        gap: clamp(12px, 2vw, 20px);  
        justify-content: center;  
        flex-wrap: wrap;  
        animation: fadeInUp 0.8s ease-out 0.2s both;  
    }  

    /* ==================== BUTTON STYLES ==================== */  
    .btn {  
        display: inline-flex;  
        align-items: center;  
        justify-content: center;  
        gap: 10px;  
        padding: clamp(12px, 2vw, 16px) clamp(24px, 4vw, 40px);  
        border-radius: 8px;  
        font-weight: 600;  
        font-size: clamp(13px, 1.5vw, 15px);  
        text-decoration: none;  
        transition: var(--transition);  
        border: 2px solid transparent;  
        cursor: pointer;  
        position: relative;  
        overflow: hidden;  
    }  

    .btn::before {  
        content: '';  
        position: absolute;  
        inset: 0;  
        background: inherit;  
        opacity: 0;  
        transition: opacity 0.3s ease;  
        z-index: -1;  
    }  

    .btn-primary {  
        background: var(--secondary-color);  
        color: white;  
        border-color: var(--secondary-color);  
    }  

    .btn-primary:hover {  
        transform: translateY(-2px);  
        box-shadow: 0 12px 25px rgba(243, 156, 18, 0.3);  
    }  

    .btn-secondary {  
        background: transparent;  
        color: white;  
        border-color: white;  
    }  

    .btn-secondary:hover {  
        background: rgba(255, 255, 255, 0.1);  
        transform: translateY(-2px);  
    }  

    .btn-large {  
        padding: clamp(14px, 2.5vw, 18px) clamp(30px, 5vw, 50px);  
        font-size: clamp(14px, 1.8vw, 16px);  
    }  

    /* ==================== SKS CARD - ADVANCED STYLING ==================== */
.info-card-sks {
    background: linear-gradient(135deg, #fff9e6 0%, #fffbf0 100%);
    border: 2px solid var(--secondary-color);
    position: relative;
    box-shadow: 0 8px 24px rgba(243, 156, 18, 0.15);
}

.info-card-sks:hover {
    border-color: #f39c12;
    box-shadow: 0 12px 32px rgba(243, 156, 18, 0.25);
}

.badge-sks {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, var(--secondary-color), #f5b041);
    color: white;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
    animation: badgeBounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

@keyframes badgeBounce {
    0% {
        opacity: 0;
        transform: translateX(-50%) translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
}

.icon-sks {
    background: linear-gradient(135deg, var(--secondary-color), #f5b041) !important;
    animation: iconPulse 2.5s ease-in-out infinite;
}

@keyframes iconPulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 8px 20px rgba(243, 156, 18, 0.2);
    }
    50% {
        transform: scale(1.08);
        box-shadow: 0 12px 30px rgba(243, 156, 18, 0.35);
    }
}

.info-card-sks h3 {
    color: var(--secondary-color);
    font-weight: 700;
    font-size: clamp(16px, 2.2vw, 20px);
}

.info-card-sks p {
    color: var(--primary-color);
    font-weight: 600;
    font-size: clamp(13px, 1.5vw, 15px);
}

.sks-features {
    display: flex;
    gap: 8px;
    margin-top: 12px;
    justify-content: center;
}

.sks-badge {
    background: rgba(243, 156, 18, 0.15);
    color: var(--secondary-color);
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.sks-badge i {
    font-size: 9px;
}

/* Responsive SKS Card */
@media (max-width: 768px) {
    .badge-sks {
        font-size: 10px;
        padding: 5px 12px;
        top: -10px;
    }

    .info-card-sks h3 {
        font-size: 15px;
    }

    .info-card-sks p {
        font-size: 12px;
    }

    .sks-features {
        gap: 6px;
    }

    .sks-badge {
        font-size: 10px;
        padding: 3px 8px;
    }
}

    /* ==================== SECTION HEADER ==================== */  
    .section-header {  
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

    .section-title {  
        font-size: clamp(28px, 5vw, 44px);  
        font-weight: 700;  
        color: var(--primary-color);  
        margin-bottom: 15px;  
        position: relative;  
        display: inline-block;  
    }  

    .section-title::after {  
        content: '';  
        position: absolute;  
        bottom: -12px;  
        left: 50%;  
        transform: translateX(-50%);  
        width: clamp(60px, 8vw, 100px);  
        height: 4px;  
        background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));  
        border-radius: 2px;  
    }  

    .section-subtitle {  
        font-size: clamp(14px, 2vw, 18px);  
        color: var(--text-light);  
        margin-top: 30px;  
        line-height: 1.8;  
    }  

    /* ==================== ABOUT SECTION ==================== */  
    .about-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: white;  
    }  

    .about-content {  
        display: grid;  
        grid-template-columns: 1fr 1fr;  
        gap: clamp(40px, 5vw, 60px);  
        align-items: center;  
        animation: fadeInUp 0.8s ease-out 0.2s both;  
    }  

    .about-image {  
        position: relative;  
        overflow: hidden;  
        border-radius: 15px;  
        box-shadow: var(--shadow-lg);  
        height: clamp(300px, 40vw, 500px);  
    }  

    .about-image img {  
        width: 100%;  
        height: 100%;  
        object-fit: cover;  
        transition: var(--transition);  
    }  

    .about-image:hover img {  
        transform: scale(1.05);  
    }  

    .about-text h3 {  
        font-size: clamp(18px, 2.5vw, 24px);  
        font-weight: 700;  
        color: var(--primary-color);  
        margin: clamp(25px, 3vw, 35px) 0 clamp(12px, 2vw, 16px);  
    }  

    .about-text p {  
        font-size: clamp(13px, 1.5vw, 16px);  
        color: var(--text-light);  
        line-height: 1.8;  
        margin-bottom: clamp(20px, 3vw, 30px);  
    }  

    .about-text ul {  
        list-style: none;  
        margin-bottom: clamp(20px, 3vw, 30px);  
    }  

    .about-text li {  
        font-size: clamp(13px, 1.5vw, 16px);  
        color: var(--text-light);  
        padding-left: 25px;  
        position: relative;  
        margin-bottom: 12px;  
        line-height: 1.6;  
    }  

    .about-text li::before {  
        content: '';  
        position: absolute;  
        left: 0;  
        top: 6px;  
        width: 8px;  
        height: 8px;  
        background: var(--secondary-color);  
        border-radius: 50%;  
    }  

    /* ==================== NEWS SECTION ==================== */  
    .news-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);  
    }  

    .news-grid {  
        display: grid;  
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));  
        gap: clamp(25px, 3vw, 35px);  
    }  

    .news-card {  
        background: white;  
        border-radius: 15px;  
        overflow: hidden;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        animation: fadeInUp 0.6s ease-out backwards;  
        display: flex;  
        flex-direction: column;  
        height: 100%;  
    }  

    .news-card:nth-child(1) { animation-delay: 0.1s; }  
    .news-card:nth-child(2) { animation-delay: 0.2s; }  
    .news-card:nth-child(3) { animation-delay: 0.3s; }  

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

    .news-card:hover {  
        transform: translateY(-12px);  
        box-shadow: var(--shadow-lg);  
    }  

    .news-image {  
        position: relative;  
        overflow: hidden;  
        height: clamp(200px, 25vw, 280px);  
    }  

    .news-image img {  
        width: 100%;  
        height: 100%;  
        object-fit: cover;  
        transition: var(--transition);  
    }  

    .news-card:hover .news-image img {  
        transform: scale(1.08);  
    }  

    .news-badge {  
        position: absolute;  
        top: 15px;  
        right: 15px;  
        background: var(--primary-color);  
        color: white;  
        padding: 6px 12px;  
        border-radius: 20px;  
        font-size: clamp(11px, 1.5vw, 12px);  
        font-weight: 600;  
    }  

    .news-badge.pengumuman {  
        background: var(--secondary-color);  
    }  

    .news-badge.kegiatan {  
        background: var(--success-color);  
    }  

    .news-content {  
        padding: clamp(20px, 3vw, 30px);  
        flex-grow: 1;  
        display: flex;  
        flex-direction: column;  
    }  

    .news-meta {  
        display: flex;  
        flex-wrap: wrap;  
        gap: 20px;  
        margin-bottom: 15px;  
        font-size: clamp(12px, 1.5vw, 13px);  
        color: var(--text-muted);  
    }  

    .news-meta i {  
        margin-right: 5px;  
        color: var(--secondary-color);  
    }  

    .news-card h3 {  
        font-size: clamp(16px, 2vw, 20px);  
        font-weight: 700;  
        color: var(--text-dark);  
        margin-bottom: 12px;  
        line-height: 1.4;  
    }  

    .news-card p {  
        font-size: clamp(13px, 1.5vw, 15px);  
        color: var(--text-light);  
        line-height: 1.6;  
        margin-bottom: 15px;  
        flex-grow: 1;  
    }  

    .read-more {  
        display: inline-flex;  
        align-items: center;  
        gap: 8px;  
        color: var(--primary-color);  
        text-decoration: none;  
        font-weight: 600;  
        font-size: clamp(12px, 1.5vw, 14px);  
        transition: var(--transition);  
    }  

    .read-more:hover {  
        color: var(--secondary-color);  
        gap: 12px;  
    }  

    /* ==================== PPDB SECTION ==================== */  
    .ppdb-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%);  
        color: white;  
        position: relative;  
        overflow: hidden;  
    }  

    .ppdb-section::before {  
        content: '';  
        position: absolute;  
        top: -50%;  
        right: -10%;  
        width: 500px;  
        height: 500px;  
        background: rgba(255, 255, 255, 0.08);  
        border-radius: 50%;  
        animation: float 8s ease-in-out infinite;  
    }  

    .ppdb-content {  
        display: grid;  
        grid-template-columns: 1fr 1fr;  
        gap: clamp(40px, 5vw, 60px);  
        align-items: center;  
        position: relative;  
        z-index: 2;  
    }  

    .ppdb-info h2 {  
        font-size: clamp(28px, 5vw, 44px);  
        font-weight: 700;  
        margin-bottom: 12px;  
        animation: slideInUp 0.8s ease-out;  
    }  

    .ppdb-info h3 {  
        font-size: clamp(20px, 3vw, 32px);  
        font-weight: 600;  
        margin-bottom: 20px;  
        opacity: 0.9;  
        animation: slideInUp 0.8s ease-out 0.1s both;  
    }  

    .ppdb-info p {  
        font-size: clamp(14px, 2vw, 18px);  
        margin-bottom: 30px;  
        opacity: 0.95;  
        line-height: 1.8;  
        animation: slideInUp 0.8s ease-out 0.2s both;  
    }  

    .ppdb-features {  
        display: grid;  
        gap: 15px;  
        margin-bottom: 30px;  
        animation: slideInUp 0.8s ease-out 0.3s both;  
    }  

    .feature-item {  
        display: flex;  
        align-items: center;  
        gap: 15px;  
        font-size: clamp(13px, 1.5vw, 16px);  
        transition: var(--transition);  
    }  

    .feature-item i {  
        color: var(--secondary-color);  
        font-size: clamp(18px, 2vw, 22px);  
    }  

    .feature-item:hover {  
        transform: translateX(8px);  
    }  

    .ppdb-buttons {  
        display: flex;  
        gap: clamp(12px, 2vw, 20px);  
        flex-wrap: wrap;  
        animation: slideInUp 0.8s ease-out 0.4s both;  
    }  

    .ppdb-image {  
        position: relative;  
        height: clamp(300px, 40vw, 500px);  
        animation: slideInRight 0.8s ease-out 0.3s both;  
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

    .ppdb-image img {  
        width: 100%;  
        height: 100%;  
        object-fit: cover;  
        border-radius: 15px;  
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);  
    }  

    /* ==================== EKSTRAKURIKULER SECTION ==================== */  
    .ekskul-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: white;  
    }  

    .ekskul-grid {  
        display: grid;  
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));  
        gap: clamp(25px, 3vw, 35px);  
        margin-bottom: clamp(40px, 8vw, 60px);  
    }  

    .ekskul-card {  
        background: linear-gradient(135deg, #f8f9fa, #ffffff);  
        padding: clamp(35px, 4vw, 45px);  
        border-radius: 15px;  
        text-align: center;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        animation: fadeInUp 0.6s ease-out backwards;  
        border: 1px solid var(--border-color);  
    }  

    .ekskul-card:nth-child(1) { animation-delay: 0.1s; }  
    .ekskul-card:nth-child(2) { animation-delay: 0.2s; }  
    .ekskul-card:nth-child(3) { animation-delay: 0.3s; }  
    .ekskul-card:nth-child(4) { animation-delay: 0.4s; }  
    .ekskul-card:nth-child(5) { animation-delay: 0.5s; }  
    .ekskul-card:nth-child(6) { animation-delay: 0.6s; }  

    .ekskul-card:hover {  
        transform: translateY(-15px) scale(1.02);  
        box-shadow: var(--shadow-lg);  
        background: white;  
    }  

    .ekskul-icon {  
        font-size: clamp(40px, 6vw, 56px);  
        color: var(--secondary-color);  
        margin-bottom: 20px;  
        transition: var(--transition);  
    }  

    .ekskul-card:hover .ekskul-icon {  
        transform: scale(1.2) rotate(10deg);  
    }  

    .ekskul-card h3 {  
        font-size: clamp(18px, 2.5vw, 22px);  
        font-weight: 700;  
        color: var(--primary-color);  
        margin-bottom: 12px;  
    }  

    .ekskul-card p {  
        font-size: clamp(13px, 1.5vw, 15px);  
        color: var(--text-light);  
        line-height: 1.6;  
    }  

    .text-center {  
        text-align: center;  
    }  

    .mt-40 {  
        margin-top: clamp(30px, 5vw, 40px);  
    }  

    /* ==================== SOCIAL MEDIA SECTION ==================== */  
    .social-media-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);  
    }  

    .social-grid {  
        display: grid;  
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));  
        gap: clamp(20px, 3vw, 30px);  
    }  

    .social-box {  
        background: white;  
        padding: clamp(30px, 4vw, 40px);  
        border-radius: 15px;  
        text-align: center;  
        text-decoration: none;  
        color: inherit;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        animation: fadeInUp 0.6s ease-out backwards;  
        border: 2px solid transparent;  
    }  

    .social-box:nth-child(1) { animation-delay: 0.1s; }  
    .social-box:nth-child(2) { animation-delay: 0.2s; }  
    .social-box:nth-child(3) { animation-delay: 0.3s; }  
    .social-box:nth-child(4) { animation-delay: 0.4s; }  

    .social-box:hover {  
        transform: translateY(-12px);  
        box-shadow: var(--shadow-lg);  
    }  

    .social-box.facebook { border-color: #3b5998; }  
    .social-box.facebook:hover { background: #f0f2f5; }  

    .social-box.instagram { border-color: #E1306C; }  
    .social-box.instagram:hover { background: #fdf2f8; }  

    .social-box.youtube { border-color: #FF0000; }  
    .social-box.youtube:hover { background: #fff0f0; }  

    .social-box.twitter { border-color: #1DA1F2; }  
    .social-box.twitter:hover { background: #f0f9ff; }  

    .social-box i {  
        font-size: clamp(32px, 4vw, 48px);  
        margin-bottom: 15px;  
        transition: var(--transition);  
    }  

    .social-box.facebook i { color: #3b5998; }  
    .social-box.instagram i { color: #E1306C; }  
    .social-box.youtube i { color: #FF0000; }  
    .social-box.twitter i { color: #1DA1F2; }  

    .social-box:hover i {  
        transform: scale(1.2);  
    }  

    .social-box h3 {  
        font-size: clamp(16px, 2vw, 20px);  
        font-weight: 700;  
        color: var(--text-dark);  
        margin-bottom: 8px;  
    }  

    .social-box p {  
        font-size: clamp(12px, 1.5vw, 14px);  
        color: var(--text-light);  
    }  

    /* ==================== CONTACT SECTION ==================== */  
    .contact-section {  
        padding: clamp(60px, 10vw, 100px) 20px;  
        background: white;  
    }  

    .contact-content {  
        display: grid;  
        grid-template-columns: 1fr 1fr;  
        gap: clamp(40px, 5vw, 60px);  
        margin-bottom: clamp(40px, 8vw, 60px);  
        animation: fadeInUp 0.8s ease-out 0.2s both;  
    }  

    .contact-info-box {  
        display: grid;  
        gap: clamp(20px, 3vw, 30px);  
    }  

    .contact-item {  
        display: flex;  
        gap: clamp(15px, 2vw, 25px);  
        padding: clamp(15px, 2vw, 20px);  
        border-radius: 12px;  
        background: linear-gradient(135deg, rgba(26, 95, 58, 0.05), rgba(243, 156, 18, 0.05));  
        transition: var(--transition);  
        animation: slideInLeft 0.6s ease-out backwards;  
    }  

    .contact-item:nth-child(1) { animation-delay: 0.1s; }  
    .contact-item:nth-child(2) { animation-delay: 0.2s; }  
    .contact-item:nth-child(3) { animation-delay: 0.3s; }  
    .contact-item:nth-child(4) { animation-delay: 0.4s; }  

    @keyframes slideInLeft {  
        from {  
            opacity: 0;  
            transform: translateX(-30px);  
        }  
        to {  
            opacity: 1;  
            transform: translateX(0);  
        }  
    }  

    .contact-item:hover {  
        background: linear-gradient(135deg, rgba(26, 95, 58, 0.1), rgba(243, 156, 18, 0.1));  
        transform: translateX(8px);  
    }  

    .contact-icon {  
        width: clamp(50px, 6vw, 60px);  
        height: clamp(50px, 6vw, 60px);  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));  
        border-radius: 50%;  
        display: flex;  
        align-items: center;  
        justify-content: center;  
        color: white;  
        font-size: clamp(24px, 3vw, 28px);  
        flex-shrink: 0;  
        box-shadow: 0 6px 16px rgba(26, 95, 58, 0.2);  
    }  

    .contact-item h4 {  
        font-size: clamp(16px, 2vw, 18px);  
        font-weight: 700;  
        color: var(--primary-color);  
        margin-bottom: 6px;  
    }  

    .contact-item p {  
        font-size: clamp(13px, 1.5vw, 15px);  
        color: var(--text-light);  
        line-height: 1.6;  
    }  

    .contact-form-box {  
        animation: slideInRight 0.8s ease-out 0.3s both;  
    }  

    .contact-form {  
        background: linear-gradient(135deg, #f8f9fa, #ffffff);  
        padding: clamp(30px, 4vw, 40px);  
        border-radius: 15px;  
        border: 1px solid var(--border-color);  
    }  

    .form-group {  
        margin-bottom: 20px;  
    }  

    .form-group input,  
    .form-group textarea {  
        width: 100%;  
        padding: clamp(12px, 2vw, 16px);  
        border: 2px solid var(--border-color);  
        border-radius: 8px;  
        font-size: clamp(13px, 1.5vw, 15px);  
        font-family: inherit;  
        transition: var(--transition);  
    }  

    .form-group input:focus,  
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .map-container {
        margin-top: clamp(40px, 8vw, 60px);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .map-container iframe {
        border-radius: 15px;
    }

    /* ==================== RESPONSIVE DESIGN ==================== */
    @media (max-width: 1024px) {
        .about-content {
            grid-template-columns: 1fr;
            gap: clamp(30px, 5vw, 40px);
        }

        .ppdb-content {
            grid-template-columns: 1fr;
        }

        .contact-content {
            grid-template-columns: 1fr;
            gap: clamp(30px, 5vw, 40px);
        }

        .info-cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero {
            min-height: 50vh;
            padding: 50px 20px;
        }

        .hero-title {
            font-size: 28px;
        }

        .hero-subtitle {
            font-size: 16px;
        }

        .btn-group-hero {
            flex-direction: column;
            align-items: center;
        }

        .btn {
            width: 100%;
            max-width: 300px;
        }

        .quick-info {
            margin-top: -30px;
            padding: 40px 20px;
        }

        .info-cards {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-card {
            padding: 20px;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            font-size: 28px;
            margin-bottom: 12px;
        }

        .info-card h3 {
            font-size: 16px;
        }

        .about-section {
            padding: 50px 20px;
        }

        .about-image {
            height: 300px;
            border-radius: 12px;
        }

        .news-section {
            padding: 50px 20px;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .news-image {
            height: 200px;
        }

        .ppdb-section {
            padding: 40px 20px;
        }

        .ppdb-buttons {
            flex-direction: column;
        }

        .ppdb-buttons .btn {
            width: 100%;
        }

        .ppdb-image {
            height: 300px;
        }

        .ekskul-section {
            padding: 50px 20px;
        }

        .ekskul-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .ekskul-card {
            padding: 20px;
        }

        .ekskul-icon {
            font-size: 36px;
        }

        .social-media-section {
            padding: 50px 20px;
        }

        .social-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .social-box {
            padding: 20px;
        }

        .social-box i {
            font-size: 36px;
        }

        .contact-section {
            padding: 50px 20px;
        }

        .contact-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .contact-item {
            gap: 12px;
            padding: 12px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
    }

    @media (max-width: 480px) {
        .hero {
            min-height: 45vh;
            padding: 40px 15px;
        }

        .hero-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .hero-subtitle {
            font-size: 14px;
            margin-bottom: 30px;
        }

        .btn-group-hero {
            gap: 10px;
        }

        .btn {
            padding: 10px 16px;
            font-size: 12px;
        }

        .btn-large {
            padding: 12px 20px;
            font-size: 13px;
        }

        .quick-info {
            margin-top: -20px;
            padding: 30px 15px;
        }

        .info-cards {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .info-card {
            padding: 15px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .info-card h3 {
            font-size: 14px;
        }

        .info-card p {
            font-size: 12px;
        }

        .section-header {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 22px;
        }

        .section-title::after {
            width: 60px;
            bottom: -10px;
        }

        .section-subtitle {
            font-size: 13px;
            margin-top: 20px;
        }

        .about-section {
            padding: 40px 15px;
        }

        .about-image {
            height: 250px;
            border-radius: 10px;
        }

        .about-text h3 {
            font-size: 16px;
            margin: 20px 0 10px;
        }

        .about-text p,
        .about-text li {
            font-size: 13px;
        }

        .about-text li {
            padding-left: 20px;
        }

        .news-section {
            padding: 40px 15px;
        }

        .news-grid {
            gap: 12px;
        }

        .news-image {
            height: 180px;
        }

        .news-badge {
            top: 10px;
            right: 10px;
            font-size: 10px;
            padding: 4px 8px;
        }

        .news-content {
            padding: 15px;
        }

        .news-meta {
            gap: 12px;
            font-size: 11px;
            margin-bottom: 10px;
        }

        .news-card h3 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .news-card p {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .read-more {
            font-size: 11px;
        }

        .ppdb-section {
            padding: 35px 15px;
        }

        .ppdb-info h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .ppdb-info h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .ppdb-info p {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .ppdb-features {
            gap: 12px;
            margin-bottom: 20px;
        }

        .feature-item {
            font-size: 12px;
            gap: 10px;
        }

        .feature-item i {
            font-size: 16px;
        }

        .ppdb-buttons {
            gap: 8px;
        }

        .ppdb-image {
            height: 250px;
        }

        .ekskul-section {
            padding: 40px 15px;
        }

        .ekskul-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .ekskul-card {
            padding: 20px;
        }

        .ekskul-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .ekskul-card h3 {
            font-size: 16px;
        }

        .ekskul-card p {
            font-size: 12px;
        }

        .mt-40 {
            margin-top: 30px;
        }

        .social-media-section {
            padding: 40px 15px;
        }

        .social-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .social-box {
            padding: 20px;
        }

        .social-box i {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .social-box h3 {
            font-size: 15px;
            margin-bottom: 6px;
        }

        .social-box p {
            font-size: 12px;
        }

        .contact-section {
            padding: 40px 15px;
        }

        .contact-info-box {
            gap: 12px;
        }

        .contact-item {
            gap: 12px;
            padding: 12px;
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            font-size: 18px;
        }

        .contact-item h4 {
            font-size: 14px;
        }

        .contact-item p {
            font-size: 12px;
        }

        .contact-form {
            padding: 15px;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            font-size: 13px;
        }

        .form-group textarea {
            min-height: 100px;
        }

        .map-container {
            margin-top: 30px;
            border-radius: 10px;
        }

        .map-container iframe {
            height: 250px !important;
            border-radius: 10px;
        }
    }

    @media (max-width: 360px) {
        .hero-title {
            font-size: 20px;
        }

        .section-title {
            font-size: 18px;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .social-box i {
            font-size: 28px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
    }

    /* ==================== ANIMATIONS ==================== */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
        .about-section,
        .ekskul-section,
        .contact-section {
            background: #2c3e50;
            color: #ecf0f1;
        }

        .info-card,
        .news-card,
        .ekskul-card,
        .social-box,
        .contact-form {
            background: #34495e;
            border-color: #445566;
        }

        .info-card h3,
        .ekskul-card h3,
        .news-card h3,
        .section-title,
        .contact-item h4 {
            color: #f39c12;
        }

        .info-card p,
        .ekskul-card p,
        .news-card p,
        .contact-item p,
        .section-subtitle {
            color: #bdc3c7;
        }

        .form-group input,
        .form-group textarea {
            background: #2c3e50;
            color: #ecf0f1;
            border-color: #445566;
        }

        .contact-item {
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(26, 95, 58, 0.1));
        }
    }

</style>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-graduation-cap" style="margin-right: 15px; color: var(--secondary-color);"></i>
                Selamat Datang di MTsN 1 Magetan
            </h1>
            <p class="hero-subtitle">TERWUJUDNYA SISWA YANG BERPRESTASI, MANDIRI, DAN BERAKHLAQUL KARIMAH</p>
            <div class="btn-group-hero">
                <a href="{{ route('ppdb') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Daftar PPDB Sekarang
                </a>
                <a href="{{ route('profil.sejarah') }}" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i> Tentang Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Info Section - VERSI DENGAN BADGE -->
<section class="quick-info">
    <div class="container">
        <div class="info-cards">
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-award"></i>
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
            <!-- SKS CARD DENGAN BADGE UNGGULAN -->
            <div class="info-card info-card-sks">
                <span class="badge-sks">
                    <i class="fas fa-star"></i> UNGGULAN
                </span>
                <div class="info-icon icon-sks">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3>
                    <i class="fas fa-hourglass-end" style="margin-right: 8px;"></i>
                    Program SKS 2 Tahun
                </h3>
                <p>Lulus dengan Sistem Kredit Semesteran</p>
                <div class="sks-features">
                    <span class="sks-badge">
                        <i class="fas fa-check"></i> Fleksibel
                    </span>
                    <span class="sks-badge">
                        <i class="fas fa-check"></i> Cepat
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="profil">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-building" style="margin-right: 10px;"></i>
                Tentang MTsN 1 Magetan
            </h2>
            <p class="section-subtitle">Madrasah Tsanawiyah Negeri unggulan di Kabupaten Magetan</p>
        </div>
        <div class="about-content">
            <div class="about-image">
                <img src="https://th.bing.com/th/id/R.cf7755c740584fd2d9f1d618172494bf?rik=Xf3hxKFFcngmEg&riu=http%3a%2f%2fmtsn1magetan.com%2fmedia_library%2falbums%2ff3537fc0211418910ae81085977cff0b.jpeg&ehk=32Uzit7AlPNDn8HKxjJhfB9xqMkKmgxG9lOhN3HeSuQ%3d&risl=&pid=ImgRaw&r=0" alt="MTSN Magetan">
            </div>
            <div class="about-text">
                <h3><i class="fas fa-bullseye" style="margin-right: 10px; color: var(--secondary-color);"></i>Visi Kami</h3>
                <p>"Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan"</p>

                <h3><i class="fas fa-tasks" style="margin-right: 10px; color: var(--secondary-color);"></i>Misi Kami</h3>
                <ul>
                    <li>Menyelenggarakan pendidikan yang berkualitas dan berorientasi pada prestasi</li>
                    <li>Membentuk peserta didik yang berakhlak mulia dan berkarakter Islami</li>
                    <li>Mengembangkan potensi akademik dan non-akademik siswa</li>
                    <li>Menciptakan lingkungan madrasah yang kondusif dan ramah lingkungan</li>
                </ul>

                <a href="{{ route('profil.visi-misi') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news-section" id="berita">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-newspaper" style="margin-right: 10px;"></i>
                Berita & Pengumuman
            </h2>
            <p class="section-subtitle">Informasi terkini dari MTsN 1 Magetan</p>
        </div>
        <div class="news-grid">
            @foreach(array_slice($data['berita'], 0, 3) as $index => $item)
            <div class="news-card">
                <div class="news-image">
                    <img src="{{ $item['gambar'] ?? 'https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita' }}" alt="{{ $item['title'] ?? 'Berita' }}">
                    <span class="news-badge {{ $item['tipe'] ?? 'berita' }}">
                        @if(($item['tipe'] ?? 'berita') == 'pengumuman')
                            <i class="fas fa-bell" style="margin-right: 6px;"></i>Pengumuman
                        @elseif(($item['tipe'] ?? 'berita') == 'kegiatan')
                            <i class="fas fa-calendar-days" style="margin-right: 6px;"></i>Kegiatan
                        @else
                            <i class="fas fa-star" style="margin-right: 6px;"></i>Berita
                        @endif
                    </span>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span><i class="fas fa-calendar"></i> {{ isset($item['tanggal']) ? date('d F Y', strtotime($item['tanggal'])) : date('d F Y') }}</span>
                        <span><i class="fas fa-user"></i> Admin</span>
                    </div>
                    <h3>{{ $item['title'] ?? 'Judul Berita' }}</h3>
                    <p>{{ isset($item['content']) ? Str::limit($item['content'], 100) : 'Deskripsi berita...' }}</p>
                    <a href="{{ route('berita') }}" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- PPDB Section -->
<section class="ppdb-section" id="ppdb">
    <div class="container">
        <div class="ppdb-content">
            <div class="ppdb-info">
                <h2>
                    <i class="fas fa-clipboard-list" style="margin-right: 12px;"></i>
                    Penerimaan Peserta Didik Baru
                </h2>
                <h3>Tahun Ajaran 2026/2027</h3>
                <p>Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!</p>

                <div class="ppdb-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pendaftaran Online Mudah</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Seleksi Transparan & Adil</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Biaya Terjangkau & Fleksibel</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Fasilitas Modern & Lengkap</span>
                    </div>
                </div>

                <div class="ppdb-buttons">
                    <a href="{{ route('ppdb') }}" class="btn btn-primary btn-large">
                        <i class="fas fa-play-circle"></i> Daftar Sekarang
                    </a>
                    <a href="{{ route('ppdb') }}" class="btn btn-secondary btn-large">
                        <i class="fas fa-info-circle"></i> Info Lengkap
                    </a>
                </div>
            </div>
            <div class="ppdb-image">
                <img src="{{ asset('icon.png') }}" alt="Icon">
            </div>
        </div>
    </div>
</section>

<!-- Ekstrakurikuler Section -->
<section class="ekskul-section" id="ekstrakurikuler">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-star" style="margin-right: 10px;"></i>
                Ekstrakurikuler
            </h2>
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
                <h3>Bahasa Asing</h3>
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
        <div class="text-center mt-40">
            <a href="{{ route('ekstrakurikuler') }}" class="btn btn-primary">
                <i class="fas fa-arrow-right"></i> Lihat Semua Ekstrakurikuler
            </a>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="social-media-section" id="sosial-media">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-share-nodes" style="margin-right: 10px;"></i>
                Ikuti Kami
            </h2>
            <p class="section-subtitle">Dapatkan update terbaru dari media sosial kami</p>
        </div>
        <div class="social-grid">
            <a href="#" class="social-box facebook" title="Ikuti Facebook kami">
                <i class="fab fa-facebook-f"></i>
                <h3>Facebook</h3>
                <p>@MTsN1Magetan</p>
            </a>
            <a href="#" class="social-box instagram" title="Ikuti Instagram kami">
                <i class="fab fa-instagram"></i>
                <h3>Instagram</h3>
                <p>@mtsn1magetan</p>
            </a>
            <a href="#" class="social-box youtube" title="Subscribe YouTube kami">
                <i class="fab fa-youtube"></i>
                <h3>YouTube</h3>
                <p>MTsN 1 Magetan Official</p>
            </a>
            <a href="#" class="social-box twitter" title="Ikuti Twitter kami">
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
            <h2 class="section-title">
                <i class="fas fa-headset" style="margin-right: 10px;"></i>
                Hubungi Kami
            </h2>
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
                        <textarea rows="5" placeholder="Pesan Anda" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-large">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60648379024!2d111.30889385!3d-7.6443665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c14e84c978ad%3A0x5027a76e356fd30!2sMagetan%2C%20Magetan%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1234567890" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<script>
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

    // ==================== INTERSECTION OBSERVER ==================== 
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
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
    document.querySelectorAll('.ekskul-card, .social-box, .news-card').forEach((el) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });

    // ==================== FORM VALIDATION ==================== 
    document.querySelector('.contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const inputs = this.querySelectorAll('input, textarea');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'var(--accent-color)';
            } else {
                input.style.borderColor = 'var(--border-color)';
            }
        });

        if (isValid) {
            alert('Pesan Anda telah terkirim! Terima kasih telah menghubungi kami.');
            this.reset();
        } else {
            alert('Harap lengkapi semua form yang tersedia.');
        }
    });

    // ==================== KEYBOARD NAVIGATION ==================== 
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') {
            window.scrollBy({ top: 100, behavior: 'smooth' });
        } else if (e.key === 'ArrowUp') {
            window.scrollBy({ top: -100, behavior: 'smooth' });
        }
    });

    // ==================== ACTIVE LINK ==================== 
    window.addEventListener('scroll', () => {
        let current = '';
        const sections = document.querySelectorAll('section');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });
</script>

@endsection