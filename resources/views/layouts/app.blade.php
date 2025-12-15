<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MTsN 1 Magetan')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo mts.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo mts.png') }}">

    <!-- CSS & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Page specific CSS (e.g. home.css) --}}
    @yield('css')
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-graduation-cap"></i> MTsN 1 Magetan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
<!-- LOGO -->
<li class="nav-item d-none d-lg-flex align-items-center mx-4">
    <img src="{{ asset('logo mts.png') }}" 
         alt="Logo MTsN 1 Magetan" 
         class="navbar-center-logo">
</li>
                    <!-- Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                           href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <!-- Dropdown Profil -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ request()->is('profil-sekolah/*') ? 'active' : '' }}"
       href="#" role="button" id="profilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-school"></i>
        <span class="menu-text">Profil</span>
        <i class="fas fa-chevron-down dropdown-arrow"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
        <li><a class="dropdown-item" href="{{ route('profil.sejarah') }}"><i class="fas fa-book-open"></i> Sejarah Sekolah</a></li>
        <li><a class="dropdown-item" href="{{ route('profil.visi-misi') }}"><i class="fas fa-bullseye"></i> Visi & Misi</a></li>
        <li><a class="dropdown-item" href="{{ route('profil.struktur-organisasi') }}"><i class="fas fa-sitemap"></i> Struktur Organisasi</a></li>
        <li><a class="dropdown-item" href="{{ route('profil.akreditasi') }}"><i class="fas fa-trophy"></i> Akreditasi & Prestasi</a></li>
        <li><a class="dropdown-item" href="{{ route('profil.fasilitas') }}"><i class="fas fa-building"></i> Fasilitas Sekolah</a></li>
    </ul>
</li>

                    <!-- Berita -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                           href="{{ route('berita') }}">
                            <i class="fas fa-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>

                    <!-- PPDB -->
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('ppdb') ? 'active' : '' }}"
       href="{{ route('ppdb') }}">
        <i class="fas fa-user-graduate"></i>
        <span>PPDB</span>
    </a>
</li>

<!-- Ekstrakurikuler -->
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('ekstrakurikuler') ? 'active' : '' }}"
       href="{{ route('ekstrakurikuler') }}">
        <i class="fas fa-futbol"></i>
        <span>Ekstrakurikuler</span>
    </a>
</li>
                    <!-- Galeri -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}"
                           href="{{ route('galeri') }}">
                            <i class="fas fa-images"></i>
                            <span>Galeri</span>
                        </a>
                    </li>

                    <!-- Dropdown Akademik -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ request()->is('akademik/*') ? 'active' : '' }}"
       href="#" role="button" id="akademikDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-book"></i>
        <span class="menu-text">Akademik</span>
        <i class="fas fa-chevron-down dropdown-arrow"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
        <li><a class="dropdown-item" href="{{ route('akademik.kurikulum') }}"><i class="fas fa-list-check"></i> Kurikulum</a></li>
        <li><a class="dropdown-item" href="{{ route('akademik.kelas-program') }}"><i class="fas fa-chalkboard-user"></i> Kelas Program</a></li>
        <li><a class="dropdown-item" href="{{ route('akademik.kalender-pendidikan') }}"><i class="fas fa-calendar-days"></i> Kalender Pendidikan</a></li>
        <li><a class="dropdown-item" href="{{ route('akademik.jadwal') }}"><i class="fas fa-clock"></i> Jadwal Pelajaran</a></li>
    </ul>
</li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- SCROLL TO TOP -->
    <button class="scroll-top" type="button" aria-label="Scroll ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h4><i class="fas fa-graduation-cap"></i> MTsN 1 Magetan</h4>
                    <p>Madrasah berkualitas dengan akhlak mulia dan prestasi gemilang.</p>
                </div>
                <div class="col-lg-8 text-center text-lg-end">
                    <p>© 2025 MTsN 1 Magetan. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Main JavaScript File -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')
</body>
</html>