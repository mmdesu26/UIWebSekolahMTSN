@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- STAT CARDS -->
    <div class="stat-cards-grid">
        <!-- Card 1: Total Guru -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-chalkboard-user"></i>
            </div>
            <h3 class="stat-card-number">{{ $totalGuru ?? 0 }}</h3>
            <p class="stat-card-label">Total Guru</p>
        </div>

        <!-- Card 2: Ekstrakurikuler -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-star"></i>
            </div>
            <h3 class="stat-card-number">{{ $totalEkstrakurikuler ?? 0 }}</h3>
            <p class="stat-card-label">Ekstrakurikuler</p>
        </div>

        <!-- Card 3: Berita & Pengumuman -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3 class="stat-card-number">{{ $totalBerita ?? 0 }}</h3>
            <p class="stat-card-label">Berita & Pengumuman</p>
        </div>
    </div>

    <!-- RECENT DATA SECTION -->
    <div class="recent-data-grid">
        <!-- Recent Guru Card - FIXED -->
        <div class="data-card">
            <div class="data-card-header">
                <i class="fas fa-users"></i>
                <span>Guru Terbaru</span>
            </div>
            <div class="data-card-body">
                @if(isset($guruTerbaru) && is_array($guruTerbaru) && count($guruTerbaru) > 0)
                    <div class="guru-list">
                        @foreach(array_slice($guruTerbaru, 0, 6) as $guru)
                            <div class="guru-list-item">
                                <div class="guru-list-item-content">
                                    <div class="guru-list-item-nama">
                                        {{ $guru['nama'] ?? '-' }}
                                    </div>
                                    <span class="guru-mapel-badge">
                                        {{ $guru['mata_pelajaran'] ?? '-' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>Belum ada data guru</p>
                    </div>
                @endif
            </div>
            <div class="btn-group-footer">
                <a href="{{ route('admin.struktur.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right"></i>
                    <span>Lihat Semua Guru</span>
                </a>
            </div>
        </div>

        <!-- Recent Berita Card -->
        <div class="data-card">
            <div class="data-card-header">
                <i class="fas fa-newspaper"></i>
                <span>Berita Terbaru</span>
            </div>
            <div class="data-card-body">
                @if(isset($beritaTerbaru) && count($beritaTerbaru) > 0)
                    <div class="berita-list">
                        @foreach($beritaTerbaru as $berita)
                            <div class="berita-list-item">
                                <div class="berita-list-item-content">
                                    <div class="berita-list-item-judul">
                                        {{ $berita->title ?? '-' }}
                                    </div>
                                    <span class="berita-tipe-badge" style="@if($berita->tipe == 'berita') background: linear-gradient(135deg, #4299e1, #3182ce); @else background: linear-gradient(135deg, #ed8936, #dd6b20); @endif">
                                        {{ $berita->tipe == 'berita' ? 'Berita' : 'Pengumuman' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>Belum ada data berita</p>
                    </div>
                @endif
            </div>
            <div class="btn-group-footer">
                <a href="{{ route('admin.berita') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right"></i>
                    <span>Lihat Semua Berita</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Link to separate CSS file -->
<link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
<!-- Link to separate JavaScript file -->
<script src="{{ asset('js/admin-dashboard.js') }}"></script>

@endsection