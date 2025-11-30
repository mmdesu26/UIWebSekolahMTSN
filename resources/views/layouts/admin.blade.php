<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin MTsN 1 Magetan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar h4 {
            margin-bottom: 30px;
            font-weight: bold;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
        }
        .sidebar nav a {
            display: block;
            color: white;
            padding: 12px 15px;
            margin: 5px 0;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
        }
        .sidebar nav a:hover,
        .sidebar nav a.active {
            background-color: rgba(255,255,255,0.2);
            padding-left: 25px;
        }
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: bold;
        }
        .table-hover tbody tr:hover {
            background-color: #f9f9f9;
        }
        .btn-group-custom {
            display: flex;
            gap: 5px;
        }
        .alert {
            border-radius: 8px;
            border: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                padding: 15px;
            }
            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
                padding: 10px;
            }
        }
    </style>
    @yield('css')
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4><i class="fas fa-graduation-cap"></i> Admin Panel</h4>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('admin.sejarah') }}" class="@if(request()->routeIs('admin.sejarah')) active @endif">
                <i class="fas fa-history"></i> Sejarah Sekolah
            </a>
            <a href="{{ route('admin.visi-misi') }}" class="@if(request()->routeIs('admin.visi-misi')) active @endif">
                <i class="fas fa-lightbulb"></i> Visi & Misi
            </a>
            <a href="{{ route('admin.guru') }}" class="@if(request()->routeIs('admin.guru')) active @endif">
                <i class="fas fa-chalkboard-user"></i> Guru
            </a>
            <a href="{{ route('admin.ekstrakurikuler') }}" class="@if(request()->routeIs('admin.ekstrakurikuler')) active @endif">
                <i class="fas fa-star"></i> Ekstrakurikuler
            </a>
            <a href="{{ route('admin.berita') }}" class="@if(request()->routeIs('admin.berita')) active @endif">
                <i class="fas fa-newspaper"></i> Berita & Pengumuman
            </a>
            <a href="{{ route('admin.galeri') }}" class="menu-item {{ request()->routeIs('admin.galeri') ? 'active' : '' }}">
                <span class="menu-icon">📸</span>
                <span class="menu-text">Galeri</span>
            </a>
            <a href="{{ route('admin.ppdb') }}" class="@if(request()->routeIs('admin.ppdb')) active @endif">
                <i class="fas fa-user-tie"></i> PPDB
            </a>
            <a href="{{ route('admin.sosial-media') }}" class="@if(request()->routeIs('admin.sosial-media')) active @endif">
                <i class="fas fa-share-alt"></i> Sosial Media
            </a>
            <hr style="border-color: rgba(255,255,255,0.3);">
            <a href="{{ route('admin.logout') }}" style="background-color: rgba(255,0,0,0.2);">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- NAVBAR -->
        <div class="navbar-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('page-title')</h5>
            <div>
                <span class="me-3">Selamat Datang, <strong>Admin</strong></span>
                <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff" alt="Avatar" width="35" height="35" class="rounded-circle">
            </div>
        </div>

        <!-- ALERT MESSAGES -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- CONTENT -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>
</html>