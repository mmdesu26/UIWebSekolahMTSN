@extends('layouts.admin')  

@section('title', 'Kelola Galeri')  

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

    /* ==================== PAGE HEADER ==================== */  
    .galeri-header {  
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);  
        padding: clamp(24px, 5vw, 40px);  
        border-radius: 16px;  
        color: white;  
        margin-bottom: clamp(24px, 4vw, 36px);  
        box-shadow: var(--shadow-lg);  
        position: relative;  
        overflow: hidden;  
        animation: fadeInDown 0.6s ease-out;  
    }  

    @keyframes fadeInDown {  
        from {  
            opacity: 0;  
            transform: translateY(-30px);  
        }  
        to {  
            opacity: 1;  
            transform: translateY(0);  
        }  
    }  

    .galeri-header::before {  
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

    .galeri-header::after {  
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

    .galeri-header-content {  
        position: relative;  
        z-index: 2;  
    }  

    .galeri-header h2 {  
        margin: 0;  
        font-size: clamp(22px, 4vw, 36px);  
        font-weight: 700;  
        letter-spacing: 0.5px;  
        display: flex;  
        align-items: center;  
        gap: clamp(8px, 2vw, 14px);  
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  
    }  

    .galeri-header h2 i {  
        animation: iconRotate 3s ease-in-out infinite;  
        font-size: clamp(24px, 4vw, 36px);  
    }  

    @keyframes iconRotate {  
        0%, 100% { transform: rotateY(0) scale(1); }  
        50% { transform: rotateY(10deg) scale(1.1); }  
    }  

    .galeri-header p {  
        margin: clamp(6px, 1.2vw, 10px) 0 0 0;  
        opacity: 0.95;  
        font-size: clamp(12px, 1.5vw, 16px);  
        font-weight: 500;  
    }  

    /* ==================== BUTTON ADD ==================== */  
    .btn-add {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        border: 2px solid transparent;  
        padding: clamp(12px, 2vw, 16px) clamp(20px, 3vw, 30px);  
        border-radius: 10px;  
        font-weight: 700;  
        font-size: clamp(12px, 1.4vw, 16px);  
        transition: var(--transition);  
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);  
        cursor: pointer;  
        text-transform: uppercase;  
        letter-spacing: 0.5px;  
        display: inline-flex;  
        align-items: center;  
        gap: clamp(6px, 1.5vw, 10px);  
        position: relative;  
        overflow: hidden;  
        animation: slideInUp 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.1s backwards;  
    }  

    @keyframes slideInUp {  
        from {  
            opacity: 0;  
            transform: translateY(30px);  
        }  
        to {  
            opacity: 1;  
            transform: translateY(0);  
        }  
    }  

    .btn-add::before {  
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

    .btn-add:active::before {  
        width: 300px;  
        height: 300px;  
    }  

    .btn-add:hover {  
        transform: translateY(-4px);  
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);  
    }  

    .btn-add i {  
        font-size: clamp(14px, 1.8vw, 18px);  
        animation: iconBounce 2s ease-in-out infinite;  
        position: relative;  
        z-index: 1;  
    }  

    @keyframes iconBounce {  
        0%, 100% { transform: translateY(0) scale(1); }  
        50% { transform: translateY(-5px) scale(1.1); }  
    }  

    .btn-add:hover i {  
        animation: none;  
        transform: scale(1.3) rotate(15deg);  
        transition: var(--transition);  
    }  

    /* ==================== GALLERY GRID ==================== */  
    .galeri-container {  
        margin-top: clamp(20px, 3vw, 30px);  
        animation: fadeIn 0.8s ease-out;  
    }  

    @keyframes fadeIn {  
        from { opacity: 0; }  
        to { opacity: 1; }  
    }  

    .gallery-grid {  
        display: grid;  
        grid-template-columns: repeat(auto-fill, minmax(clamp(250px, 25vw, 300px), 1fr));  
        gap: clamp(18px, 3vw, 28px);  
        margin-top: clamp(20px, 3vw, 28px);  
    }  

    /* ==================== GALLERY CARD ==================== */  
    .gallery-card {  
        background: white;  
        border-radius: 14px;  
        overflow: hidden;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        position: relative;  
        animation: fadeInScale 0.6s ease-out backwards;  
        border: 1px solid var(--border-color);  
    }  

    .gallery-card:nth-child(1) { animation-delay: 0.1s; }  
    .gallery-card:nth-child(2) { animation-delay: 0.2s; }  
    .gallery-card:nth-child(3) { animation-delay: 0.3s; }  
    .gallery-card:nth-child(4) { animation-delay: 0.4s; }  
    .gallery-card:nth-child(5) { animation-delay: 0.5s; }  

    @keyframes fadeInScale {  
        from {  
            opacity: 0;  
            transform: scale(0.9) translateY(20px);  
        }  
        to {  
            opacity: 1;  
            transform: scale(1) translateY(0);  
        }  
    }  

    .gallery-card:hover {  
        transform: translateY(-10px);  
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);  
        border-color: var(--primary-light);  
    }  

    .gallery-card .img-wrapper {  
        position: relative;  
        overflow: hidden;  
        height: clamp(180px, 25vw, 220px);  
        background: linear-gradient(135deg, var(--light-bg), #e8e8e8);  
        display: flex;  
        align-items: center;  
        justify-content: center;  
    }  

    .gallery-card .img-wrapper::after {  
        content: '';  
        position: absolute;  
        top: 50%;  
        left: 50%;  
        transform: translate(-50%, -50%) scale(0);  
        font-size: clamp(32px, 5vw, 48px);  
        background: rgba(102, 126, 234, 0.85);  
        width: clamp(60px, 10vw, 80px);  
        height: clamp(60px, 10vw, 80px);  
        border-radius: 50%;  
        display: flex;  
        align-items: center;  
        justify-content: center;  
        transition: var(--transition);  
        opacity: 0;  
        z-index: 2;  
    }  

    .gallery-card .img-wrapper::after {  
        content: '🔍';  
    }  

    .gallery-card:hover .img-wrapper::after {  
        transform: translate(-50%, -50%) scale(1);  
        opacity: 1;  
    }  

    .gallery-card img {  
        width: 100%;  
        height: 100%;  
        object-fit: cover;  
        transition: var(--transition);  
    }  

    .gallery-card:hover img {  
        transform: scale(1.12);  
    }  

    .gallery-card iframe {  
        width: 100%;  
        height: 100%;  
        border: none;  
    }  

    .video-badge {  
        position: absolute;  
        top: 10px;  
        right: 10px;  
        background: rgba(0, 0, 0, 0.7);  
        color: white;  
        padding: 6px 12px;  
        border-radius: 6px;  
        font-size: 12px;  
        font-weight: 600;  
        display: flex;  
        align-items: center;  
        gap: 6px;  
        z-index: 3;  
    }  

    /* ==================== CARD BODY ==================== */  
    .gallery-card-body {  
        padding: clamp(14px, 2vw, 20px);  
    }  

    .gallery-card-title {  
        font-size: clamp(12px, 1.6vw, 16px);  
        font-weight: 700;  
        color: var(--text-dark);  
        margin-bottom: clamp(8px, 1.2vw, 12px);  
        line-height: 1.4;  
        display: -webkit-box;  
        -webkit-line-clamp: 2;  
        -webkit-box-orient: vertical;  
        overflow: hidden;  
    }  

    .gallery-card-date {  
        font-size: clamp(10px, 1.3vw, 12px);  
        color: var(--text-light);  
        margin-bottom: clamp(10px, 1.5vw, 14px);  
        display: flex;  
        align-items: center;  
        gap: 6px;  
        animation: fadeIn 0.6s ease-out 0.3s backwards;  
    }  

    /* ==================== CARD ACTIONS ==================== */  
    .gallery-card-actions {  
        display: flex;  
        gap: clamp(8px, 1.5vw, 12px);  
    }  

    .btn-action {  
        flex: 1;  
        padding: clamp(8px, 1.5vw, 10px) clamp(10px, 1.8vw, 14px);  
        border: 2px solid transparent;  
        border-radius: 8px;  
        font-weight: 700;  
        cursor: pointer;  
        transition: var(--transition);  
        font-size: clamp(10px, 1.2vw, 12px);  
        text-transform: uppercase;  
        letter-spacing: 0.3px;  
        display: flex;  
        align-items: center;  
        justify-content: center;  
        gap: 6px;  
        position: relative;  
        overflow: hidden;  
    }  

    .btn-action::before {  
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

    .btn-action:active::before {  
        width: 200px;  
        height: 200px;  
    }  

    .btn-action-content {  
        position: relative;  
        z-index: 1;  
        display: flex;  
        align-items: center;  
        gap: 6px;  
    }  

    .btn-edit {  
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);  
        color: white;  
        box-shadow: 0 4px 12px rgba(237, 137, 54, 0.2);  
    }  

    .btn-edit:hover {  
        transform: scale(1.05) translateY(-2px);  
        box-shadow: 0 6px 16px rgba(237, 137, 54, 0.3);  
    }  

    .btn-delete {  
        background: linear-gradient(135deg, var(--danger-color), #e53e3e);  
        color: white;  
        box-shadow: 0 4px 12px rgba(245, 101, 101, 0.2);  
    }  

    .btn-delete:hover {  
        transform: scale(1.05) translateY(-2px);  
        box-shadow: 0 6px 16px rgba(245, 101, 101, 0.3);  
    }  

    .btn-action i {  
        transition: var(--transition);  
        font-size: clamp(11px, 1.4vw, 13px);  
    }  

    .btn-action:hover i {  
        transform: scale(1.15) rotate(8deg);  
    }  

    /* ==================== EMPTY STATE ==================== */  
    .empty-state {  
        text-align: center;  
        padding: clamp(40px, 8vw, 60px) clamp(20px, 3vw, 30px);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));  
        border-radius: 14px;  
        border: 2px dashed var(--border-color);  
    }  

    .empty-state i {  
        font-size: clamp(36px, 6vw, 56px);  
        color: var(--primary-light);  
        opacity: 0.5;  
        margin-bottom: clamp(12px, 2vw, 16px);  
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
    .modal {  
        display: none;  
        position: fixed;  
        z-index: 9999;  
        left: 0;  
        top: 0;  
        width: 100%;  
        height: 100%;  
        background: rgba(0, 0, 0, 0.6);  
        animation: fadeInBg 0.3s ease;  
        -webkit-backdrop-filter: blur(2px);  
        backdrop-filter: blur(2px);  
    }  

    @keyframes fadeInBg {  
        from { opacity: 0; }  
        to { opacity: 1; }  
    }  

    .modal.active {  
        display: flex;  
        align-items: center;  
        justify-content: center;  
        animation: fadeInBg 0.3s ease;  
    }  

    .modal-content {  
        background: white;  
        padding: clamp(20px, 4vw, 32px);  
        border-radius: 16px;  
        width: clamp(90%, 90vw, 600px);  
        box-shadow: var(--shadow-xl);  
        animation: slideInScale 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);  
        max-height: 90vh;  
        overflow-y: auto;  
    }  

    @keyframes slideInScale {  
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
        display: flex;  
        justify-content: space-between;  
        align-items: center;  
        margin-bottom: clamp(18px, 3vw, 24px);  
        padding-bottom: clamp(12px, 2vw, 16px);  
        border-bottom: 2px solid var(--border-color);  
    }  

    .modal-header h3 {  
        margin: 0;  
        color: var(--text-dark);  
        font-size: clamp(16px, 2.2vw, 22px);  
        font-weight: 700;  
        display: flex;  
        align-items: center;  
        gap: 10px;  
    }  

    .modal-header h3 i {  
        color: var(--primary-color);  
        animation: iconBounce 2s ease-in-out infinite;  
    }  

    .modal-close {  
        font-size: clamp(24px, 3vw, 28px);  
        cursor: pointer;  
        color: var(--text-muted);  
        transition: var(--transition);  
        line-height: 1;  
        padding: 0;  
        background: none;  
        border: none;  
    }  

    .modal-close:hover {  
        color: var(--danger-color);  
        transform: rotate(90deg);  
    }  

    /* ==================== TABS ==================== */  
    .modal-tabs {  
        display: flex;  
        gap: 10px;  
        margin-bottom: clamp(16px, 2.5vw, 22px);  
        border-bottom: 2px solid var(--border-color);  
    }  

    .tab-btn {  
        padding: 10px 16px;  
        background: none;  
        border: none;  
        border-bottom: 3px solid transparent;  
        color: var(--text-light);  
        font-weight: 700;  
        cursor: pointer;  
        transition: var(--transition);  
        font-size: clamp(11px, 1.3vw, 13px);  
        text-transform: uppercase;  
    }  

    .tab-btn:hover {  
        color: var(--primary-color);  
    }  

    .tab-btn.active {  
        color: var(--primary-color);  
        border-bottom-color: var(--primary-color);  
    }  

    .tab-content {  
        display: none;  
    }  

    .tab-content.active {  
        display: block;  
        animation: fadeInUp 0.4s ease-out;  
    }  

    /* ==================== FORM ELEMENTS ==================== */  
    .form-group {  
        margin-bottom: clamp(16px, 2.5vw, 22px);  
        animation: fadeInUp 0.6s ease-out backwards;  
    }  

    .form-group:nth-child(1) { animation-delay: 0.1s; }  
    .form-group:nth-child(2) { animation-delay: 0.2s; }  
    .form-group:nth-child(3) { animation-delay: 0.3s; }  

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

    .form-group label {  
        display: block;  
        margin-bottom: clamp(6px, 1vw, 10px);  
        font-weight: 700;  
        color: var(--text-dark);  
        font-size: clamp(12px, 1.4vw, 14px);  
        text-transform: uppercase;  
        letter-spacing: 0.3px;  
    }  

    .form-group input,  
    .form-group textarea {  
        width: 100%;  
        padding: clamp(10px, 1.8vw, 14px) clamp(12px, 2vw, 16px);  
        border: 2px solid var(--border-color);  
        border-radius: 10px;  
        font-size: clamp(12px, 1.4vw, 14px);  
        font-family: inherit;  
        color: var(--text-dark);  
        transition: var(--transition);  
    }  

    .form-group input::placeholder,  
    .form-group textarea::placeholder {  
        color: var(--text-muted);  
    }  

    .form-group input:focus,  
    .form-group textarea:focus {  
        outline: none;  
        border-color: var(--primary-color);  
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02));  
        transform: translateY(-2px);  
    }  

    /* ==================== FILE UPLOAD ==================== */  
    .file-upload-wrapper {  
        position: relative;  
        margin-bottom: clamp(16px, 2.5vw, 22px);  
    }  

    .file-input {  
        display: none;  
    }  

    .file-upload-label {  
        display: block;  
        margin-bottom: clamp(6px, 1vw, 10px);  
        font-weight: 700;  
        color: var(--text-dark);  
        font-size: clamp(12px, 1.4vw, 14px);  
        text-transform: uppercase;  
        letter-spacing: 0.3px;  
    }  

    .file-upload-box {  
        border: 2px dashed var(--border-color);  
        border-radius: 10px;  
        padding: clamp(20px, 3vw, 30px);  
        text-align: center;  
        cursor: pointer;  
        transition: var(--transition);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02));  
    }  

    .file-upload-box:hover {  
        border-color: var(--primary-color);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));  
    }  

    .file-upload-box i {  
        font-size: clamp(32px, 5vw, 48px);  
        color: var(--primary-light);  
        margin-bottom: 12px;  
        display: block;  
    }  

    .file-upload-box p {  
        margin: 0;  
        color: var(--text-muted);  
        font-size: clamp(11px, 1.3vw, 13px);  
        line-height: 1.5;  
    }  

    .file-name {  
        margin-top: 10px;  
        padding: 10px;  
        background: var(--light-bg);  
        border-radius: 8px;  
        font-size: 12px;  
        color: var(--text-dark);  
        display: none;  
    }  

    .file-name.show {  
        display: block;  
    }  

    /* ==================== IMAGE PREVIEW ==================== */  
    .preview-container {  
        margin-top: clamp(10px, 1.5vw, 14px);  
        border-radius: 10px;  
        overflow: hidden;  
        display: none;  
    }  

    .preview-container.show {  
        display: block;  
    }  

    .img-preview,  
    .video-preview {  
        width: 100%;  
        max-height: clamp(150px, 30vw, 220px);  
        border: 2px solid var(--border-color);  
        border-radius: 10px;  
        animation: fadeInScale 0.4s ease-out;  
    }  

    .video-preview {  
        border: 2px solid var(--border-color);  
    }  

    /* ==================== BUTTON SUBMIT ==================== */  
    .btn-submit {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        border: 2px solid transparent;  
        padding: clamp(12px, 2vw, 16px) clamp(20px, 3vw, 30px);  
        border-radius: 10px;  
        font-weight: 700;  
        font-size: clamp(12px, 1.4vw, 14px);  
        cursor: pointer;  
        width: 100%;  
        transition: var(--transition);  
        text-transform: uppercase;  
        letter-spacing: 0.5px;  
        display: flex;  
        align-items: center;  
        justify-content: center;  
        gap: 10px;  
        position: relative;  
        overflow: hidden;  
        margin-top: clamp(10px, 1.5vw, 16px);  
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);  
    }  

    .btn-submit::before {  
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

    .btn-submit:active::before {  
        width: 300px;  
        height: 300px;  
    }  

    .btn-submit:hover {  
        transform: translateY(-3px);  
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);  
    }  

    .btn-submit:disabled {  
        opacity: 0.6;  
        cursor: not-allowed;  
    }  

    .btn-submit i {  
        font-size: clamp(14px, 1.8vw, 18px);  
        animation: saveIcon 2s ease-in-out infinite;  
        position: relative;  
        z-index: 1;  
    }  

    @keyframes saveIcon {  
        0%, 100% { transform: scale(1); }  
        50% { transform: scale(1.1); }  
    }  

    /* ==================== ALERTS ==================== */  
    .alert {  
        padding: clamp(12px, 2vw, 16px) clamp(14px, 2.5vw, 20px);  
        border-radius: 10px;  
        margin-bottom: clamp(16px, 2.5vw, 24px);  
        font-size: clamp(12px, 1.4vw, 14px);  
        animation: slideDown 0.4s ease-out;  
        border-left: 4px solid;  
        display: flex;  
        align-items: flex-start;  
        gap: 12px;  
    }  

    @keyframes slideDown {  
        from {  
            transform: translateY(-50px);  
            opacity: 0;  
        }  
        to {  
            transform: translateY(0);  
            opacity: 1;  
        }  
    }  

    .alert i {  
        font-size: clamp(14px, 1.8vw, 18px);  
        flex-shrink: 0;  
        margin-top: 2px;  
    }  

    .alert-success {  
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));  
        color: var(--success-color);  
        border-left-color: var(--success-color);  
    }  

    .alert-error {  
        background: linear-gradient(135deg, rgba(245, 101, 101, 0.1), rgba(229, 62, 62, 0.1));  
        color: var(--danger-color);  
        border-left-color: var(--danger-color);  
    }  

    .alert-success i,  
    .alert-error i {  
        color: inherit;  
    }  

    /* ==================== RESPONSIVE ==================== */  
    @media (max-width: 1200px) {  
        .gallery-grid {  
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));  
            gap: clamp(16px, 2.5vw, 22px);  
        }  
    }  

    @media (max-width: 768px) {  
        .galeri-header {  
            padding: 18px;  
            margin-bottom: 20px;  
        }  

        .galeri-header h2 {  
            font-size: 18px;  
        }  

        .galeri-header p {  
            font-size: 12px;  
            margin-top: 6px;  
        }
                .btn-add {
            padding: 10px 16px;
            font-size: 12px;
            width: 100%;
            justify-content: center;
            margin-bottom: 16px;
        }

        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 14px;
            margin-top: 16px;
        }

        .gallery-card .img-wrapper {
            height: 160px;
        }

        .gallery-card-title {
            font-size: 12px;
            margin-bottom: 6px;
        }

        .gallery-card-date {
            font-size: 10px;
            margin-bottom: 8px;
        }

        .gallery-card-actions {
            gap: 6px;
        }

        .btn-action {
            padding: 7px 8px;
            font-size: 9px;
            gap: 4px;
        }

        .btn-action i {
            font-size: 10px;
        }

        .modal-content {
            width: 95%;
            padding: 18px;
        }

        .modal-header h3 {
            font-size: 16px;
        }

        .modal-tabs {
            gap: 8px;
            margin-bottom: 14px;
        }

        .tab-btn {
            padding: 8px 12px;
            font-size: 10px;
        }

        .form-group label {
            font-size: 11px;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            padding: 9px 10px;
            font-size: 12px;
            border-radius: 8px;
        }

        .file-upload-box {
            padding: 16px;
        }

        .file-upload-box i {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .img-preview,
        .video-preview {
            max-height: 150px;
            margin-top: 8px;
        }

        .btn-submit {
            padding: 10px 14px;
            font-size: 11px;
            margin-top: 10px;
            gap: 8px;
        }

        .empty-state {
            padding: 30px 15px;
        }

        .empty-state i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .empty-state p {
            font-size: 11px;
        }

        .alert {
            padding: 10px 12px;
            font-size: 11px;
            gap: 10px;
            margin-bottom: 12px;
        }

        .alert i {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .galeri-header {
            padding: 14px;
            margin-bottom: 14px;
        }

        .galeri-header h2 {
            font-size: 14px;
        }

        .galeri-header h2 i {
            font-size: 16px;
        }

        .galeri-header p {
            font-size: 11px;
            margin-top: 4px;
        }

        .btn-add {
            padding: 9px 12px;
            font-size: 11px;
            width: 100%;
            gap: 6px;
            margin-bottom: 12px;
        }

        .btn-add i {
            font-size: 12px;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 12px;
        }

        .gallery-card .img-wrapper {
            height: 150px;
        }

        .gallery-card-body {
            padding: 12px;
        }

        .gallery-card-title {
            font-size: 11px;
            margin-bottom: 5px;
        }

        .gallery-card-date {
            font-size: 9px;
            margin-bottom: 6px;
        }

        .gallery-card-actions {
            gap: 5px;
        }

        .btn-action {
            padding: 6px 6px;
            font-size: 8px;
            gap: 3px;
        }

        .btn-action i {
            font-size: 9px;
        }

        .btn-action span {
            display: none;
        }

        .modal-content {
            width: 98%;
            padding: 14px;
        }

        .modal-header {
            margin-bottom: 14px;
            padding-bottom: 10px;
        }

        .modal-header h3 {
            font-size: 13px;
            gap: 6px;
        }

        .modal-close {
            font-size: 20px;
        }

        .modal-tabs {
            gap: 6px;
            margin-bottom: 12px;
        }

        .tab-btn {
            padding: 6px 10px;
            font-size: 9px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            font-size: 10px;
            margin-bottom: 4px;
            letter-spacing: 0;
        }

        .form-group input,
        .form-group textarea {
            padding: 8px 8px;
            font-size: 11px;
            border-radius: 6px;
        }

        .file-upload-box {
            padding: 12px;
        }

        .file-upload-box i {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .img-preview,
        .video-preview {
            max-height: 120px;
            margin-top: 6px;
        }

        .btn-submit {
            padding: 9px 10px;
            font-size: 10px;
            margin-top: 8px;
            gap: 6px;
        }

        .btn-submit i {
            font-size: 12px;
        }

        .empty-state {
            padding: 24px 12px;
        }

        .empty-state i {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 10px;
        }

        .alert {
            padding: 8px 10px;
            font-size: 10px;
            gap: 8px;
            margin-bottom: 10px;
        }

        .alert i {
            font-size: 11px;
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
        .modal-content,
        .form-group input,
        .form-group textarea,
        .file-upload-box {
            background: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .form-group label {
            color: #e2e8f0;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #718096;
        }

        .modal-header {
            border-bottom-color: #4a5568;
        }

        .modal-header h3 {
            color: #e2e8f0;
        }

        .modal-tabs {
            border-bottom-color: #4a5568;
        }

        .gallery-card {
            background: #2d3748;
            color: #e2e8f0;
            border-color: #4a5568;
        }

        .gallery-card-title {
            color: #e2e8f0;
        }

        .empty-state {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.05));
            border-color: #4a5568;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(72, 187, 120, 0.15), rgba(56, 161, 105, 0.1));
            border-left-color: #48bb78;
        }

        .alert-error {
            background: linear-gradient(135deg, rgba(245, 101, 101, 0.15), rgba(229, 62, 62, 0.1));
            border-left-color: #f56565;
        }

        .file-name {
            background: #4a5568;
            color: #e2e8f0;
        }
    }

    /* ==================== PRINT STYLES ==================== */
    @media print {
        .btn-add,
        .gallery-card-actions,
        .alert {
            display: none;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Page Header -->
<div class="galeri-header">
    <div class="galeri-header-content">
        <h2>
            <i class="fas fa-images"></i>
            <span>Kelola Galeri</span>
        </h2>
        <p>📸 Kelola foto-foto kegiatan sekolah dengan mudah</p>
    </div>
</div>

<!-- Success Alert -->
@if(session('success'))
<div class="alert alert-success" role="alert">
    <i class="fas fa-check-circle"></i>
    <div>
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
</div>
@endif

<!-- Error Alert -->
@if(session('error'))
<div class="alert alert-error" role="alert">
    <i class="fas fa-exclamation-circle"></i>
    <div>
        <strong>Gagal!</strong> {{ session('error') }}
    </div>
</div>
@endif

<!-- Button Add -->
<div style="margin-bottom: clamp(16px, 2.5vw, 20px); display: flex; justify-content: flex-end;">
    <button class="btn-add" onclick="openAddModal()" type="button">
        <i class="fas fa-plus-circle"></i>
        <span>Tambah Media Baru</span>
    </button>
</div>

<!-- Gallery Grid -->
<div class="galeri-container">
    @if(count($galeri) > 0)
    <div class="gallery-grid">
        @foreach($galeri as $item)
        <div class="gallery-card">
            <div class="img-wrapper">
                @if(strpos($item['gambar'], 'youtube.com') !== false || strpos($item['gambar'], 'youtu.be') !== false)
                    {!! getYoutubeEmbed($item['gambar']) !!}
                    <span class="video-badge">
                        <i class="fas fa-play-circle"></i>
                        VIDEO
                    </span>
                @elseif(in_array(pathinfo($item['gambar'], PATHINFO_EXTENSION), ['mp4', 'webm', 'ogg', 'mov']))
                    <video width="100%" height="100%" style="object-fit: cover;">
                        <source src="{{ $item['gambar'] }}" type="video/{{ pathinfo($item['gambar'], PATHINFO_EXTENSION) }}">
                        Your browser does not support the video tag.
                    </video>
                    <span class="video-badge">
                        <i class="fas fa-play-circle"></i>
                        VIDEO
                    </span>
                @else
                    <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" loading="lazy">
                @endif
            </div>
            <div class="gallery-card-body">
                <div class="gallery-card-title" title="{{ $item['judul'] }}">{{ $item['judul'] }}</div>
                <div class="gallery-card-date">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ date('d M Y', strtotime($item['tanggal'])) }}</span>
                </div>
                <div class="gallery-card-actions">
                    <button class="btn-action btn-edit" onclick='openEditModal(@json($item))' type="button" title="Edit Media">
                        <div class="btn-action-content">
                            <i class="fas fa-edit"></i>
                            <span>Edit</span>
                        </div>
                    </button>
                    <button class="btn-action btn-delete" onclick="confirmDelete({{ $item['id'] }})" type="button" title="Hapus Media">
                        <div class="btn-action-content">
                            <i class="fas fa-trash"></i>
                            <span>Hapus</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-images"></i>
        <p>Belum ada media galeri. Mulai tambahkan foto atau video baru!</p>
    </div>
    @endif
</div>

<!-- Modal Add -->
<div class="modal" id="addModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-image-plus"></i>
                <span>Tambah Media Baru</span>
            </h3>
            <button class="modal-close" onclick="closeModal('addModal')" type="button" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Tabs -->
        <div class="modal-tabs">
            <button class="tab-btn active" data-tab="tab-link" type="button">
                <i class="fas fa-link"></i> Dari Link
            </button>
            <button class="tab-btn" data-tab="tab-upload" type="button">
                <i class="fas fa-upload"></i> Upload File
            </button>
        </div>

        <!-- Tab: Link -->
        <div id="tab-link" class="tab-content active">
            <form action="{{ route('admin.galeri.add') }}" method="POST" id="addFormLink">
                @csrf
                <div class="form-group">
                    <label for="addJudul">Judul Media</label>
                    <input 
                        type="text" 
                        id="addJudul"
                        name="judul" 
                        required 
                        placeholder="Masukkan judul foto atau video"
                    >
                </div>
                <div class="form-group">
                    <label for="addGambar">URL / Link Media</label>
                    <input 
                        type="text" 
                        id="addGambar"
                        name="gambar" 
                        required 
                        placeholder="Paste link foto (jpg, png) atau video (YouTube, Instagram, MP4, dll)"
                        onchange="previewMediaFromLink('addGambar', 'addPreviewContainer')"
                        oninput="previewMediaFromLink('addGambar', 'addPreviewContainer')"
                    >
                    <small style="color: var(--text-light); display: block; margin-top: 8px;">
                        ✓ URL Gambar: https://example.com/image.jpg
                        <br>✓ YouTube: https://www.youtube.com/watch?v=... atau https://youtu.be/...
                        <br>✓ Instagram: Paste link post Instagram
                        <br>✓ Video Direct: https://example.com/video.mp4
                    </small>
                </div>
                <div id="addPreviewContainer" class="preview-container"></div>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    <span>Simpan Media</span>
                </button>
            </form>
        </div>

        <!-- Tab: Upload -->
        <div id="tab-upload" class="tab-content">
            <form action="{{ route('admin.galeri.upload') }}" method="POST" enctype="multipart/form-data" id="addFormUpload">
                @csrf
                <div class="form-group">
                    <label for="addJudulUpload">Judul Media</label>
                    <input 
                        type="text" 
                        id="addJudulUpload"
                        name="judul" 
                        required 
                        placeholder="Masukkan judul foto atau video"
                    >
                </div>

                <!-- File Upload -->
                <div class="file-upload-wrapper">
                    <label class="file-upload-label">Upload File Media</label>
                    <label class="file-upload-box" for="fileInput">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>
                            Klik untuk memilih file atau drag & drop di sini
                            <br>
                            <small>Format: JPG, PNG, GIF, MP4, WebM (Maks: 50MB)</small>
                        </p>
                    </label>
                    <input 
                        type="file" 
                        id="fileInput" 
                        class="file-input"
                        name="file"
                        required
                        accept="image/jpeg,image/png,image/gif,video/mp4,video/webm,video/ogg,video/quicktime"
                        onchange="handleFileUpload(event)"
                    >
                    <div id="fileName" class="file-name"></div>
                </div>

                <div id="uploadPreviewContainer" class="preview-container"></div>

                <button type="submit" class="btn-submit" id="submitUploadBtn">
                    <i class="fas fa-save"></i>
                    <span>Upload Media</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-edit"></i>
                <span>Edit Media</span>
            </h3>
            <button class="modal-close" onclick="closeModal('editModal')" type="button" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editJudul">Judul Media</label>
                <input 
                    type="text" 
                    id="editJudul"
                    name="judul" 
                    required
                >
            </div>
            <div class="form-group">
                <label for="editGambar">URL / Link Media</label>
                <input 
                    type="text" 
                    id="editGambar"
                    name="gambar" 
                    required
                    onchange="previewMediaFromLink('editGambar', 'editPreviewContainer')"
                    oninput="previewMediaFromLink('editGambar', 'editPreviewContainer')"
                >
            </div>
            <div id="editPreviewContainer" class="preview-container"></div>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i>
                <span>Update Media</span>
            </button>
        </form>
    </div>
</div>

<!-- Form Delete (Hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    // ==================== TAB SWITCHING ====================
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tabName = this.dataset.tab;
            
            // Remove active from all tabs
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            
            // Add active to clicked tab
            this.classList.add('active');
            document.getElementById(tabName).classList.add('active');
        });
    });

    // ==================== FILE UPLOAD HANDLING ====================
    const fileInput = document.getElementById('fileInput');
    const fileUploadBox = document.querySelector('.file-upload-box');
    const fileName = document.getElementById('fileName');

    // Drag and drop
    fileUploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadBox.style.borderColor = 'var(--primary-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1))';
    });

    fileUploadBox.addEventListener('dragleave', () => {
        fileUploadBox.style.borderColor = 'var(--border-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02))';
    });

    fileUploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadBox.style.borderColor = 'var(--border-color)';
        fileUploadBox.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02))';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileUpload({ target: fileInput });
        }
    });

    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Show file name
        fileName.innerHTML = `✓ File: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
        fileName.classList.add('show');

        // Preview
        const previewContainer = document.getElementById('uploadPreviewContainer');
        previewContainer.innerHTML = '';
        
        const reader = new FileReader();
        reader.onload = function(e) {
            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-preview show';
                previewContainer.appendChild(img);
            } else if (file.type.startsWith('video/')) {
                const video = document.createElement('video');
                video.src = e.target.result;
                video.className = 'video-preview show';
                video.controls = true;
                previewContainer.appendChild(video);
            }
            previewContainer.classList.add('show');
        };
        reader.readAsDataURL(file);
    }

    // ==================== MEDIA PREVIEW FROM LINK ====================
    function previewMediaFromLink(inputId, containerId) {
        const url = document.getElementById(inputId).value.trim();
        const container = document.getElementById(containerId);
        container.innerHTML = '';

        if (!url) {
            container.classList.remove('show');
            return;
        }

        // YouTube/Youtu.be
        if (url.includes('youtube.com') || url.includes('youtu.be')) {
            const videoId = extractYoutubeId(url);
            if (videoId) {
                container.innerHTML = `
                    <iframe 
                        class="video-preview show"
                        src="https://www.youtube.com/embed/${videoId}" 
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                `;
                container.classList.add('show');
                return;
            }
        }

        // Instagram
        if (url.includes('instagram.com')) {
            container.innerHTML = `
                <div style="text-align: center; padding: 20px; background: var(--light-bg); border-radius: 10px;">
                    <i class="fas fa-instagram" style="font-size: 32px; color: #E4405F; margin-bottom: 10px; display: block;"></i>
                    <p style="color: var(--text-muted); margin: 0;">Preview Instagram akan ditampilkan setelah disimpan</p>
                </div>
            `;
            container.classList.add('show');
            return;
        }

        // Direct image URL
        if (isImageUrl(url)) {
            const img = document.createElement('img');
            img.src = url;
            img.className = 'img-preview show';
            img.onerror = function() {
                this.style.display = 'none';
                container.innerHTML = '<p style="color: var(--danger-color); text-align: center;">❌ Gambar tidak dapat dimuat</p>';
            };
            container.appendChild(img);
            container.classList.add('show');
            return;
        }

        // Direct video URL
        if (isVideoUrl(url)) {
            const video = document.createElement('video');
            video.src = url;
            video.className = 'video-preview show';
            video.controls = true;
            video.onerror = function() {
                container.innerHTML = '<p style="color: var(--danger-color); text-align: center;">❌ Video tidak dapat dimuat</p>';
            };
            container.appendChild(video);
            container.classList.add('show');
            return;
        }

        container.innerHTML = '<p style="color: var(--warning-color); text-align: center;">⚠️ Format media tidak dikenali</p>';
        container.classList.add('show');
    }

    function extractYoutubeId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        return match && match[2].length === 11 ? match[2] : null;
    }

    function isImageUrl(url) {
        return /\.(jpg|jpeg|png|gif|webp)$/i.test(url);
    }

    function isVideoUrl(url) {
        return /\.(mp4|webm|ogg|mov)$/i.test(url);
    }

    function getYoutubeEmbed(url) {
        const videoId = extractYoutubeId(url);
        if (videoId) {
            return `<iframe src="https://www.youtube.com/embed/${videoId}" allowfullscreen loading="lazy"></iframe>`;
        }
        return '';
    }

    // ==================== MODAL FUNCTIONS ====================
    function openAddModal() {
        document.getElementById('addModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        document.getElementById('addFormLink').reset();
        document.getElementById('addFormUpload').reset();
        document.getElementById('addPreviewContainer').innerHTML = '';
        document.getElementById('addPreviewContainer').classList.remove('show');
        document.getElementById('uploadPreviewContainer').innerHTML = '';
        document.getElementById('uploadPreviewContainer').classList.remove('show');
        document.getElementById('fileName').classList.remove('show');
    }

    function openEditModal(item) {
        document.getElementById('editJudul').value = item.judul;
        document.getElementById('editGambar').value = item.gambar;
        previewMediaFromLink('editGambar', 'editPreviewContainer');
        document.getElementById('editForm').action = `/admin/galeri/update/${item.id}`;
        document.getElementById('editModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.animation = 'fadeInBg 0.3s ease reverse';
        setTimeout(() => {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // ==================== DELETE FUNCTION ====================
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus media ini? Tindakan ini tidak dapat dibatalkan.')) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/galeri/delete/${id}`;
            form.submit();
        }
    }

    // ==================== MODAL EVENTS ====================
    document.addEventListener('DOMContentLoaded', function() {
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal(event.target.id);
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.active');
                modals.forEach(modal => closeModal(modal.id));
            }
        });

        // Form submission animations
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('.btn-submit');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Memproses...</span>';
                    submitBtn.disabled = true;
                }
            });
        });

        // Alert auto dismiss
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.animation = 'slideDown 0.4s ease-out reverse';
                setTimeout(() => alert.remove(), 400);
            }, 5000);
        });
    });

    // ==================== KEYBOARD SHORTCUTS ====================
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            openAddModal();
        }
    });

    // ==================== PREVENT IMAGE LOAD ERROR ====================
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
            this.style.display = 'none';
        });
    });

    // ==================== LAZY LOADING ====================
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInScale 0.6s ease-out forwards';
                }
            });
        });

        document.querySelectorAll('.gallery-card').forEach(card => {
            observer.observe(card);
        });
    }
</script>

@endsection