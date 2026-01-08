@extends('layouts.admin')

@section('title', 'Visi & Misi')
@section('page-title', 'Kelola Visi & Misi')

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
    .visi-misi-container {
        animation: fadeIn 0.6s ease-out;
        min-height: 100vh;
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
    .vm-card {
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

    .vm-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-8px);
    }

    /* ==================== CARD HEADER ==================== */
    .vm-card-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: white;
        padding: clamp(20px, 4vw, 32px);
        display: flex;
        align-items: center;
        gap: 16px;
        position: relative;
        overflow: hidden;
    }

    .vm-card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: movePattern 20s linear infinite;
    }

    @keyframes movePattern {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .vm-card-header-icon {
        font-size: clamp(28px, 5vw, 40px);
        animation: iconBounce 2.5s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes iconBounce {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-10px) scale(1.1); }
    }

    .vm-card-header:hover .vm-card-header-icon {
        animation: none;
        transform: scale(1.3) rotate(-15deg);
        transition: var(--transition);
    }

    .vm-card-header h4 {
        font-size: clamp(18px, 2.5vw, 24px);
        font-weight: 700;
        letter-spacing: 0.5px;
        z-index: 1;
        margin: 0;
    }

    /* ==================== CARD BODY ==================== */
    .vm-card-body {
        padding: clamp(28px, 5vw, 40px);
    }

    /* ==================== FORM SECTIONS ==================== */
    .form-section {
        margin-bottom: clamp(28px, 4vw, 40px);
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .form-section:nth-child(1) { animation-delay: 0.2s; }
    .form-section:nth-child(2) { animation-delay: 0.4s; }

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

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: clamp(16px, 2.2vw, 20px);
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: clamp(16px, 2vw, 24px);
        padding-bottom: clamp(12px, 2vw, 16px);
        border-bottom: 3px solid var(--primary-color);
        position: relative;
    }

    .section-title i {
        font-size: clamp(18px, 2.5vw, 24px);
        color: var(--primary-color);
        animation: iconRotate 3s linear infinite;
    }

    @keyframes iconRotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .section-title:hover i {
        animation: none;
        transform: scale(1.2);
        transition: var(--transition);
    }

    /* ==================== FORM ELEMENTS ==================== */
    .form-group {
        margin-bottom: clamp(20px, 3vw, 28px);
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
        letter-spacing: 1px;
    }

    .form-label strong {
        display: block;
        margin-bottom: 4px;
    }

    .form-control {
        width: 100%;
        padding: clamp(12px, 2vw, 16px) clamp(14px, 2.5vw, 18px);
        border: 2px solid var(--border-color);
        border-radius: 10px;
        font-size: clamp(13px, 1.5vw, 15px);
        font-family: inherit;
        color: var(--text-dark);
        background: white;
        transition: var(--transition);
        resize: vertical;
        line-height: 1.6;
    }

    .form-control::placeholder {
        color: var(--text-muted);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        background: rgba(102, 126, 234, 0.02);
        transform: translateY(-2px);
    }

    .form-control:hover {
        border-color: var(--primary-light);
    }

    .form-text {
        display: block;
        font-size: clamp(11px, 1.3vw, 13px);
        color: var(--text-muted);
        margin-top: clamp(6px, 1vw, 10px);
        font-style: italic;
    }

    /* ==================== FORM DIVIDER ==================== */
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

    .form-divider::after {
        content: '✦';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 0 12px;
        color: var(--primary-color);
        font-size: 18px;
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
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(102, 126, 234, 0.4);
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

    /* ==================== CHARACTER COUNT ==================== */
    .char-count {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: clamp(8px, 1vw, 12px);
        font-size: clamp(11px, 1.3vw, 13px);
        color: var(--text-muted);
        animation: fadeIn 0.3s ease-out;
    }

    .char-counter {
        display: flex;
        gap: 4px;
        align-items: center;
    }

    .char-counter span {
        font-weight: 700;
        color: var(--primary-color);
    }

    /* ==================== SUCCESS MESSAGE ==================== */
    .alert {
        padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 20px);
        border-radius: 10px;
        margin-bottom: clamp(20px, 3vw, 28px);
        font-size: clamp(13px, 1.5vw, 15px);
        display: flex;
        align-items: center;
        gap: 12px;
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

    .alert i {
        font-size: clamp(16px, 2vw, 20px);
        flex-shrink: 0;
    }

    .alert-success {
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));
        border: 2px solid var(--success-color);
        color: var(--success-color);
    }

    .alert-danger {
        background: linear-gradient(135deg, rgba(245, 101, 101, 0.1), rgba(229, 62, 62, 0.1));
        border: 2px solid var(--danger-color);
        color: var(--danger-color);
    }

    .alert-info {
        background: linear-gradient(135deg, rgba(66, 153, 225, 0.1), rgba(49, 130, 206, 0.1));
        border: 2px solid var(--info-color);
        color: var(--info-color);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1200px) {
        .visi-misi-container {
            padding: clamp(15px, 3vw, 20px);
        }

        .vm-card {
            border-radius: 14px;
        }
    }

    @media (max-width: 768px) {
        .vm-card {
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .vm-card-header {
            padding: 16px;
            gap: 12px;
        }

        .vm-card-header h4 {
            font-size: 16px;
        }

        .vm-card-body {
            padding: 20px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 15px;
            margin-bottom: 12px;
            gap: 8px;
        }

        .section-title i {
            font-size: 18px;
        }

        .form-label {
            font-size: 12px;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .form-control {
            padding: 10px 12px;
            font-size: 13px;
            border-radius: 8px;
        }

        .form-text {
            font-size: 11px;
            margin-top: 6px;
        }

        .btn {
            padding: 10px 18px;
            font-size: 12px;
            gap: 8px;
            width: 100%;
            justify-content: center;
        }

        .btn i {
            font-size: 14px;
        }

        .char-count {
            margin-top: 8px;
            font-size: 10px;
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
        .vm-card {
            border-radius: 10px;
        }

        .vm-card-header {
            padding: 14px;
            gap: 10px;
        }

        .vm-card-header-icon {
            font-size: 24px;
        }

        .vm-card-header h4 {
            font-size: 14px;
        }

        .vm-card-body {
            padding: 16px;
        }

        .form-section {
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 13px;
            margin-bottom: 10px;
            gap: 6px;
            padding-bottom: 8px;
        }

        .section-title i {
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 11px;
            margin-bottom: 6px;
            letter-spacing: 0;
            text-transform: capitalize;
        }

        .form-control {
            padding: 9px 10px;
            font-size: 12px;
            border-radius: 6px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-text {
            font-size: 10px;
            margin-top: 5px;
        }

        .form-divider {
            margin: 16px 0;
        }

        .form-divider::after {
            font-size: 14px;
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

        .char-count {
            margin-top: 6px;
            font-size: 9px;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .alert {
            padding: 10px;
            font-size: 11px;
            gap: 8px;
        }

        .alert i {
            font-size: 14px;
        }

        hr {
            margin: 12px 0;
            border-top: 1px solid var(--border-color);
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

    .form-control:focus {
        animation: pulse 0.5s ease-in-out;
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
        .vm-card,
        .form-control {
            background: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .form-label,
        .section-title,
        .form-control {
            color: #e2e8f0;
        }

        .form-control::placeholder {
            color: #718096;
        }

        .form-text {
            color: #a0aec0;
        }

        .form-divider {
            background: linear-gradient(90deg, transparent, #4a5568, transparent);
        }

        .form-divider::after {
            background: #2d3748;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.15));
            border-color: #48bb78;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.15), rgba(49, 130, 206, 0.15));
            border-color: #4299e1;
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .btn,
        .form-text {
            display: none;
        }

        .vm-card {
            box-shadow: none;
            border: 1px solid #000;
        }

        .form-control {
            border: 1px solid #000;
        }
    }
</style>

<!-- Main Container -->
<div class="visi-misi-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <!-- Main Card -->
            <div class="vm-card">
                <div class="vm-card-header">
                    <i class="fas fa-lightbulb vm-card-header-icon"></i>
                    <h4>Visi & Misi MTsN 1 Magetan</h4>
                </div>

                <div class="vm-card-body">
                    <form method="POST" action="{{ route('admin.visi-misi.update') }}" class="visi-misi-form">
                        @csrf

                        <!-- VISI SECTION -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fas fa-bullseye"></i>
                                <span>VISI</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <strong>Masukkan Visi Sekolah</strong>
                                </label>
                                <textarea 
                                    class="form-control visi-textarea" 
                                    name="visi" 
                                    rows="5" 
                                    placeholder="Tuliskan visi sekolah yang inspiratif dan visioner..."
                                    maxlength="500"
                                    required
                                >{{ old('visi', $visiMisi['visi'] ?? '') }}</textarea>
                                <small class="form-text">
                                    📝 Tuliskan visi yang menggambarkan cita-cita jangka panjang sekolah
                                </small>
                                <div class="char-count">
                                    <span>Karakter:</span>
                                    <div class="char-counter">
                                        <span class="visi-count">0</span>
                                        <span>/500</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DIVIDER -->
                        <div class="form-divider"></div>

                        <!-- MISI SECTION -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fas fa-tasks"></i>
                                <span>MISI</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <strong>Daftar Misi Sekolah</strong>
                                </label>
                                <textarea 
                                    class="form-control misi-textarea" 
                                    name="misi" 
                                    rows="8" 
                                    placeholder="Tuliskan misi sekolah (pisahkan setiap poin dengan baris baru)&#10;Contoh:&#10;1. Menyelenggarakan pendidikan berkualitas&#10;2. Mengembangkan karakter peserta didik&#10;3. Mempersiapkan generasi yang kompeten"
                                    maxlength="1000"
                                    required
                                >{{ old('misi', $visiMisi['misi'] ?? '') }}</textarea>
                                <small class="form-text">
                                    📋 Tuliskan setiap misi dalam baris terpisah untuk format yang lebih rapi
                                </small>
                                <div class="char-count">
                                    <span>Karakter:</span>
                                    <div class="char-counter">
                                        <span class="misi-count">0</span>
                                        <span>/1000</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->
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
    // ==================== CHARACTER COUNTER ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const visiTextarea = document.querySelector('.visi-textarea');
        const misiTextarea = document.querySelector('.misi-textarea');
        const visiCount = document.querySelector('.visi-count');
        const misiCount = document.querySelector('.misi-count');

        function updateCounter(textarea, counter) {
            counter.textContent = textarea.value.length;
        }

        if (visiTextarea) {
            updateCounter(visiTextarea, visiCount);
            visiTextarea.addEventListener('input', function() {
                updateCounter(this, visiCount);
            });
        }

        if (misiTextarea) {
            updateCounter(misiTextarea, misiCount);
            misiTextarea.addEventListener('input', function() {
                updateCounter(this, misiCount);
            });
        }
    });

    // ==================== FORM SUBMISSION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.visi-misi-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalContent = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Menyimpan...</span></div>';
                submitBtn.disabled = true;
            });
        }
    });

    // ==================== INPUT FOCUS EFFECT ==================== 
    document.querySelectorAll('.form-control').forEach(textarea => {
        textarea.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
            this.parentElement.style.opacity = '1';
        });
        
        textarea.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // ==================== KEYBOARD SHORTCUTS ==================== 
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            document.querySelector('.visi-misi-form').submit();
        }
    });

    // ==================== VALIDATION FEEDBACK ==================== 
    document.querySelectorAll('.form-control').forEach(textarea => {
        textarea.addEventListener('invalid', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--danger-color)';
            this.style.boxShadow = '0 0 0 3px rgba(245, 101, 101, 0.1)';
        });

        textarea.addEventListener('input', function() {
            if (this.validity.valid) {
                this.style.borderColor = 'var(--border-color)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // ==================== PREVENT ACCIDENTAL UNLOAD ==================== 
    let hasChanges = false;
    const originalVisi = document.querySelector('.visi-textarea').value;
    const originalMisi = document.querySelector('.misi-textarea').value;

    document.querySelectorAll('.form-control').forEach(textarea => {
        textarea.addEventListener('input', function() {
            const visiValue = document.querySelector('.visi-textarea').value;
            const misiValue = document.querySelector('.misi-textarea').value;
            hasChanges = (visiValue !== originalVisi) || (misiValue !== originalMisi);
        });
    });

    window.addEventListener('beforeunload', function(e) {
        if (hasChanges) {
            e.preventDefault();
            e.returnValue = 'Ada perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
        }
    });

    document.querySelector('.visi-misi-form').addEventListener('submit', function() {
        hasChanges = false;
    });
</script>

@endsection