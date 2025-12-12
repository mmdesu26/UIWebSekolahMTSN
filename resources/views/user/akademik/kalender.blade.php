@extends('layouts.app')

@section('title', 'Kalender Pendidikan - MTsN 1 Magetan')

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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* ==================== HERO SECTION ==================== */
    .akademik-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 50%, var(--primary-light) 100%);
        color: white;
        padding: clamp(60px, 10vw, 100px) 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .akademik-hero::before {
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

    .akademik-hero::after {
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

    .akademik-hero-content {
        position: relative;
        z-index: 2;
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

    .akademik-hero h1 {
        font-size: clamp(28px, 5vw, 52px);
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .akademik-hero p {
        font-size: clamp(14px, 2vw, 18px);
        opacity: 0.95;
        margin-bottom: 25px;
        line-height: 1.8;
    }

    .breadcrumb {
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

    .breadcrumb:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    .breadcrumb a {
        color: white;
        text-decoration: none;
        transition: var(--transition);
    }

    .breadcrumb a:hover {
        opacity: 0.8;
    }

    /* ==================== CONTENT SECTION ==================== */
    .content-section {
        padding: clamp(60px, 10vw, 100px) 20px;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    /* ==================== CALENDAR HEADER ==================== */
    .calendar-header {
        background: white;
        padding: clamp(25px, 4vw, 40px);
        border-radius: 15px;
        margin-bottom: clamp(30px, 5vw, 50px);
        box-shadow: var(--shadow-md);
        animation: fadeInDown 0.8s ease-out;
        border-left: 5px solid var(--secondary-color);
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

    .calendar-header h2 {
        color: var(--primary-color);
        font-size: clamp(20px, 3vw, 28px);
        margin-bottom: 10px;
        font-weight: 700;
    }

    .calendar-header h2 i {
        margin-right: 10px;
        color: var(--secondary-color);
    }

    .calendar-header p {
        color: var(--text-light);
        margin: 0;
        font-size: clamp(13px, 1.5vw, 16px);
    }

    /* ==================== SEMESTER TITLE ==================== */
    .semester-title {
        margin: clamp(40px, 8vw, 60px) 0 clamp(25px, 5vw, 35px) 0;
        color: var(--primary-color);
        font-size: clamp(20px, 3vw, 28px);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
    }

    .semester-title i {
        color: var(--secondary-color);
        font-size: clamp(18px, 3vw, 24px);
    }

    .semester-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--secondary-color), transparent);
        border-radius: 2px;
    }

    /* ==================== CALENDAR GRID ==================== */
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        margin-bottom: clamp(40px, 8vw, 60px);
    }

    /* ==================== EVENT CARD ==================== */
    .event-card {
        background: white;
        border-radius: 15px;
        padding: clamp(20px, 4vw, 30px);
        border-left: 5px solid var(--secondary-color);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out backwards;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .event-card:nth-child(1) { animation-delay: 0.1s; }
    .event-card:nth-child(2) { animation-delay: 0.2s; }
    .event-card:nth-child(3) { animation-delay: 0.3s; }
    .event-card:nth-child(4) { animation-delay: 0.4s; }
    .event-card:nth-child(5) { animation-delay: 0.5s; }
    .event-card:nth-child(6) { animation-delay: 0.6s; }

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

    .event-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(243, 156, 18, 0.1), transparent);
        border-radius: 50%;
        transition: var(--transition);
    }

    .event-card:hover::before {
        top: -20%;
        right: -20%;
    }

    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-left-width: 8px;
    }

    /* ==================== EVENT DATE ==================== */
    .event-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        color: white;
        padding: clamp(8px, 1.5vw, 10px) clamp(12px, 2vw, 15px);
        border-radius: 8px;
        font-weight: 600;
        font-size: clamp(12px, 1.5vw, 14px);
        margin-bottom: 15px;
        width: fit-content;
        transition: var(--transition);
        position: relative;
        z-index: 2;
    }

    .event-card:hover .event-date {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(26, 95, 58, 0.3);
    }

    .event-date i {
        font-size: clamp(10px, 1.5vw, 13px);
    }

    /* ==================== EVENT TITLE ==================== */
    .event-card h3 {
        font-size: clamp(16px, 2vw, 20px);
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 12px;
        line-height: 1.3;
        position: relative;
        z-index: 2;
    }

    /* ==================== EVENT DESCRIPTION ==================== */
    .event-card p {
        color: var(--text-light);
        font-size: clamp(13px, 1.5vw, 15px);
        margin: 0 0 15px 0;
        line-height: 1.6;
        flex-grow: 1;
        position: relative;
        z-index: 2;
    }

    /* ==================== EVENT CATEGORY ==================== */
    .event-category {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        transition: var(--transition);
        position: relative;
        z-index: 2;
        width: fit-content;
    }

    .event-card:hover .event-category {
        transform: translateY(-2px);
    }

    /* Category Colors */
    .cat-libur {
        background: #ffe5e5;
        color: #e74c3c;
        border: 1px solid #f1a9a0;
    }

    .cat-ujian {
        background: #fff3cd;
        color: #f39c12;
        border: 1px solid #ffeaa7;
    }

    .cat-kegiatan {
        background: #d4edda;
        color: #28a745;
        border: 1px solid #c3e6cb;
    }

    .cat-penting {
        background: #d1ecf1;
        color: #17a2b8;
        border: 1px solid #bee5eb;
    }

    .cat-akademik {
        background: #e7d4f5;
        color: #9b59b6;
        border: 1px solid #d7bde2;
    }

    /* ==================== FILTERS ==================== */
    .calendar-filters {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 40px;
        animation: slideInUp 0.8s ease-out 0.2s both;
    }

    .filter-btn {
        padding: 8px 18px;
        border: 2px solid var(--border-color);
        background: white;
        border-radius: 25px;
        color: var(--text-dark);
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: var(--transition);
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    /* ==================== NO RESULTS ==================== */
    .no-results {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-light);
    }

    .no-results i {
        font-size: 64px;
        color: var(--border-color);
        margin-bottom: 20px;
    }

    .no-results p {
        font-size: 18px;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .calendar-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .akademik-hero {
            min-height: 60vh;
        }
    }

    @media (max-width: 768px) {
        .akademik-hero {
            min-height: 50vh;
            padding: 50px 20px;
        }

        .calendar-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .event-card {
            padding: 20px;
        }

        .semester-title {
            margin: 30px 0 20px 0;
            font-size: 20px;
        }

        .calendar-filters {
            justify-content: center;
            gap: 8px;
        }

        .filter-btn {
            padding: 6px 14px;
            font-size: 12px;
        }
    }
