@extends('layouts.admin')  

@section('title', 'Master Data Guru')  
@section('page-title', 'Master Data Guru')  

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

    /* ==================== MAIN CONTAINER ==================== */  
    .guru-container {  
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

    /* ==================== FORM CARD ==================== */  
    .form-card {  
        background: white;  
        border: 1px solid var(--border-color);  
        border-radius: 14px;  
        overflow: hidden;  
        margin-bottom: clamp(25px, 4vw, 40px);  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        animation: slideInUp 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);  
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

    .form-card:hover {  
        box-shadow: var(--shadow-lg);  
        transform: translateY(-4px);  
    }  

    .form-card-header {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        padding: clamp(16px, 2vw, 24px);  
        display: flex;  
        align-items: center;  
        gap: 12px;  
        font-size: clamp(16px, 2vw, 20px);  
        font-weight: 700;  
        letter-spacing: 0.5px;  
    }  

    .form-card-header i {  
        font-size: clamp(18px, 2.5vw, 24px);  
        animation: bounce 2s infinite;  
    }  

    @keyframes bounce {  
        0%, 100% { transform: translateY(0); }  
        50% { transform: translateY(-8px); }  
    }  

    .form-card-header:hover i {  
        animation: none;  
        transform: scale(1.2) rotate(-15deg);  
        transition: var(--transition);  
    }  

    .form-card-body {  
        padding: clamp(20px, 4vw, 32px);  
    }  

    /* ==================== FORM ELEMENTS ==================== */  
    .form-group {  
        margin-bottom: clamp(16px, 2vw, 24px);  
        animation: fadeIn 0.5s ease-out backwards;  
    }  

    .form-group:nth-child(1) { animation-delay: 0.1s; }  
    .form-group:nth-child(2) { animation-delay: 0.2s; }  
    .form-group:nth-child(3) { animation-delay: 0.3s; }  

    .form-group:last-child {  
        margin-bottom: 0;  
    }  

    .form-label {  
        display: block;  
        font-size: clamp(13px, 1.5vw, 15px);  
        font-weight: 600;  
        color: var(--text-dark);  
        margin-bottom: clamp(8px, 1vw, 12px);  
        transition: var(--transition);  
    }  

    .form-label::after {  
        content: '*';  
        color: var(--danger-color);  
        margin-left: 4px;  
    }  

    .form-control {  
        width: 100%;  
        padding: clamp(10px, 1.5vw, 14px) clamp(12px, 2vw, 16px);  
        border: 2px solid var(--border-color);  
        border-radius: 8px;  
        font-size: clamp(13px, 1.5vw, 15px);  
        font-family: inherit;  
        color: var(--text-dark);  
        transition: var(--transition);  
        background: white;  
    }  

    .form-control::placeholder {  
        color: var(--text-muted);  
    }  

    .form-control:focus {  
        outline: none;  
        border-color: var(--primary-color);  
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);  
        transform: translateY(-2px);  
    }  

    /* ==================== FORM GRID ==================== */  
    .form-grid {  
        display: grid;  
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));  
        gap: clamp(15px, 2vw, 20px);  
        margin-bottom: clamp(20px, 3vw, 28px);  
    }  

    @media (max-width: 768px) {  
        .form-grid {  
            grid-template-columns: 1fr;  
        }  
    }  

    /* ==================== BUTTONS ==================== */  
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
        position: relative;  
        overflow: hidden;  
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
    }  

    .btn:active::before {  
        width: 300px;  
        height: 300px;  
    }  

    .btn-primary {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        border-color: var(--primary-color);  
    }  

    .btn-primary:hover {  
        transform: translateY(-3px);  
        box-shadow: 0 12px 24px rgba(102, 126, 234, 0.3);  
    }  

    .btn-primary:active {  
        transform: translateY(-1px);  
    }  

    .btn-secondary {  
        background: linear-gradient(135deg, #6c757d, #5a6268);  
        color: white;  
        border-color: #6c757d;  
    }  

    .btn-secondary:hover {  
        transform: translateY(-2px);  
        box-shadow: 0 8px 16px rgba(108, 117, 125, 0.2);  
    }  

    .btn-warning {  
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);  
        color: white;  
        border-color: var(--warning-color);  
    }  

    .btn-warning:hover {  
        transform: translateY(-2px) scale(1.05);  
        box-shadow: 0 8px 16px rgba(237, 137, 54, 0.2);  
    }  

    .btn-danger {  
        background: linear-gradient(135deg, var(--danger-color), #e53e3e);  
        color: white;  
        border-color: var(--danger-color);  
    }  

    .btn-danger:hover {  
        transform: translateY(-2px) scale(1.05);  
        box-shadow: 0 8px 16px rgba(245, 101, 101, 0.2);  
    }  

    .btn-sm {  
        padding: clamp(6px, 1vw, 8px) clamp(10px, 1.5vw, 12px);  
        font-size: clamp(11px, 1.2vw, 12px);  
    }  

    .btn i {  
        transition: var(--transition);  
    }  

    .btn:hover i {  
        transform: scale(1.2);  
    }  

    /* ==================== TABLE CARD ==================== */  
    .table-card {  
        background: white;  
        border: 1px solid var(--border-color);  
        border-radius: 14px;  
        overflow: hidden;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
        animation: slideInUp 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);  
    }  

    .table-card:hover {  
        box-shadow: var(--shadow-lg);  
    }  

    .table-card-header {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
        padding: clamp(16px, 2vw, 24px);  
        border-bottom: 2px solid var(--border-color);  
        display: flex;  
        align-items: center;  
        gap: 12px;  
        font-size: clamp(16px, 2vw, 20px);  
        font-weight: 700;  
        color: var(--text-dark);  
    }  

    .table-card-header i {  
        font-size: clamp(18px, 2.5vw, 24px);  
        color: var(--primary-color);  
    }  

    .table-card-count {  
        margin-left: auto;  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        padding: 8px 14px;  
        border-radius: 20px;  
        font-size: clamp(12px, 1.5vw, 14px);  
        font-weight: 700;  
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

    /* ==================== TABLE STYLES ==================== */  
    .table-wrapper {  
        overflow-x: auto;  
    }  

    .table {  
        width: 100%;  
        margin: 0;  
        font-size: clamp(12px, 1.5vw, 14px);  
        border-collapse: collapse;  
    }  

    .table thead {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
        border-bottom: 2px solid var(--border-color);  
        position: sticky;  
        top: 0;  
        z-index: 10;  
    }  

    .table thead th {  
        padding: clamp(12px, 2vw, 16px);  
        font-weight: 700;  
        color: var(--text-dark);  
        text-align: left;  
        white-space: nowrap;  
        text-transform: uppercase;  
        font-size: clamp(11px, 1.3vw, 13px);  
        letter-spacing: 0.5px;  
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
    }  

    .table tbody td {  
        padding: clamp(12px, 2vw, 16px);  
        color: var(--text-light);  
        vertical-align: middle;  
        transition: var(--transition);  
    }  

    .table tbody td strong {  
        color: var(--text-dark);  
        font-weight: 700;  
    }  

    .table tbody tr:last-child {  
        border-bottom: none;  
    }  

    /* ==================== BADGE ==================== */  
    .badge {  
        display: inline-block;  
        padding: 6px 12px;  
        border-radius: 6px;  
        font-size: clamp(11px, 1.2vw, 12px);  
        font-weight: 600;  
        transition: var(--transition);  
    }  

    .badge:hover {  
        transform: scale(1.08);  
    }  

    .bg-info {  
        background: linear-gradient(135deg, var(--info-color), #3182ce) !important;  
        color: white !important;  
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
        font-size: clamp(13px, 1.5vw, 15px);  
        color: var(--text-muted);  
        margin: 0;  
    }  

    /* ==================== MODAL ==================== */  
    .modal-content {  
        border: 1px solid var(--border-color);  
        border-radius: 12px;  
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
        padding: clamp(16px, 2vw, 20px);  
    }  

    .modal-header .modal-title {  
        font-size: clamp(16px, 2vw, 20px);  
        font-weight: 700;  
        display: flex;  
        align-items: center;  
        gap: 10px;  
    }  

    .modal-header .modal-title i {  
        font-size: clamp(18px, 2.5vw, 24px);  
    }  

    .modal-header .btn-close {  
        filter: invert(1) brightness(1.5);  
        transition: var(--transition);  
    }  

    .modal-header .btn-close:hover {  
        transform: rotate(90deg);  
    }  

    .modal-body {  
        padding: clamp(20px, 3vw, 28px);  
    }  

    .modal-footer {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
        border-top: 1px solid var(--border-color);  
        padding: clamp(12px, 2vw, 16px);  
        gap: 8px;  
    }  

    /* ==================== RESPONSIVE ==================== */  
    @media (max-width: 1024px) {  
        .form-card,  
        .table-card {  
            margin-bottom: 20px;  
            border-radius: 12px;  
        }  
    }  

    @media (max-width: 768px) {  
        .form-grid {  
            grid-template-columns: 1fr;  
        }  

        .form-card-body {  
            padding: 16px;  
        }  

        .form-card-header,  
        .table-card-header {  
            font-size: 15px;  
            padding: 14px;  
        }  

        .table-card-header {  
            flex-wrap: wrap;  
        }  

        .table-card-count {  
            order: 3;  
            width: 100%;  
            margin-left: 0;  
            text-align: center;  
            margin-top: 8px;  
        }  

        .table {  
            font-size: 11px;  
        }  

        .table thead th,  
        .table tbody td {  
            padding: 10px 8px;  
        }  

        .table thead th {  
            font-size: 10px;  
            letter-spacing: 0;  
        }  

        .action-buttons {  
            gap: 4px;  
        }  

        .btn-sm {  
            padding: 5px 8px;  
            font-size: 9px;  
        }  

        .badge {  
            font-size: 10px;  
            padding: 4px 8px;  
        }  

        .empty-state {  
            padding: 30px 15px;  
        }  

        .empty-state i {  
            font-size: 32px;  
            margin-bottom: 10px;  
        }  

        .empty-state p {  
            font-size: 12px;  
        }  

        .modal-body {  
            padding: 16px;  
        }  
    }  

    @media (max-width: 480px) {  
        .form-card,  
        .table-card {  
            border-radius: 10px;  
        }  

        .form-card-header,  
        .table-card-header {  
            font-size: 13px;  
            padding: 12px;  
            gap: 8px;  
        }  

        .form-card-header i,  
        .table-card-header i {  
            font-size: 16px;  
        }  

        .form-card-body {  
            padding: 12px;  
        }  

        .form-group {  
            margin-bottom: 12px;  
        }  

        .form-label {  
            font-size: 12px;  
            margin-bottom: 6px;  
        }  

        .form-control {  
            padding: 8px 10px;  
            font-size: 12px;  
        }  

        .btn {  
            padding: 8px 12px;  
            font-size: 11px;  
            gap: 6px;  
            width: 100%;  
            justify-content: center;  
        }  

        .btn-sm {  
            width: auto;  
            padding: 6px 8px;  
            font-size: 9px;  
        }  

        .table {  
            font-size: 10px;  
        }  

        .table thead th,  
        .table tbody td {  
            padding: 8px 6px;  
        }  

        .table thead th {  
            font-size: 9px;  
        }  

        .action-buttons {  
            gap: 3px;  
        }  

        .table-card-count {  
            font-size: 11px;  
            padding: 5px 10px;  
            order: 3;  
            width: 100%;  
            margin-top: 8px;  
        }  

        .badge {  
            font-size: 9px;  
            padding: 3px 6px;  
        }  

        .modal-body {  
            padding: 12px;  
        }  

        .modal-header,  
        .modal-footer {  
            padding: 12px;  
        }  

        .modal-header .modal-title {  
            font-size: 14px;  
            gap: 6px;  
        }  

        .modal-header .modal-title i {  
            font-size: 16px;  
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

    .form-card:hover .form-card-header i {  
        animation: none;  
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
        .form-card,  
        .table-card,  
        .modal-content,  
        .form-control {  
            background: #2d3748;  
            border-color: #4a5568;  
            color: #e2e8f0;  
        }  

        .form-label,  
        .table thead th,  
        .modal-header .modal-title {  
            color: #e2e8f0;  
        }  

        .form-control {  
            color: #e2e8f0;  
        }  

        .form-control::placeholder {  
            color: #718096;  
        }  

        .table tbody td {  
            color: #cbd5e0;  
        }  

        .table tbody td strong {  
            color: #f7fafc;  
        }  

        .table tbody tr:hover {  
            background: #2d3748;  
        }  

        .empty-state,  
        .modal-footer,  
        .table-card-header {  
            background: #1a202c;  
            border-color: #4a5568;  
        }  

        .modal-body {  
            background: #2d3748;  
        }  
    }  
</style>  

<!-- Main Container -->  
<div class="guru-container">  
    <div class="row">  
        <div class="col-lg-8 offset-lg-2">  

            <!-- FORM TAMBAH GURU -->  
            <div class="form-card">  
                <div class="form-card-header">  
                    <i class="fas fa-plus-circle"></i>  
                    <span>Tambah Guru Baru</span>  
                </div>  
                <div class="form-card-body">  
                    <form method="POST" action="{{ route('admin.guru.add') }}" class="guru-form">  
                        @csrf  
                        
                        <div class="form-grid">  
                            <div class="form-group">  
                                <label class="form-label">Nama Guru</label>  
                                <input   
                                    type="text"   
                                    class="form-control"   
                                    name="nama"   
                                    placeholder="Nama lengkap guru"   
                                    required  
                                >  
                            </div>  

                            <div class="form-group">  
                                <label class="form-label">Mata Pelajaran</label>  
                                <input   
                                    type="text"   
                                    class="form-control"   
                                    name="mata_pelajaran"   
                                    placeholder="Mata pelajaran yang diampu"   
                                    required  
                                >  
                            </div>  
                        </div>  

                        <div class="form-group">  
                            <label class="form-label">Nomor Induk Pegawai (NIP)</label>  
                            <input   
                                type="text"   
                                class="form-control"   
                                name="nip"   
                                placeholder="Contoh: 198503151234567890"   
                                required  
                            >  
                        </div>  

                        <button type="submit" class="btn btn-primary">  
                            <i class="fas fa-plus"></i> Tambah Guru  
                        </button>  
                    </form>  
                </div>  
            </div>  

            <!-- DAFTAR GURU -->  
            <div class="table-card">  
                <div class="table-card-header">  
                    <i class="fas fa-list"></i>  
                    <span>Daftar Guru</span>  
                    <div class="table-card-count">{{ count($guru) }} Guru</div>  
                </div>  

                @if(count($guru) > 0)  
                <div class="table-wrapper">  
                    <table class="table">  
                        <thead>  
                            <tr>  
                                <th style="width: 8%;">No</th>  
                                <th style="width: 28%;">Nama Guru</th>  
                                <th style="width: 24%;">Mata Pelajaran</th>  
                                <th style="width: 20%;">NIP</th>  
                                <th style="width: 20%;">Aksi</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            @foreach($guru as $item)  
                            <tr>  
                                <td>  
                                    <strong>{{ $loop->iteration }}</strong>  
                                </td>  
                                <td>  
                                    <strong>{{ $item['nama'] ?? '-' }}</strong>  
                                </td>  
                                <td>  
                                    <span class="badge bg-info">  
                                        {{ $item['mata_pelajaran'] ?? '-' }}  
                                    </span>  
                                </td>  
                                <td>  
                                    <code style="color: var(--text-light); font-size: 11px;">  
                                        {{ $item['nip'] ?? '-' }}  
                                    </code>  
                                </td>  
                                <td>  
                                    <div class="action-buttons">  
                                        <button   
                                            type="button"   
                                            class="btn btn-sm btn-warning"   
                                            data-bs-toggle="modal"   
                                            data-bs-target="#editGuru{{ $item['id'] }}"   
                                            title="Edit Data"  
                                        >  
                                            <i class="fas fa-edit"></i>  
                                            <span class="d-none d-sm-inline">Edit</span>  
                                        </button>  
                                        <form   
                                            method="POST"   
                                            action="{{ route('admin.guru.delete', $item['id']) }}"   
                                            onsubmit="return confirm('Yakin ingin menghapus guru ini?');"  
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
                            <div class="modal fade" id="editGuru{{ $item['id'] }}" tabindex="-1" aria-hidden="true">  
                                <div class="modal-dialog modal-dialog-centered">  
                                    <div class="modal-content">  
                                        <div class="modal-header">  
                                            <h5 class="modal-title">  
                                                <i class="fas fa-user-edit"></i> Edit Data Guru  
                                            </h5>  
                                            <button   
                                                type="button"   
                                                class="btn-close"   
                                                data-bs-dismiss="modal"   
                                                aria-label="Close"  
                                            ></button>  
                                        </div>  
                                        <form method="POST" action="{{ route('admin.guru.update', $item['id']) }}">  
                                            @csrf  
                                            <div class="modal-body">  
                                                <div class="form-group">  
                                                    <label class="form-label">Nama Guru</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="nama"   
                                                        value="{{ $item['nama'] ?? '' }}"   
                                                        required  
                                                    >  
                                                </div>  
                                                <div class="form-group">  
                                                    <label class="form-label">Mata Pelajaran</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="mata_pelajaran"   
                                                        value="{{ $item['mata_pelajaran'] ?? '' }}"   
                                                        required  
                                                    >  
                                                </div>  
                                                <div class="form-group">  
                                                    <label class="form-label">NIP</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="nip"   
                                                        value="{{ $item['nip'] ?? '' }}"   
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>Belum ada data guru</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== FORM SUBMISSION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.guru-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;
            });
        }
    });

    // ==================== INPUT FOCUS EFFECT ==================== 
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
            this.parentElement.style.opacity = '1';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // ==================== DELETE CONFIRMATION ==================== 
    document.querySelectorAll('form[onsubmit*="confirm"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
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

    // ==================== MODAL ANIMATIONS ==================== 
    document.querySelectorAll('[id^="editGuru"]').forEach(modal => {
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

    // ==================== RIPPLE EFFECT ON BUTTONS ==================== 
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // ==================== FORM VALIDATION FEEDBACK ==================== 
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
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ==================== TABLE SORT ENHANCEMENT ==================== 
    const tableHeads = document.querySelectorAll('.table thead th');
    tableHeads.forEach((head, index) => {
        head.style.cursor = 'pointer';
        head.style.userSelect = 'none';
        
        head.addEventListener('mouseenter', function() {
            this.style.background = 'rgba(102, 126, 234, 0.1)';
            this.style.transition = 'all 0.3s ease';
        });
        
        head.addEventListener('mouseleave', function() {
            this.style.background = '';
        });
    });

    // ==================== KEYBOARD NAVIGATION ==================== 
    document.addEventListener('keydown', function(e) {
        // ESC to close modals
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.show').forEach(modal => {
                bootstrap.Modal.getInstance(modal)?.hide();
            });
        }

        // Ctrl+S to submit form
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            const form = document.querySelector('.guru-form');
            if (form) form.submit();
        }
    });

    // ==================== PAGE LOAD ANIMATION ==================== 
    window.addEventListener('load', function() {
        document.querySelector('.guru-container').style.opacity = '1';
        document.querySelector('.guru-container').style.animation = 'fadeIn 0.5s ease-out';
    });
</script>

@endsection
                                