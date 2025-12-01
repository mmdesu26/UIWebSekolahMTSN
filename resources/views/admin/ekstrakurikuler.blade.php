@extends('layouts.admin')

@section('title', 'Master Data Ekstrakurikuler')
@section('page-title', 'Master Data Ekstrakurikuler')

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
    .ekstrakurikuler-container {
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
        padding: clamp(20px, 4vw, 32px);
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
    }

    .form-card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: clamp(16px, 2vw, 20px);
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: clamp(20px, 3vw, 28px);
        padding-bottom: clamp(15px, 2vw, 20px);
        border-bottom: 2px solid var(--border-color);
    }

    .form-card-header i {
        font-size: clamp(18px, 2.5vw, 24px);
        color: var(--primary-color);
        transition: var(--transition);
    }

    .form-card:hover .form-card-header i {
        transform: scale(1.15) rotate(-10deg);
    }

    /* ==================== FORM ELEMENTS ==================== */
    .form-group {
        margin-bottom: clamp(16px, 2vw, 24px);
    }

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

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control::placeholder {
        color: var(--text-muted);
    }

    textarea.form-control {
        resize: vertical;
        min-height: clamp(90px, 12vw, 150px);
        font-family: inherit;
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
        background: rgba(255, 255, 255, 0.2);
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

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d, #5a6268);
        color: white;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
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
        display: flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);
        padding: clamp(16px, 2vw, 24px);
        border-bottom: 2px solid var(--border-color);
        font-size: clamp(16px, 2vw, 20px);
        font-weight: 600;
        color: var(--text-dark);
    }

    .table-card-header i {
        font-size: clamp(18px, 2.5vw, 24px);
        color: var(--primary-color);
    }

    .table-card-count {
        margin-left: auto;
        background: var(--primary-color);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: clamp(12px, 1.5vw, 14px);
        font-weight: 700;
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
        font-weight: 600;
    }

    .table tbody td small {
        font-size: 11px;
        color: var(--text-muted);
    }

    .table tbody tr:last-child {
        border-bottom: none;
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
    }

    .empty-state p {
        font-size: clamp(13px, 1.5vw, 15px);
        color: var(--text-muted);
        margin: 0;
    }

    /* ==================== ACTION BUTTONS ==================== */
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-buttons form {
        display: contents;
    }

    /* ==================== MODAL ==================== */
    .modal-content {
        border: 1px solid var(--border-color);
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
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
    }

    .modal-header .btn-close {
        filter: invert(1) brightness(1.5);
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

    /* ==================== PRESTASI SECTION ==================== */
    .prestasi-section {
        margin-top: clamp(15px, 2vw, 20px);
        padding: clamp(15px, 2vw, 20px);
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        border-left: 4px solid var(--primary-color);
        border-radius: 8px;
    }

    .prestasi-title {
        font-size: clamp(12px, 1.5vw, 14px);
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .prestasi-list {
        font-size: clamp(12px, 1.5vw, 13px);
        color: var(--text-light);
        line-height: 1.6;
        white-space: pre-wrap;
        word-break: break-word;
    }

    .prestasi-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 8px;
        margin-right: 6px;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .form-card,
        .table-card {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 768px) {
        .form-card,
        .table-card {
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .form-card-header,
        .table-card-header {
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-card-count {
            order: 3;
            width: 100%;
            margin-left: 0;
            text-align: center;
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
        }

        .action-buttons {
            gap: 6px;
        }

        .btn-sm {
            padding: 5px 8px;
            font-size: 10px;
        }

        .prestasi-section {
            margin-top: 12px;
            padding: 12px;
            border-left-width: 3px;
        }

        .prestasi-title {
            font-size: 12px;
            margin-bottom: 6px;
        }

        .prestasi-list {
            font-size: 11px;
        }

        .empty-state {
            padding: 30px 15px;
        }

        .empty-state i {
            font-size: 32px;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-card,
        .table-card {
            border-radius: 10px;
            padding: 12px;
        }

        .form-card-header,
        .table-card-header {
            font-size: 14px;
            gap: 8px;
            padding: 12px;
        }

        .form-card-header i,
        .table-card-header i {
            font-size: 18px;
        }

        .table-card-count {
            font-size: 11px;
            padding: 5px 10px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            font-size: 12px;
            margin-bottom: 6px;
        }

        .form-control {
            padding: 8px 10px;
            font-size: 12px;
        }

        textarea.form-control {
            min-height: 80px;
        }

        .btn {
            padding: 8px 12px;
            font-size: 11px;
            gap: 6px;
            width: 100%;
            justify-content: center;
        }

        .btn-sm {
            padding: 6px 8px;
            font-size: 9px;
            width: auto;
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
            letter-spacing: 0;
        }

        .action-buttons {
            gap: 4px;
        }

        .action-buttons .btn {
            width: auto;
            padding: 6px 8px;
        }

        .prestasi-section {
            margin-top: 10px;
            padding: 10px;
            border-left-width: 3px;
        }

        .prestasi-title {
            font-size: 11px;
            margin-bottom: 5px;
            gap: 6px;
        }

        .prestasi-title i {
            font-size: 12px;
        }

        .prestasi-list {
            font-size: 10px;
            line-height: 1.5;
        }

        .prestasi-badge {
            padding: 3px 6px;
            font-size: 9px;
            margin-bottom: 6px;
            margin-right: 4px;
        }

        .modal-body {
            padding: 16px;
        }

        .modal-header {
            padding: 12px 16px;
        }

        .modal-header .modal-title {
            font-size: 15px;
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
        animation: pulse 0.8s ease-in-out;
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

        .form-card-header,
        .table-card-header,
        .modal-header {
            background: linear-gradient(135deg, #1a202c, #2d3748);
            color: #f7fafc;
        }

        .form-label,
        .table thead th,
        .modal-header .modal-title {
            color: #e2e8f0;
        }

        .table tbody td,
        .form-control,
        .prestasi-list {
            color: #cbd5e0;
        }

        .table tbody tr:hover {
            background: #2d3748;
        }

        .empty-state,
        .modal-footer {
            background: #1a202c;
            color: #a0aec0;
            border-color: #4a5568;
        }

        .prestasi-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        }
    }
</style>

<!-- Main Container -->
<div class="ekstrakurikuler-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <!-- FORM TAMBAH -->
            <div class="form-card">
                <div class="form-card-header">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Ekstrakurikuler Baru</span>
                </div>
                <form method="POST" action="{{ route('admin.ekstrakurikuler.add') }}" class="ekstrakurikuler-form">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Nama Ekstrakurikuler</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Contoh: Taekwondo, Robotika, English Club..." 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jadwal</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="jadwal" 
                            placeholder="Contoh: Senin & Rabu, 15:30-17:00" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pembina / Pelatih</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="pembina" 
                            placeholder="Nama pembina ekstrakurikuler" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Daftar Prestasi</label>
                        <textarea 
                            class="form-control" 
                            name="prestasi" 
                            placeholder="Tuliskan prestasi yang telah diraih (satu prestasi per baris)&#10;Contoh:&#10;- Juara 1 Lomba Robotika Tingkat Provinsi 2024&#10;- Medali Emas Kejuaraan Taekwondo Nasional 2023" 
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
                    </button>
                </form>
            </div>

            <!-- DAFTAR EKSTRAKURIKULER -->
            <div class="table-card">
                <div class="table-card-header">
                    <i class="fas fa-list"></i>
                    <span>Daftar Ekstrakurikuler</span>
                    <div class="table-card-count">{{ count($ekstrakurikuler) }} Item</div>
                </div>

                @if(count($ekstrakurikuler) > 0)
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 25%;">Nama</th>
                                <th style="width: 25%;">Pembina</th>
                                <th style="width: 20%;">Jadwal</th>
                                <th style="width: 25%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ekstrakurikuler as $item)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td>
                                    <strong>{{ $item['name'] ?? '-' }}</strong>
                                </td>
                                <td>
                                    {{ $item['pembina'] ?? '-' }}
                                </td>
                                <td>
                                    <small>{{ $item['jadwal'] ?? '-' }}</small>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-warning" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editEkstra{{ $item['id'] }}" 
                                            title="Edit Data"
                                        >
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form 
                                            method="POST" 
                                            action="{{ route('admin.ekstrakurikuler.delete', $item['id']) }}" 
                                            onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?');"
                                        >
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW PRESTASI -->
                            @if(!empty($item['prestasi']))
                            <tr>
                                <td colspan="5">
                                    <div class="prestasi-section">
                                        <div class="prestasi-title">
                                            <i class="fas fa-trophy" style="color: var(--warning-color);"></i>
                                            Prestasi yang Diraih
                                        </div>
                                        <div class="prestasi-list">
                                            {{ $item['prestasi'] }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <!-- MODAL EDIT -->
                            <div class="modal fade" id="editEkstra{{ $item['id'] }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="fas fa-edit"></i> Edit Ekstrakurikuler
                                            </h5>
                                            <button 
                                                type="button" 
                                                class="btn-close" 
                                                data-bs-dismiss="modal" 
                                                aria-label="Close"
                                            ></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.ekstrakurikuler.update', $item['id']) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Ekstrakurikuler</label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        name="name" 
                                                        value="{{ $item['name'] ?? '' }}" 
                                                        required
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Jadwal</label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        name="jadwal" 
                                                        value="{{ $item['jadwal'] ?? '' }}" 
                                                        required
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Pembina / Pelatih</label>
                                                    <input 
                                                        type="text" 
                                                        class="form-control" 
                                                        name="pembina" 
                                                        value="{{ $item['pembina'] ?? '' }}" 
                                                        required
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Daftar Prestasi</label>
                                                    <textarea 
                                                        class="form-control" 
                                                        name="prestasi" 
                                                        rows="4"
                                                        required
                                                    >{{ $item['prestasi'] ?? '' }}</textarea>
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
                    <p>Belum ada data ekstrakurikuler</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    // ==================== FORM ANIMATION ==================== 
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.ekstrakurikuler-form');
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
</script>

@endsection