</style>

<!-- Hero Section -->
<div class="akademik-hero">
    <div class="container">
        <div class="akademik-hero-content">
            <h1><i class="fas fa-calendar-alt" style="margin-right: 10px;"></i>Kalender Pendidikan 2024/2025</h1>
            <p>Berikut adalah jadwal lengkap kegiatan akademik dan non-akademik MTsN 1 Magetan</p>
            <div class="breadcrumb">
                <a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <a href="{{ route('akademik.kurikulum') }}">Akademik</a>
                <span>/</span>
                <span>Kalender Pendidikan</span>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="content-section">
    <div class="container">
        
        <!-- Header -->
        <div class="calendar-header">
            <h2><i class="fas fa-calendar-check"></i> Tahun Ajaran 2024/2025</h2>
            <p>Kalender akademik mencakup semua kegiatan pembelajaran, ujian, libur, dan acara khusus sepanjang tahun ajaran</p>
        </div>

        <!-- Filters -->
        <div class="calendar-filters">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-list"></i> Semua
            </button>
            <button class="filter-btn" data-filter="kegiatan">
                <i class="fas fa-star"></i> Kegiatan
            </button>
            <button class="filter-btn" data-filter="ujian">
                <i class="fas fa-clipboard-check"></i> Ujian
            </button>
            <button class="filter-btn" data-filter="penting">
                <i class="fas fa-exclamation-circle"></i> Penting
            </button>
            <button class="filter-btn" data-filter="libur">
                <i class="fas fa-palm-tree"></i> Libur
            </button>
            <button class="filter-btn" data-filter="akademik">
                <i class="fas fa-book"></i> Akademik
            </button>
        </div>

        <!-- Semester Ganjil -->
        @if($kalenderGanjil->count() > 0)
        <h2 class="semester-title"><i class="fas fa-calendar-week"></i> Semester Ganjil (Juli - Desember 2024)</h2>
        <div class="calendar-grid">
            @foreach($kalenderGanjil as $kalender)
            <div class="event-card" data-category="{{ $kalender->kategori }}">
                <span class="event-date">
                    <i class="far fa-calendar"></i> {{ $kalender->tanggal_format }}
                </span>
                <h3>{{ $kalender->judul }}</h3>
                <p>{{ $kalender->keterangan }}</p>
                <span class="event-category {{ $kalender->kategori_class }}">
                    <i class="fas fa-tag"></i> {{ $kalender->kategori_label }}
                </span>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Semester Genap -->
        @if($kalenderGenap->count() > 0)
        <h2 class="semester-title"><i class="fas fa-calendar-week"></i> Semester Genap (Januari - Juni 2025)</h2>
        <div class="calendar-grid">
            @foreach($kalenderGenap as $kalender)
            <div class="event-card" data-category="{{ $kalender->kategori }}">
                <span class="event-date">
                    <i class="far fa-calendar"></i> {{ $kalender->tanggal_format }}
                </span>
                <h3>{{ $kalender->judul }}</h3>
                <p>{{ $kalender->keterangan }}</p>
                <span class="event-category {{ $kalender->kategori_class }}">
                    <i class="fas fa-tag"></i> {{ $kalender->kategori_label }}
                </span>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Jika tidak ada data -->
        @if($kalenderGanjil->count() == 0 && $kalenderGenap->count() == 0)
        <div class="no-results">
            <i class="fas fa-calendar-times"></i>
            <p>Belum ada kalender pendidikan yang tersedia</p>
        </div>
        @endif

        <!-- Info Box -->
        <div class="calendar-header" style="margin-top: 60px; background: linear-gradient(135deg, rgba(243,156,18,0.1), rgba(26,95,58,0.1)); border-left: 5px solid var(--secondary-color);">
            <h3 style="color: var(--secondary-color); margin-bottom: 15px;"><i class="fas fa-info-circle"></i> Catatan Penting</h3>
            <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-dark);">
                <li style="margin-bottom: 10px; padding-left: 30px; position: relative;">
                    <i class="fas fa-check-circle" style="position: absolute; left: 0; color: var(--secondary-color);"></i>
                    <strong>Jadwal dapat berubah</strong> sesuai kebijakan pemerintah dan keputusan madrasah
                </li>
                <li style="margin-bottom: 10px; padding-left: 30px; position: relative;">
                    <i class="fas fa-check-circle" style="position: absolute; left: 0; color: var(--secondary-color);"></i>
                    <strong>Update rutin</strong> akan diberikan melalui website dan aplikasi mobile madrasah
                </li>
                <li style="margin-bottom: 10px; padding-left: 30px; position: relative;">
                    <i class="fas fa-check-circle" style="position: absolute; left: 0; color: var(--secondary-color);"></i>
                    <strong>Libur nasional</strong> dapat ditambah sesuai penetapan pemerintah yang terakhir
                </li>
                <li style="padding-left: 30px; position: relative;">
                    <i class="fas fa-check-circle" style="position: absolute; left: 0; color: var(--secondary-color);"></i>
                    Untuk informasi lebih detail, hubungi <strong>bagian kurikulum atau tata usaha madrasah</strong>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- Download & Share Section -->
<section style="padding: 60px 20px; background: white; text-align: center;">
    <div class="container">
        <h2 style="font-size: 28px; color: var(--primary-color); margin-bottom: 30px;">
            <i class="fas fa-download"></i> Unduh Kalender Pendidikan
        </h2>
        <div style="display: flex; gap: 15px; flex-wrap: wrap; justify-content: center;">
            <button onclick="window.print()" style="padding: 12px 30px; background: var(--primary-color); color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-print"></i> Cetak PDF
            </button>
        </div>
    </div>
</section>

<script>
    // ==================== FILTER FUNCTIONALITY ==================== 
    const filterBtns = document.querySelectorAll('.filter-btn');
    const eventCards = document.querySelectorAll('.event-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            eventCards.forEach((card, index) => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    card.style.display = '';
                    card.style.animation = 'none';
                    setTimeout(() => {
                        card.style.animation = `fadeInUp 0.5s ease-out ${index * 0.1}s both`;
                    }, 10);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Smooth scroll
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