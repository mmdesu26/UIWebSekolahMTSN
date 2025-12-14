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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

    <!-- Beranda -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
           href="{{ route('home') }}">
            Beranda
        </a>
    </li>

    <!-- Berita -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
           href="{{ route('berita') }}">
            Berita
        </a>
    </li>

    <!-- PPDB -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('ppdb') ? 'active' : '' }}"
           href="{{ route('ppdb') }}">
            PPDB
        </a>
    </li>

    <!-- Ekstrakurikuler -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('ekstrakurikuler') ? 'active' : '' }}"
           href="{{ route('ekstrakurikuler') }}">
            Ekstrakurikuler
        </a>
    </li>

    <!-- Dropdown Akademik -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->is('akademik/*') ? 'active' : '' }}"
           href="#"
           role="button"
           data-bs-toggle="dropdown"
           aria-expanded="false">
            Akademik
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{ route('akademik.kurikulum') }}">
                    Kurikulum
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('akademik.kelas-program') }}">
                    Kelas Program
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('akademik.kalender-pendidikan') }}">
                    Kalender Pendidikan
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('akademik.jadwal') }}">
                    Jadwal Pelajaran
                </a>
            </li>
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
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>