<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin MTsN 1 Magetan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ==================== VARIABLES ==================== */
        :root {
            --primary-color: #667eea;
            --primary-dark: #5568d3;
            --primary-light: #8b9ef8;
            --secondary-color: #764ba2;
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
            --text-dark: #2d3748;
            --text-light: #718096;
            --text-muted: #a0aec0;
            --border-color: #e2e8f0;
            --light-bg: #f7fafc;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ==================== LAYOUT ==================== */
        .layout-wrapper {
            display: flex;
            flex: 1;
            gap: clamp(10px, 2vw, 20px);
            padding: clamp(10px, 2vw, 20px);
            max-width: 1920px;
            margin: 0 auto;
            width: 100%;
        }

        /* ==================== SIDEBAR ==================== */
        .sidebar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            width: 100%;
            max-width: 280px;
            padding: 20px;
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            position: sticky;
            top: 20px;
            height: fit-content;
            max-height: calc(100vh - 40px);
            overflow-y: auto;
            animation: slideInLeft 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar h4 {
            color: white;
            font-size: clamp(14px, 2vw, 16px);
            font-weight: 700;
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar h4 i {
            font-size: clamp(16px, 2.5vw, 20px);
            animation: iconRotate 3s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes iconRotate {
            0%, 100% { transform: rotateY(0) scale(1); }
            50% { transform: rotateY(15deg) scale(1.1); }
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar nav a {
            padding: clamp(10px, 1.5vw, 12px) clamp(12px, 2vw, 16px);
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            border-radius: 10px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: clamp(12px, 1.4vw, 14px);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .sidebar nav a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transition: width 0.3s ease;
            z-index: 0;
        }

        .sidebar nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateX(8px);
        }

        .sidebar nav a:hover::before {
            width: 100%;
        }

        .sidebar nav a i {
            font-size: clamp(14px, 1.8vw, 16px);
            min-width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .sidebar nav a span {
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .sidebar nav a.active {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border-left: 4px solid white;
            padding-left: calc(clamp(12px, 2vw, 16px) - 4px);
            font-weight: 700;
        }

        .sidebar nav a.active i {
            animation: iconBounce 2s ease-in-out infinite;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-4px) scale(1.15); }
        }

        .sidebar nav a.active::before {
            width: 100%;
        }

        .sidebar nav hr {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 12px 0;
        }

        /* ==================== SUBMENU AKADEMIK ==================== */
        .menu-parent {
            position: relative;
        }

        .menu-parent > a {
            justify-content: space-between;
        }

        .menu-parent > a .arrow-icon {
            transition: transform 0.3s ease;
            font-size: 12px;
        }

        .menu-parent.open > a .arrow-icon {
            transform: rotate(180deg);
        }

        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            margin-left: 16px;
            margin-top: 4px;
        }

        .submenu.show {
            max-height: 500px;
        }

        .submenu a {
            padding: 8px 12px;
            font-size: clamp(11px, 1.3vw, 13px);
            background: rgba(255, 255, 255, 0.05);
            margin-bottom: 4px;
        }

        .submenu a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .submenu a.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 3px solid white;
        }

        .sidebar nav a[data-logout="true"] {
            background: rgba(255, 0, 0, 0.15) !important;
            color: #fff !important;
            margin-top: 8px;
            border-left: 4px solid transparent;
        }

        .sidebar nav a[data-logout="true"]:hover {
            background: rgba(255, 0, 0, 0.25) !important;
            border-left-color: white;
        }

        .sidebar nav a[data-logout="true"] i {
            animation: logoutPulse 1.5s ease-in-out infinite;
        }

        @keyframes logoutPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* ==================== SCROLLBAR ==================== */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* ==================== MAIN CONTENT ==================== */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            animation: fadeIn 0.6s ease-out 0.2s backwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ==================== NAVBAR ==================== */
        .navbar-custom {
            background: white;
            padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 24px);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: clamp(16px, 2vw, 24px);
            animation: slideDown 0.6s ease-out;
            flex-wrap: wrap;
            gap: 16px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-custom h5 {
            font-size: clamp(16px, 2.5vw, 20px);
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .navbar-custom .user-info {
            display: flex;
            align-items: center;
            gap: clamp(8px, 1.5vw, 12px);
            font-size: clamp(12px, 1.3vw, 14px);
        }

        .navbar-custom .user-info strong {
            color: var(--primary-color);
        }

        .navbar-custom img {
            width: clamp(32px, 5vw, 40px);
            height: clamp(32px, 5vw, 40px);
            border-radius: 50%;
            border: 2px solid var(--primary-light);
            animation: fadeInScale 0.6s ease-out 0.3s backwards;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* ==================== ALERTS ==================== */
        .alert {
            border-radius: 12px;
            border: none;
            padding: clamp(12px, 2vw, 16px) clamp(14px, 2.5vw, 20px);
            margin-bottom: clamp(12px, 2vw, 16px);
            animation: slideDown 0.4s ease-out;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: clamp(12px, 1.3vw, 14px);
        }

        .alert i {
            font-size: clamp(14px, 2vw, 18px);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(245, 101, 101, 0.1), rgba(229, 62, 62, 0.1));
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert-success i,
        .alert-danger i {
            color: inherit;
        }

        .btn-close {
            opacity: 0.7;
            transition: var(--transition);
        }

        .btn-close:hover {
            opacity: 1;
        }

        /* ==================== CONTENT CONTAINER ==================== */
        .content-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: clamp(16px, 2vw, 24px);
            animation: fadeIn 0.6s ease-out 0.3s backwards;
        }

        /* ==================== CARD STYLES ==================== */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            font-weight: 700;
            padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 24px);
            font-size: clamp(14px, 1.5vw, 16px);
        }

        .card-body {
            padding: clamp(16px, 2.5vw, 24px);
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 1024px) {
            .layout-wrapper {
                flex-direction: column;
                gap: 16px;
            }

            .sidebar {
                max-width: 100%;
                position: relative;
                top: 0;
                max-height: none;
                animation: slideUp 0.6s ease-out;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .sidebar nav {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 8px;
            }

            .sidebar nav a {
                padding: 10px 12px;
                font-size: 12px;
                gap: 8px;
            }

            .sidebar nav a span {
                display: none;
            }

            .sidebar nav a i {
                font-size: 16px;
            }

            .submenu {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 8px;
            }

            .layout-wrapper {
                gap: 12px;
                padding: 8px;
            }

            .sidebar {
                padding: 12px;
            }

            .sidebar h4 {
                font-size: 13px;
                margin-bottom: 12px;
                gap: 8px;
            }

            .sidebar nav a {
                padding: 8px 10px;
                font-size: 11px;
                gap: 6px;
            }

            .navbar-custom {
                padding: 10px 12px;
                margin-bottom: 12px;
            }

            .navbar-custom h5 {
                font-size: 14px;
            }

            .navbar-custom .user-info {
                font-size: 11px;
                gap: 6px;
            }

            .alert {
                padding: 10px 12px;
                font-size: 11px;
                margin-bottom: 10px;
            }

            .alert i {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .layout-wrapper {
                gap: 10px;
                padding: 6px;
            }

            .sidebar {
                padding: 10px;
                border-radius: 8px;
            }

            .sidebar h4 {
                font-size: 12px;
                margin-bottom: 10px;
                gap: 6px;
            }

            .sidebar h4 i {
                font-size: 14px;
            }

            .sidebar nav {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .sidebar nav a {
                padding: 8px 10px;
                font-size: 11px;
                gap: 8px;
                border-radius: 6px;
            }

            .sidebar nav a i {
                font-size: 14px;
                min-width: 16px;
            }

            .sidebar nav a span {
                display: inline;
            }

            .navbar-custom {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
                gap: 12px;
            }

            .navbar-custom h5 {
                width: 100%;
                font-size: 13px;
            }

            .navbar-custom .user-info {
                width: 100%;
                justify-content: space-between;
                font-size: 10px;
            }

            .navbar-custom img {
                width: 28px;
                height: 28px;
            }

            .alert {
                padding: 8px 10px;
                font-size: 10px;
                gap: 8px;
                margin-bottom: 8px;
            }

            .alert i {
                font-size: 12px;
            }
        }

        /* ==================== DARK MODE ==================== */
        @media (prefers-color-scheme: dark) {
            :root {
                --light-bg: #1a202c;
                --text-dark: #e2e8f0;
                --border-color: #4a5568;
            }

            body {
                background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            }

            .sidebar {
                background: linear-gradient(135deg, #2d3a5c 0%, #1e2d4a 100%);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            }

            .navbar-custom {
                background: #2d3748;
                color: #e2e8f0;
            }

            .card {
                background: #2d3748;
                color: #e2e8f0;
            }

            .card-body {
                background: #1a202c;
            }

            .alert-success {
                background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.1));
            }

            .alert-danger {
                background: linear-gradient(135deg, rgba(245, 101, 101, 0.15), rgba(229, 62, 62, 0.1));
            }
        }

        /* ==================== ANIMATIONS ==================== */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* ==================== PRINT ==================== */
        @media print {
            .sidebar,
            .navbar-custom,
            .btn-close {
                display: none;
            }

            .layout-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
    @yield('css')
</head>
<body>
    <div class="layout-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <h4><i class="fas fa-graduation-cap"></i> Admin Panel</h4>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">
                    <i class="fas fa-chart-line"></i> 
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.sejarah.index') }}" class="@if(request()->routeIs('admin.sejarah.*')) active @endif">
                    <i class="fas fa-history"></i> 
                    <span>Sejarah Sekolah</span>
                </a>
                <a href="{{ route('admin.visi-misi.index') }}" class="@if(request()->routeIs('admin.visi-misi.*')) active @endif">
                    <i class="fas fa-lightbulb"></i> 
                    <span>Visi & Misi</span>
                </a>
                
                <!-- LINK STRUKTUR YANG BENAR -->
                <a href="{{ route('admin.struktur.index') }}" class="@if(request()->routeIs('admin.struktur.*')) active @endif">
                    <i class="fas fa-sitemap"></i> 
                    <span>Struktur & Guru</span>
                </a>
                
                <a href="{{ route('admin.ekstrakurikuler') }}" class="@if(request()->routeIs('admin.ekstrakurikuler')) active @endif">
                    <i class="fas fa-star"></i> 
                    <span>Ekstrakurikuler</span>
                </a>
                <a href="{{ route('admin.berita') }}" class="@if(request()->routeIs('admin.berita')) active @endif">
                    <i class="fas fa-newspaper"></i> 
                    <span>Berita & Pengumuman</span>
                </a>
                <a href="{{ route('admin.galeri') }}" class="@if(request()->routeIs('admin.galeri')) active @endif">
                    <i class="fas fa-images"></i> 
                    <span>Galeri</span>
                </a>
                <a href="{{ route('admin.ppdb') }}" class="@if(request()->routeIs('admin.ppdb')) active @endif">
                    <i class="fas fa-user-tie"></i> 
                    <span>PPDB</span>
                </a>
                
                <!-- MENU AKADEMIK DENGAN SUBMENU -->
                <div class="menu-parent @if(request()->routeIs('admin.kurikulum*')) open @endif">
                    <a href="javascript:void(0)" onclick="toggleSubmenu(this)">
                        <span><i class="fas fa-book-open"></i> Akademik</span>
                        <i class="fas fa-chevron-down arrow-icon"></i>
                    </a>
                    <div class="submenu @if(request()->routeIs('admin.kurikulum*')) show @endif">
                        <!-- Di dalam file: views/layouts/admin.blade.php -->
                        <a href="{{ route('admin.kurikulum') }}" class="@if(request()->routeIs('admin.kurikulum')) active @endif">
                            <i class="fas fa-book"></i> 
                            <span>Kurikulum</span>
                        </a>
                        <a href="{{ route('admin.kalender.index') }}" class="@if(request()->routeIs('admin.kalender.*')) active @endif">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Kalender Pendidikan</span>
                        </a>
                    </div>
                </div>
                                
                <a href="{{ route('admin.sosial-media') }}" class="@if(request()->routeIs('admin.sosial-media')) active @endif">
                    <i class="fas fa-share-alt"></i> 
                    <span>Sosial Media</span>
                </a>
                <hr>
                <a href="{{ route('admin.logout') }}" data-logout="true">
                    <i class="fas fa-sign-out-alt"></i> 
                    <span>Logout</span>
                </a>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- NAVBAR -->
            <div class="navbar-custom">
                <h5>@yield('page-title')</h5>
                <div class="user-info">
                    <span>Selamat Datang, <strong>Admin</strong></span>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff" alt="Avatar">
                </div>
            </div>

            <!-- CONTENT CONTAINER -->
            <div class="content-container">
                <!-- ALERT MESSAGES -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Gagal!</strong> {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- CONTENT -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto dismiss alerts
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Toggle submenu function
        function toggleSubmenu(element) {
            const parent = element.closest('.menu-parent');
            const submenu = parent.querySelector('.submenu');
            
            parent.classList.toggle('open');
            submenu.classList.toggle('show');
        }
    </script>
    @yield('js')
</body>
</html>