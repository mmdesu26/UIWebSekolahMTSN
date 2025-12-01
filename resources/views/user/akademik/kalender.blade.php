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

        .akademik-hero h1 {
            font-size: 28px;
        }

        .akademik-hero p {
            font-size: 14px;
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

    @media (max-width: 480px) {
        .akademik-hero {
            min-height: 45vh;
        }

        .akademik-hero h1 {
            font-size: 22px;
        }

        .akademik-hero p {
            font-size: 12px;
        }

        .breadcrumb {
            font-size: 11px;
            padding: 6px 12px;
            gap: 8px;
        }

        .calendar-grid {
            gap: 10px;
        }

        .event-card {
            padding: 15px;
            border-left-width: 4px;
        }

        .event-date {
            padding: 6px 10px;
            font-size: 11px;
        }

        .event-card h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .event-card p {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .event-category {
            font-size: 11px;
            padding: 4px 10px;
        }

        .semester-title {
            font-size: 18px;
            margin: 25px 0 15px 0;
        }

        .calendar-header {
            padding: 15px;
        }

        .calendar-header h2 {
            font-size: 18px;
        }

        .calendar-header p {
            font-size: 12px;
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .akademik-hero,
        .calendar-filters {
            display: none;
        }

        .event-card {
            page-break-inside: avoid;
            box-shadow: none;
            border: 1px solid var(--border-color);
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
        .calendar-header,
        .event-card {
            background: #2c3e50;
            color: #ecf0f1;
        }

        .event-card h3 {
            color: #ecf0f1;
        }

        .calendar-header h2 {
            color: #f39c12;
        }

        .event-card p {
            color: #bdc3c7;
        }

        .semester-title {
            color: #f39c12;
        }

        .filter-btn {
            background: #34495e;
            color: #ecf0f1;
            border-color: #7f8c8d;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: white;
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
        <h2 class="semester-title"><i class="fas fa-calendar-week"></i> Semester Ganjil (Juli - Desember 2024)</h2>
        <div class="calendar-grid">
            
            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 15 - 20 Juli 2024</span>
                <h3>Masa Pengenalan Lingkungan Sekolah (MPLS)</h3>
                <p>Kegiatan orientasi untuk siswa baru kelas 7 mengenal lingkungan sekolah, peraturan yang berlaku, dan membangun bonding dengan sesama siswa.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="akademik">
                <span class="event-date"><i class="far fa-calendar"></i> 22 Juli 2024</span>
                <h3>Awal Tahun Ajaran Baru</h3>
                <p>Pelaksanaan pembelajaran semester ganjil dimulai untuk seluruh siswa kelas 7, 8, dan 9 dengan kurikulum yang telah disiapkan.</p>
                <span class="event-category cat-akademik"><i class="fas fa-book"></i> Akademik</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 17 Agustus 2024</span>
                <h3>Peringatan HUT RI ke-79</h3>
                <p>Libur nasional untuk memperingati Hari Kemerdekaan Republik Indonesia dengan upacara bendera dan berbagai lomba di sekolah.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur Nasional</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 16 September 2024</span>
                <h3>Maulid Nabi Muhammad SAW</h3>
                <p>Peringatan Maulid Nabi dengan kegiatan istighosah, ceramah inspiratif, dan berbagai lomba keagamaan yang melibatkan seluruh siswa.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 2 Oktober 2024</span>
                <h3>Hari Jadi Madrasah</h3>
                <p>Perayaan hari jadi madrasah dengan berbagai kegiatan seni, budaya, dan aksi siswa yang menampilkan bakat-bakat terbaik mereka.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="akademik">
                <span class="event-date"><i class="far fa-calendar"></i> 14 - 25 Oktober 2024</span>
                <h3>Penilaian Tengah Semester (PTS)</h3>
                <p>Ujian tengah semester ganjil untuk evaluasi hasil pembelajaran siswa selama setengah semester dengan menggunakan berbagai metode penilaian.</p>
                <span class="event-category cat-akademik"><i class="fas fa-book"></i> Akademik</span>
            </div>

            <div class="event-card" data-category="ujian">
                <span class="event-date"><i class="far fa-calendar"></i> 25 Nov - 6 Des 2024</span>
                <h3>Penilaian Akhir Semester (PAS)</h3>
                <p>Ujian akhir semester ganjil untuk evaluasi komprehensif hasil belajar siswa selama satu semester penuh.</p>
                <span class="event-category cat-ujian"><i class="fas fa-clipboard-check"></i> Ujian</span>
            </div>

            <div class="event-card" data-category="penting">
                <span class="event-date"><i class="far fa-calendar"></i> 20 Desember 2024</span>
                <h3>Penerimaan Rapor Semester Ganjil</h3>
                <p>Pembagian rapor hasil belajar semester ganjil kepada siswa dan orang tua/wali murid sebagai bentuk transparansi akademik.</p>
                <span class="event-category cat-penting"><i class="fas fa-exclamation-circle"></i> Penting</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 23 Des 2024 - 5 Jan 2025</span>
                <h3>Libur Semester Ganjil & Akhir Tahun</h3>
                <p>Libur akhir semester ganjil sekaligus libur Natal dan Tahun Baru 2025 untuk istirahat dan persiapan semester genap.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur</span>
            </div>

        </div>

        <!-- Semester Genap -->
        <h2 class="semester-title"><i class="fas fa-calendar-week"></i> Semester Genap (Januari - Juni 2025)</h2>
        <div class="calendar-grid">
            
            <div class="event-card" data-category="akademik">
                <span class="event-date"><i class="far fa-calendar"></i> 6 Januari 2025</span>
                <h3>Awal Semester Genap</h3>
                <p>Pelaksanaan pembelajaran semester genap dimulai setelah libur semester dengan materi dan program belajar yang telah disusun.</p>
                <span class="event-category cat-akademik"><i class="fas fa-book"></i> Akademik</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 29 Januari 2025</span>
                <h3>Tahun Baru Imlek 2576</h3>
                <p>Libur nasional dalam rangka perayaan Tahun Baru Imlek sebagai bentuk penghormatan terhadap keberagaman budaya Indonesia.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur Nasional</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 10 Februari 2025</span>
                <h3>Hari Isra dan Miraj Nabi Muhammad SAW</h3>
                <p>Peringatan Isra dan Miraj dengan kegiatan doa bersama, ceramah spiritual, dan menciptakan suasana yang khidmat dan bermakna.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="akademik">
                <span class="event-date"><i class="far fa-calendar"></i> 17 - 28 Februari 2025</span>
                <h3>Penilaian Tengah Semester (PTS)</h3>
                <p>Ujian tengah semester genap untuk mengukur pencapaian belajar siswa di pertengahan semester dengan standar penilaian yang sama.</p>
                <span class="event-category cat-akademik"><i class="fas fa-book"></i> Akademik</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 2 - 15 Maret 2025</span>
                <h3>Bulan Ramadhan 1446 H</h3>
                <p>Kegiatan pesantren ramadhan, tadarus Al-Qur'an setiap hari, iftar bersama, dan berbagai kegiatan keagamaan lainnya yang mendalam dan berkualitas.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 16 - 22 Maret 2025</span>
                <h3>Libur Hari Raya Idul Fitri 1446 H</h3>
                <p>Libur lebaran untuk merayakan Hari Raya Idul Fitri bersama keluarga dengan tradisi mudik dan berkumpul dengan orang tercinta.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 1 April 2025</span>
                <h3>Hari Raya Idul Adha 1446 H</h3>
                <p>Peringatan Hari Raya Idul Adha dengan kegiatan ibadah, berbagi qurban, dan mendekatkan diri kepada Allah SWT dalam pengorbanan.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

                        <div class="event-card" data-category="penting">
                <span class="event-date"><i class="far fa-calendar"></i> 14 - 19 April 2025</span>
                <h3>Try Out Ujian Nasional</h3>
                <p>Latihan soal ujian nasional untuk kelas 9 guna mempersiapkan mereka menghadapi ujian sebenarnya dengan situasi yang sama.</p>
                <span class="event-category cat-penting"><i class="fas fa-exclamation-circle"></i> Penting</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 25 April 2025</span>
                <h3>Tahun Baru Hijriyah 1447 H</h3>
                <p>Libur nasional untuk merayakan pergantian tahun Hijriyah dengan kegiatan doa dan refleksi spiritual di sekolah.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur Nasional</span>
            </div>

            <div class="event-card" data-category="ujian">
                <span class="event-date"><i class="far fa-calendar"></i> 12 - 23 Mei 2025</span>
                <h3>Ujian Akhir Madrasah (UAM)</h3>
                <p>Ujian akhir untuk siswa kelas 9 sebagai syarat kelulusan dari MTsN 1 Magetan dengan materi yang telah dipelajari selama 3 tahun.</p>
                <span class="event-category cat-ujian"><i class="fas fa-clipboard-check"></i> Ujian</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 22 Mei 2025</span>
                <h3>Libur Hari Raya Waisak</h3>
                <p>Libur nasional untuk merayakan Hari Raya Waisak sebagai bentuk menghormati keberagaman agama dan kepercayaan di Indonesia.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur Nasional</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 27 Mei 2025</span>
                <h3>Hari Kebangkitan Nasional</h3>
                <p>Peringatan Hari Kebangkitan Nasional dengan upacara dan kegiatan edukatif tentang semangat perjuangan para pahlawan nasional.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="ujian">
                <span class="event-date"><i class="far fa-calendar"></i> 2 - 12 Juni 2025</span>
                <h3>Penilaian Akhir Tahun (PAT)</h3>
                <p>Ujian akhir tahun untuk kelas 7 dan 8 sebagai evaluasi pembelajaran selama dua semester penuh dalam satu tahun ajaran.</p>
                <span class="event-category cat-ujian"><i class="fas fa-clipboard-check"></i> Ujian</span>
            </div>

            <div class="event-card" data-category="penting">
                <span class="event-date"><i class="far fa-calendar"></i> 16 Juni 2025</span>
                <h3>Pengumuman Kelulusan</h3>
                <p>Pengumuman resmi kelulusan siswa kelas 9 setelah melalui serangkaian ujian dan penilaian yang komprehensif selama tahun ajaran.</p>
                <span class="event-category cat-penting"><i class="fas fa-exclamation-circle"></i> Penting</span>
            </div>

            <div class="event-card" data-category="kegiatan">
                <span class="event-date"><i class="far fa-calendar"></i> 19 Juni 2025</span>
                <h3>Upacara Kelulusan</h3>
                <p>Acara wisuda dan upacara kelulusan siswa kelas 9 dihadiri oleh orang tua, guru, dan seluruh pihak yang telah mendukung perjalanan pendidikan mereka.</p>
                <span class="event-category cat-kegiatan"><i class="fas fa-star"></i> Kegiatan</span>
            </div>

            <div class="event-card" data-category="penting">
                <span class="event-date"><i class="far fa-calendar"></i> 20 Juni 2025</span>
                <h3>Penerimaan Rapor & Libur Kenaikan Kelas</h3>
                <p>Pembagian rapor semester genap untuk kelas 7 dan 8, sekaligus dimulainya libur kenaikan kelas untuk persiapan tahun ajaran berikutnya.</p>
                <span class="event-category cat-penting"><i class="fas fa-exclamation-circle"></i> Penting</span>
            </div>

            <div class="event-card" data-category="libur">
                <span class="event-date"><i class="far fa-calendar"></i> 20 Juni - 13 Juli 2025</span>
                <h3>Libur Kenaikan Kelas</h3>
                <p>Masa libur panjang untuk istirahat, refreshing, dan persiapan menghadapi tahun ajaran baru dengan semangat dan energi yang baru.</p>
                <span class="event-category cat-libur"><i class="fas fa-palm-tree"></i> Libur</span>
            </div>

        </div>

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
            <a href="#" onclick="return false;" style="padding: 12px 30px; background: var(--secondary-color); color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 10px; transition: 0.3s; cursor: pointer;">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
        </div>
    </div>
</section>

<script>
    // ==================== FILTER FUNCTIONALITY ==================== 
    const filterBtns = document.querySelectorAll('.filter-btn');
    const eventCards = document.querySelectorAll('.event-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active state
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');

            // Animate cards
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

    eventCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
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
    filterBtns.forEach(btn => {
        btn.setAttribute('role', 'button');
        btn.setAttribute('tabindex', '0');
        
        btn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                btn.click();
            }
        });
    });

    // ==================== PRINT FUNCTIONALITY ==================== 
    const printBtn = document.querySelector('button[onclick*="print"]');
    if (printBtn) {
        printBtn.addEventListener('click', () => {
            window.print();
        });
    }

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

    // ==================== COPY TO CLIPBOARD ==================== 
    window.copyToClipboard = function(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Teks berhasil disalin ke clipboard!');
        }).catch(() => {
            alert('Gagal menyalin teks');
        });
    };

    // ==================== DARK MODE TOGGLE ==================== 
    const darkModeToggle = document.createElement('button');
    darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    darkModeToggle.style.cssText = `
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 998;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(26, 95, 58, 0.3);
    `;

    darkModeToggle.addEventListener('mouseenter', () => {
        darkModeToggle.style.transform = 'scale(1.1)';
    });

    darkModeToggle.addEventListener('mouseleave', () => {
        darkModeToggle.style.transform = 'scale(1)';
    });

    darkModeToggle.addEventListener('click', () => {
        document.documentElement.style.colorScheme = 
            document.documentElement.style.colorScheme === 'dark' ? 'light' : 'dark';
        
        darkModeToggle.innerHTML = document.documentElement.style.colorScheme === 'dark' 
            ? '<i class="fas fa-sun"></i>' 
            : '<i class="fas fa-moon"></i>';
    });

    // document.body.appendChild(darkModeToggle); // Uncomment jika ingin aktifkan

</script>

@endsection
