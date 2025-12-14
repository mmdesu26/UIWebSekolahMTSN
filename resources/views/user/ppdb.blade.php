@extends('layouts.app')

@section('title', 'PPDB - MTsN 1 Magetan')

@section('content')

<!-- Hero Section -->
<div class="ppdb-hero">
    <div class="container">
        <div class="ppdb-hero-content">
            @php
                $today = \Carbon\Carbon::today();
                $status = 'coming_soon';
                if ($ppdb && $ppdb->dibuka && $ppdb->ditutup) {
                    if ($today->between(\Carbon\Carbon::parse($ppdb->dibuka), \Carbon\Carbon::parse($ppdb->ditutup))) {
                        $status = 'open';
                    } elseif ($today->gt(\Carbon\Carbon::parse($ppdb->ditutup))) {
                        $status = 'closed';
                    }
                }
            @endphp

            @if($status == 'open')
                <h1><i class="fas fa-graduation-cap" style="margin-right: 15px;"></i>Penerimaan Peserta Didik Baru</h1>
                <p>{{ $ppdb->judul ?? 'PPDB MTsN 1 Magetan Tahun Ajaran 2025/2026' }}</p>
            @elseif($status == 'coming_soon')
                <h1><i class="fas fa-clock" style="margin-right: 15px;"></i>PPDB Tahun Ajaran Berikutnya</h1>
                <p class="display-4 text-warning mt-4">Coming Soon!</p>
                <p class="lead">Pendaftaran akan dibuka pada {{ \Carbon\Carbon::parse($ppdb->dibuka ?? '2026-02-03')->format('d F Y') }}</p>
            @else
                <h1><i class="fas fa-lock" style="margin-right: 15px;"></i>PPDB Telah Ditutup</h1>
                <p>Terima kasih atas minatnya. Pantau website ini untuk informasi PPDB tahun ajaran berikutnya.</p>
            @endif
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="ppdb-content-section">
    <div class="container">

        @if($status == 'open')
            <!-- Informasi Pendaftaran (Hanya tampil saat BUKA) -->
            <div class="ppdb-section-header">
                <h2><i class="fas fa-info-circle" style="margin-right: 10px;"></i>Informasi Pendaftaran</h2>
                <p>Berikut adalah informasi lengkap mengenai penerimaan peserta didik baru di MTsN 1 Magetan</p>
            </div>

            <!-- Info Cards -->
            <div class="info-cards-grid">
                <div class="info-card">
                    <h4>{{ \Carbon\Carbon::parse($ppdb->dibuka)->format('d M') }} - {{ \Carbon\Carbon::parse($ppdb->ditutup)->format('d M Y') }}</h4>
                    <p>Periode Pendaftaran</p>
                </div>
                <div class="info-card">
                    <h4>{{ $ppdb->kuota ?? '300' }} Siswa</h4>
                    <p>Kuota Penerimaan</p>
                </div>
                <div class="info-card">
                    <h4>Gratis</h4>
                    <p>Biaya Pendaftaran</p>
                </div>
            </div>

            <!-- Timeline Section -->
<div class="timeline-section">
    <div class="timeline-header">
        <h3><i class="fas fa-calendar-check"></i> Jadwal Pendaftaran Siswa Baru</h3>
    </div>
    <div class="timeline-grid">
        @php
            $timelineItems = json_decode($ppdb->timeline ?? '[]', true);
        @endphp
        @forelse($timelineItems as $item)
            <div class="timeline-item">
                <div class="timeline-date">{{ $item['date'] }}</div>
                <div class="timeline-title"><i class="fas fa-pencil"></i> {{ $item['title'] }}</div>
                <p class="timeline-desc">{{ $item['description'] }}</p>
            </div>
        @empty
            <p>Tidak ada jadwal yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>
            </div>

            <!-- Requirements Section -->
            <div class="requirements-section">
                <div class="requirements-header">
                    <i class="fas fa-list-check"></i>
                    <h3>Syarat Pendaftaran</h3>
                </div>
                <div class="requirements-grid">
                    @php
                        $syaratList = explode("\n", $ppdb->persyaratan ?? "Foto copy Akte (1 Lembar)\nFoto copy KK (1 Lembar)\nBagi yang memiliki piagam / sertifikat kejuaraan supaya dilampirkan\nNorek Bank (jika ada)");
                    @endphp
                    @foreach($syaratList as $index => $syarat)
                        @if(trim($syarat))
                            <div class="requirement-item">
                                <div class="requirement-number">{{ $index + 1 }}</div>
                                <div class="requirement-text">{{ trim($syarat) }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- CTA Section -->
            <div class="cta-registration">
                <h3>Siap Bergabung Bersama Kami?</h3>
                <p>Ayo daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar MTsN 1 Magetan!</p>
                <a href="https://forms.gle/MP5nhGic4Zxga8n8" class="register-btn" target="_blank">
                    <i class="fas fa-arrow-right"></i> Mulai Pendaftaran Online
                </a>
                   </div>
        @else
            <!-- Tampilan Coming Soon / Closed -->
            <div class="text-center py-5 my-5">
                <i class="fas fa-clock fa-5x text-muted mb-4"></i>
                <h2 class="text-primary">Informasi PPDB Tahun Ajaran Berikutnya</h2>
                <p class="lead">Akan segera diumumkan. Pantau terus website resmi MTsN 1 Magetan.</p>
                <p>Hubungi kami untuk informasi lebih lanjut:</p>
                </div>
        @endif

        <!-- FAQ Section (Selalu tampil) -->
        <div class="faq-section">
            <div class="faq-header">
                <h3><i class="fas fa-circle-question"></i> Pertanyaan Umum (FAQ)</h3>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Apakah biaya pendaftaran PPDB gratis?
                    </div>
                    <p class="faq-answer">Ya, pendaftaran PPDB di MTsN 1 Magetan GRATIS. Tidak dipungut biaya apapun.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Bagaimana cara mendaftar?
                    </div>
                    <p class="faq-answer">Pendaftaran dilakukan secara online melalui link Google Form resmi yang akan diumumkan saat periode pendaftaran dibuka.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Apa saja ekstrakurikuler yang tersedia?
                    </div>
                    <p class="faq-answer">Pramuka, PMR, Banjari, Drumband, Volly, Futsal, Karate, Taekwondo, Seni Musik, Seni Tari, dan banyak lagi.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Include CSS and JS Files -->
<link rel="stylesheet" href="{{ asset('css/ppdb.css') }}">
<script src="{{ asset('js/ppdb.js') }}"></script>

@endsection