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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('css')
</head>
<body>
<!-- Global Alerts -->
@if(session('success'))
<div class="alert alert-success" role="alert" id="success-alert">
    <i class="fas fa-check-circle"></i>
    <div class="alert-content">
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
    <span class="alert-close" onclick="document.getElementById('success-alert').style.display='none';">
        <i class="fas fa-times"></i>
    </span>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert" id="error-alert">
    <i class="fas fa-exclamation-triangle"></i>
    <div class="alert-content">
        <strong>Gagal!</strong> {{ session('error') }}
    </div>
    <span class="alert-close" onclick="document.getElementById('error-alert').style.display='none';">
        <i class="fas fa-times"></i>
    </span>
</div>
@endif

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
            
            <div class="menu-parent @if(request()->routeIs('admin.sejarah*')) open @endif">
                <button class="menu-toggle">
                    <span><i class="fas fa-book-open"></i> Profil</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </button>
                <div class="submenu @if(request()->routeIs('admin.sejarah*')) show @endif">
                    <a href="{{ route('admin.sejarah.index') }}" class="@if(request()->routeIs('admin.sejarah.*')) active @endif">
                <i class="fas fa-history"></i><span>Sejarah Sekolah</span>
            </a>
                    <a href="{{ route('admin.visi-misi.index') }}" class="@if(request()->routeIs('admin.visi-misi.*')) active @endif">
                <i class="fas fa-lightbulb"></i><span>Visi & Misi</span>
            </a>
                    <a href="{{ route('admin.struktur.index') }}" class="@if(request()->routeIs('admin.struktur.*')) active @endif">
                <i class="fas fa-sitemap"></i><span>Struktur & Guru</span>
            </a>
            <a href="{{ route('admin.prestasi') }}" class="@if(request()->routeIs('admin.prestasi')) active @endif">
                <i class="fas fa-trophy"></i><span>Akreditasi & Prestasi</span>
            </a>
            <a href="{{ route('admin.fasilitas.index') }}" class="@if(request()->routeIs('admin.fasilitas.*')) active @endif">
                <i class="fas fa-school"></i><span>Fasilitas Sekolah</span>
            </a>
                </div>
            </div>

            <a href="{{ route('admin.ekstrakurikuler') }}" class="@if(request()->routeIs('admin.ekstrakurikuler')) active @endif">
                <i class="fas fa-star"></i><span>Ekstrakurikuler</span>
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

            <!-- AKADEMIK DROPDOWN -->
            <div class="menu-parent @if(request()->routeIs('admin.kurikulum*') || request()->routeIs('admin.kelas-program*')) open @endif">
                <button class="menu-toggle">
                    <span><i class="fas fa-book-open"></i> Akademik</span>
                    <i class="fas fa-chevron-down arrow-icon"></i>
                </button>
                <div class="submenu @if(request()->routeIs('admin.kurikulum*') || request()->routeIs('admin.kelas-program*')) show @endif">
                    <a href="{{ route('admin.kurikulum') }}" class="@if(request()->routeIs('admin.kurikulum')) active @endif">
                        <i class="fas fa-book"></i><span>Kurikulum</span>
                    </a>
                    <a href="{{ route('admin.kelas-program.index') }}" class="@if(request()->routeIs('admin.kelas-program.*')) active @endif">
                        <i class="fas fa-chalkboard-teacher"></i><span>Kelas Program</span>
                    </a>
                    <a href="{{ route('admin.kalender.index') }}" class="@if(request()->routeIs('admin.kalender.*')) active @endif">
                        <i class="fas fa-calendar-alt"></i><span>Kalender Pendidikan</span>
                    </a>
                    <a href="{{ route('admin.jadwal.index') }}" class="@if(request()->routeIs('admin.jadwal.*')) active @endif">
                        <i class="fas fa-clock"></i><span>Jadwal Pelajaran</span>
                    </a>
                </div>
            </div>

            <!-- LOGOUT -->
            <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- OVERLAY -->
    <div class="sidebar-overlay"></div>

    <!-- MAIN -->
    <main class="main-content">
        <div class="navbar-custom">
            <button class="sidebar-toggle" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <h5>@yield('page-title')</h5>
        </div>

        <div class="content-container">
            @yield('content')
        </div>
    </main>

</div>

<button class="sidebar-close">
    <i class="fas fa-times"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Konfirmasi Logout
        document.querySelectorAll('.logout-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: 'Anda akan keluar dari panel admin.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Ya, Logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                });
            });
        });
    });
</script>
@yield('js')
</body>
</html>