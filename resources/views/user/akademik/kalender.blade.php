@extends('layouts.app')

@section('title', 'Kalender Pendidikan - MTsN 1 Magetan')

@section('content')
<style>
    .akademik-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 60px 0;
        text-align: center;
    }
    
    .akademik-hero h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Playfair Display', serif;
    }
    
    .breadcrumb {
        background: rgba(255,255,255,0.1);
        padding: 10px 20px;
        border-radius: 25px;
        display: inline-flex;
        gap: 10px;
        margin-top: 15px;
    }
    
    .breadcrumb a {
        color: white;
        text-decoration: none;
    }
    
    .content-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .calendar-header {
        background: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
    }
    
    .event-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        border-left: 4px solid var(--accent-color);
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s;
    }
    
    .event-card:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 30px rgba(26,95,58,0.15);
    }
    
    .event-date {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .event-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 10px;
    }
    
    .event-card p {
        color: var(--text-muted);
        font-size: 14px;
        margin: 0;
        line-height: 1.6;
    }
    
    .event-category {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
    }
    
    .cat-libur { background: #ffe5e5; color: #e74c3c; }
    .cat-ujian { background: #fff3cd; color: #f39c12; }
    .cat-kegiatan { background: #d4edda; color: #28a745; }
    .cat-penting { background: #d1ecf1; color: #17a2b8; }

    @media (max-width: 768px) {
        .akademik-hero h1 { font-size: 32px; }
        .calendar-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="akademik-hero">
    <div class="container">
        <h1>Kalender Pendidikan 2024/2025</h1>
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            <span>/</span>
            <span>Kalender Pendidikan</span>
        </div>
    </div>
</div>

<section class="content-section">
    <div class="container">
        <div class="calendar-header">
            <h2 style="color: var(--primary-color); margin-bottom: 10px;"><i class="fas fa-calendar-alt"></i> Tahun Ajaran 2024/2025</h2>
            <p style="color: var(--text-muted); margin: 0;">Berikut adalah kalender kegiatan akademik dan non-akademik MTsN 1 Magetan</p>
        </div>

        <h3 style="margin-bottom: 25px; color: var(--dark-text);"><i class="fas fa-calendar-week"></i> Semester Ganjil</h3>
        <div class="calendar-grid">
            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 15 - 20 Juli 2024</span>
                <h3>Masa Pengenalan Lingkungan Sekolah (MPLS)</h3>
                <p>Kegiatan orientasi untuk siswa baru kelas 7 mengenal lingkungan sekolah dan peraturan yang berlaku.</p>
                <span class="event-category cat-kegiatan">Kegiatan</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 22 Juli 2024</span>
                <h3>Awal Tahun Ajaran Baru</h3>
                <p>Pelaksanaan pembelajaran semester ganjil dimulai untuk seluruh siswa kelas 7, 8, dan 9.</p>
                <span class="event-category cat-penting">Penting</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 17 Agustus 2024</span>
                <h3>Peringatan HUT RI ke-79</h3>
                <p>Upacara bendera dan berbagai lomba dalam rangka memperingati Hari Kemerdekaan Republik Indonesia.</p>
                <span class="event-category cat-libur">Libur Nasional</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 16 September 2024</span>
                <h3>Maulid Nabi Muhammad SAW</h3>
                <p>Peringatan Maulid Nabi dengan kegiatan istighosah, ceramah, dan lomba keagamaan.</p>
                <span class="event-category cat-kegiatan">Kegiatan</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 25 Nov - 6 Des 2024</span>
                <h3>Penilaian Akhir Semester (PAS)</h3>
                <p>Ujian akhir semester ganjil untuk evaluasi hasil belajar siswa selama satu semester.</p>
                <span class="event-category cat-ujian">Ujian</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 20 Desember 2024</span>
                <h3>Penerimaan Rapor Semester Ganjil</h3>
                <p>Pembagian rapor hasil belajar semester ganjil kepada siswa dan orang tua/wali murid.</p>
                <span class="event-category cat-penting">Penting</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 23 Des 2024 - 5 Jan 2025</span>
                <h3>Libur Semester Ganjil</h3>
                <p>Libur akhir semester ganjil sekaligus libur Natal dan Tahun Baru 2025.</p>
                <span class="event-category cat-libur">Libur</span>
            </div>
        </div>

        <h3 style="margin-top: 50px; margin-bottom: 25px; color: var(--dark-text);"><i class="fas fa-calendar-week"></i> Semester Genap</h3>
        <div class="calendar-grid">
            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 6 Januari 2025</span>
                <h3>Awal Semester Genap</h3>
                <p>Pelaksanaan pembelajaran semester genap dimulai setelah libur semester.</p>
                <span class="event-category cat-penting">Penting</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 29 Januari 2025</span>
                <h3>Tahun Baru Imlek 2576</h3>
                <p>Libur nasional dalam rangka perayaan Tahun Baru Imlek.</p>
                <span class="event-category cat-libur">Libur Nasional</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 2 - 15 Maret 2025</span>
                <h3>Bulan Ramadhan 1446 H</h3>
                <p>Kegiatan pesantren ramadhan, tadarus Al-Qur'an, dan berbagai kegiatan keagamaan lainnya.</p>
                <span class="event-category cat-kegiatan">Kegiatan</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 12 - 23 Mei 2025</span>
                <h3>Ujian Akhir Madrasah (UAM)</h3>
                <p>Ujian akhir untuk siswa kelas 9 sebagai syarat kelulusan dari MTsN 1 Magetan.</p>
                <span class="event-category cat-ujian">Ujian</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 2 - 12 Juni 2025</span>
                <h3>Penilaian Akhir Tahun (PAT)</h3>
                <p>Ujian akhir tahun untuk kelas 7 dan 8 sebagai evaluasi pembelajaran selama dua semester.</p>
                <span class="event-category cat-ujian">Ujian</span>
            </div>

            <div class="event-card">
                <span class="event-date"><i class="far fa-calendar"></i> 20 Juni 2025</span>
                <h3>Penerimaan Rapor & Libur Semester</h3>
                <p>Pembagian rapor semester genap dan dimulainya masa libur kenaikan kelas.</p>
                <span class="event-category cat-penting">Penting</span>
            </div>
        </div>
    </div>
</section>

<script>
    // Fade in animation
    const cards = document.querySelectorAll('.event-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        entry.target.style.transition = 'all 0.5s';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            }
        });
    });
    
    cards.forEach(card => observer.observe(card));
</script>
@endsection