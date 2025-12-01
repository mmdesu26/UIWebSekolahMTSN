@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary-color: #667eea;
        --secondary-color: #764ba2;
        --tertiary-color: #f093fb;
        --success-color: #48bb78;
        --warning-color: #ed8936;
        --danger-color: #f56565;
        --info-color: #4299e1;
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

    /* ==================== DASHBOARD CONTAINER ==================== */
    .dashboard-container {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==================== STAT CARDS ==================== */
    .stat-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: clamp(15px, 2vw, 25px);
        margin-bottom: clamp(30px, 5vw, 50px);
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: clamp(25px, 4vw, 35px);
        text-align: center;
        transition: var(--transition);
        animation: scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) backwards;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }

    @keyframes scaleIn {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--tertiary-color));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-card:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-color);
    }

    .stat-card-icon {
        width: clamp(60px, 8vw, 80px);
        height: clamp(60px, 8vw, 80px);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto clamp(15px, 2vw, 20px);
        font-size: clamp(28px, 4vw, 40px);
        transition: var(--transition);
    }

    .stat-card:nth-child(1) .stat-card-icon {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .stat-card:nth-child(2) .stat-card-icon {
        background: linear-gradient(135deg, #764ba2, #f093fb);
        color: white;
    }

    .stat-card:nth-child(3) .stat-card-icon {
        background: linear-gradient(135deg, #f093fb, #667eea);
        color: white;
    }

    .stat-card:hover .stat-card-icon {
        transform: scale(1.15) rotate(-10deg);
    }

    .stat-card-number {
        font-size: clamp(28px, 5vw, 42px);
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1;
        margin: clamp(10px, 2vw, 15px) 0;
        letter-spacing: -1px;
    }

    .stat-card-label {
        font-size: clamp(13px, 1.5vw, 15px);
        color: var(--text-light);
        font-weight: 500;
        margin: 0;
    }

    /* ==================== RECENT DATA SECTION ==================== */
    .recent-data-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: clamp(20px, 3vw, 30px);
        animation: fadeInUp 0.8s ease-out 0.3s both;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .data-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .data-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-8px);
    }

    .data-card-header {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: clamp(18px, 3vw, 24px);
        border-bottom: 2px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: clamp(15px, 1.8vw, 18px);
    }

    .data-card-header i {
        font-size: clamp(18px, 2vw, 20px);
        color: var(--primary-color);
    }

    .data-card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .table-wrapper {
        overflow-x: auto;
        flex-grow: 1;
    }

    .data-table {
        width: 100%;
        font-size: clamp(12px, 1.5vw, 14px);
    }

    .data-table thead {
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        border-bottom: 2px solid var(--border-color);
        position: sticky;
        top: 0;
    }

    .data-table thead th {
        padding: clamp(12px, 2vw, 16px);
        font-weight: 600;
        color: var(--text-dark);
        text-align: left;
        white-space: nowrap;
    }

    .data-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .data-table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
    }

    .data-table tbody td {
        padding: clamp(12px, 2vw, 16px);
        color: var(--text-light);
        vertical-align: middle;
    }

    .data-table tbody tr:last-child {
        border-bottom: none;
    }

    /* Empty State */
    .empty-state {
        padding: clamp(40px, 8vw, 60px) clamp(20px, 3vw, 30px);
        text-align: center;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: clamp(32px, 5vw, 48px);
        color: var(--border-color);
        margin-bottom: 12px;
        opacity: 0.5;
    }

    .empty-state p {
        font-size: clamp(13px, 1.5vw, 15px);
        margin: 0;
    }

    /* ==================== BADGES ==================== */
    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: clamp(11px, 1.2vw, 12px);
        font-weight: 600;
        display: inline-block;
        transition: var(--transition);
    }

    .badge:hover {
        transform: scale(1.05);
    }

    .badge-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .badge-info {
        background: linear-gradient(135deg, #4299e1, #3182ce);
        color: white;
    }

    .badge-warning {
        background: linear-gradient(135deg, #ed8936, #dd6b20);
        color: white;
    }

    /* ==================== BUTTONS ==================== */
    .btn-group-footer {
        padding: clamp(16px, 2vw, 20px) clamp(18px, 3vw, 24px);
        border-top: 1px solid var(--border-color);
        display: flex;
        gap: 12px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: clamp(10px, 1.5vw, 12px) clamp(16px, 2.5vw, 24px);
        border-radius: 8px;
        font-size: clamp(12px, 1.4vw, 14px);
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-outline-primary {
        background: transparent;
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-outline-primary:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.2);
    }

    .btn i {
        transition: var(--transition);
    }

    .btn:hover i {
        transform: translateX(4px);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .stat-cards-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .recent-data-grid {
            grid-template-columns: 1fr;
        }

        .data-card {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 768px) {
        .stat-cards-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        .stat-card-number {
            font-size: 28px;
        }

        .recent-data-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .data-table {
            font-size: 12px;
        }

        .data-table thead th,
        .data-table tbody td {
            padding: 10px 12px;
        }

        .btn-group-footer {
            flex-direction: column;
            gap: 8px;
            padding: 12px 16px;
        }

        .btn {
            width: 100%;
            padding: 10px 16px;
        }
    }

    @media (max-width: 480px) {
        .stat-cards-grid {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }

        .stat-card {
            padding: 18px 15px;
        }

        .stat-card-icon {
            width: 45px;
            height: 45px;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .stat-card-number {
            font-size: 24px;
            margin: 8px 0;
        }

        .stat-card-label {
            font-size: 12px;
        }

        .data-card-header {
            font-size: 14px;
            padding: 14px 12px;
            gap: 8px;
        }

        .data-card-header i {
            font-size: 16px;
        }

        .table-wrapper {
            max-height: 350px;
        }

        .data-table thead th,
        .data-table tbody td {
            padding: 8px 10px;
            font-size: 11px;
        }

        .badge {
            padding: 4px 8px;
            font-size: 10px;
        }

        .btn-group-footer {
            padding: 10px 12px;
        }

        .btn {
            font-size: 11px;
            padding: 8px 12px;
        }

        .empty-state {
            padding: 30px 15px;
        }

        .empty-state i {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 12px;
        }
    }

    /* ==================== ANIMATIONS ==================== */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .data-table tbody tr {
        animation: slideInRight 0.4s ease-out backwards;
    }

    .data-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .data-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .data-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .data-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .data-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

    /* ==================== ACCESSIBILITY ==================== */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* ==================== DARK MODE ==================== */
    @media (prefers-color-scheme: dark) {
        .stat-card,
        .data-card,
        .data-card-header {
            background: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .data-table thead {
            background: #1a202c;
            border-color: #4a5568;
        }

        .data-table thead th {
            color: #e2e8f0;
        }

        .data-table tbody tr:hover {
            background: #2d3748;
        }

        .data-table tbody td {
            color: #cbd5e0;
        }

        .stat-card-label,
        .text-muted {
            color: #a0aec0;
        }

        .stat-card-number,
        .text-dark {
            color: #f7fafc;
        }
    }
</style>

<!-- Dashboard Container -->
<div class="dashboard-container">
    
    <!-- STAT CARDS -->
    <div class="stat-cards-grid">
        <!-- Card 1: Total Guru -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-chalkboard-user"></i>
            </div>
            <h3 class="stat-card-number">{{ $data['total_guru'] ?? 0 }}</h3>
            <p class="stat-card-label">Total Guru</p>
        </div>

        <!-- Card 2: Ekstrakurikuler -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-star"></i>
            </div>
            <h3 class="stat-card-number">{{ $data['total_ekstrakurikuler'] ?? 0 }}</h3>
            <p class="stat-card-label">Ekstrakurikuler</p>
        </div>

        <!-- Card 3: Berita & Pengumuman -->
        <div class="stat-card">
            <div class="stat-card-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3 class="stat-card-number">{{ $data['total_berita'] ?? 0 }}</h3>
            <p class="stat-card-label">Berita & Pengumuman</p>
        </div>
    </div>

    <!-- RECENT DATA SECTION -->
    <div class="recent-data-grid">
        
        <!-- Recent Guru Card -->
        <div class="data-card">
            <div class="data-card-header">
                <i class="fas fa-users"></i>
                <span>Guru Terbaru</span>
            </div>
            <div class="data-card-body">
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['guru_terbaru'] ?? [] as $guru)
                            <tr>
                                <td>
                                    <strong>{{ $guru['nama'] ?? '-' }}</strong>
                                </td>
                                <td>
                                    <span class="badge badge-primary">
                                        {{ $guru['mata_pelajaran'] ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p>Belum ada data guru</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn-group-footer">
                <a href="{{ route('admin.guru') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right"></i>
                    <span>Lihat Semua Guru</span>
                </a>
            </div>
        </div>

        <!-- Recent Berita Card -->
        <div class="data-card">
            <div class="data-card-header">
                <i class="fas fa-newspaper"></i>
                <span>Berita Terbaru</span>
            </div>
            <div class="data-card-body">
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tipe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['berita_terbaru'] ?? [] as $berita)
                            <tr>
                                <td>
                                    <strong>{{ substr($berita['judul'] ?? '', 0, 25) }}{{ strlen($berita['judul'] ?? '') > 25 ? '...' : '' }}</strong>
                                </td>
                                <td>
                                    @if(($berita['tipe'] ?? '') == 'berita')
                                        <span class="badge badge-info">
                                            <i class="fas fa-info-circle" style="margin-right: 4px;"></i>Berita
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            <i class="fas fa-bell" style="margin-right: 4px;"></i>Pengumuman
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">
                                    <div class="empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p>Belum ada data berita</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn-group-footer">
                <a href="{{ route('admin.berita') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right"></i>
                    <span>Lihat Semua Berita</span>
                </a>
            </div>
        </div>

    </div>

</div>

<script>
    // ==================== NUMBER COUNTER ANIMATION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.stat-card-number');
        
        const animateCounter = (element) => {
            const target = parseInt(element.textContent);
            if (isNaN(target)) return;
            
            let current = 0;
            const increment = target / 20;
            
            const updateCount = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    setTimeout(updateCount, 50);
                } else {
                    element.textContent = target;
                }
            };
            
            updateCount();
        };

        // Trigger animation when cards come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    });

    // ==================== TABLE ROW ANIMATION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const tables = document.querySelectorAll('.data-table tbody tr');
        tables.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(20px)';
            setTimeout(() => {
                row.style.transition = 'all 0.4s ease-out';
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, 100 + (index * 100));
        });
    });
</script>

@endsection