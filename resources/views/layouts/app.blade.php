<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MTsN 1 Magetan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #1a5f3a;
            --secondary-color: #2d8659;
            --accent-color: #f39c12;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --text-muted: #6c757d;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ============ TOP BAR ============ */
        .top-bar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 12px 0;
            font-size: 14px;
            border-bottom: 3px solid var(--accent-color);
        }

        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .contact-info {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-info span {
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .contact-info span:hover {
            transform: translateX(5px);
            opacity: 0.8;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 32px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(243,156,18,0.3);
        }

        /* ============ NAVBAR ============ */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .navbar.scrolled {
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            padding: 10px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .navbar-brand:hover {
            color: var(--secondary-color) !important;
            transform: scale(1.05);
        }

        .navbar-brand i {
            font-size: 28px;
        }

        .nav-link {
            color: var(--dark-text) !important;
            font-weight: 500;
            margin: 0 8px;
            padding: 8px 0 !important;
            position: relative;
            transition: all 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-toggler {
            border: none;
            padding: 5px 10px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: 2px solid var(--primary-color);
        }

        /* ============ HERO SECTION ============ */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
            margin-top: -20px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            animation: slideInUp 0.8s ease-out;
        }

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

        .hero-title {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.95;
            font-weight: 300;
        }

        .btn-group-hero {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            padding: 12px 32px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .btn-primary {
            background: var(--accent-color);
            color: white;
        }

        .btn-primary:hover {
            background: #e67e22;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(243,156,18,0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* ============ QUICK INFO SECTION ============ */
        .quick-info {
            padding: 60px 0;
            background: white;
            position: relative;
            z-index: 10;
            margin-top: -30px;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 40px 25px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid #e9ecef;
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .info-card:hover::before {
            transform: scaleX(1);
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26,95,58,0.15);
        }

        .info-icon {
            font-size: 50px;
            color: var(--primary-color);
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .info-card:hover .info-icon {
            color: var(--accent-color);
            transform: scale(1.2);
        }

        .info-card h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .info-card p {
            color: var(--text-muted);
            font-size: 15px;
            margin: 0;
        }

        /* ============ SECTION STYLING ============ */
        section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
            animation: slideInUp 0.6s ease-out;
        }

        .section-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark-text);
            font-family: 'Playfair Display', serif;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 18px;
            color: var(--text-muted);
            margin-top: 25px;
        }

        /* ============ ABOUT SECTION ============ */
        .about-section {
            background: white;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(26,95,58,0.2);
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: 0.3s;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-text {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .about-text h3 {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .about-text h3:first-child {
            margin-top: 0;
        }

        .about-text p {
            color: var(--text-muted);
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.8;
        }

        .about-text ul {
            list-style: none;
            margin-bottom: 25px;
        }

        .about-text ul li {
            padding: 10px 0 10px 30px;
            position: relative;
            color: var(--text-muted);
            font-size: 16px;
        }

        .about-text ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--accent-color);
            font-weight: 700;
            font-size: 20px;
        }

        /* ============ NEWS SECTION ============ */
        .news-section {
            background: var(--light-bg);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .news-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            animation: fadeInUp 0.6s ease-out;
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

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26,95,58,0.2);
        }

        .news-image {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: #e9ecef;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }

        .news-card:hover .news-image img {
            transform: scale(1.1);
        }

        .news-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 2;
        }

        .news-badge.pengumuman {
            background: #e74c3c;
        }

        .news-badge.kegiatan {
            background: #3498db;
        }

        .news-content {
            padding: 25px;
        }

        .news-meta {
            display: flex;
            gap: 20px;
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .news-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .news-content h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--dark-text);
            transition: 0.3s;
        }

        .news-card:hover .news-content h3 {
            color: var(--primary-color);
        }

        .news-content p {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .read-more {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .read-more:hover {
            gap: 12px;
            color: var(--accent-color);
        }

        /* ============ PPDB SECTION ============ */
        .ppdb-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .ppdb-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: -100px;
            width: 500px;
            height: 500px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .ppdb-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .ppdb-info h2 {
            font-size: 44px;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .ppdb-info h3 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .ppdb-info p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.8;
            opacity: 0.9;
        }

        .ppdb-features {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 16px;
            animation: slideInLeft 0.6s ease-out backwards;
        }

        .feature-item:nth-child(1) { animation-delay: 0.1s; }
        .feature-item:nth-child(2) { animation-delay: 0.2s; }
        .feature-item:nth-child(3) { animation-delay: 0.3s; }
        .feature-item:nth-child(4) { animation-delay: 0.4s; }

        .feature-item i {
            font-size: 24px;
            color: var(--accent-color);
        }

        .ppdb-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 15px 40px;
            font-size: 16px;
        }

        .ppdb-image {
            animation: slideInRight 0.8s ease-out;
        }

        .ppdb-image img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));
            transition: 0.3s;
        }

        .ppdb-image:hover img {
            transform: translateY(-10px);
        }

        /* ============ GALLERY SECTION ============ */
        .gallery-section {
            background: white;
        }

        .gallery-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .gallery-tab {
            background: #f0f0f0;
            border: 2px solid transparent;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            color: var(--dark-text);
            transition: all 0.3s;
        }

        .gallery-tab:hover,
        .gallery-tab.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            height: 280px;
            cursor: pointer;
            animation: fadeInUp 0.6s ease-out;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(26,95,58,0.85);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            opacity: 0;
            transition: 0.3s;
        }

        .gallery-item:hover {
            box-shadow: 0 15px 40px rgba(26,95,58,0.3);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .gallery-overlay p {
            font-size: 14px;
            opacity: 0.9;
        }

        /* ============ EKSTRAKURIKULER SECTION ============ */
        .ekskul-section {
            background: var(--light-bg);
        }

        .ekskul-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .ekskul-card {
            background: white;
            padding: 40px 25px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .ekskul-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            opacity: 0;
            transition: 0.3s;
        }

        .ekskul-card:hover::before {
            opacity: 0.1;
            top: 0;
            left: 0;
        }

        .ekskul-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(26,95,58,0.2);
        }

        .ekskul-icon {
            font-size: 50px;
            color: var(--primary-color);
            margin-bottom: 20px;
            transition: 0.3s;
            position: relative;
            z-index: 2;
        }

        .ekskul-card:hover .ekskul-icon {
            color: var(--accent-color);
            transform: scale(1.2) rotateY(10deg);
        }

        .ekskul-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 12px;
            position: relative;
            z-index: 2;
        }

        .ekskul-card p {
            font-size: 15px;
            color: var(--text-muted);
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        /* ============ SOCIAL MEDIA SECTION ============ */
        .social-media-section {
            background: white;
        }

        .social-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .social-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 40px 25px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s;
            border: 2px solid #e9ecef;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .social-box.facebook { border-color: #1877F2; }
        .social-box.instagram { border-color: #E4405F; }
        .social-box.youtube { border-color: #FF0000; }
        .social-box.twitter { border-color: #1DA1F2; }

        .social-box:hover {
            transform: translateY(-15px);
            border-color: transparent;
        }

        .social-box.facebook:hover { background: linear-gradient(135deg, #1877F2, #0a66c2); }
        .social-box.instagram:hover { background: linear-gradient(135deg, #E4405F, #c13584); }
        .social-box.youtube:hover { background: linear-gradient(135deg, #FF0000, #cc0000); }
        .social-box.twitter:hover { background: linear-gradient(135deg, #1DA1F2, #1a8cd8); }

        .social-box:hover {
            color: white;
        }

        .social-box i {
            font-size: 50px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .social-box:hover i {
            transform: scale(1.2);
        }

        .social-box h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .social-box p {
            font-size: 14px;
            opacity: 0.8;
        }

        /* ============ CONTACT SECTION ============ */
        .contact-section {
            background: var(--light-bg);
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-bottom: 50px;
        }

        .contact-info-box {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .contact-item {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            animation: slideInLeft 0.6s ease-out backwards;
        }

        .contact-item:nth-child(1) { animation-delay: 0.1s; }
        .contact-item:nth-child(2) { animation-delay: 0.2s; }
        .contact-item:nth-child(3) { animation-delay: 0.3s; }
        .contact-item:nth-child(4) { animation-delay: 0.4s; }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .contact-item h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 5px;
        }

        .contact-item p {
            font-size: 15px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.6;
        }

        .contact-form-box {
            animation: slideInRight 0.6s ease-out;
        }

        .contact-form {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: var(--dark-text);
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26,95,58,0.1);
        }

        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .map-container iframe {
            display: block;
            border-radius: 12px;
        }

        /* ============ FOOTER ============ */
        footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3,
        .footer-col h4 {
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-col p {
            font-size: 15px;
            opacity: 0.9;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-col a:hover {
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .footer-social a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 14px;
            opacity: 0.85;
        }

        .footer-bottom i {
            color: #e74c3c;
        }

        /* ============ SCROLL TO TOP ============ */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(26,95,58,0.3);
        }

        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(26,95,58,0.5);
        }

        .scroll-top.show {
            display: flex;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 768px) {
            .hero {
                padding: 60px 0;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .section-title {
                font-size: 32px;
            }

            .about-content,
            .ppdb-content,
            .contact-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .top-bar-content {
                flex-direction: column;
                justify-content: center;
            }

            .contact-info {
                flex-direction: column;
                gap: 15px;
            }

            .info-cards {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }

            .btn-group-hero {
                flex-direction: column;
            }

            .ppdb-buttons {
                flex-direction: column;
            }

            .btn-large {
                width: 100%;
                text-align: center;
            }

            section {
                padding: 50px 0;
            }

            .section-header {
                margin-bottom: 40px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 28px;
            }

            .hero-subtitle {
                font-size: 14px;
            }

            .section-title {
                font-size: 24px;
            }

            .navbar-brand {
                font-size: 18px;
            }

            .info-cards {
                grid-template-columns: 1fr;
            }

            .gallery-grid,
            .ekskul-grid,
            .social-grid,
            .news-grid {
                grid-template-columns: 1fr;
            }

            .scroll-top {
                width: 40px;
                height: 40px;
                bottom: 20px;
                right: 20px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i> (0351) 123456</span>
                    <span><i class="fas fa-envelope"></i> info@mtsnmagetan.sch.id</span>
                </div>
                <div class="social-links">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-graduation-cap"></i>
                MTsN 1 Magetan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('berita') }}">Berita & Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ppdb') }}">PPDB</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h3><i class="fas fa-graduation-cap"></i> MTsN 1 Magetan</h3>
                    <p>Madrasah Tsanawiyah Negeri Magetan adalah lembaga pendidikan Islam tingkat menengah pertama yang berkomitmen menghasilkan generasi berakhlak mulia dan berprestasi.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4><i class="fas fa-link"></i> Link Cepat</h4>
                    <ul>
                        <li><a href="{{ route('profil.sejarah') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('berita') }}">Berita & Pengumuman</a></li>
                        <li><a href="{{ route('ppdb') }}">PPDB</a></li>
                        <li><a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4><i class="fas fa-info-circle"></i> Informasi</h4>
                    <ul>
                        <li><a href="">Akademik</a></li>
                        <li><a href="">Kurikulum</a></li>
                        <li><a href="">Kalender Pendidikan</a></li>
                        <li><a href="">Fasilitas</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4><i class="fas fa-phone"></i> Kontak</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Pendidikan No. 123, Magetan</li>
                        <li><i class="fas fa-phone"></i> (0351) 123456</li>
                        <li><i class="fas fa-envelope"></i> info@mtsnmagetan.sch.id</li>
                        <li><i class="fas fa-clock"></i> Sen-Jum: 07.00-16.00</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 MTsN 1 Magetan. All Rights Reserved. | Designed with <i class="fas fa-heart"></i> by MTsN 1 Magetan</p>
            </div>
        </div>
    </footer>

    <!-- SCROLL TO TOP -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll to top button
        const scrollTop = document.getElementById('scrollTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTop.classList.add('show');
            } else {
                scrollTop.classList.remove('show');
            }
        });

        scrollTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Gallery filter
        const galleryTabs = document.querySelectorAll('.gallery-tab');
        const galleryItems = document.querySelectorAll('.gallery-item');

        galleryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                galleryTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const category = tab.dataset.category;
                galleryItems.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Set first tab as active
        if (galleryTabs.length > 0) {
            galleryTabs[0].classList.add('active');
        }

        // Contact form
        document.querySelector('.contact-form')?.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Terima kasih telah menghubungi kami! Kami akan merespons segera.');
            e.target.reset();
        });
    </script>
</body>
</html>