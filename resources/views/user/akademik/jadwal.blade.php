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
    
    .istirahat-row {
        background: #fff3cd !important;
        font-weight: 600;
        text-align: center;
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
    
    .keterangan-box p {
        color: var(--text-muted);
        line-height: 1.6;
        margin: 0;
    }

    .empty-jadwal {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-muted);
    }

    .empty-jadwal i {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
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
            @foreach($kelasList as $index => $kelas)
            <button class="filter-tab {{ $index === 0 ? 'active' : '' }}" data-kelas="{{ $kelas }}">
                Kelas {{ $kelas }}
            </button>
            @endforeach
        </div>

        @foreach($kelasList as $index => $kelas)
        <div class="jadwal-container" id="jadwal-kelas-{{ $kelas }}" style="{{ $index !== 0 ? 'display: none;' : '' }}">
            <h2 style="color: var(--primary-color); margin-bottom: 20px;">
                <i class="fas fa-clock"></i> Jadwal Kelas {{ $kelas }}
            </h2>
            
            @if(isset($jadwal[$kelas]) && count($jadwal[$kelas]) > 0)
            <table class="jadwal-table">
                <thead>
                    <tr>
                        <th>Jam</th>
                        @foreach($hariList as $hari)
                        <th>{{ $hari }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Ambil semua waktu unik untuk baris
                        $allTimes = [];
                        foreach($jadwal[$kelas] as $hari => $items) {
                            foreach($items as $item) {
                                $timeKey = $item->jam_mulai . '-' . $item->jam_selesai;
                                if(!isset($allTimes[$timeKey])) {
                                    $allTimes[$timeKey] = [
                                        'jam_mulai' => $item->jam_mulai,
                                        'jam_selesai' => $item->jam_selesai,
                                        'urutan' => $item->urutan
                                    ];
                                }
                            }
                        }
                        // Sort by urutan
                        uasort($allTimes, function($a, $b) {
                            return $a['urutan'] - $b['urutan'];
                        });
                    @endphp
                    
                    @foreach($allTimes as $timeKey => $time)
                    <tr>
                        <td><span class="waktu-badge">{{ $time['jam_mulai'] }} - {{ $time['jam_selesai'] }}</span></td>
                        @foreach($hariList as $hari)
                        <td>
                            @php
                                $found = false;
                                if(isset($jadwal[$kelas][$hari])) {
                                    foreach($jadwal[$kelas][$hari] as $item) {
                                        if($item->jam_mulai == $time['jam_mulai'] && $item->jam_selesai == $time['jam_selesai']) {
                                            $found = $item;
                                            break;
                                        }
                                    }
                                }
                            @endphp
                            
                            @if($found)
                                @if($found->is_istirahat)
                                    <span style="background: #ffc107; color: #000; padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600;">ISTIRAHAT</span>
                                @else
                                    <span class="mapel-badge">{{ $found->mata_pelajaran }}</span>
                                @endif
                            @else
                                <span style="color: #ccc;">-</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-jadwal">
                <i class="fas fa-calendar-times"></i>
                <p>Jadwal untuk Kelas {{ $kelas }} belum tersedia.</p>
                <p>Silakan hubungi wali kelas untuk informasi lebih lanjut.</p>
            </div>
            @endif

            <div class="keterangan-box">
                <h3><i class="fas fa-info-circle"></i> Keterangan</h3>
                <p>
                    <i class="fas fa-exclamation-triangle" style="color: var(--warning-color);"></i>
                    Jadwal dapat berubah sewaktu-waktu. Mohon sesuaikan dengan arahan dari wali kelas masing-masing. 
                    Untuk informasi lebih lanjut, silakan hubungi bagian akademik sekolah.
                </p>
            </div>
        </div>
        @endforeach
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