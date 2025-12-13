<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin MTsN 1 Magetan</title>

    <!-- Google Fonts -->
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
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay"></div>

    <div class="layout-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">
            <!-- Mobile Close Button -->
            <button class="sidebar-close" aria-label="Close sidebar">
                <i class="fas fa-times"></i>
            </button>

            <h4><i class="fas fa-graduation-cap"></i> Admin Panel</h4>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="nav-link-item @if(request()->routeIs('admin.dashboard')) active @endif">
                    <i class="fas fa-chart-line"></i> 
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.ekstrakurikuler') }}" class="nav-link-item @if(request()->routeIs('admin.ekstrakurikuler')) active @endif">
                    <i class="fas fa-star"></i> 
                    <span>Ekstrakurikuler</span>
                </a>
                <a href="{{ route('admin.berita') }}" class="nav-link-item @if(request()->routeIs('admin.berita')) active @endif">
                    <i class="fas fa-newspaper"></i> 
                    <span>Berita & Pengumuman</span>
                </a>
                <a href="{{ route('admin.ppdb') }}" class="nav-link-item @if(request()->routeIs('admin.ppdb')) active @endif">
                    <i class="fas fa-user-graduate"></i> 
                    <span>PPDB</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="nav-link-item @if(request()->routeIs('admin.settings')) active @endif">
                    <i class="fas fa-cog"></i> 
                    <span>Settings Beranda</span>
                </a>
                <hr />
                <a href="{{ route('admin.logout') }}" class="nav-link-item" data-logout="true" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i> 
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- NAVBAR -->
            <div class="navbar-custom">
                <!-- Mobile Toggle Button (will be shown only on mobile) -->
                <button class="sidebar-toggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>

                <h5>@yield('page-title')</h5>
                <div class="user-info">
                    <span>Selamat Datang, <strong>Admin</strong></span>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff&bold=true" alt="Avatar Admin">
                </div>
            </div>
            
            <!-- CONTENT CONTAINER -->
            <div class="content-container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Gagal!</strong> {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

    @yield('js')
</body>
</html>