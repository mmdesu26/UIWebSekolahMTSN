@extends('layouts.app')

@section('title', 'Beranda - MTsN 1 Magetan')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css?v=' . filemtime(public_path('css/home.css'))) }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/home.js?v=' . filemtime(public_path('js/home.js'))) }}"></script>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <!-- Ganti .container dengan .hero-wrapper agar full width tapi tetap center -->
        <div class="hero-wrapper">
            <div class="hero-content">
                <h1>
                    <i class="fas fa-graduation-cap" style="margin-right: 15px;"></i>
                    {{ $settings['hero_title'] ?? 'Selamat Datang di MTsN 1 Magetan' }}
                </h1>
                <p>Madrasah Hebat Bermartabat – Menuju Generasi Berakhlak Mulia</p>
                <div class="btn-group-hero" style="margin-top: clamp(40px, 6vw, 80px);">
                    <a href="{{ route('ppdb') }}" class="btn btn-primary">
                        Daftar PPDB Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Info Section -->
    <section class="quick-info">
        <div class="container">
            <div class="info-cards">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-award"></i></div>
                    <h3>{{ $settings['akreditasi'] ?? 'Akreditasi A' }}</h3>
                    <p>Terakreditasi A oleh BAN-S/M</p>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-users"></i></div>
                    <h3>{{ $settings['jumlah_siswa'] ?? '1200+ Siswa' }}</h3>
                    <p>Siswa aktif berprestasi</p>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-chalkboard-user"></i></div>
                    <h3>{{ $settings['jumlah_guru'] ?? '80+ Guru' }}</h3>
                    <p>Tenaga pendidik profesional</p>
                </div>
                <div class="info-card info-card-sks">
                    <span class="badge-sks">UNGGULAN</span>
                    <div class="info-icon icon-sks"><i class="fas fa-book-open"></i></div>
                    <h3>{{ $settings['program_sks'] ?? 'Program SKS 2 Tahun' }}</h3>
                    <p>Lulus dengan Sistem Kredit Semesteran</p>
                    <div class="sks-features">
                        <span class="sks-badge">Fleksibel</span>
                        <span class="sks-badge">Cepat</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="profil">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tentang MTsN 1 Magetan</h2>
                <p class="section-subtitle">Madrasah Tsanawiyah Negeri unggulan di Kabupaten Magetan</p>
            </div>
            <div class="about-content">
                <div class="about-image">
                    @if(isset($settings['about_image']))
                        <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="Gedung MTsN 1 Magetan">
                    @else
                        <img src="https://mtsn1magetan.com/media_library/albums/f3537fc0211418910ae81085977cff0b.jpeg" alt="Gedung MTsN 1 Magetan">
                    @endif
                </div>
                <div class="about-text">
                    <h3>Visi Kami</h3>
                    <p>{{ $settings['visi'] ?? 'Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan' }}</p>

                    <h3>Misi Kami</h3>
                    <ul>
                        @for ($i = 1; $i <= 4; $i++)
                            @if(!empty($settings["misi_{$i}"]))
                                <li>{{ $settings["misi_{$i}"] }}</li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section" id="berita">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Berita & Pengumuman</h2>
                <p class="section-subtitle">Informasi terkini dari MTsN 1 Magetan</p>
            </div>
            <div class="news-grid">
                @forelse($beritaTerbaru as $index => $item)
                    <div class="news-card" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="news-image">
                            <img src="{{ $item->image ?? 'https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita' }}"
                                 alt="{{ $item->title }}">
                            <span class="news-badge {{ $item->tipe == 'pengumuman' ? 'pengumuman' : 'berita' }}">
                                {{ ucfirst($item->tipe ?? 'berita') }}
                            </span>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($item->content, 100) }}</p>
                            <a href="{{ route('berita.detail', $item->slug) }}" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-muted">Belum ada berita atau pengumuman.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- PPDB Section -->
    <section class="ppdb-section" id="ppdb">
        <div class="container">
            <div class="ppdb-content">
                <div class="ppdb-info">
                    <h2>
                        <i class="fas fa-clipboard-list" style="margin-right: 12px;"></i>
                        {{ $settings['ppdb_judul'] ?? 'Penerimaan Peserta Didik Baru' }}
                    </h2>
                    <h3>{{ $settings['ppdb_tahun'] ?? 'Tahun Ajaran 2026/2027' }}</h3>
                    <p>{{ $settings['ppdb_deskripsi'] ?? 'Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!' }}</p>

                    <div class="ppdb-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i><span>Pendaftaran Online Mudah</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i><span>Seleksi Transparan & Adil</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i><span>Biaya Terjangkau & Fleksibel</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i><span>Fasilitas Modern & Lengkap</span>
                        </div>
                    </div>

                    <div class="ppdb-buttons">
                        <a href="{{ route('ppdb') }}" class="btn btn-primary btn-large">Info Lengkap PPDB</a>
                    </div>
                </div>
                <div class="ppdb-image">
                    @if(isset($settings['ppdb_image']) && $settings['ppdb_image'])
                        <img src="{{ asset('storage/' . $settings['ppdb_image']) }}" alt="PPDB MTsN 1 Magetan" class="img-fluid">
                    @else
                        <img src="{{ asset('images/ppdb-default.png') }}" alt="PPDB MTsN 1 Magetan" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section (Hanya Nama Saja) -->
    <section class="ekskul-section" id="ekstrakurikuler">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-star" style="margin-right: 10px;"></i>
                    Ekstrakurikuler
                </h2>
                <p class="section-subtitle">Beragam pilihan ekstrakurikuler untuk pengembangan bakat siswa</p>
            </div>

            <div class="ekskul-grid">
                @forelse($ekstrakurikuler as $item)
                    <div class="ekskul-card">
                        <div class="ekskul-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>{{ $item->name }}</h3>
                    </div>
                @empty
                    <div class="text-center py-5 text-muted col-12">
                        <p>Belum ada data ekstrakurikuler.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-40">
                <a href="{{ route('ekstrakurikuler') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Lihat Semua Ekstrakurikuler
                </a>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-media-section" id="sosial-media">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Ikuti Kami</h2>
                <p class="section-subtitle">Dapatkan update terbaru dari media sosial kami</p>
            </div>
            <div class="social-grid">
                <a href="https://www.facebook.com/p/MTs-Negeri-1-Magetan-100076737145018/" target="_blank" class="social-box facebook" title="Ikuti Facebook kami">
                    <i class="fab fa-facebook-f"></i>
                    <h3>Facebook</h3>
                    <p>MTs Negeri 1 Magetan</p>
                </a>
                <a href="https://instagram.com/mtsn1magetan" target="_blank" class="social-box instagram" title="Ikuti Instagram kami">
                    <i class="fab fa-instagram"></i>
                    <h3>Instagram</h3>
                    <p>@mtsn1magetan</p>
                </a>
                <a href="https://www.youtube.com/@mtsn1magetan" target="_blank" class="social-box youtube" title="Subscribe YouTube kami">
                    <i class="fab fa-youtube"></i>
                    <h3>YouTube</h3>
                    <p>MTsN 1 Magetan</p>
                </a>
                <a href="https://www.tiktok.com/@mtsn1magetan" target="_blank" class="social-box tiktok" title="Ikuti TikTok kami">
                    <i class="fab fa-tiktok"></i>
                    <h3>TikTok</h3>
                    <p>@mtsn1magetan</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="kontak">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="section-subtitle">Kami siap membantu Anda</p>
            </div>
            <div class="contact-content">
                <div class="contact-info-box">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Alamat</h4>
                            <p>{{ $settings['contact_address'] ?? 'Desa Baluk, Kec. Karangrejo, Kab. Magetan, Jawa Timur' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>Telepon</h4>
                            <p>{{ $settings['contact_phone'] ?? '(0351) 866007' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email</h4>
                            <p>{{ $settings['contact_email'] ?? 'info@mtsn1magetan.sch.id' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>{{ $settings['contact_hours'] ?? 'Senin - Jumat: 07.00 - 16.00' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.397692948693!2d111.4264810761235!3d-7.538460399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79eaffec0afc6b:0x52cfbad11119d136!2sMTsN%201%20Magetan!5e0!3m2!1sid!2sid!4v1735728000000!5m2!1sid!2sid"
                    width="100%"
                    height="450"
                    style="border:0; border-radius: 12px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/home.js?v=' . filemtime(public_path('js/home.js'))) }}"></script>
@endsection