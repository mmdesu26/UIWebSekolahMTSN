@extends('layouts.admin')  

@section('title', 'Master Data Guru')  
@section('page-title', 'Master Data Guru')  

@section('content')  

<style>  
    :root {  
        --primary-color: #667eea;  
        --primary-dark: #5568d3;  
        --success-color: #48bb78;  
        --warning-color: #ed8936;  
        --danger-color: #f56565;
        --text-dark: #2d3748;  
        --text-light: #718096;  
        --text-muted: #a0aec0;  
        --border-color: #e2e8f0;  
        --light-bg: #f7fafc;  
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);  
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);  
    }  

    .guru-container {  
        animation: fadeIn 0.5s ease-out;  
    }  

    @keyframes fadeIn {  
        from { opacity: 0; transform: translateY(10px); }  
        to { opacity: 1; transform: translateY(0); }  
    }  

    .form-card, .table-card {  
        background: white;  
        border: 1px solid var(--border-color);  
        border-radius: 14px;  
        overflow: hidden;  
        margin-bottom: 30px;  
        box-shadow: var(--shadow-md);  
        transition: var(--transition);  
    }  

    .form-card:hover, .table-card:hover {  
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);  
        transform: translateY(-4px);  
    }  

    .form-card-header, .table-card-header {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        padding: 20px 24px;  
        display: flex;  
        align-items: center;  
        gap: 12px;  
        font-size: 18px;  
        font-weight: 700;  
    }  

    .form-card-header i, .table-card-header i {  
        font-size: 22px;  
    }  

    .form-card-body {  
        padding: 28px;  
    }  

    .form-group {  
        margin-bottom: 20px;  
    }  

    .form-label {  
        display: block;  
        font-size: 14px;  
        font-weight: 600;  
        color: var(--text-dark);  
        margin-bottom: 10px;  
    }  

    .form-label.required::after {  
        content: '*';  
        color: var(--danger-color);  
        margin-left: 4px;  
    }

    .form-label.optional::after {
        content: '(opsional)';
        color: var(--text-muted);
        margin-left: 6px;
        font-size: 12px;
        font-weight: 400;
    }

    .form-control {  
        width: 100%;  
        padding: 12px 16px;  
        border: 2px solid var(--border-color);  
        border-radius: 8px;  
        font-size: 14px;  
        transition: var(--transition);  
    }  

    .form-control:focus {  
        outline: none;  
        border-color: var(--primary-color);  
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);  
    }  

    .btn {  
        display: inline-flex;  
        align-items: center;  
        justify-content: center;  
        gap: 8px;  
        padding: 10px 20px;  
        border-radius: 8px;  
        font-size: 14px;  
        font-weight: 600;  
        transition: var(--transition);  
        border: none;  
        cursor: pointer;  
    }  

    .btn-primary {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
    }  

    .btn-primary:hover {  
        transform: translateY(-2px);  
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);  
    }  

    .btn-warning {  
        background: linear-gradient(135deg, var(--warning-color), #dd6b20);  
        color: white;  
    }  

    .btn-danger {  
        background: linear-gradient(135deg, var(--danger-color), #e53e3e);  
        color: white;  
    }  

    .btn-sm {  
        padding: 6px 12px;  
        font-size: 12px;  
    }  

    .table-wrapper {  
        overflow-x: auto;  
    }  

    .table {  
        width: 100%;  
        border-collapse: collapse;  
        font-size: 14px;  
    }  

    .table thead {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
    }  

    .table thead th {  
        padding: 14px;  
        font-weight: 700;  
        color: var(--text-dark);  
        text-align: left;  
        text-transform: uppercase;  
        font-size: 12px;  
        letter-spacing: 0.5px;  
    }  

    .table tbody tr {  
        border-bottom: 1px solid var(--border-color);  
        transition: var(--transition);  
    }  

    .table tbody tr:hover {  
        background: linear-gradient(135deg, #f8f9fa, #edf2f7);  
    }  

    .table tbody td {  
        padding: 14px;  
        color: var(--text-light);  
    }  

    .badge {  
        display: inline-block;  
        padding: 6px 12px;  
        border-radius: 20px;  
        font-size: 12px;  
        font-weight: 600;  
        background: linear-gradient(135deg, #4299e1, #3182ce);  
        color: white;  
    }  

    .action-buttons {  
        display: flex;  
        gap: 6px;  
    }  

    .empty-state {  
        padding: 50px 30px;  
        text-align: center;  
        background: var(--light-bg);  
    }  

    .empty-state i {  
        font-size: 48px;  
        color: var(--border-color);  
        margin-bottom: 16px;  
    }  

    .modal-content {  
        border-radius: 12px;  
        border: none;  
    }  

    .modal-header {  
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));  
        color: white;  
        border-bottom: none;  
        padding: 20px;  
    }  

    .modal-body {  
        padding: 24px;  
    }  

    .modal-footer {  
        background: var(--light-bg);  
        border-top: 1px solid var(--border-color);  
        padding: 16px;  
    }  

    @media (max-width: 768px) {  
        .form-card-body {  
            padding: 16px;  
        }  

        .table {  
            font-size: 12px;  
        }  

        .table thead th, .table tbody td {  
            padding: 10px 8px;  
        }  
    }  
</style>  

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
                        
                        <div class="form-group">  
                            <label class="form-label required">Nama Guru</label>  
                            <input   
                                type="text"   
                                class="form-control"   
                                name="nama"   
                                placeholder="Nama lengkap guru"   
                                required  
                            >  
                        </div>  

                        <div class="form-group">  
                            <label class="form-label required">Mata Pelajaran</label>  
                            <input   
                                type="text"   
                                class="form-control"   
                                name="mata_pelajaran"   
                                placeholder="Mata pelajaran yang diampu"   
                                required  
                            >  
                        </div>  

                        <div class="form-group">  
                            <label class="form-label optional">Nomor Induk Pegawai (NIP)</label>  
                            <input   
                                type="text"   
                                class="form-control"   
                                name="nip"   
                                placeholder="Contoh: 198503151234567890 (boleh dikosongkan)"  
                            >
                            <small style="color: var(--text-muted); font-size: 12px; margin-top: 6px; display: block;">
                                <i class="fas fa-info-circle"></i> Anda bisa mengosongkan field ini jika guru belum memiliki NIP
                            </small>
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
                    <div style="margin-left: auto; background: white; color: var(--primary-color); padding: 8px 14px; border-radius: 20px; font-size: 13px; font-weight: 700;">
                        {{ count($guru) }} Guru
                    </div>  
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
                                    <strong style="color: var(--text-dark);">{{ $item['nama'] ?? '-' }}</strong>  
                                </td>  
                                <td>  
                                    <span class="badge">  
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
                                            <i class="fas fa-edit"></i> Edit
                                        </button>  
                                        <form   
                                            method="POST"   
                                            action="{{ route('admin.guru.delete', $item['id']) }}"   
                                            onsubmit="return confirm('Yakin ingin menghapus guru ini?');"  
                                        >  
                                            @csrf  
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">  
                                                <i class="fas fa-trash"></i> Hapus
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
                                                    <label class="form-label required">Nama Guru</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="nama"   
                                                        value="{{ $item['nama'] ?? '' }}"   
                                                        required  
                                                    >  
                                                </div>  
                                                <div class="form-group">  
                                                    <label class="form-label required">Mata Pelajaran</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="mata_pelajaran"   
                                                        value="{{ $item['mata_pelajaran'] ?? '' }}"   
                                                        required  
                                                    >  
                                                </div>  
                                                <div class="form-group">  
                                                    <label class="form-label optional">NIP</label>  
                                                    <input   
                                                        type="text"   
                                                        class="form-control"   
                                                        name="nip"   
                                                        value="{{ $item['nip'] != '-' ? $item['nip'] : '' }}"
                                                        placeholder="Boleh dikosongkan"
                                                    >
                                                    <small style="color: var(--text-muted); font-size: 12px; margin-top: 6px; display: block;">
                                                        <i class="fas fa-info-circle"></i> Opsional
                                                    </small>
                                                </div>  
                                            </div>  
                                            <div class="modal-footer">  
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">  
                                                    <i class="fas fa-times"></i> Batal  
                                                </button>  
                                                <button type="submit" class="btn btn-primary">  
                                                    <i class="fas fa-save"></i> Simpan  
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
                    <i class="fas fa-user-friends"></i>  
                    <p style="font-size: 16px; color: var(--text-dark); font-weight: 600; margin-bottom: 8px;">Belum ada data guru</p>
                    <p style="font-size: 14px; color: var(--text-muted); margin: 0;">Tambahkan data guru menggunakan form di atas</p>
                </div>  
                @endif  
            </div>  

        </div>  
    </div>  
</div>  

<script>  
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
</script>  

@endsection