@extends('layouts.app')

@section('title', 'Kurikulum - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/kurikulum.css') }}">

<!-- Hero Section -->
<section class="hero-kurikulum">
    <div class="container d-flex align-items-center justify-content-center min-vh-50">
        <div class="hero-kurikulum-content text-center w-100">
            <h1>Kurikulum MTsN 1 Magetan</h1>
            <div class="breadcrumb-custom">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('akademik.kurikulum') }}">Akademik</a>
                <span>/</span>
                <span>Kurikulum</span>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="kurikulum-content-section">
    <div class="container">
        @if($kurikulum)
            <!-- Nama Kurikulum -->
            <div class="kurikulum-box">
                <div class="kurikulum-box-header">
                    <i class="fas fa-book-open"></i>
                    <h3>{{ $kurikulum->nama_kurikulum }}</h3>
                </div>
                <div class="kurikulum-box-body">
                    <p>{{ $kurikulum->deskripsi_kurikulum }}</p>
                </div>
            </div>

            <!-- Tujuan Kurikulum -->
            <div class="kurikulum-box">
                <div class="kurikulum-box-header">
                    <i class="fas fa-bullseye"></i>
                    <h3>Tujuan Kurikulum</h3>
                </div>
                <div class="kurikulum-box-body">
                    <ul class="tujuan-list">
                        @foreach(explode("\n", $kurikulum->tujuan_kurikulum) as $tujuan)
                            @if(trim($tujuan))
                                <li>{{ trim($tujuan) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Struktur Mata Pelajaran -->
            <div class="kurikulum-box">
                <div class="kurikulum-box-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Struktur Mata Pelajaran</h3>
                </div>
                <div class="kurikulum-box-body">
                    <!-- Kelompok A -->
                    <h4 class="kelompok-title">Kelompok A (Umum)</h4>
                    <div class="mata-pelajaran-grid">
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-quran"></i>
                            </div>
                            <h5>Al-Qur'an Hadits</h5>
                            <p>4 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <h5>Akidah Akhlak</h5>
                            <p>2 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h5>Fikih</h5>
                            <p>2 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h5>SKI</h5>
                            <p>2 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <h5>Bahasa Arab</h5>
                            <p>3 Jam/Minggu</p>
                        </div>
                    </div>

                    <!-- Kelompok B -->
                    <h4 class="kelompok-title">Kelompok B (Umum)</h4>
                    <div class="mata-pelajaran-grid">
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-flag"></i>
                            </div>
                            <h5>PKn</h5>
                            <p>3 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-spell-check"></i>
                            </div>
                            <h5>Bahasa Indonesia</h5>
                            <p>4 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h5>Bahasa Inggris</h5>
                            <p>3 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h5>Matematika</h5>
                            <p>4 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <h5>IPA</h5>
                            <p>4 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h5>IPS</h5>
                            <p>3 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h5>Seni Budaya</h5>
                            <p>2 Jam/Minggu</p>
                        </div>
                        <div class="mapel-card">
                            <div class="mapel-icon">
                                <i class="fas fa-running"></i>
                            </div>
                            <h5>PJOK</h5>
                            <p>3 Jam/Minggu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projek Penguatan Profil Pelajar Pancasila -->
            <div class="kurikulum-box">
                <div class="kurikulum-box-header">
                    <i class="fas fa-project-diagram"></i>
                    <h3>Projek Penguatan Profil Pelajar Pancasila</h3>
                </div>
                <div class="kurikulum-box-body">
                    <p>{{ $kurikulum->projek_penguatan }}</p>
                </div>
            </div>
        @else
            <!-- No Data -->
            <div class="no-data-container">
                <i class="fas fa-info-circle"></i>
                <h3>Data Kurikulum Belum Tersedia</h3>
                <p>Sistem kurikulum akan segera diisi oleh administrator. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </div>
</section>

<script src="{{ asset('js/kurikulum.js') }}"></script>

@endsection