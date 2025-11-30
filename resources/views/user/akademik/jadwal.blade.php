@extends('layouts.app')

@section('title', 'Jadwal Pelajaran - MTsN 1 Magetan')

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
        background: white;
    }
    
    .filter-tabs {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }
    
    .filter-tab {
        background: #f0f0f0;
        border: 2px solid transparent;
        padding: 10px 25px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        color: var(--dark-text);
        transition: all 0.3s;
    }
    
    .filter-tab:hover,
    .filter-tab.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    .jadwal-container {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .jadwal-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .jadwal-table thead {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }
    
    .jadwal-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }
    
    .jadwal-table td {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        font-size: 14px;
    }
    
    .jadwal-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .jadwal-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .mapel-badge {
        display: inline-block;
        background: var(--accent-color);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .waktu-badge {
        background: #e9ecef;
        color: var(--dark-text);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .keterangan-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-top: 30px;
        border: 2px solid #e9ecef;
    }
    
    .keterangan-box h3 {
        color: var(--primary-color);
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .keterangan-box ul {
        list-style: none;
        padding: 0;
    }
    
    .keterangan-box li {
        padding: 8px 0;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .keterangan-box li i {
        color: var(--accent-color);
    }

    @media (max-width: 768px) {
        .akademik-hero h1 { font-size: 32px; }
        .jadwal-container { padding: 15px; overflow-x: auto; }
        .jadwal-table { min-width: 600px; }
        .jadwal-table th, .jadwal-table td { padding: 10px; font-size: 13px; }
    }
</style>

<div class="akademik-hero">
    <div class="container">
        <h1>Jadwal Pelajaran</h1>
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            <span>/</span>
            <span>Jadwal Pelajaran</span>
        </div>
    </div>
</div>

<section class="content-section">
    <div class="container">
        <div class="filter-tabs">
            <button class="filter-tab active" data-kelas="7">Kelas 7</button>
            <button class="filter-tab" data-kelas="8">Kelas 8</button>
            <button class="filter-tab" data-kelas="9">Kelas 9</button>
        </div>

        <div class="jadwal-container" id="jadwal-kelas-7">
            <h2 style="color: var(--primary-color); margin-bottom: 20px;"><i class="fas fa-clock"></i> Jadwal Kelas 7A</h2>
            
            <table class="jadwal-table">
                <thead>
                    <tr>
                        <th>Jam</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="waktu-badge">07.00 - 07.40</span></td>
                        <td><span class="mapel-badge">Al-Qur'an Hadits</span></td>
                        <td><span class="mapel-badge">Matematika</span></td>
                        <td><span class="mapel-badge">IPA</span></td>
                        <td><span class="mapel-badge">Bahasa Indonesia</span></td>
                        <td><span class="mapel-badge">PKn</span></td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">07.40 - 08.20</span></td>
                        <td><span class="mapel-badge">Al-Qur'an Hadits</span></td>
                        <td><span class="mapel-badge">Matematika</span></td>
                        <td><span class="mapel-badge">IPA</span></td>
                        <td><span class="mapel-badge">Bahasa Indonesia</span></td>
                        <td><span class="mapel-badge">PKn</span></td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">08.20 - 09.00</span></td>
                        <td><span class="mapel-badge">Bahasa Arab</span></td>
                        <td><span class="mapel-badge">IPS</span></td>
                        <td><span class="mapel-badge">Bahasa Inggris</span></td>
                        <td><span class="mapel-badge">Fikih</span></td>
                        <td><span class="mapel-badge">Matematika</span></td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">09.00 - 09.20</span></td>
                        <td colspan="5" style="text-align: center; background: #fff3cd; font-weight: 600;">ISTIRAHAT</td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">09.20 - 10.00</span></td>
                        <td><span class="mapel-badge">Bahasa Arab</span></td>
                        <td><span class="mapel-badge">IPS</span></td>
                        <td><span class="mapel-badge">Bahasa Inggris</span></td>
                        <td><span class="mapel-badge">Fikih</span></td>
                        <td><span class="mapel-badge">Seni Budaya</span></td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">10.00 - 10.40</span></td>
                        <td><span class="mapel-badge">SKI</span></td>
                        <td><span class="mapel-badge">PJOK</span></td>
                        <td><span class="mapel-badge">Akidah Akhlak</span></td>
                        <td><span class="mapel-badge">IPA</span></td>
                        <td><span class="mapel-badge">Seni Budaya</span></td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">10.40 - 11.00</span></td>
                        <td colspan="5" style="text-align: center; background: #fff3cd; font-weight: 600;">ISTIRAHAT</td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">11.00 - 11.40</span></td>
                        <td><span class="mapel-badge">SKI</span></td>
                        <td><span class="mapel-badge">PJOK</span></td>
                        <td><span class="mapel-badge">Akidah Akhlak</span></td>
                        <td><span class="mapel-badge">IPS</span></td>
                        <td rowspan="2" style="text-align: center; background: #d4edda; font-weight: 600;">SELESAI</td>
                    </tr>
                    <tr>
                        <td><span class="waktu-badge">11.40 - 12.20</span></td>
                        <td><span class="mapel-badge">Bahasa Indonesia</span></td>
                        <td><span class="mapel-badge">PJOK</span></td>
                        <td><span class="mapel-badge">Matematika</span></td>
                        <td><span class="mapel-badge">Bahasa Inggris</span></td>
                    </tr>
                </tbody>
            </table>

            <div class="keterangan-box">
                <h3><i class="fas fa-info-circle"></i> Keterangan</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Jadwal berlaku mulai Semester Genap 2024/2025</li>
                    <li><i class="fas fa-check-circle"></i> Durasi setiap jam pelajaran: 40 menit</li>
                    <li><i class="fas fa-check-circle"></i> Istirahat pertama: 09.00 - 09.20 (20 menit)</li>
                    <li><i class="fas fa-check-circle"></i> Istirahat kedua: 10.40 - 11.00 (20 menit)</li>
                    <li><i class="fas fa-check-circle"></i> Hari Jumat: Pembelajaran selesai pukul 11.00</li>
                    <li><i class="fas fa-check-circle"></i> Jadwal dapat berubah sewaktu-waktu</li>
                </ul>
            </div>
        </div>

        <div class="jadwal-container" id="jadwal-kelas-8" style="display: none;">
            <h2 style="color: var(--primary-color); margin-bottom: 20px;"><i class="fas fa-clock"></i> Jadwal Kelas 8A</h2>
            <p style="text-align: center; padding: 40px; color: var(--text-muted);">Jadwal untuk Kelas 8 sedang dalam proses penyusunan. Silakan hubungi wali kelas untuk informasi lebih lanjut.</p>
        </div>

        <div class="jadwal-container" id="jadwal-kelas-9" style="display: none;">
            <h2 style="color: var(--primary-color); margin-bottom: 20px;"><i class="fas fa-clock"></i> Jadwal Kelas 9A</h2>
            <p style="text-align: center; padding: 40px; color: var(--text-muted);">Jadwal untuk Kelas 9 sedang dalam proses penyusunan. Silakan hubungi wali kelas untuk informasi lebih lanjut.</p>
        </div>
    </div>
</section>

<script>
    // Filter tabs functionality
    const filterTabs = document.querySelectorAll('.filter-tab');
    const jadwalContainers = document.querySelectorAll('.jadwal-container');

    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const kelas = tab.dataset.kelas;
            
            // Update active tab
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            // Show corresponding jadwal
            jadwalContainers.forEach(container => {
                container.style.display = 'none';
            });
            document.getElementById(`jadwal-kelas-${kelas}`).style.display = 'block';
            
            // Fade in animation
            const activeContainer = document.getElementById(`jadwal-kelas-${kelas}`);
            activeContainer.style.opacity = '0';
            activeContainer.style.transform = 'translateY(20px)';
            setTimeout(() => {
                activeContainer.style.transition = 'all 0.5s';
                activeContainer.style.opacity = '1';
                activeContainer.style.transform = 'translateY(0)';
            }, 50);
        });
    });
</script>
@endsection