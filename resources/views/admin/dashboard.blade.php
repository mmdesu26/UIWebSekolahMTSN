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
        <!-- Recent Guru Card -->
        <div class="data-card">
            <div class="data-card-header">
                <i class="fas fa-users"></i>
                <span>Guru Terbaru</span>
            </div>
            <div class="data-card-body">
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($guruTerbaru ?? [] as $guru)
                                <tr>
                                    <td><strong>{{ $guru['nama'] ?? '-' }}</strong></td>
                                    <td>
                                        <span class="badge badge-primary">
                                            {{ $guru['mata_pelajaran'] ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox"></i>
                                            <p>Belum ada data guru</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tipe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritaTerbaru ?? [] as $berita)
                                <tr>
                                    <td>
                                        <strong title="{{ $berita->title }}">
                                            {{ Str::limit($berita->title, 30) }}
                                        </strong>
                                    </td>
                                    <td>
                                        @if($berita->tipe == 'berita')
                                            <span class="badge badge-info">
                                                Berita
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                Pengumuman
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox"></i>
                                            <p>Belum ada data berita</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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