@extends('layouts.admin')  

@section('title', 'Sosial Media')  
@section('page-title', 'Kelola Sosial Media')  

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

        /* Platform Colors */  
        --facebook: #1877F2;  
        --instagram: #E4405F;  
        --youtube: #FF0000;  
        --whatsapp: #25D366;  
        --twitter: #1DA1F2;  
        --tiktok: #000000;  
        --linkedin: #0A66C2;  
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
    .sosmed-container {  
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
    .sosmed-card {  
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

    .sosmed-card:hover {  
        box-shadow: var(--shadow-xl);  
        transform: translateY(-8px);  
    }  

    /* ==================== CARD HEADER ==================== */  
    .sosmed-card-header {  
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);  
        color: white;  
        padding: clamp(18px, 3vw, 28px);  
        display: flex;  
        align-items: center;  
        gap: 14px;  
        position: relative;  
        overflow: hidden;  
    }  

    .sosmed-card-header::before {  
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

    .sosmed-card-header::after {  
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

    .sosmed-card-header-icon {  
        font-size: clamp(24px, 4vw, 36px);  
        animation: iconFloat 3s ease-in-out infinite;  
        position: relative;  
        z-index: 1;  
    }  

    @keyframes iconFloat {  
        0%, 100% { transform: translateY(0) rotateZ(0deg); }  
        50% { transform: translateY(-10px) rotateZ(-10deg); }  
    }  

    .sosmed-card-header:hover .sosmed-card-header-icon {  
        animation: none;  
        transform: scale(1.3) rotateZ(15deg);  
        transition: var(--transition);  
    }  

    .sosmed-card-header h3 {  
        font-size: clamp(16px, 2.2vw, 24px);  
        font-weight: 700;  
        letter-spacing: 0.5px;  
        position: relative;  
        z-index: 1;  
        margin: 0;  
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);  
    }  

    /* ==================== TABLE RESPONSIVE ==================== */  
    .table-responsive {  
        border-radius: 0 0 16px 16px;  
        overflow: hidden;  
        -webkit-overflow-scrolling: touch;  
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
        position: relative;  
        z-index: 2;  
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
        transition: var(--transition);  
    }  

    .table tbody td strong {  
        color: var(--text-dark);  
    }  

    .table tbody tr:last-child {  
        border-bottom: none;  
    }  

    /* ==================== PLATFORM STYLING ==================== */  
    .platform-badge {  
        display: inline-flex;  
        align-items: center;  
        gap: 8px;  
        padding: 6px 12px;  
        border-radius: 8px;  
        font-size: clamp(11px, 1.3vw, 13px);  
        font-weight: 600;  
        transition: var(--transition);  
        animation: fadeInScale 0.5s ease-out backwards;  
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

    .platform-badge:hover {  
        transform: scale(1.08) translateY(-2px);  
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);  
    }  

    .platform-badge i {  
        font-size: clamp(12px, 1.5vw, 14px);  
        animation: iconPulse 2s ease-in-out infinite;  
    }  

    @keyframes iconPulse {  
        0%, 100% { transform: scale(1); }  
        50% { transform: scale(1.1); }  
    }  

    .platform-badge:hover i {  
        animation: none;  
        transform: scale(1.3) rotate(10deg);  
        transition: var(--transition);  
    }  

    .platform-facebook {  
        background: linear-gradient(135deg, rgba(24, 119, 242, 0.1), rgba(24, 119, 242, 0.05));  
        color: var(--facebook);  
        border: 1px solid rgba(24, 119, 242, 0.2);  
    }  

    .platform-instagram {  
        background: linear-gradient(135deg, rgba(228, 64, 95, 0.1), rgba(228, 64, 95, 0.05));  
        color: var(--instagram);  
        border: 1px solid rgba(228, 64, 95, 0.2);  
    }  

    .platform-youtube {  
        background: linear-gradient(135deg, rgba(255, 0, 0, 0.1), rgba(255, 0, 0, 0.05));  
        color: var(--youtube);  
        border: 1px solid rgba(255, 0, 0, 0.2);  
    }  

    .platform-whatsapp {  
        background: linear-gradient(135deg, rgba(37, 211, 102, 0.1), rgba(37, 211, 102, 0.05));  
        color: var(--whatsapp);  
        border: 1px solid rgba(37, 211, 102, 0.2);  
    }  

    .platform-twitter {  
        background: linear-gradient(135deg, rgba(29, 161, 242, 0.1), rgba(29, 161, 242, 0.05));  
        color: var(--twitter);  
        border: 1px solid rgba(29, 161, 242, 0.2);  
    }  

    .platform-tiktok {  
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.05));  
        color: var(--tiktok);  
        border: 1px solid rgba(0, 0, 0, 0.2);  
    }  

    .platform-linkedin {  
        background: linear-gradient(135deg, rgba(10, 102, 194, 0.1), rgba(10, 102, 194, 0.05));  
        color: var(--linkedin);  
        border: 1px solid rgba(10, 102, 194, 0.2);  
    }  

    /* ==================== LINK STYLING ==================== */  
    .sosmed-link {  
        display: inline-flex;  
        align-items: center;  
        gap: 6px;  
        padding: 6px 12px;  
        border-radius: 6px;  
        text-decoration: none;  
        color: var(--primary-color);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(102, 126, 234, 0.05));  
        border: 1px solid rgba(102, 126, 234, 0.2);  
        font-size: clamp(11px, 1.3vw, 13px);  
        font-weight: 600;  
        transition: var(--transition);  
    }  

    .sosmed-link:hover {  
        color: var(--primary-dark);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(102, 126, 234, 0.1));  
        border-color: rgba(102, 126, 234, 0.4);  
        transform: translateY(-2px);  
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.2);  
    }  

    .sosmed-link i {  
        font-size: clamp(10px, 1.2vw, 12px);  
    }  

    /* ==================== BUTTONS ==================== */  
    .btn {  
        display: inline-flex;  
        align-items: center;  
        justify-content: center;  
        gap: 8px;  
        padding: clamp(8px, 1.5vw, 12px) clamp(12px, 2vw, 16px);  
        border-radius: 8px;  
        font-size: clamp(11px, 1.3vw, 12px);  
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

    .btn-warning {  
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);  
        color: white;  
        box-shadow: 0 4px 12px rgba(237, 137, 54, 0.2);  
    }  

    .btn-warning:hover {  
        transform: translateY(-2px);  
        box-shadow: 0 8px 16px rgba(237, 137, 54, 0.3);  
    }  

    .btn-primary {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);  
    }  

    .btn-primary:hover {  
        transform: translateY(-2px);  
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);  
    }  

    .btn i {  
        transition: var(--transition);  
        font-size: clamp(10px, 1.3vw, 12px);  
    }  

    .btn:hover i {  
        transform: scale(1.15) rotate(8deg);  
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
        padding: clamp(14px, 2.5vw, 20px);  
        border-radius: 14px 14px 0 0;  
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
        padding: clamp(16px, 2.5vw, 24px);  
    }  

    .modal-footer {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
        border-top: 1px solid var(--border-color);  
        padding: clamp(12px, 2vw, 16px);  
        gap: 8px;  
    }  

    /* ==================== FORM ELEMENTS ==================== */  
    .form-group {  
        margin-bottom: clamp(14px, 2vw, 18px);  
        animation: fadeInUp 0.6s ease-out backwards;  
    }  

    .form-group:nth-child(1) { animation-delay: 0.1s; }  
    .form-group:nth-child(2) { animation-delay: 0.2s; }  
    .form-group:nth-child(3) { animation-delay: 0.3s; }  
    .form-group:nth-child(4) { animation-delay: 0.4s; }  

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

    .form-label {  
        display: block;  
        font-size: clamp(12px, 1.4vw, 14px);  
        font-weight: 700;  
        color: var(--text-dark);  
        margin-bottom: clamp(6px, 1vw, 10px);  
        text-transform: uppercase;  
        letter-spacing: 0.4px;  
    }  

    .form-control {  
        width: 100%;  
        padding: clamp(10px, 1.8vw, 12px) clamp(12px, 2vw, 14px);  
        border: 2px solid var(--border-color);  
        border-radius: 8px;  
        font-size: clamp(12px, 1.4vw, 14px);  
        font-family: inherit;  
        color: var(--text-dark);  
        background: white;  
        transition: var(--transition);  
    }  

    .form-control::placeholder {  
        color: var(--text-muted);  
    }  

    .form-control:focus {  
        outline: none;  
        border-color: var(--primary-color);  
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);  
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.02), rgba(118, 75, 162, 0.02));  
    }  

    /* ==================== ALERTS ==================== */  
    .alert {  
        padding: clamp(12px, 2vw, 16px) clamp(16px, 3vw, 20px);  
        border-radius: 10px;  
        margin-bottom: clamp(16px, 2.5vw, 24px);  
        font-size: clamp(12px, 1.4vw, 14px);  
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
        font-size: clamp(14px, 1.8vw, 18px);  
        flex-shrink: 0;  
        margin-top: 2px;  
    }  

    .alert-success {  
        background: linear-gradient(135deg, rgba(72, 187, 120, 0.1), rgba(56, 161, 105, 0.1));  
        border-left-color: var(--success-color);  
        color: var(--success-color);  
    }  

    .alert-success i {  
        color: var(--success-color);  
    }  

    .alert-close {  
        cursor: pointer;  
        opacity: 0.6;  
        transition: var(--transition);  
        font-size: 18px;  
    }  

    .alert-close:hover {  
        opacity: 1;  
        transform: rotate(90deg);  
    }  

    /* ==================== RESPONSIVE ==================== */  
    @media (max-width: 1200px) {  
        .sosmed-container {  
            padding: clamp(12px, 2vw, 18px);  
        }  
    }  

    @media (max-width: 768px) {  
        .sosmed-card {  
            border-radius: 12px;  
            margin-bottom: 16px;  
        }  

        .sosmed-card-header {  
            padding: 14px;  
            gap: 10px;  
        }  

        .sosmed-card-header h3 {  
            font-size: 14px;  
        }  

        .sosmed-card-header-icon {  
            font-size: 20px;  
        }  

        .table-responsive {  
            border-radius: 0 0 12px 12px;  
        }  

        .table {  
            font-size: 10px;  
        }  

        .table thead th {  
            padding: 10px 6px;  
            font-size: 9px;  
        }  

        .table tbody td {  
            padding: 10px 6px;  
            font-size: 10px;  
        }  

        .platform-badge {  
            padding: 4px 8px;  
            font-size: 10px;  
            gap: 6px;  
        }  

        .platform-badge i {  
            font-size: 11px;  
        }  

        .sosmed-link {  
            padding: 4px 8px;  
            font-size: 10px;  
            gap: 4px;  
        }  

        .sosmed-link i {  
            font-size: 9px;  
        }  

        .btn {  
            padding: 6px 10px;  
            font-size: 10px;  
            gap: 6px;  
        }  

        .btn i {  
            font-size: 10px;  
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

        .modal-body {  
            padding: 12px;  
        }  

        .form-group {  
            margin-bottom: 12px;  
        }  

        .form-label {  
            font-size: 11px;  
            margin-bottom: 5px;  
        }  

        .form-control {  
            padding: 8px 10px;  
            font-size: 12px;  
        }  
    }  

    @media (max-width: 480px) {  
        .sosmed-container {  
            padding: 8px;  
        }  

        .sosmed-card {  
            border-radius: 10px;  
        }  

        .sosmed-card-header {  
            padding: 12px;  
            gap: 8px;  
            flex-direction: column;  
            text-align: center;  
        }  

        .sosmed-card-header h3 {  
            font-size: 13px;  
        }  

        .sosmed-card-header-icon {  
            font-size: 20px;  
        }  

        .table-responsive {  
            overflow-x: auto;  
            -webkit-overflow-scrolling: touch;  
        }  

        .table {  
            font-size: 9px;  
            white-space: nowrap;  
        }  

        .table thead th {  
            padding: 8px 4px;  
            font-size: 8px;  
        }  

        .table tbody td {  
            padding: 8px 4px;  
            font-size: 9px;  
        }  

        .table thead th:nth-child(3),  
        .table thead th:nth-child(4),  
        .table tbody td:nth-child(3),  
        .table tbody td:nth-child(4) {  
            display: none;  
        }  

        .platform-badge {  
            padding: 3px 6px;  
            font-size: 9px;  
            gap: 4px;  
        }  

        .platform-badge i {  
            font-size: 10px;  
        }  

        .btn {  
            padding: 6px 8px;  
            font-size: 9px;  
            gap: 4px;  
        }  

        .btn i {  
            font-size: 9px;  
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

        .modal-header {  
            padding: 10px;  
        }  

        .modal-header .modal-title {  
            font-size: 13px;  
            gap: 6px;  
        }  

        .modal-body {  
            padding: 10px;  
        }  

        .modal-footer {  
            padding: 8px;  
        }  

        .form-group {  
            margin-bottom: 10px;  
        }  

        .form-label {  
            font-size: 10px;  
            margin-bottom: 4px;  
        }  

        .form-control {  
            padding: 8px 8px;  
            font-size: 11px;  
        }  

        .alert {  
            padding: 10px 12px;  
            font-size: 11px;  
            gap: 10px;  
        }  

        .alert i {  
            font-size: 12px;  
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
        .sosmed-card,  
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
            border-left-color: #48bb78;  
        }  
    }  

    /* ==================== PRINT STYLES ==================== */  
    @media print {  
        .btn {  
            display: none;  
        }  

        .sosmed-card {  
            box-shadow: none;  
            border: 1px solid #000;  
        }  
    }  
</style>  

<!-- Main Container -->  
<div class="sosmed-container">  
    <div class="row">  
        <div class="col-lg-8 offset-lg-2">  

            <!-- Success Message -->  
            @if(session('success'))  
            <div class="alert alert-success" role="alert">  
                <i class="fas fa-check-circle"></i>  
                <div>  
                    <strong>Berhasil!</strong> Sosial media telah diperbarui.  
                </div>  
                                <span class="alert-close" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
            @endif

            <!-- Main Card -->
            <div class="sosmed-card">
                <div class="sosmed-card-header">
                    <i class="fas fa-share-alt sosmed-card-header-icon"></i>
                    <h3>Daftar Sosial Media Sekolah</h3>
                </div>

                @if(count($sosialMedia) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 8%;">No</th>
                                <th style="width: 20%;">Platform</th>
                                <th style="width: 25%;">Handle/Username</th>
                                <th style="width: 27%;">Link</th>
                                <th style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sosialMedia as $item)
                            <tr>
                                <td>
                                    <strong>{{ $loop->iteration }}</strong>
                                </td>
                                <td>
                                    @php
                                        $platformLower = strtolower($item['platform']);
                                    @endphp
                                    <span class="platform-badge platform-{{ $platformLower }}">
                                        @if($item['platform'] == 'Facebook')
                                            <i class="fab fa-facebook"></i>
                                        @elseif($item['platform'] == 'Instagram')
                                            <i class="fab fa-instagram"></i>
                                        @elseif($item['platform'] == 'YouTube')
                                            <i class="fab fa-youtube"></i>
                                        @elseif($item['platform'] == 'WhatsApp')
                                            <i class="fab fa-whatsapp"></i>
                                        @elseif($item['platform'] == 'Twitter')
                                            <i class="fab fa-twitter"></i>
                                        @elseif($item['platform'] == 'TikTok')
                                            <i class="fab fa-tiktok"></i>
                                        @elseif($item['platform'] == 'LinkedIn')
                                            <i class="fab fa-linkedin"></i>
                                        @endif
                                        <span>{{ $item['platform'] }}</span>
                                    </span>
                                </td>
                                <td>
                                    <strong title="{{ $item['handle'] }}">
                                        {{ substr($item['handle'], 0, 20) }}{{ strlen($item['handle']) > 20 ? '...' : '' }}
                                    </strong>
                                </td>
                                <td>
                                    <a href="{{ $item['link'] }}" target="_blank" rel="noopener noreferrer" class="sosmed-link">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>Kunjungi</span>
                                    </a>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                                        <button 
                                            type="button" 
                                            class="btn btn-warning"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editMedia{{ $loop->index }}"
                                            title="Edit Data"
                                        >
                                            <div class="btn-content">
                                                <i class="fas fa-edit"></i>
                                                <span class="d-none d-sm-inline">Edit</span>
                                            </div>
                                        </button>
                                        <form 
                                            method="POST" 
                                            action="{{ route('admin.sosmed.delete', $loop->index) }}" 
                                            onsubmit="return confirm('Yakin ingin menghapus sosial media ini?');"
                                            style="display: inline;"
                                        >
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Hapus Data">
                                                <div class="btn-content">
                                                    <i class="fas fa-trash"></i>
                                                    <span class="d-none d-sm-inline">Hapus</span>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL EDIT -->
                            <div class="modal fade" id="editMedia{{ $loop->index }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-edit"></i> Edit Sosial Media
                                            </h5>
                                            <button 
                                                type="button" 
                                                class="btn-close" 
                                                data-bs-dismiss="modal" 
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.sosmed.update', $loop->index) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Platform</label>
                                                    <select class="form-control" name="platform" required>
                                                        <option value="">-- Pilih Platform --</option>
                                                        <option value="Facebook" @if($item['platform'] == 'Facebook') selected @endif>Facebook</option>
                                                        <option value="Instagram" @if($item['platform'] == 'Instagram') selected @endif>Instagram</option>
                                                        <option value="YouTube" @if($item['platform'] == 'YouTube') selected @endif>YouTube</option>
                                                        <option value="WhatsApp" @if($item['platform'] == 'WhatsApp') selected @endif>WhatsApp</option>
                                                        <option value="Twitter" @if($item['platform'] == 'Twitter') selected @endif>Twitter</option>
                                                        <option value="TikTok" @if($item['platform'] == 'TikTok') selected @endif>TikTok</option>
                                                        <option value="LinkedIn" @if($item['platform'] == 'LinkedIn') selected @endif>LinkedIn</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Handle/Username</label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        name="handle" 
                                                        value="{{ $item['handle'] }}"
                                                        placeholder="@username atau nama akun"
                                                        required
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Link URL</label>
                                                    <input 
                                                        type="url" 
                                                        class="form-control" 
                                                        name="link" 
                                                        value="{{ $item['link'] }}"
                                                        placeholder="https://..."
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button 
                                                    type="button" 
                                                    class="btn btn-secondary" 
                                                    data-bs-dismiss="modal"
                                                >
                                                    <div class="btn-content">
                                                        <i class="fas fa-times"></i>
                                                        <span>Batal</span>
                                                    </div>
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <div class="btn-content">
                                                        <i class="fas fa-save"></i>
                                                        <span>Simpan</span>
                                                    </div>
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
                    <i class="fas fa-share-alt"></i>
                    <p>Belum ada data sosial media yang terdaftar</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== FORM SUBMISSION ====================
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn && !form.hasAttribute('onsubmit')) {
                    const originalContent = submitBtn.innerHTML;
                    
                    submitBtn.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i><span>Memproses...</span></div>';
                    submitBtn.disabled = true;

                    setTimeout(() => {
                        submitBtn.innerHTML = originalContent;
                        submitBtn.disabled = false;
                    }, 1500);
                }
            });
        });
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
            if (button) {
                button.innerHTML = '<div class="btn-content"><i class="fas fa-spinner fa-spin"></i></div>';
            }
        });
    });

    // ==================== MODAL ANIMATIONS ====================
    document.querySelectorAll('[id^="editMedia"]').forEach(modal => {
        const bsModal = new bootstrap.Modal(modal, { backdrop: 'static' });
        
        modal.addEventListener('show.bs.modal', function() {
            this.style.animation = 'fadeIn 0.3s ease-out';
        });
    });

    // ==================== PLATFORM BADGE HOVER ====================
    document.querySelectorAll('.platform-badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) translateY(-2px)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(0)';
        });
    });

    // ==================== LINK ANIMATION ====================
    document.querySelectorAll('.sosmed-link').forEach(link => {
        link.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(45deg) scale(1.2)';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(0) scale(1)';
            }
        });
    });

    // ==================== KEYBOARD SHORTCUTS ====================
    document.addEventListener('keydown', function(e) {
        // Escape untuk close modal
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('.modal.show');
            modals.forEach(modal => {
                const bsModal = bootstrap.Modal.getInstance(modal);
                if (bsModal) bsModal.hide();
            });
        }
    });

    // ==================== URL VALIDATION ====================
    document.querySelectorAll('input[type="url"]').forEach(input => {
        input.addEventListener('change', function() {
            if (this.value && !this.value.startsWith('http')) {
                this.value = 'https://' + this.value;
            }
        });
    });

    // ==================== COPY HANDLE ====================
    document.querySelectorAll('.table tbody strong').forEach(handle => {
        handle.style.cursor = 'pointer';
        handle.title = 'Klik untuk salin';
        
        handle.addEventListener('click', function(e) {
            if (this.parentElement.querySelector('a')) return; // Skip link cells
            
            const text = this.textContent.trim();
            navigator.clipboard.writeText(text).then(() => {
                const originalText = this.textContent;
                this.textContent = 'Tersalin!';
                setTimeout(() => {
                    this.textContent = originalText;
                }, 2000);
            });
        });
    });

    // ==================== FORM VALIDATION ====================
    document.querySelectorAll('.form-control').forEach(input => {
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

    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    // ==================== ALERT AUTO DISMISS ====================
    document.querySelectorAll('.alert').forEach(alert => {
        const closeBtn = alert.querySelector('.alert-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                alert.style.animation = 'slideInDown 0.4s ease-out reverse';
                setTimeout(() => {
                    alert.remove();
                }, 400);
            });
        }

        // Auto dismiss success after 5 seconds
        if (alert.classList.contains('alert-success')) {
            setTimeout(() => {
                alert.style.animation = 'slideInDown 0.4s ease-out reverse';
                setTimeout(() => {
                    alert.remove();
                }, 400);
            }, 5000);
        }
    });

    // ==================== RESPONSIVE TABLE ====================
    function checkTableResponsive() {
        const table = document.querySelector('.table');
        const container = document.querySelector('.table-responsive');
        
        if (window.innerWidth <= 480) {
            table.classList.add('mobile-view');
        } else {
            table.classList.remove('mobile-view');
        }
    }

    checkTableResponsive();
    window.addEventListener('resize', checkTableResponsive);

    // ==================== PLATFORM ICON COLOR ANIMATION ====================
    document.querySelectorAll('.platform-badge i').forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.animation = 'none';
            this.style.transform = 'scale(1.3) rotate(10deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.animation = 'iconPulse 2s ease-in-out infinite';
            this.style.transform = 'scale(1) rotate(0)';
        });
    });

    // ==================== ACCESSIBILITY ====================
    // Add aria-labels for screen readers
    document.querySelectorAll('.btn-warning').forEach((btn, index) => {
        btn.setAttribute('aria-label', `Edit sosial media ${index + 1}`);
    });

    document.querySelectorAll('.btn-danger').forEach((btn, index) => {
        btn.setAttribute('aria-label', `Hapus sosial media ${index + 1}`);
    });

    // ==================== PERFORMANCE: Lazy load badges ====================
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInScale 0.5s ease-out forwards';
            }
        });
    });

    document.querySelectorAll('.platform-badge').forEach(badge => {
        observer.observe(badge);
    });
</script>

@endsection