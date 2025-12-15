@extends('layouts.app')

@section('title', 'Jadwal Pelajaran - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/jadwal.css') }}">

<!-- Hero Section -->
<section class="hero-jadwal">
    <div class="container d-flex align-items-center justify-content-center min-vh-50">
        <div class="hero-jadwal-content text-center w-100">
            <h1>Jadwal Pelajaran</h1>
            <p>Jadwal pembelajaran untuk seluruh kelas MTsN 1 Magetan</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="jadwal-content-section">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            @foreach($kelasList as $index => $kelas)
            <button class="filter-tab {{ $index === 0 ? 'active' : '' }}" data-kelas="{{ $kelas }}">
                <i class="fas fa-users"></i>
                Kelas {{ $kelas }}
            </button>
            @endforeach
        </div>

        <!-- Jadwal Containers -->
        @foreach($kelasList as $index => $kelas)
        <div class="jadwal-container" id="jadwal-kelas-{{ $kelas }}" style="{{ $index !== 0 ? 'display: none;' : '' }}">
            <div class="jadwal-header">
                <i class="fas fa-clock"></i>
                <h2>Jadwal Kelas {{ $kelas }}</h2>
            </div>
            
            @if(isset($jadwal[$kelas]) && count($jadwal[$kelas]) > 0)
            <div class="table-responsive">
                <table class="jadwal-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hourglass-half"></i> Jam</th>
                            @foreach($hariList as $hari)
                            <th>{{ $hari }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
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
                            uasort($allTimes, function($a, $b) {
                                return $a['urutan'] - $b['urutan'];
                            });
                        @endphp
                        
                        @foreach($allTimes as $timeKey => $time)
                        <tr>
                            <td class="time-cell">
                                <span class="waktu-badge">
                                    {{ $time['jam_mulai'] }} - {{ $time['jam_selesai'] }}
                                </span>
                            </td>
                            @foreach($hariList as $hari)
                            <td class="mapel-cell">
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
                                        <span class="istirahat-badge">
                                            <i class="fas fa-coffee"></i> ISTIRAHAT
                                        </span>
                                    @else
                                        <span class="mapel-badge">
                                            <i class="fas fa-book"></i>
                                            {{ $found->mata_pelajaran }}
                                        </span>
                                    @endif
                                @else
                                    <span class="empty-cell">-</span>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="keterangan-box">
                <div class="keterangan-header">
                    <i class="fas fa-info-circle"></i>
                    <h3>Keterangan</h3>
                </div>
                <div class="keterangan-body">
                    <p>
                        <i class="fas fa-exclamation-triangle"></i>
                        Jadwal dapat berubah sewaktu-waktu. Mohon sesuaikan dengan arahan dari wali kelas masing-masing. 
                        Untuk informasi lebih lanjut, silakan hubungi bagian akademik sekolah.
                    </p>
                </div>
            </div>
            @else
            <div class="empty-jadwal">
                <i class="fas fa-calendar-times"></i>
                <h3>Jadwal Belum Tersedia</h3>
                <p>Jadwal untuk Kelas {{ $kelas }} belum tersedia.</p>
                <p>Silakan hubungi wali kelas untuk informasi lebih lanjut.</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section>

<script src="{{ asset('js/jadwal.js') }}"></script>

@endsection