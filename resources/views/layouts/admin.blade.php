<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin MTsN 1 Magetan</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo mts.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo mts.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('css')
</head>
<body>

<div class="layout-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h4><i class="fas fa-graduation-cap"></i> Admin Panel</h4>

        <nav>
            <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                <i class="fas fa-chart-line"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="@if(request()->routeIs('admin.settings')) active @endif">
                <i class="fas fa-cog"></i><span>Beranda User</span>
            </a>
            <a href="{{ route('admin.sejarah.index') }}" class="@if(request()->routeIs('admin.sejarah.*')) active @endif">
                <i class="fas fa-history"></i><span>Sejarah Sekolah</span>
            </a>

            <a href="{{ route('admin.visi-misi.index') }}" class="@if(request()->routeIs('admin.visi-misi.*')) active @endif">
                <i class="fas fa-lightbulb"></i><span>Visi & Misi</span>
            </a>

            <a href="{{ route('admin.struktur.index') }}" class="@if(request()->routeIs('admin.struktur.*')) active @endif">
                <i class="fas fa-sitemap"></i><span>Struktur & Guru</span>
            </a>

            <a href="{{ route('admin.ekstrakurikuler') }}" class="@if(request()->routeIs('admin.ekstrakurikuler')) active @endif">
                <i class="fas fa-star"></i><span>Ekstrakurikuler</span>
            </a>

            <a href="{{ route('admin.prestasi') }}" class="@if(request()->routeIs('admin.prestasi')) active @endif">
                <i class="fas fa-star"></i><span>Prestasi</span>
            </a>

            <a href="{{ route('admin.berita') }}" class="@if(request()->routeIs('admin.berita')) active @endif">
                <i class="fas fa-newspaper"></i><span>Berita & Pengumuman</span>
            </a>

            <a href="{{ route('admin.galeri.index') }}" class="@if(request()->routeIs('admin.galeri.*')) active @endif">
                <i class="fas fa-images"></i><span>Galeri</span>
            </a>

            <a href="{{ route('admin.ppdb') }}" class="@if(request()->routeIs('admin.ppdb')) active @endif">
                <i class="fas fa-user-tie"></i><span>PPDB</span>
            </a>

            <!-- AKADEMIK -->
            <div class="menu-parent @if(request()->routeIs('admin.kurikulum*')) open @endif">
                <a href="#" class="menu-toggle">
                    <span><i class="fas fa-book-open"></i> Akademik</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </a>
                <div class="submenu @if(request()->routeIs('admin.kurikulum*')) show @endif">
                    <a href="{{ route('admin.kurikulum') }}" class="@if(request()->routeIs('admin.kurikulum')) active @endif">
                        <i class="fas fa-book"></i><span>Kurikulum</span>
                    </a>
                    <a href="{{ route('admin.kalender.index') }}" class="@if(request()->routeIs('admin.kalender.*')) active @endif">
                        <i class="fas fa-calendar-alt"></i><span>Kalender Pendidikan</span>
                    </a>
                    <a href="{{ route('admin.jadwal.index') }}" class="@if(request()->routeIs('admin.jadwal.*')) active @endif">
                        <i class="fas fa-clock"></i><span>Jadwal Pelajaran</span>
                    </a>
                </div>
            </div>
            <a href="{{ route('admin.logout') }}" data-logout="true"
               onclick="return confirm('Apakah Anda yakin ingin logout?')">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="main-content">
        <div class="navbar-custom">
            <h5>@yield('page-title')</h5>
        </div>

        <div class="content-container">
            @yield('content')
        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin.js') }}"></script>

@yield('js')
</body>
</html>
