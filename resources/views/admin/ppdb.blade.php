@extends('layouts.admin')

@section('title', 'PPDB')
@section('page-title', 'Kelola PPDB')

@section('content')

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

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    /* ==================== MAIN CONTAINER ==================== */
    .ppdb-container {
        animation: fadeIn 0.6s ease-out;
        min-height: 100vh;
        padding: clamp(15px, 3vw, 25px);
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

    /* ==================== CARD CONTAINER ==================== */
    .ppdb-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        animation: slideInUp 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ppdb-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-8px);
    }

    /* ==================== CARD HEADER ==================== */
    .ppdb-card-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: clamp(20px, 4vw, 32px);
        display: flex;
        align-items: center;
        gap: 16px;
        position: relative;
        overflow: hidden;
    }

    .ppdb-card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
        animation: moveGradient 15s ease-in-out infinite;
    }

    @keyframes moveGradient {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, 20px); }
    }

    .ppdb-card-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .ppdb-card-header-icon {
        font-size: clamp(28px, 5vw, 48px);
        animation: iconFloat 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0) rotateZ(0deg); }
        50% { transform: translateY(-12px) rotateZ(-10deg); }
    }

    .ppdb-card-header:hover .ppdb-card-header-icon {
        animation: none;
        transform: scale(1.3) rotateZ(15deg);
        transition: var(--transition);
    }

    .ppdb-card-header h3 {
        font-size: clamp(18px, 2.5vw, 28px);
        font-weight: 700;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* ==================== CARD BODY ==================== */
    .ppdb-card-body {
        padding: clamp(28px, 5vw, 40px);
    }

    /* ==================== FORM ELEMENTS ==================== */
    .form-group {
        margin-bottom: clamp(22px, 3vw, 28px);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        font-size: clamp(13px, 1.5vw, 15px);
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: clamp(10px, 1.5vw, 14px);
        transition: var(--transition);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--primary-color);
        font-size: clamp(14px, 1.8vw, 18px);
        animation: labelIconPulse 2s ease-in-out infinite;
    }

    @keyframes labelIconPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .form-label:hover i {
        animation: none;
        transform: scale(1.3);
        transition: var(--transition);
    }

    .form-control {
        width: 100%;
        padding: clamp(12px, 2vw, 16px) clamp(14px, 2.5vw, 18px);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: clamp(13px, 1.5vw, 15px);
        font-family: inherit;
        color: var(--text-dark);
        background: white;
        transition: var(--transition);
        line-height: 1.6;
    }

    .form-control::placeholder {
        color: var(--text-muted);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02));
        transform: translateY(-3px);
    }

    .form-control:hover:not(:focus) {
        border-color: var(--primary-light);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: clamp(100px, 15vw, 180px);
    }

    .form-text {
        display: block;
        font-size: clamp(11px, 1.3vw, 13px);
        color: var(--text-muted);
        margin-top: clamp(6px, 1vw, 10px);
        font-style: italic;
        animation: fadeIn 0.4s ease-out 0.3s backwards;
    }

    /* ==================== FORM ROW ==================== */
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: clamp(16px, 2.5vw, 24px);
    }

    .form-row .form-group {
        margin-bottom: 0;
    }

    /* ==================== DIVIDER ==================== */
    .form-divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--border-color), transparent);
        margin: clamp(24px, 4vw, 36px) 0;
        position: relative;
        animation: expandWidth 0.8s ease-out;
    }

    @keyframes expandWidth {
        from {
            width: 0;
        }
        to {
            width: 100%;
        }
    }

    /* ==================== BUTTONS ==================== */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: clamp(12px, 2vw, 16px) clamp(24px, 3vw, 32px);
        border-radius: 10px;
        font-size: clamp(13px, 1.5vw, 15px);
        font-weight: 700;
        text-decoration: none;
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        width: 100%;
        margin-top: clamp(8px, 1.5vw, 12px);
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
        z-index: 0;
    }

    .btn:active::before {
        width: 300px;
        height: 300px;
    }

    .btn-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        animation: slideInUp 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.6s backwards;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn i {
        transition: var(--transition);
        font-size: clamp(14px, 1.8vw, 18px);
    }

    .btn:hover i {
        transform: scale(1.2) rotate(10deg);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    /* ==================== ALERTS ==================== */
    .alert {
        padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 20px);
        border-radius: 10px;
        margin-bottom: clamp(20px, 3vw, 28px);
        font-size: clamp(13px, 1.5vw, 15px);
        display: flex;
        align-items: flex-start;
        gap: 12px;
        animation: slideInDown 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        border-left: 4px solid;
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert i {
        font-size: clamp(16px, 2vw, 20px);
        flex-shrink: 0;
        margin-top: 3px;
    }

    .alert-content {
        flex: 1;
    }

    .alert-success {
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));
        border-left-color: var(--success-color);
        color: var(--success-color);
    }

    .alert-success i {
        color: var(--success-color);
    }

    .alert-info {
        background: linear-gradient(135deg, rgba(66, 153, 225, 0.1), rgba(49, 130, 206, 0.1));
        border-left-color: var(--info-color);
        color: var(--info-color);
    }

    .alert-info i {
        color: var(--info-color);
    }

    .alert-close {
        cursor: pointer;
        font-size: 20px;
        opacity: 0.6;
        transition: var(--transition);
    }

    .alert-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    /* ==================== INFO BOXES ==================== */
    .info-boxes {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: clamp(16px, 2.5vw, 24px);
        margin-bottom: clamp(28px, 4vw, 40px);
    }

    .info-box {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border: 2px solid var(--primary-light);
        border-radius: 12px;
        padding: clamp(16px, 2.5vw, 24px);
        text-align: center;
        transition: var(--transition);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .info-box:nth-child(1) { animation-delay: 0.2s; }
    .info-box:nth-child(2) { animation-delay: 0.3s; }

    .info-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 24px rgba(102, 126, 234, 0.2);
    }

    .info-box-icon {
        font-size: clamp(24px, 3.5vw, 32px);
        color: var(--primary-color);
        margin-bottom: 10px;
        animation: iconBounce 2.5s ease-in-out infinite;
    }

    @keyframes iconBounce {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-8px) scale(1.1); }
    }

    .info-box:hover .info-box-icon {
        animation: none;
        transform: scale(1.3) rotate(-15deg);
        transition: var(--transition);
    }

    .info-box-label {
        font-size: clamp(10px, 1.2vw, 12px);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        margin-bottom: 6px;
    }

    .info-box-value {
        font-size: clamp(14px, 1.8vw, 18px);
        font-weight: 700;
        color: var(--primary-color);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1200px) {
        .ppdb-container {
            padding: clamp(12px, 2vw, 18px);
        }
    }

    @media (max-width: 768px) {
        .ppdb-card {
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .ppdb-card-header {
            padding: 16px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .ppdb-card-header h3 {
            font-size: 16px;
            width: 100%;
        }

        .ppdb-card-header-icon {
            font-size: 24px;
        }

        .ppdb-card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 12px;
            margin-bottom: 8px;
            letter-spacing: 0;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 13px;
            border-radius: 8px;
        }

        textarea.form-control {
            min-height: 100px;
        }

        .form-text {
            font-size: 11px;
            margin-top: 6px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .btn {
            padding: 10px 16px;
            font-size: 12px;
            gap: 8px;
            margin-top: 12px;
        }

        .btn i {
            font-size: 14px;
        }

        .info-boxes {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .info-box {
            padding: 14px;
            border-radius: 8px;
        }

        .info-box-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .info-box-label {
            font-size: 10px;
            margin-bottom: 4px;
        }

        .info-box-value {
            font-size: 14px;
        }

        .form-divider {
            margin: 18px 0;
        }

        .alert {
            padding: 10px 12px;
            font-size: 12px;
            gap: 10px;
            margin-bottom: 16px;
        }

        .alert i {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .ppdb-container {
            padding: 8px;
        }

        .ppdb-card {
            border-radius: 10px;
        }

        .ppdb-card-header {
            padding: 12px;
            gap: 8px;
            flex-direction: column;
            text-align: center;
        }

        .ppdb-card-header h3 {
            font-size: 14px;
            width: auto;
        }

        .ppdb-card-header-icon {
            font-size: 22px;
        }

        .ppdb-card-body {
            padding: 14px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-label {
            font-size: 11px;
            margin-bottom: 6px;
            text-transform: capitalize;
            letter-spacing: 0;
        }

        .form-control {
            padding: 8px 10px;
            font-size: 12px;
            border-radius: 6px;
        }

        textarea.form-control {
            min-height: 80px;
        }

        .form-text {
            font-size: 10px;
            margin-top: 5px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .btn {
            padding: 10px 12px;
            font-size: 10px;
            gap: 6px;
            margin-top: 10px;
            width: 100%;
        }

        .btn i {
            font-size: 12px;
        }

        .info-boxes {
            grid-template-columns: 1fr;
            gap: 10px;
            margin-bottom: 16px;
        }

        .info-box {
            padding: 12px;
            border-radius: 8px;
        }

        .info-box-icon {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .info-box-label {
            font-size: 9px;
            margin-bottom: 3px;
        }

        .info-box-value {
            font-size: 13px;
        }

        .form-divider {
            margin: 14px 0;
            height: 1px;
        }

        .alert {
            padding: 8px 10px;
            font-size: 11px;
            gap: 8px;
            margin-bottom: 12px;
        }

        .alert i {
            font-size: 14px;
        }
    }

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
        .ppdb-card,
        .form-control {
            background: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .form-label,
        .form-control {
            color: #e2e8f0;
        }

        .form-control::placeholder {
            color: #718096;
        }

        .info-box {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-color: rgba(102, 126, 234, 0.3);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.15));
            border-left-color: #48bb78;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.15), rgba(49, 130, 206, 0.15));
            border-left-color: #4299e1;
        }

        .form-divider {
            background: linear-gradient(90deg, transparent, #4a5568, transparent);
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .btn {
            display: none;
        }

        .ppdb-card {
            box-shadow: none;
            border: 1px solid #000;
        }

        .form-control {
            border: 1px solid #000;
        }
    }
</style>

<!-- Main Container -->
<div class="ppdb-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <div class="alert-content">
                    <strong>Berhasil!</strong> Pengaturan PPDB telah diperbarui.
                </div>
                <span class="alert-close" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
            @endif

            <!-- Main Card -->
            <div class="ppdb-card">
                <div class="ppdb-card-header">
                    <i class="fas fa-user-tie ppdb-card-header-icon"></i>
                    <h3>Pengaturan PPDB MTsN 1 Magetan</h3>
                </div>

                <div class="ppdb-card-body">
                    <!-- Info Boxes -->
                    <div class="info-boxes">
                        <div class="info-box">
                            <div class="info-box-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="info-box-label">Pendaftaran</div>
                            <div class="info-box-value">Dibuka</div>
                        </div>
                        <div class="info-box">
                            <div class="info-box-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="info-box-label">Total Kuota</div>
                            <div class="info-box-value">{{ $ppdb['kuota'] ?? '0' }}</div>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <form method="POST" action="{{ route('admin.ppdb.update') }}" class="ppdb-form">
                        @csrf

                        <!-- Judul -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                <span>Judul PPDB</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="judul" 
                                value="{{ $ppdb['judul'] ?? '' }}" 
                                placeholder="Masukkan judul PPDB"
                                required
                            >
                            <small class="form-text">📝 Judul utama untuk program penerimaan peserta didik baru</small>
                        </div>

                        <!-- Tanggal Dibuka & Ditutup -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar-plus"></i>
                                    <span>Dibuka Tanggal</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control dibuka-input" 
                                    name="dibuka" 
                                    value="{{ $ppdb['dibuka'] ?? '' }}" 
                                    placeholder="DD/MM/YYYY"
                                    required
                                >
                                <small class="form-text">📅 Tanggal pembukaan pendaftaran</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar-minus"></i>
                                    <span>Ditutup Tanggal</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control ditutup-input" 
                                    name="ditutup" 
                                    value="{{ $ppdb['ditutup'] ?? '' }}" 
                                    placeholder="DD/MM/YYYY"
                                    required
                                >
                                <small class="form-text">📅 Tanggal penutupan pendaftaran</small>
                            </div>
                        </div>

                        <!-- Kuota -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-chart-pie"></i>
                                <span>Kuota Penerimaan</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="kuota" 
                                value="{{ $ppdb['kuota'] ?? '' }}" 
                                placeholder="Contoh: 120 siswa"
                                required
                            >
                            <small class="form-text">👥 Total jumlah siswa yang akan diterima</small>
                        </div>

                        <div class="form-divider"></div>

                        <!-- Persyaratan -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-list-check"></i>
                                <span>Persyaratan (pisahkan dengan semicolon ;)</span>
                            </label>
                            <textarea 
                                class="form-control persyaratan-textarea" 
                                name="persyaratan" 
                                placeholder="Contoh:&#10;Fotokopi Ijazah SD;Surat Keterangan Lulus;Fotokopi Akta Kelahiran;Bukti Pembayaran Biaya Pendaftaran"
                                required
                            >{{ $ppdb['persyaratan'] ?? '' }}</textarea>
                            <small class="form-text">
                                📋 Persyaratan akan ditampilkan sebagai daftar terpisah pada halaman PPDB
                            </small>
                        </div>

                        <!-- Konten Deskripsi -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Konten Deskripsi PPDB</span>
                            </label>
                            <textarea 
                                class="form-control konten-textarea" 
                                name="konten" 
                                placeholder="Tuliskan deskripsi lengkap tentang program PPDB..."
                                required
                            >{{ $ppdb['konten'] ?? '' }}</textarea>
                            <small class="form-text">
                                📝 Deskripsi akan ditampilkan di halaman utama PPDB
                            </small>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <div class="btn-content">
                                <i class="fas fa-save"></i>
                                <span>Simpan Perubahan</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== FORM SUBMISSION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.ppdb-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalContent = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
                submitBtn.disabled = true;

                setTimeout(() => {
                    submitBtn.innerHTML = originalContent;
                    submitBtn.disabled = false;
                }, 1500);
            });
        }
    });

    // ==================== INPUT FOCUS EFFECT ==================== 
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // ==================== DATE INPUT FORMATTING ==================== 
    document.querySelectorAll('.dibuka-input, .ditutup-input').forEach(input => {
        input.addEventListener('keyup', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }
            if (value.length >= 5) {
                value = value.substring(0, 5) + '/' + value.substring(5, 9);
            }
            this.value = value;
        });
    });

    // ==================== TEXTAREA COUNTER ==================== 
    document.querySelectorAll('.persyaratan-textarea, .konten-textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            // Update stats if needed
            console.log(`${this.name}: ${this.value.length} characters`);
        });
    });

    // ==================== INFO BOX UPDATE ==================== 
    document.querySelector('input[name="kuota"]').addEventListener('input', function() {
        const infoBox = document.querySelector('.info-box:nth-child(2) .info-box-value');
        if (infoBox && this.value) {
            infoBox.textContent = this.value;
        }
    });

    // ==================== KEYBOARD SHORTCUTS ==================== 
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + S untuk submit
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            document.querySelector('.ppdb-form').submit();
        }
    });

    // ==================== AUTO-SAVE DRAFT ==================== 
    let autoSaveTimeout;
    document.querySelectorAll('.form-control, textarea').forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimeout);
            
            autoSaveTimeout = setTimeout(() => {
                const key = 'ppdb_draft_' + this.name;
                localStorage.setItem(key, this.value);
            }, 2000);
        });
    });

    // ==================== CLEAR DRAFT ON SUCCESS ==================== 
    if (document.querySelector('.alert-success')) {
        localStorage.removeItem('ppdb_draft_judul');
        localStorage.removeItem('ppdb_draft_dibuka');
        localStorage.removeItem('ppdb_draft_ditutup');
        localStorage.removeItem('ppdb_draft_kuota');
        localStorage.removeItem('ppdb_draft_persyaratan');
        localStorage.removeItem('ppdb_draft_konten');
    }

    // ==================== FORM VALIDATION ==================== 
    document.querySelectorAll('.form-control, textarea').forEach(input => {
        input.addEventListener('invalid', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--danger-color)';
            this.style.boxShadow = '0 0 0 3px rgba(245, 101, 101, 0.1)';
        });

        input.addEventListener('input', function() {
            if (this.validity.valid) {
                this.style.borderColor = 'var(--border-color)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // ==================== PREVENT ACCIDENTAL UNLOAD ==================== 
    let hasChanges = false;

    document.querySelectorAll('.form-control, textarea').forEach(input => {
        const originalValue = input.value;
        
        input.addEventListener('input', function() {
            hasChanges = this.value !== originalValue;
        });
    });

    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
        }
    });

    // ==================== SMOOTH SCROLL ==================== 
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ==================== INFO BOX ANIMATIONS ==================== 
    document.querySelectorAll('.info-box').forEach((box, index) => {
        box.style.animation = `fadeInUp 0.6s ease-out backwards`;
        box.style.animationDelay = `${0.2 + (index * 0.1)}s`;
    });
</script>

@endsection