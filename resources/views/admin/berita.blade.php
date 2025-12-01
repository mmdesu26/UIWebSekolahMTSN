@extends('layouts.admin')

@section('title', 'Berita & Pengumuman')
@section('page-title', 'Kelola Berita & Pengumuman')

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
    .berita-container {
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

    /* ==================== ROW CONTAINER ==================== */
    .berita-row {
        display: flex;
        flex-direction: column;
        gap: clamp(20px, 3vw, 32px);
    }

    /* ==================== CARD BASE ==================== */
    .berita-card {
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

    .berita-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-8px);
    }

    /* ==================== CARD HEADER ==================== */
    .berita-card-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: white;
        padding: clamp(18px, 3vw, 28px);
        display: flex;
        align-items: center;
        gap: 14px;
        position: relative;
        overflow: hidden;
    }

    .berita-card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
        animation: moveGradient 15s ease-in-out infinite;
    }

    @keyframes moveGradient {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, 20px); }
    }

    .berita-card-header-icon {
        font-size: clamp(24px, 4vw, 36px);
        animation: iconBounce 2.5s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    @keyframes iconBounce {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-10px) scale(1.1); }
    }

    .berita-card-header:hover .berita-card-header-icon {
        animation: none;
        transform: scale(1.3) rotate(-15deg);
        transition: var(--transition);
    }

    .berita-card-header h4 {
        font-size: clamp(16px, 2.2vw, 22px);
        font-weight: 700;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
        margin: 0;
    }

    .berita-card-header .badge-counter {
        margin-left: auto;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: clamp(12px, 1.5vw, 14px);
        font-weight: 700;
        position: relative;
        z-index: 1;
        animation: scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* ==================== CARD BODY ==================== */
    .berita-card-body {
        padding: clamp(24px, 4vw, 36px);
    }

    /* ==================== FORM SECTION ==================== */
    .form-section {
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

    /* ==================== FORM ELEMENTS ==================== */
    .form-group {
        margin-bottom: clamp(18px, 2.5vw, 24px);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        font-size: clamp(12px, 1.5vw, 14px);
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: clamp(8px, 1.2vw, 12px);
        transition: var(--transition);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-label i {
        font-size: clamp(12px, 1.5vw, 14px);
        color: var(--primary-color);
    }

    .form-control {
        width: 100%;
        padding: clamp(10px, 1.8vw, 14px) clamp(12px, 2vw, 16px);
        border: 2px solid var(--border-color);
        border-radius: 10px;
        font-size: clamp(12px, 1.5vw, 14px);
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
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus) {
        border-color: var(--primary-light);
    }

    textarea.form-control {
        resize: vertical;
        min-height: clamp(120px, 15vw, 200px);
    }

    /* ==================== BUTTONS ==================== */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: clamp(10px, 1.8vw, 14px) clamp(18px, 2.5vw, 24px);
        border-radius: 10px;
        font-size: clamp(12px, 1.4vw, 14px);
        font-weight: 700;
        text-decoration: none;
        transition: var(--transition);
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.3px;
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
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .btn-sm {
        padding: clamp(6px, 1.2vw, 8px) clamp(10px, 1.8vw, 12px);
        font-size: clamp(11px, 1.2vw, 12px);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);
        color: white;
        box-shadow: 0 4px 12px rgba(237, 137, 54, 0.2);
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(237, 137, 54, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-color), #e53e3e);
        color: white;
        box-shadow: 0 4px 12px rgba(245, 101, 101, 0.2);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(245, 101, 101, 0.3);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d, #5a6268);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
    }

    .btn i {
        transition: var(--transition);
        font-size: clamp(12px, 1.5vw, 14px);
    }

    .btn:hover i {
        transform: scale(1.15) rotate(8deg);
    }

    /* ==================== TABLE ==================== */
    .table-responsive {
        border-radius: 0 0 16px 16px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
        font-size: clamp(11px, 1.3vw, 13px);
    }

    .table thead {
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        border-bottom: 2px solid var(--border-color);
    }

    .table thead th {
        padding: clamp(12px, 2vw, 16px);
        font-weight: 700;
        color: var(--text-dark);
        text-transform: uppercase;
        font-size: clamp(10px, 1.2vw, 12px);
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
        animation: slideInRight 0.4s ease-out backwards;
    }

    .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(5) { animation-delay: 0.5s; }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        box-shadow: inset 0 0 0 1px var(--border-color);
        transform: scale(1.01);
    }

    .table tbody td {
        padding: clamp(12px, 2vw, 16px);
        color: var(--text-light);
        vertical-align: middle;
    }

    .table tbody td strong {
        color: var(--text-dark);
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    /* ==================== BADGE ==================== */
    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: clamp(10px, 1.2vw, 12px);
        font-weight: 600;
        transition: var(--transition);
    }

    .badge:hover {
        transform: scale(1.08);
    }

    .bg-info {
        background: linear-gradient(135deg, var(--info-color), #3182ce);
        color: white;
    }

    .bg-warning {
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);
        color: white;
    }

    /* ==================== ACTION BUTTONS ==================== */
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .action-buttons form {
        display: contents;
    }

    /* ==================== EMPTY STATE ==================== */
    .empty-state {
        padding: clamp(40px, 8vw, 60px) clamp(20px, 3vw, 30px);
        text-align: center;
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
    }

    .empty-state i {
        font-size: clamp(36px, 6vw, 56px);
        color: var(--border-color);
        margin-bottom: clamp(12px, 2vw, 16px);
        opacity: 0.5;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .empty-state p {
        font-size: clamp(12px, 1.5vw, 14px);
        color: var(--text-muted);
        margin: 0;
    }

    /* ==================== MODAL ==================== */
    .modal-content {
        border: 1px solid var(--border-color);
        border-radius: 14px;
        box-shadow: var(--shadow-xl);
        animation: modalSlide 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes modalSlide {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(-50px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border-bottom: 2px solid var(--primary-dark);
        padding: clamp(16px, 2.5vw, 20px);
    }

    .modal-header .modal-title {
        font-size: clamp(14px, 1.8vw, 18px);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modal-header .btn-close {
        filter: invert(1) brightness(1.5);
        transition: var(--transition);
    }

    .modal-header .btn-close:hover {
        transform: rotate(90deg);
    }

    .modal-body {
        padding: clamp(18px, 2.5vw, 24px);
    }

    .modal-footer {
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        border-top: 1px solid var(--border-color);
        padding: clamp(12px, 2vw, 16px);
        gap: 8px;
    }

    /* ==================== ALERTS ==================== */
    .alert-success {
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));
        border: 2px solid var(--success-color);
        color: var(--success-color);
        padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 20px);
        border-radius: 10px;
        margin-bottom: clamp(16px, 2vw, 24px);
        animation: slideInDown 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
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

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1200px) {
        .berita-container {
            padding: clamp(12px, 2vw, 18px);
        }
    }

    @media (max-width: 768px) {
        .berita-card {
            border-radius: 12px;
        }

        .berita-card-header {
            flex-wrap: wrap;
            padding: 14px;
            gap: 10px;
        }

        .berita-card-header h4 {
            font-size: 14px;
            order: 2;
            width: 100%;
        }

        .berita-card-header-icon {
            font-size: 20px;
        }

        .berita-card-header .badge-counter {
            order: 3;
            width: 100%;
            text-align: center;
            margin-left: 0;
            margin-top: 8px;
            padding: 5px 10px;
            font-size: 12px;
        }

        .berita-card-body {
            padding: 16px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            font-size: 11px;
            margin-bottom: 6px;
            letter-spacing: 0;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 12px;
            border-radius: 8px;
        }

        textarea.form-control {
            min-height: 120px;
        }

        .btn {
            padding: 9px 14px;
            font-size: 11px;
            gap: 6px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 10px;
        }

        .table {
            font-size: 11px;
        }

        .table thead th,
        .table tbody td {
            padding: 10px 8px;
        }

        .table thead th {
            font-size: 9px;
        }

        .action-buttons {
            gap: 4px;
        }

        .badge {
            font-size: 10px;
            padding: 4px 8px;
        }

        .modal-body {
            padding: 14px;
        }

        .modal-header,
        .modal-footer {
            padding: 12px;
        }
    }

    @media (max-width: 480px) {
        .berita-container {
            padding: 8px;
        }

        .berita-card {
            border-radius: 10px;
        }

        .berita-card-header {
            padding: 12px;
            gap: 8px;
            flex-direction: column;
            text-align: center;
        }

        .berita-card-header h4 {
            font-size: 13px;
            order: 2;
            width: 100%;
        }

        .berita-card-header-icon {
            font-size: 24px;
            order: 1;
        }

        .berita-card-header .badge-counter {
            order: 3;
            width: 100%;
            margin-top: 8px;
            margin-left: 0;
        }

        .berita-card-body {
            padding: 12px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-label {
            font-size: 10px;
            margin-bottom: 5px;
            text-transform: capitalize;
        }

        .form-control {
            padding: 8px 10px;
            font-size: 11px;
            border-radius: 6px;
        }

        textarea.form-control {
            min-height: 100px;
        }

        .btn {
            padding: 8px 12px;
            font-size: 10px;
            gap: 6px;
            width: 100%;
            justify-content: center;
        }

        .btn-sm {
            padding: 6px 8px;
            font-size: 9px;
            width: auto;
            gap: 4px;
        }

        .action-buttons {
            gap: 3px;
        }

        .table {
            font-size: 10px;
        }

        .table thead th,
        .table tbody td {
            padding: 8px 6px;
        }

        .table thead th {
            font-size: 8px;
        }

        .badge {
            font-size: 9px;
            padding: 3px 6px;
        }

        .empty-state {
            padding: 30px 15px;
        }

        .empty-state i {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 11px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            padding: 10px;
        }

        .modal-header .modal-title {
            font-size: 13px;
            gap: 6px;
        }

        .modal-body,
        .modal-footer {
            padding: 10px;
        }
    }

    /* ==================== ANIMATIONS ==================== */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
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
        .berita-card,
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

        .table thead {
            background: #1a202c;
            border-bottom-color: #4a5568;
        }

        .table thead th {
            color: #e2e8f0;
        }

        .table tbody tr:hover {
            background: #2d3748;
        }

        .empty-state {
            background: #1a202c;
        }

        .modal-body {
            background: #2d3748;
        }

        .modal-footer {
            background: #1a202c;
            border-top-color: #4a5568;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.15));
            border-color: #48bb78;
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .btn,
        .action-buttons {
            display: none;
        }

        .berita-card {
            box-shadow: none;
            border: 1px solid #000;
        }

        .form-control {
            border: 1px solid #000;
        }
    }
</style>

<!-- Main Container -->
<div class="berita-container">
    <div class="berita-row">
        <div class="col-lg-8 offset-lg-2" style="padding: 0;">

            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <div>
                    <strong>Berhasil!</strong> Data berita telah diperbarui.
                </div>
            </div>
            @endif

            <!-- FORM TAMBAH CARD -->
            <div class="berita-card">
                <div class="berita-card-header">
                    <i class="fas fa-plus-circle berita-card-header-icon"></i>
                    <h4>Tambah Berita/Pengumuman Baru</h4>
                </div>
                <div class="berita-card-body">
                    <form method="POST" action="{{ route('admin.berita.add') }}" class="berita-form">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                <span>Judul</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="judul" 
                                placeholder="Masukkan judul berita atau pengumuman" 
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tag"></i>
                                <span>Tipe</span>
                            </label>
                            <select class="form-control" name="tipe" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="berita">📰 Berita</option>
                                <option value="pengumuman">📢 Pengumuman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Konten</span>
                            </label>
                            <textarea 
                                class="form-control" 
                                name="konten" 
                                placeholder="Tuliskan isi berita atau pengumuman secara detail..." 
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <div class="btn-content">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Berita</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>

            <!-- DAFTAR CARD -->
            <div class="berita-card">
                <div class="berita-card-header">
                    <i class="fas fa-list berita-card-header-icon"></i>
                    <h4>Daftar Berita & Pengumuman</h4>
                    <div class="badge-counter">{{ count($berita) }} Item</div>
                </div>

                @if(count($berita) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 8%;">No</th>
                                <th style="width: 35%;">Judul</th>
                                <th style="width: 18%;">Tipe</th>
                                <th style="width: 20%;">Tanggal</th>
                                <th style="width: 19%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($berita as $item)
                            <tr>
                                <td>
                                    <strong>{{ $loop->iteration }}</strong>
                                </td>
                                <td>
                                    <strong title="{{ $item['judul'] }}">
                                        {{ substr($item['judul'], 0, 40) }}{{ strlen($item['judul']) > 40 ? '...' : '' }}
                                    </strong>
                                </td>
                                <td>
                                    @if($item['tipe'] == 'berita')
                                        <span class="badge bg-info">
                                            <i class="fas fa-newspaper"></i> Berita
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="fas fa-bell"></i> Pengumuman
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ date('d/m/Y', strtotime($item['tanggal'])) }}
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-warning" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editBerita{{ $item['id'] }}"
                                            title="Edit Data"
                                        >
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-sm-inline">Edit</span>
                                        </button>
                                        <form 
                                            method="POST" 
                                            action="{{ route('admin.berita.delete', $item['id']) }}" 
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?');"
                                        >
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                                <span class="d-none d-sm-inline">Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL EDIT -->
                            <div class="modal fade" id="editBerita{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-edit"></i> Edit Berita/Pengumuman
                                            </h5>
                                            <button 
                                                type="button" 
                                                class="btn-close" 
                                                data-bs-dismiss="modal" 
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.berita.update', $item['id']) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        <i class="fas fa-heading"></i>
                                                        <span>Judul</span>
                                                    </label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        name="judul" 
                                                        value="{{ $item['judul'] }}" 
                                                        required
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        <i class="fas fa-tag"></i>
                                                        <span>Tipe</span>
                                                    </label>
                                                    <select class="form-control" name="tipe" required>
                                                        <option value="berita" @if($item['tipe'] == 'berita') selected @endif>
                                                            📰 Berita
                                                        </option>
                                                        <option value="pengumuman" @if($item['tipe'] == 'pengumuman') selected @endif>
                                                            📢 Pengumuman
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        <i class="fas fa-file-alt"></i>
                                                        <span>Konten</span>
                                                    </label>
                                                    <textarea 
                                                        class="form-control" 
                                                        name="konten" 
                                                        required
                                                    >{{ $item['konten'] }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button 
                                                    type="button" 
                                                    class="btn btn-secondary" 
                                                    data-bs-dismiss="modal"
                                                >
                                                    <i class="fas fa-times"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada data berita atau pengumuman</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== FORM SUBMISSION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.berita-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalContent = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menambahkan...</span></div>';
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

    // ==================== TABLE ROW ANIMATION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(-20px)';
            setTimeout(() => {
                row.style.transition = 'all 0.4s ease-out';
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, 100 + (index * 80));
        });
    });

    // ==================== DELETE CONFIRMATION ==================== 
    document.querySelectorAll('form[onsubmit*="confirm"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        });
    });

    // ==================== MODAL ANIMATIONS ==================== 
    document.querySelectorAll('[id^="editBerita"]').forEach(modal => {
        const bsModal = new bootstrap.Modal(modal, { backdrop: 'static' });
        
        modal.addEventListener('show.bs.modal', function() {
            this.style.animation = 'fadeIn 0.3s ease-out';
        });
    });

    // ==================== BADGE HOVER EFFECT ==================== 
    document.querySelectorAll('.badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // ==================== KEYBOARD SHORTCUTS ==================== 
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + S untuk submit form
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            const form = document.querySelector('.berita-form');
            if (form) form.submit();
        }
    });

    // ==================== AUTO-SAVE DRAFT ==================== 
    let autoSaveTimeout;
    document.querySelectorAll('.form-control, textarea').forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimeout);
            
            autoSaveTimeout = setTimeout(() => {
                const key = 'berita_draft_' + this.name;
                localStorage.setItem(key, this.value);
            }, 2000);
        });
    });

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
</script>

@endsection