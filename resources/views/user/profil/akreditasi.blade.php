@extends('layouts.app')

@section('title', 'Akreditasi & Prestasi - MTsN 1 Magetan')

@section('content')

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/user/akreditasi.css') }}">

<!-- Hero Section -->
<section class="akreditasi-hero">
    <div class="container">
        <div class="akreditasi-hero-content text-center">
            <h1 data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-trophy" style="margin-right: 15px;"></i>
                Akreditasi & Prestasi
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
                Komitmen Kami Terhadap Standar Pendidikan Berkualitas
            </p>
        </div>
    </div>
</section>

<section class="akreditasi-main py-5">
    <div class="container">
        <div class="akreditasi-showcase" data-aos="fade-up">
            <div class="showcase-content">
                <div class="akreditasi-letter-wrap">
                    <div class="akreditasi-letter">{{ $akreditasi->peringkat ?? 'A' }}</div>
                    <div class="akreditasi-glow"></div>
                </div>
                <div class="showcase-text">
                    <h2>Terakreditasi {{ $akreditasi->peringkat ?? 'A' }} (Unggul)</h2>
                    <h3>Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M)</h3>
                    <p class="lead">
                        MTsN 1 Magetan telah memperoleh predikat 
                        <strong>Terakreditasi {{ $akreditasi->peringkat ?? 'A' }}</strong>
                        berdasarkan SK No. <strong>{{ $akreditasi->nomor_sk ?? '-' }}</strong>
                        tanggal <strong>{{ $akreditasi->tanggal_sk ? \Carbon\Carbon::parse($akreditasi->tanggal_sk)->format('d F Y') : '-' }}</strong>.
                    </p>
                    @if($akreditasi->keterangan)
                        <p>{{ $akreditasi->keterangan }}</p>
                    @endif

                    <div class="akreditasi-details mt-4">
                        <div class="detail-item">
                            <i class="fas fa-calendar-check"></i>
                            <div><strong>Tanggal</strong><p>{{ $akreditasi->tanggal_sk ? \Carbon\Carbon::parse($akreditasi->tanggal_sk)->format('d F Y') : '-' }}</p></div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-star"></i>
                            <div><strong>Peringkat</strong><p>{{ $akreditasi->peringkat ?? 'A' }} (Sangat Baik)</p></div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-certificate"></i>
                            <div><strong>No. SK</strong><p>{{ $akreditasi->nomor_sk ?? '-' }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= PRESTASI SECTION ================= -->
<section class="prestasi-section py-5 bg-light">
    <div class="container">

        <!-- Header -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Prestasi MTsN 1 Magetan</h2>
            <p class="section-subtitle">
                Deretan pencapaian membanggakan siswa-siswi kami
            </p>
        </div>

        @if($prestasi->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                <p class="text-muted">Belum ada prestasi yang tercatat</p>
            </div>
        @else
            <!-- Grid -->
            <div class="prestasi-grid">

                @foreach($prestasi as $item)
                    <div class="prestasi-card"
                         data-aos="fade-up"
                         data-aos-delay="{{ $loop->iteration * 70 }}">

                        <!-- Media -->
                        <div class="prestasi-media">
                            @if($item->gambar)
                                <img src="{{ $item->gambar }}"
                                     alt="{{ $item->nama_prestasi }}">
                            @else
                                <i class="fas fa-medal"></i>
                            @endif
                        </div>

                        <!-- Title -->
                        <h5 class="prestasi-title">
                            {{ $item->nama_prestasi }}
                        </h5>

                    </div>
                @endforeach

            </div>
        @endif

    </div>
</section>

<!-- CTA Section -->
<section class="akreditasi-cta py-5">
    <div class="container">
        <div class="cta-content text-center" data-aos="zoom-in">
            <div class="cta-icon mb-4">
                <i class="fas fa-graduation-cap fa-3x"></i>
            </div>
            <h2>Bergabunglah dengan Madrasah Terakreditasi {{ $akreditasi->peringkat ?? 'A' }}</h2>
            <p class="lead">Daftar sekarang dan jadilah bagian dari keluarga besar MTsN 1 Magetan</p>
            <a href="{{ route('ppdb') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-user-plus"></i> Daftar PPDB Sekarang
            </a>
        </div>
    </div>
</section>

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 800
    });
</script>

@endsection