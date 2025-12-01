@extends('layouts.admin')

@section('title', 'Sejarah Sekolah')
@section('page-title', 'Kelola Sejarah Sekolah')

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
    .sejarah-container {
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
    .sejarah-card {
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

    .sejarah-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-8px);
    }

    /* ==================== CARD HEADER ==================== */
    .sejarah-card-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: clamp(20px, 4vw, 32px);
        display: flex;
        align-items: center;
        gap: 16px;
        position: relative;
        overflow: hidden;
    }

    .sejarah-card-header::before {
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

    .sejarah-card-header::after {
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

    .sejarah-card-header-icon {
        font-size: clamp(28px, 5vw, 48px);
        animation: iconFloat 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0) rotateZ(0deg); }
        50% { transform: translateY(-12px) rotateZ(-10deg); }
    }

    .sejarah-card-header:hover .sejarah-card-header-icon {
        animation: none;
        transform: scale(1.3) rotateZ(15deg);
        transition: var(--transition);
    }

    .sejarah-card-header h3 {
        font-size: clamp(18px, 2.5vw, 28px);
        font-weight: 700;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* ==================== CARD BODY ==================== */
    .sejarah-card-body {
        padding: clamp(28px, 5vw, 40px);
    }

    /* ==================== FORM ELEMENTS ==================== */
    .form-group {
        margin-bottom: clamp(24px, 3vw, 32px);
        animation: fadeInUp 0.6s ease-out backwards;
    }

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

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }

    .form-label {
        display: block;
        font-size: clamp(13px, 1.5vw, 16px);
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: clamp(10px, 1.5vw, 14px);
        transition: var(--transition);
        text-transform: uppercase;
        letter-spacing: 1px;
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
        padding: clamp(14px, 2.5vw, 18px) clamp(16px, 3vw, 20px);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: clamp(13px, 1.5vw, 15px);
        font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        color: var(--text-dark);
        background: white;
        transition: var(--transition);
        resize: vertical;
        line-height: 1.7;
        min-height: clamp(150px, 20vw, 300px);
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

    .form-text {
        display: block;
        font-size: clamp(11px, 1.3vw, 13px);
        color: var(--text-muted);
        margin-top: clamp(8px, 1.5vw, 12px);
        font-style: italic;
        animation: fadeIn 0.4s ease-out 0.3s backwards;
    }

    /* ==================== CHARACTER & WORD COUNT ==================== */
    .text-stats {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: clamp(12px, 2vw, 16px);
        padding: clamp(12px, 2vw, 16px);
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        border-radius: 8px;
        animation: fadeIn 0.5s ease-out 0.4s backwards;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: clamp(11px, 1.3vw, 13px);
    }

    .stat-label {
        color: var(--text-muted);
        font-weight: 600;
    }

    .stat-value {
        color: var(--primary-color);
        font-weight: 700;
        font-size: clamp(12px, 1.5vw, 14px);
    }

    .stat-icon {
        color: var(--primary-color);
        font-size: clamp(12px, 1.5vw, 14px);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }

    /* ==================== BUTTONS ==================== */
    .btn-container {
        display: flex;
        gap: clamp(10px, 2vw, 16px);
        flex-wrap: wrap;
        margin-top: clamp(28px, 4vw, 40px);
        animation: fadeInUp 0.7s ease-out 0.5s backwards;
    }

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
        white-space: nowrap;
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
        flex: 1;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d, #5a6268);
        color: white;
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
        flex: 1;
    }

    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(108, 117, 125, 0.3);
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

    .alert-warning {
        background: linear-gradient(135deg, rgba(237, 137, 54, 0.1), rgba(217, 119, 6, 0.1));
        border-left-color: var(--warning-color);
        color: var(--warning-color);
    }

    .alert-warning i {
        color: var(--warning-color);
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

    /* ==================== EDITOR TOOLBAR ==================== */
    .editor-toolbar {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: clamp(16px, 2vw, 20px);
        padding: clamp(12px, 2vw, 16px);
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .toolbar-group {
        display: flex;
        gap: 4px;
    }

    .toolbar-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: clamp(32px, 5vw, 40px);
        height: clamp(32px, 5vw, 40px);
        border-radius: 6px;
        border: 1px solid var(--border-color);
        background: white;
        color: var(--text-dark);
        cursor: pointer;
        transition: var(--transition);
        font-size: clamp(12px, 1.5vw, 14px);
    }

    .toolbar-btn:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: scale(1.1);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1200px) {
        .sejarah-container {
            padding: clamp(12px, 2vw, 18px);
        }
    }

    @media (max-width: 768px) {
        .sejarah-card {
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .sejarah-card-header {
            padding: 16px;
            gap: 12px;
        }

        .sejarah-card-header h3 {
            font-size: 16px;
        }

        .sejarah-card-header-icon {
            font-size: 24px;
        }

        .sejarah-card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 12px;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .form-control {
            padding: 12px 14px;
            font-size: 13px;
            border-radius: 8px;
            min-height: 150px;
        }

        .form-text {
            font-size: 11px;
            margin-top: 6px;
        }

        .text-stats {
            gap: 10px;
            padding: 10px;
            margin-top: 10px;
        }

        .stat-item {
            font-size: 10px;
        }

        .stat-value {
            font-size: 12px;
        }

        .editor-toolbar {
            gap: 6px;
            margin-bottom: 12px;
            padding: 10px;
        }

        .toolbar-btn {
            width: 36px;
            height: 36px;
            font-size: 12px;
        }

        .btn-container {
            gap: 8px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 16px;
            font-size: 12px;
            gap: 8px;
            flex: 1;
        }

        .btn i {
            font-size: 14px;
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
        .sejarah-container {
            padding: 10px;
        }

        .sejarah-card {
            border-radius: 10px;
        }

        .sejarah-card-header {
            padding: 12px;
            gap: 10px;
            flex-direction: column;
            text-align: center;
        }

        .sejarah-card-header h3 {
            font-size: 14px;
        }

        .sejarah-card-header-icon {
            font-size: 28px;
        }

        .sejarah-card-body {
            padding: 14px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            font-size: 11px;
            margin-bottom: 6px;
            letter-spacing: 0;
            text-transform: capitalize;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 12px;
            border-radius: 6px;
            min-height: 120px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-text {
            font-size: 10px;
            margin-top: 6px;
        }

        .text-stats {
            gap: 8px;
            padding: 8px;
            margin-top: 8px;
            flex-direction: column;
        }

        .stat-item {
            font-size: 9px;
        }

        .stat-label {
            font-size: 9px;
        }

        .stat-value {
            font-size: 11px;
        }

        .editor-toolbar {
            gap: 4px;
            margin-bottom: 10px;
            padding: 8px;
        }

        .toolbar-btn {
            width: 32px;
            height: 32px;
            font-size: 11px;
        }

        .btn-container {
            gap: 6px;
            margin-top: 16px;
            flex-direction: column;
        }

        .btn {
            padding: 10px 14px;
            font-size: 11px;
            gap: 6px;
            width: 100%;
        }

        .btn i {
            font-size: 12px;
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
        .sejarah-card,
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

        .form-text {
            color: #a0aec0;
        }

        .text-stats {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-color: #4a5568;
        }

        .editor-toolbar {
            background: #1a202c;
            border-color: #4a5568;
        }

        .toolbar-btn {
            background: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .toolbar-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.15));
            border-left-color: #48bb78;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.15), rgba(49, 130, 206, 0.15));
            border-left-color: #4299e1;
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(237, 137, 54, 0.15), rgba(217, 119, 6, 0.15));
            border-left-color: #ed8936;
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .btn-container,
        .editor-toolbar,
        .form-text {
            display: none;
        }

        .sejarah-card {
            box-shadow: none;
            border: 1px solid #000;
        }

        .form-control {
            border: 1px solid #000;
        }
    }
</style>

<!-- Main Container -->
<div class="sejarah-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <div class="alert-content">
                    <strong>Berhasil!</strong> Sejarah sekolah telah diperbarui.
                </div>
                <span class="alert-close" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
            @endif

            <!-- Main Card -->
            <div class="sejarah-card">
                <div class="sejarah-card-header">
                    <i class="fas fa-history sejarah-card-header-icon"></i>
                    <h3>Sejarah Sekolah MTsN 1 Magetan</h3>
                </div>

                <div class="sejarah-card-body">
                    <!-- Editor Toolbar -->
                    <div class="editor-toolbar">
                        <div class="toolbar-group">
                            <button type="button" class="toolbar-btn" title="Bold" onclick="insertMarkdown('**', '**')">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" class="toolbar-btn" title="Italic" onclick="insertMarkdown('*', '*')">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" class="toolbar-btn" title="Underline" onclick="insertMarkdown('__', '__')">
                                <i class="fas fa-underline"></i>
                            </button>
                        </div>
                        <div class="toolbar-group">
                            <button type="button" class="toolbar-btn" title="Heading" onclick="insertMarkdown('\n## ', '\n')">
                                <i class="fas fa-heading"></i>
                            </button>
                            <button type="button" class="toolbar-btn" title="List" onclick="insertMarkdown('\n- ', '')">
                                <i class="fas fa-list"></i>
                            </button>
                            <button type="button" class="toolbar-btn" title="Quote" onclick="insertMarkdown('\n> ', '')">
                                <i class="fas fa-quote-left"></i>
                            </button>
                        </div>
                        <div class="toolbar-group">
                            <button type="button" class="toolbar-btn" title="Clear Format" onclick="clearFormat()">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.sejarah.update') }}" class="sejarah-form">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Konten Sejarah</span>
                            </label>
                            <textarea 
                                class="form-control sejarah-textarea" 
                                name="content" 
                                placeholder="Tuliskan sejarah lengkap MTsN 1 Magetan dengan detail yang komprehensif. Gunakan toolbar untuk memformat teks."
                                required
                            >{{ $sejarah['content'] ?? '' }}</textarea>
                            <small class="form-text">
                                📝 Gunakan tombol di atas untuk memformat teks, atau tulis konten dengan markup sederhana
                            </small>

                            <!-- Text Statistics -->
                            <div class="text-stats">
                                <div class="stat-item">
                                    <i class="fas fa-font stat-icon"></i>
                                    <span class="stat-label">Karakter:</span>
                                    <span class="stat-value char-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-align-left stat-icon"></i>
                                    <span class="stat-label">Kata:</span>
                                    <span class="stat-value word-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-paragraph stat-icon"></i>
                                    <span class="stat-label">Paragraf:</span>
                                    <span class="stat-value paragraph-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-clock stat-icon"></i>
                                    <span class="stat-label">Est. Baca:</span>
                                    <span class="stat-value read-time">0 min</span>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary">
                                <div class="btn-content">
                                    <i class="fas fa-save"></i>
                                    <span>Simpan Perubahan</span>
                                </div>
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <div class="btn-content">
                                    <i class="fas fa-undo"></i>
                                    <span>Reset</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== TEXTAREA STATISTICS ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.querySelector('.sejarah-textarea');
        const charCount = document.querySelector('.char-count');
        const wordCount = document.querySelector('.word-count');
        const paragraphCount = document.querySelector('.paragraph-count');
        const readTime = document.querySelector('.read-time');

        function updateStats() {
            const text = textarea.value;
            
            // Character count
            const chars = text.length;
            charCount.textContent = chars.toLocaleString();

            // Word count
            const words = text.trim() ? text.trim().split(/\s+/).length : 0;
            wordCount.textContent = words.toLocaleString();

            // Paragraph count
            const paragraphs = text.trim() ? text.trim().split(/\n\n+/).length : 0;
            paragraphCount.textContent = paragraphs;

            // Reading time (avg 200 words per minute)
            const minutes = Math.ceil(words / 200);
            readTime.textContent = minutes + ' min';
        }

        // Initial stats
        updateStats();

        // Update on input
        textarea.addEventListener('input', function() {
            updateStats();
        });
    });

    // ==================== MARKDOWN INSERTION ==================== 
    function insertMarkdown(before, after) {
        const textarea = document.querySelector('.sejarah-textarea');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        const selectedText = text.substring(start, end);

        const newText = text.substring(0, start) + before + selectedText + after + text.substring(end);
        textarea.value = newText;
        
        // Update cursor position
        textarea.selectionStart = start + before.length;
        textarea.selectionEnd = start + before.length + selectedText.length;
        textarea.focus();

        // Trigger input event for stats update
        textarea.dispatchEvent(new Event('input'));
    }

    // ==================== CLEAR FORMAT ==================== 
    function clearFormat() {
        const textarea = document.querySelector('.sejarah-textarea');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        const selectedText = text.substring(start, end);

        // Remove markdown formatting
        const cleaned = selectedText
            .replace(/\*\*(.*?)\*\*/g, '$1')
            .replace(/\*(.*?)\*/g, '$1')
            .replace(/__(.*?)__/g, '$1')
            .replace(/`(.*?)`/g, '$1')
            .replace(/~~(.*?)~~/g, '$1');

        const newText = text.substring(0, start) + cleaned + text.substring(end);
        textarea.value = newText;
        textarea.selectionStart = start;
        textarea.selectionEnd = start + cleaned.length;
        textarea.focus();

        textarea.dispatchEvent(new Event('input'));
    }

    // ==================== FORM SUBMISSION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.sejarah-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalContent = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
                submitBtn.disabled = true;
            });
        }
    });

    // ==================== RESET FORM ==================== 
    function resetForm() {
        const textarea = document.querySelector('.sejarah-textarea');
        if (confirm('Yakin ingin mereset konten? Perubahan yang belum disimpan akan hilang.')) {
            location.reload();
        }
    }

    // ==================== INPUT FOCUS EFFECT ==================== 
    document.querySelectorAll('.form-control').forEach(textarea => {
        textarea.addEventListener('focus', function() {
            this.style.transform = 'scale(1.01)';
        });
        
        textarea.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // ==================== TOOLBAR BUTTON FEEDBACK ==================== 
    document.querySelectorAll('.toolbar-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
        });
    });

    // ==================== KEYBOARD SHORTCUTS ==================== 
    document.addEventListener('keydown', function(e) {
        const textarea = document.querySelector('.sejarah-textarea');
        
        if (document.activeElement === textarea) {
            // Ctrl/Cmd + B for Bold
            if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                e.preventDefault();
                insertMarkdown('**', '**');
            }
            
            // Ctrl/Cmd + I for Italic
            if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
                e.preventDefault();
                insertMarkdown('*', '*');
            }
            
            // Ctrl/Cmd + U for Underline
            if ((e.ctrlKey || e.metaKey) && e.key === 'u') {
                e.preventDefault();
                insertMarkdown('__', '__');
            }
        }

        // Ctrl/Cmd + S untuk submit
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            document.querySelector('.sejarah-form').submit();
        }
    });

    // ==================== AUTO-SAVE DRAFT ==================== 
    let autoSaveTimeout;
    document.querySelector('.sejarah-textarea').addEventListener('input', function() {
        clearTimeout(autoSaveTimeout);
        
        autoSaveTimeout = setTimeout(() => {
            localStorage.setItem('sejarah_draft', this.value);
            console.log('Draft tersimpan otomatis');
        }, 3000);
    });

    // ==================== LOAD DRAFT ON PAGE LOAD ==================== 
    window.addEventListener('load', function() {
        // Uncomment untuk enable auto-load draft
        // const draft = localStorage.getItem('sejarah_draft');
        // if (draft && confirm('Ditemukan draft sebelumnya. Muat draft?')) {
        //     document.querySelector('.sejarah-textarea').value = draft;
        //     document.querySelector('.sejarah-textarea').dispatchEvent(new Event('input'));
        // }
    });

    // ==================== CLEAR DRAFT ON SUCCESS ==================== 
    if (document.querySelector('.alert-success')) {
        localStorage.removeItem('sejarah_draft');
    }

    // ==================== PREVENT ACCIDENTAL UNLOAD ==================== 
    let hasChanges = false;
    const textarea = document.querySelector('.sejarah-textarea');
    const originalContent = textarea.value;

    textarea.addEventListener('input', function() {
        hasChanges = this.value !== originalContent;
    });

    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
        }
    });

    // ==================== FORM RESET HANDLER ==================== 
    document.querySelector('.sejarah-form').addEventListener('reset', function() {
        document.querySelector('.sejarah-textarea').dispatchEvent(new Event('input'));
    });
</script>

@endsection