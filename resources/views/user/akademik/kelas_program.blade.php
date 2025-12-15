@extends('layouts.app')

@section('title', 'Kelas Program - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/kelas_program.css') }}">

<!-- Hero Section -->
<section class="hero-program" id="hero">
    <div class="hero-program-wrapper">
        <div class="hero-program-content">
            <h1>
                <i class="fas fa-chalkboard-teacher" style="margin-right: 15px;"></i>
                Kelas-Kelas Program MTsN 1 Magetan
            </h1>
            <p>Program unggulan yang dirancang untuk mengembangkan potensi siswa sesuai minat dan bakat mereka</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="program-content-section">
    <div class="container">
        
        <!-- Program Unggulan Section -->
        @if($programUnggulan->count() > 0)
        <div class="section-intro-program">
            <h2>Program Unggulan MTsN 1 Magetan</h2>
            <p>
                Program-program unggulan yang telah terbukti menghasilkan lulusan berkualitas dan berprestasi. 
                Setiap program dirancang dengan standar tinggi untuk mempersiapkan siswa menghadapi tantangan masa depan.
            </p>
        </div>

        <div class="program-unggulan-grid">
            @foreach($programUnggulan as $program)
            <div class="program-unggulan-card">
                <div class="program-unggulan-header">
                    <div class="program-unggulan-icon" style="background-color: {{ $program->warna }};">
                        <i class="fas {{ $program->icon_class }}"></i>
                    </div>
                    <h3>{{ $program->nama }}</h3>
                    <p>{{ $program->deskripsi }}</p>
                </div>
                @if($program->fitur && count($program->fitur) > 0)
                <div class="program-unggulan-body">
                    <ul class="program-unggulan-features">
                        @foreach($program->fitur as $fitur)
                        <li>
                            <i class="fas fa-star"></i>
                            <span>{{ $fitur }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <!-- Divider -->
        <div class="section-divider"></div>
        @endif
        
        <!-- Intro Kelas -->
        @if($programKelas->count() > 0)
        <div class="section-intro-program">
            <h2>Pilih Kelas Sesuai Minat Anda</h2>
            <p>
                MTsN 1 Magetan menyediakan berbagai kelas unggulan yang dirancang khusus 
                untuk mengoptimalkan potensi siswa. Setiap program dilengkapi dengan fasilitas modern, 
                tenaga pengajar profesional, dan kurikulum yang telah disesuaikan dengan kebutuhan masa depan.
            </p>
        </div>
        
        <!-- Program Grid -->
        <div class="program-grid">
            @foreach($programKelas as $program)
            <div class="program-card">
                <div class="program-header">
                    <div class="program-icon" style="background-color: {{ $program->warna }};">
                        <i class="fas {{ $program->icon_class }}"></i>
                    </div>
                    <h3>{{ $program->nama }}</h3>
                    <p>{{ $program->deskripsi }}</p>
                </div>
                @if($program->fitur && count($program->fitur) > 0)
                <div class="program-body">
                    <ul class="program-features">
                        @foreach($program->fitur as $fitur)
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>{{ $fitur }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        @if($programUnggulan->count() == 0 && $programKelas->count() == 0)
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h3>Belum Ada Program</h3>
            <p>Saat ini belum ada program yang tersedia. Silakan cek kembali nanti.</p>
        </div>
        @endif
        
        <!-- CTA Section -->
        <div class="cta-program-section">
            <h3>Siap Bergabung dengan Kami?</h3>
            <p>Daftarkan diri Anda sekarang dan raih masa depan gemilang bersama MTsN 1 Magetan!</p>
            <a href="{{ route('ppdb') }}" class="btn-program-daftar">
                <i class="fas fa-edit"></i> Daftar Sekarang
            </a>
        </div>
        
    </div>
</section>

<script src="{{ asset('js/kelas_program.js') }}"></script>

@endsection