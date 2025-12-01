@extends('layouts.app')

@section('title', 'PPDB - MTsN 1 Magetan')

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
    .ppdb-hero {
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

    .ppdb-hero::before {
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

    .ppdb-hero::after {
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

    .ppdb-hero-content {
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

    .ppdb-hero h1 {
        font-size: clamp(32px, 6vw, 56px);
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .ppdb-hero p {
        font-size: clamp(14px, 2vw, 18px);
        opacity: 0.95;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .breadcrumb-ppdb {
        background: rgba(255, 255, 255, 0.15);
        padding: clamp(8px, 2vw, 12px) clamp(15px, 3vw, 25px);
        border-radius: 50px;
        display: inline-flex;
        gap: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: clamp(12px, 1.5vw, 14px);
        transition: var(--transition);
    }

    .breadcrumb-ppdb a {
        color: white;
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb-ppdb a:hover {
        opacity: 0.8;
    }

    /* ==================== CONTENT SECTION ==================== */
    .ppdb-content-section {
        padding: clamp(60px, 10vw, 100px) 20px;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    /* ==================== SECTION HEADER ==================== */
    .ppdb-section-header {
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

    .ppdb-section-header h2 {
        font-size: clamp(24px, 4vw, 40px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .ppdb-section-header h2::after {
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

    .ppdb-section-header p {
        font-size: clamp(14px, 2vw, 18px);
        color: var(--text-light);
        line-height: 1.8;
        margin-top: 30px;
    }

    /* ==================== INFO CARDS GRID ==================== */
    .info-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .info-card {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: white;
        padding: clamp(25px, 4vw, 35px);
        border-radius: 15px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
        position: relative;
        overflow: hidden;
    }

    .info-card:nth-child(1) { animation-delay: 0s; }
    .info-card:nth-child(2) {
        animation-delay: 0.1s;
        background: linear-gradient(135deg, var(--accent-color) 0%, #c0392b 100%);
    }
    .info-card:nth-child(3) {
        animation-delay: 0.2s;
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
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

    .info-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.15), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .info-card:hover::before {
        opacity: 1;
    }

    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }

    .info-card h4 {
        font-size: clamp(28px, 5vw, 40px);
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }

    .info-card p {
        font-size: clamp(13px, 1.5vw, 16px);
        opacity: 0.95;
        position: relative;
        z-index: 2;
        margin: 0;
    }

    /* ==================== TIMELINE SECTION ==================== */
    .timeline-section {
        background: white;
        padding: clamp(40px, 6vw, 60px);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.8s ease-out 0.2s both;
        margin-bottom: clamp(40px, 8vw, 60px);
        border: 1px solid var(--border-color);
    }

    .timeline-header {
        text-align: center;
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .timeline-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .timeline-header h3 i {
        color: var(--secondary-color);
        font-size: clamp(24px, 4vw, 32px);
    }

    .timeline-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: clamp(20px, 3vw, 30px);
    }

    .timeline-item {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: clamp(25px, 4vw, 35px);
        border-radius: 15px;
        border-left: 5px solid var(--secondary-color);
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
        position: relative;
    }

    .timeline-item:nth-child(1) { animation-delay: 0.1s; }
    .timeline-item:nth-child(2) { animation-delay: 0.2s; }
    .timeline-item:nth-child(3) { animation-delay: 0.3s; }
    .timeline-item:nth-child(4) { animation-delay: 0.4s; }
    .timeline-item:nth-child(5) { animation-delay: 0.5s; }
    .timeline-item:nth-child(6) { animation-delay: 0.6s; }

    .timeline-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-md);
        background: white;
        border-left-width: 8px;
    }

    .timeline-date {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: clamp(14px, 2vw, 18px);
        margin-bottom: 10px;
    }

    .timeline-title {
        color: var(--primary-color);
        font-weight: 700;
        font-size: clamp(16px, 2vw, 20px);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .timeline-title i {
        color: var(--secondary-color);
        font-size: clamp(14px, 1.5vw, 18px);
    }

    .timeline-desc {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
        margin: 0;
    }

    /* ==================== REQUIREMENTS SECTION ==================== */
    .requirements-section {
        background: white;
        padding: clamp(40px, 6vw, 60px);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.8s ease-out 0.3s both;
        margin-bottom: clamp(40px, 8vw, 60px);
        border: 1px solid var(--border-color);
    }

    .requirements-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: clamp(30px, 6vw, 50px);
    }

    .requirements-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .requirements-header i {
        color: var(--secondary-color);
        font-size: clamp(28px, 4vw, 36px);
    }

    .requirements-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: clamp(20px, 3vw, 30px);
    }

    .requirement-item {
        display: flex;
        gap: 15px;
        animation: slideInLeft 0.6s ease-out backwards;
        padding: clamp(15px, 2vw, 20px);
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(26, 95, 58, 0.1));
        transition: var(--transition);
    }

    .requirement-item:nth-child(1) { animation-delay: 0.05s; }
    .requirement-item:nth-child(2) { animation-delay: 0.1s; }
    .requirement-item:nth-child(3) { animation-delay: 0.15s; }
    .requirement-item:nth-child(4) { animation-delay: 0.2s; }
    .requirement-item:nth-child(5) { animation-delay: 0.25s; }
    .requirement-item:nth-child(6) { animation-delay: 0.3s; }
    .requirement-item:nth-child(7) { animation-delay: 0.35s; }
    .requirement-item:nth-child(8) { animation-delay: 0.4s; }

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

    .requirement-item:hover {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.15), rgba(26, 95, 58, 0.15));
        transform: translateX(8px);
    }

    .requirement-number {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 18px;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(26, 95, 58, 0.2);
    }

    .requirement-text {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        display: flex;
        align-items: center;
        line-height: 1.6;
    }

    /* ==================== STEPS SECTION ==================== */
    .steps-section {
        margin: clamp(40px, 8vw, 60px) 0;
    }

    .steps-header {
        text-align: center;
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .steps-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .steps-header h3 i {
        color: var(--secondary-color);
        font-size: clamp(24px, 4vw, 32px);
    }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: clamp(20px, 3vw, 30px);
    }

    .step-card {
        background: white;
        padding: clamp(30px, 4vw, 40px);
        border-radius: 15px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
        position: relative;
        border: 1px solid var(--border-color);
    }

    .step-card:nth-child(1) { animation-delay: 0.1s; }
    .step-card:nth-child(2) { animation-delay: 0.2s; }
    .step-card:nth-child(3) { animation-delay: 0.3s; }
    .step-card:nth-child(4) { animation-delay: 0.4s; }
    .step-card:nth-child(5) { animation-delay: 0.5s; }
    .step-card:nth-child(6) { animation-delay: 0.6s; }

    .step-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    .step-card::before {
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

    .step-number {
        position: absolute;
        top: -18px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: 700;
        box-shadow: 0 6px 16px rgba(26, 95, 58, 0.2);
        transition: var(--transition);
    }

    .step-card:hover .step-number {
        transform: translateX(-50%) scale(1.15);
        box-shadow: 0 10px 25px rgba(26, 95, 58, 0.3);
    }

    .step-icon {
        font-size: clamp(32px, 5vw, 48px);
        color: var(--secondary-color);
        margin-bottom: 15px;
        margin-top: 15px;
        transition: var(--transition);
    }

    .step-card:hover .step-icon {
        transform: scale(1.1) rotate(10deg);
    }

    .step-title {
        font-size: clamp(16px, 2vw, 20px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .step-desc {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.6;
        margin: 0;
    }

    /* ==================== CTA SECTION ==================== */
    .cta-registration {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: clamp(40px, 6vw, 60px);
        border-radius: 20px;
        text-align: center;
        margin: clamp(60px, 10vw, 100px) 0;
        animation: fadeInUp 0.8s ease-out 0.4s both;
        position: relative;
        overflow: hidden;
    }

    .cta-registration::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .cta-registration::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 10s ease-in-out infinite reverse;
    }

    .cta-registration h3 {
        font-size: clamp(22px, 4vw, 36px);
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .cta-registration p {
        font-size: clamp(14px, 2vw, 18px);
        margin-bottom: 30px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }

    .register-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: clamp(14px, 2vw, 18px) clamp(30px, 4vw, 50px);
        background: var(--secondary-color);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: clamp(14px, 1.5vw, 16px);
        transition: var(--transition);
        border: 2px solid var(--secondary-color);
        cursor: pointer;
        position: relative;
        z-index: 2;
        overflow: hidden;
    }

    .register-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--secondary-light);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .register-btn:hover::before {
        opacity: 1;
    }

    .register-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(243, 156, 18, 0.4);
    }

    .register-btn i {
        transition: var(--transition);
    }

    .register-btn:hover i {
        transform: translateX(4px);
    }

    /* ==================== FAQ SECTION ==================== */
    .faq-section {
        background: white;
        padding: clamp(40px, 6vw, 60px);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        animation: fadeInUp 0.8s ease-out 0.5s both;
        border: 1px solid var(--border-color);
    }

    .faq-header {
        text-align: center;
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    .faq-header h3 {
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .faq-header h3 i {
        color: var(--secondary-color);
        font-size: clamp(24px, 4vw, 32px);
    }

    .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: clamp(20px, 3vw, 30px);
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 5px solid var(--secondary-color);
        transition: var(--transition);
        animation: slideInUp 0.6s ease-out backwards;
    }

    .faq-item:nth-child(1) { animation-delay: 0.1s; }
    .faq-item:nth-child(2) { animation-delay: 0.2s; }
    .faq-item:nth-child(3) { animation-delay: 0.3s; }
    .faq-item:nth-child(4) { animation-delay: 0.4s; }

    .faq-item:hover {
        background: white;
        transform: translateX(8px);
        box-shadow: var(--shadow-md);
        border-left-width: 8px;
    }

    .faq-question {
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: clamp(14px, 1.5vw, 16px);
        cursor: pointer;
        transition: var(--transition);
    }

    .faq-question i {
        color: var(--secondary-color);
        transition: var(--transition);
        font-size: clamp(12px, 1.5vw, 14px);
    }

    .faq-item:hover .faq-question i {
        transform: rotate(90deg) scale(1.2);
    }

    .faq-answer {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        line-height: 1.7;
        margin: 0;
        padding-left: 30px;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .info-cards-grid {
            grid-template-columns: 1fr;
        }

        .timeline-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .requirements-grid {
            grid-template-columns: 1fr;
        }

        .steps-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .ppdb-hero {
            min-height: 50vh;
            padding: 50px 20px;
        }

        .ppdb-content-section {
            padding: 50px 20px;
        }

        .info-cards-grid {
            gap: 15px;
        }

        .info-card {
            padding: 20px;
        }

        .info-card h4 {
            font-size: 28px;
        }

        .requirements-section {
            padding: 30px 20px;
        }

        .requirements-grid {
            gap: 12px;
        }

        .requirement-item {
            padding: 12px;
        }

        .timeline-grid {
            grid-template-columns: 1fr;
        }

        .steps-grid {
            grid-template-columns: 1fr;
        }

        .step-card {
            padding: 25px;
        }

        .faq-section {
            padding: 30px 20px;
        }

        .cta-registration {
            padding: 35px 20px;
        }
    }

    @media (max-width: 480px) {
        .ppdb-hero {
            min-height: 45vh;
            padding: 40px 15px;
        }

        .ppdb-content-section {
            padding: 40px 15px;
        }

        .ppdb-hero h1 {
            font-size: 24px;
        }

        .ppdb-hero p {
            font-size: 13px;
        }

        .breadcrumb-ppdb {
            font-size: 10px;
            padding: 5px 8px;
            gap: 6px;
        }

        .ppdb-section-header h2 {
            font-size: 20px;
        }

        .ppdb-section-header h2::after {
            width: 60px;
        }

        .info-card {
            padding: 15px;
        }

        .info-card h4 {
            font-size: 24px;
        }

        .info-card p {
            font-size: 12px;
        }

        .timeline-section {
            padding: 20px;
        }

        .timeline-header h3 {
            font-size: 18px;
        }

        .timeline-item {
            padding: 15px;
        }

        .timeline-date {
            font-size: 12px;
        }

        .timeline-title {
            font-size: 14px;
        }

        .timeline-desc {
            font-size: 12px;
        }

        .requirements-section {
            padding: 20px;
        }

        .requirements-header h3 {
            font-size: 18px;
        }

        .requirement-item {
            gap: 10px;
        }

        .requirement-number {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .requirement-text {
            font-size: 12px;
        }

        .steps-header h3 {
            font-size: 18px;
        }

        .steps-grid {
            gap: 12px;
        }

        .step-card {
            padding: 20px;
            margin-top: 10px;
        }

        .step-number {
            width: 40px;
            height: 40px;
            font-size: 18px;
            top: -15px;
        }

        .step-icon {
            font-size: 32px;
        }

        .step-title {
            font-size: 14px;
        }

        .step-desc {
            font-size: 12px;
        }

        .cta-registration {
            padding: 25px 15px;
        }

        .cta-registration h3 {
            font-size: 18px;
        }

        .cta-registration p {
            font-size: 12px;
            margin-bottom: 20px;
        }

        .register-btn {
            padding: 10px 20px;
            font-size: 12px;
        }

        .faq-section {
            padding: 20px;
        }

        .faq-header h3 {
            font-size: 18px;
        }

        .faq-item {
            padding: 15px;
            margin-bottom: 12px;
        }

        .faq-question {
            font-size: 13px;
            gap: 8px;
        }

        .faq-answer {
            font-size: 12px;
            padding-left: 25px;
        }
    }

    @media (max-width: 360px) {
        .ppdb-hero h1 {
            font-size: 20px;
        }

        .info-card h4 {
            font-size: 20px;
        }
    }

    /* ==================== ANIMATIONS ==================== */
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
        .timeline-section,
        .requirements-section,
        .faq-section,
        .step-card {
            background: #2c3e50;
            border-color: #34495e;
        }

        .step-card,
        .faq-item {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .timeline-item {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .requirement-item {
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.2), rgba(26, 95, 58, 0.2));
        }

        .timeline-desc,
        .requirement-text,
        .step-desc,
        .faq-answer {
            color: #bdc3c7;
        }

        .timeline-title,
        .step-title,
        .faq-question {
            color: #f39c12;
        }
    }

</style>

<!-- Hero Section -->
<div class="ppdb-hero">
    <div class="container">
        <div class="ppdb-hero-content">
            <h1><i class="fas fa-graduation-cap" style="margin-right: 15px;"></i>Penerimaan Peserta Didik Baru</h1>
            <p>PPDB MTsN 1 Magetan Tahun Ajaran 2025/2026</p>
            <div class="breadcrumb-ppdb">
                <a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="#">Informasi</a>
                <span>/</span>
                <span>PPDB</span>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="ppdb-content-section">
    <div class="container">

        <!-- Section Header -->
        <div class="ppdb-section-header">
            <h2><i class="fas fa-info-circle" style="margin-right: 10px;"></i>Informasi Pendaftaran</h2>
            <p>Berikut adalah informasi lengkap mengenai penerimaan peserta didik baru di MTsN 1 Magetan</p>
        </div>

        <!-- Info Cards -->
        <div class="info-cards-grid">
            <div class="info-card">
                <h4>03 Feb - 06 Mei 2025</h4>
                <p>Gelombang Pertama Pendaftaran</p>
            </div>
            <div class="info-card">
                <h4>120 Siswa</h4>
                <p>Kuota Penerimaan</p>
            </div>
            <div class="info-card">
                <h4>Gratis</h4>
                <p>Biaya Pendaftaran</p>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="timeline-section">
            <div class="timeline-header">
                <h3><i class="fas fa-calendar-check"></i> Jadwal Pendaftaran Siswa Baru</h3>
            </div>
            <div class="timeline-grid">
                <div class="timeline-item">
                    <div class="timeline-date">03 Februari - 06 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-pencil"></i> Gelombang Pertama</div>
                    <p class="timeline-desc">Pendaftaran online terbuka untuk calon siswa baru melalui portal PPDB</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">10 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-pen-fancy"></i> Tes Akademik</div>
                    <p class="timeline-desc">Pelaksanaan tes akademik (Matematika, Bahasa Indonesia, IPA)</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">12 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-file-check"></i> Pengumuman Hasil</div>
                    <p class="timeline-desc">Pengumuman hasil tes akademik melalui website dan SMS</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">14 - 16 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-list"></i> Daftar Ulang</div>
                    <p class="timeline-desc">Daftar ulang bagi peserta yang diterima di sekolah atau online</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">19 Mei - 16 Juni 2025</div>
                    <div class="timeline-title"><i class="fas fa-door-open"></i> Gelombang Kedua</div>
                    <p class="timeline-desc">Pendaftaran gelombang kedua untuk sisa kuota yang tersedia</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">21 Juni - 26 Juni 2025</div>
                    <div class="timeline-title"><i class="fas fa-check"></i> Finalisasi PPDB</div>
                    <p class="timeline-desc">Proses finalisasi data siswa dan persiapan tahun ajaran baru</p>
                </div>
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="requirements-section">
            <div class="requirements-header">
                <i class="fas fa-list-check"></i>
                <h3>Syarat Pendaftaran</h3>
            </div>
            <div class="requirements-grid">
                <div class="requirement-item">
                    <div class="requirement-number">1</div>
                    <div class="requirement-text">Lulus SD/MI dengan nilai rata-rata minimal 7.0</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">2</div>
                    <div class="requirement-text">Lulus UN/UAMBN dari sekolah asal</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">3</div>
                    <div class="requirement-text">Fotokopi rapor semester 1-5 yang dilegalisir (11 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">4</div>
                    <div class="requirement-text">Fotokopi akte kelahiran (1 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">5</div>
                    <div class="requirement-text">Fotokopi Kartu Keluarga (1 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">6</div>
                    <div class="requirement-text">Bagi uang memiliki piagam/sertifikat kejaruaan supaya dilampirkan</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">7</div>
                    <div class="requirement-text">Surat keterangan sehat dari dokter/puskesmas</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">8</div>
                    <div class="requirement-text">Pas foto 3x4 cm sebanyak 4 lembar</div>
                </div>
            </div>
        </div>

        <!-- Steps Section -->
        <div class="steps-section">
            <div class="steps-header">
                <h3><i class="fas fa-tasks"></i> Langkah-Langkah Pendaftaran</h3>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <i class="fas fa-globe step-icon"></i>
                    <h4 class="step-title">Kunjungi Portal PPDB</h4>
                    <p class="step-desc">Akses website ppdb.mtsnmagetan.sch.id menggunakan browser</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <i class="fas fa-user-plus step-icon"></i>
                    <h4 class="step-title">Buat Akun</h4>
                    <p class="step-desc">Daftar dengan email dan nomor induk siswa dari sekolah asal</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <i class="fas fa-pen-fancy step-icon"></i>
                    <h4 class="step-title">Isi Data Diri</h4>
                    <p class="step-desc">Lengkapi data pribadi, data orang tua, dan alamat rumah</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <i class="fas fa-file-upload step-icon"></i>
                    <h4 class="step-title">Upload Dokumen</h4>
                    <p class="step-desc">Unggah semua dokumen yang diperlukan (scan/foto berwarna)</p>
                </div>
                <div class="step-card">
                    <div class="step-number">5</div>
                    <i class="fas fa-check-circle step-icon"></i>
                    <h4 class="step-title">Verifikasi Data</h4>
                    <p class="step-desc">Tunggu verifikasi dari pihak sekolah (1-2 hari kerja)</p>
                </div>
                <div class="step-card">
                    <div class="step-number">6</div>
                    <i class="fas fa-handshake step-icon"></i>
                    <h4 class="step-title">Daftar Ulang</h4>
                    <p class="step-desc">Daftar ulang jika diterima dan bayar biaya pendaftaran sekolah</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-registration">
            <h3>Siap Melanjutkan Pendidikan ke MTsN 1 Magetan?</h3>
            <p>Daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar MTsN 1 Magetan</p>
            <a href="https://forms.gle/MPStnhGic42Xqa8n9" class="register-btn" target="_blank">
                <i class="fas fa-arrow-right"></i> Mulai Pendaftaran Online
            </a>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="faq-header">
                <h3><i class="fas fa-circle-question"></i> Pertanyaan Umum (FAQ)</h3>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Berapa biaya pendaftaran PPDB?
                    </div>
                    <p class="faq-answer">Biaya pendaftaran PPDB di MTsN 1 Magetan adalah GRATIS. Tidak ada biaya apapun untuk mendaftar melalui portal PPDB online.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Apa saja syarat pendaftaran PPDB?
                    </div>
                    <p class="faq-answer">Syarat pendaftaran meliputi: lulus SD/MI dengan nilai rata-rata minimal 7.0, lulus UN/UAMBN, fotokopi rapor, akte kelahiran, KK, KTP orang tua, surat sehat, dan pas foto 3x4. Lihat detail lengkap di atas.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Kapan pengumuman hasil seleksi?
                    </div>
                    <p class="faq-answer">Pengumuman hasil seleksi akan diumumkan pada tanggal 12 Mei 2025 melalui website, SMS, dan email yang terdaftar di portal PPDB.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Bagaimana jika tidak diterima?
                    </div>
                    <p class="faq-answer">Jika tidak diterima di gelombang pertama, Anda dapat mendaftar kembali di gelombang kedua (19 Mei - 16 Juni 2025) atau mendaftar di sekolah lain yang masih membuka pendaftaran.</p>
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
    document.querySelectorAll('.step-card, .faq-item, .requirement-item').forEach((el) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = `all 0.6s ease`;
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

    // ==================== FAQ TOGGLE ==================== 
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            answer.style.display = answer.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>

@endsection