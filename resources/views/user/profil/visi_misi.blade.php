@extends('layouts.app')

@section('title', 'Visi & Misi - MTsN 1 Magetan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/visi_misi.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/iconmenu.css') }}">

<!-- Hero Section -->
<section class="hero-visi-misi">
    <div class="hero-visi-misi-wrapper">
        <div class="hero-visi-misi-content">
            <h1>
                <i class="fas fa-bullseye" style="margin-right: 15px;"></i>
                Visi & Misi MTsN 1 Magetan
            </h1>
            <p>Komitmen kami untuk memberikan pendidikan terbaik bagi generasi masa depan</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="visi-misi-content-section">
    <div class="container">
        
        <!-- Visi & Misi Grid -->
        <div class="visi-misi-grid">
            
            <!-- VISI Card -->
            <div class="visi-card">
                <div class="visi-header">
                    <div class="visi-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Visi Kami</h3>
                </div>
                <div class="visi-body">
                    <p>{{ $visiMisi['visi'] ?? 'Visi belum diatur' }}</p>
                </div>
            </div>

            <!-- MISI Card -->
            <div class="misi-card">
                <div class="misi-header">
                    <div class="misi-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3>Misi Kami</h3>
                </div>
                <div class="misi-body">
                    <ul class="misi-list">
                        @if(isset($visiMisi['misi']) && !empty($visiMisi['misi']))
                            @php
                                $misiList = explode("\n", $visiMisi['misi']);
                                $misiList = array_filter(array_map('trim', $misiList));
                                $counter = 0;
                            @endphp
                            @foreach($misiList as $misi)
                                @php $counter++; @endphp
                                <li>
                                    <div class="misi-number">{{ $counter }}</div>
                                    <div class="misi-text">{{ $misi }}</div>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <div class="misi-text">Misi belum diatur</div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            
        </div>

        <!-- Nilai-Nilai Inti Section -->
        <div class="nilai-section">
            <div class="section-intro">
                <h2>Nilai-Nilai Inti Kami</h2>
                <p>Fondasi yang memandu setiap langkah kami dalam memberikan pendidikan berkualitas</p>
            </div>

            <div class="nilai-grid">
                
                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h4>Islami</h4>
                    <p>Menjunjung tinggi nilai-nilai Islam dalam setiap pembelajaran dan aktivitas</p>
                </div>

                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Berprestasi</h4>
                    <p>Selalu berusaha untuk meraih prestasi tertinggi dalam setiap kompetisi dan aktivitas</p>
                </div>

                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Berkelanjutan</h4>
                    <p>Menjaga kelestarian lingkungan untuk generasi mendatang dengan penuh tanggung jawab</p>
                </div>

                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Kolaboratif</h4>
                    <p>Membangun kerjasama yang solid antara siswa, guru, orang tua, dan masyarakat</p>
                </div>

                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Peduli</h4>
                    <p>Menumbuhkan rasa empati dan kepedulian terhadap sesama dan lingkungan sekitar</p>
                </div>

                <div class="nilai-card">
                    <div class="nilai-icon-wrapper">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Inovatif</h4>
                    <p>Terus berinovasi dalam metode pembelajaran untuk hasil yang lebih optimal</p>
                </div>
                
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-visi-misi-section">
            <h3>Mari Bergabung Bersama Kami</h3>
            <p>Wujudkan impian pendidikan terbaik untuk anak Anda di MTsN 1 Magetan</p>
            <a href="{{ route('ppdb') }}" class="btn-visi-misi-daftar">
                <i class="fas fa-edit"></i> Daftar Sekarang
            </a>
        </div>
        
    </div>
</section>

<script src="{{ asset('js/visi_misi.js') }}"></script>

@endsection