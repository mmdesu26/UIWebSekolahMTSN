@extends('layouts.admin')

@section('title', 'Kelola Struktur Organisasi & Guru')
@section('page-title', 'Kelola Struktur Organisasi & Guru')

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

    .struktur-container {
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

    .upload-area {
        border: 3px dashed var(--border-color);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        background: var(--light-bg);
        transition: var(--transition);
        cursor: pointer;
    }

    .upload-area:hover {
        border-color: var(--primary-color);
        background: #f0f4ff;
    }

    .upload-area.dragover {
        border-color: var(--primary-color);
        background: #e0e7ff;
        transform: scale(1.02);
    }

    .upload-icon {
        font-size: 48px;
        color: var(--primary-color);
        margin-bottom: 16px;
    }

    .upload-text {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .upload-hint {
        font-size: 14px;
        color: var(--text-light);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
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

    .preview-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        margin-bottom: 30px;
    }

    .preview-card-header {
        background: linear-gradient(135deg, var(--success-color), #38a169);
        color: white;
        padding: 16px 20px;
        font-size: 16px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .preview-card-body {
        padding: 24px;
    }

    .preview-image {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .info-box {
        background: #e0f2fe;
        border-left: 4px solid #0284c7;
        padding: 16px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .info-box i {
        color: #0284c7;
        margin-right: 8px;
    }

    .info-box p {
        margin: 0;
        color: #0c4a6e;
        font-size: 14px;
        line-height: 1.6;
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

    .section-divider {
        margin: 50px 0 40px;
        text-align: center;
        position: relative;
    }

    .section-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--border-color), transparent);
    }

    .section-divider span {
        background: white;
        padding: 10px 30px;
        position: relative;
        z-index: 1;
        font-size: 18px;
        font-weight: 700;
        color: var(--primary-color);
    }

    .guru-photo {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    @media (max-width: 768px) {
        .form-card-body, .preview-card-body {
            padding: 20px;
        }

        .upload-area {
            padding: 30px 20px;
        }

        .upload-icon {
            font-size: 36px;
        }

        .table {
            font-size: 12px;
        }

        .table thead th, .table tbody td {
            padding: 10px 8px;
        }
    }
</style>

<div class="struktur-container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <!-- ============================= -->
            <!-- SECTION 1: GAMBAR STRUKTUR -->
            <!-- ============================= -->
            
            <!-- INFO BOX -->
            <div class="info-box">
                <i class="fas fa-info-circle"></i>
                <p><strong>Petunjuk:</strong> Upload gambar struktur organisasi sekolah dalam format JPG, PNG, GIF, atau SVG dengan ukuran maksimal 5MB. Disarankan menggunakan gambar dengan resolusi tinggi agar tampilan jelas.</p>
            </div>

            @if($strukturGambar)
            <!-- PREVIEW GAMBAR -->
            <div class="preview-card">
                <div class="preview-card-header">
                    <i class="fas fa-image"></i>
                    <span>Preview Gambar Struktur Organisasi</span>
                </div>
                <div class="preview-card-body">
                    <img src="{{ asset('storage/' . $strukturGambar) }}" alt="Struktur Organisasi" class="preview-image">
                    
                    <div style="display: flex; gap: 12px; justify-content: center;">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadForm').scrollIntoView({behavior: 'smooth'})">
                            <i class="fas fa-edit"></i> Ganti Gambar
                        </button>
                        <form method="POST" action="{{ route('admin.struktur.delete') }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus gambar struktur organisasi?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus Gambar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <!-- FORM UPLOAD -->
            <div class="form-card" id="uploadForm">
                <div class="form-card-header">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>{{ $strukturGambar ? 'Ganti' : 'Upload' }} Gambar Struktur Organisasi</span>
                </div>
                <div class="form-card-body">
                    <form method="POST" action="{{ route('admin.struktur.upload') }}" enctype="multipart/form-data" id="uploadFormElement">
                        @csrf
                        
                        <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Klik untuk memilih file atau drag & drop</p>
                            <p class="upload-hint">Format: JPG, PNG, GIF, SVG | Maksimal 5MB</p>
                            <input type="file" name="gambar" id="fileInput" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml" style="display: none;" required>
                        </div>

                        <div id="filePreview" style="display: none; margin-top: 20px; text-align: center;">
                            <img id="previewImg" src="" alt="Preview" style="max-width: 100%; max-height: 400px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <p id="fileName" style="margin-top: 12px; font-size: 14px; color: var(--text-dark); font-weight: 600;"></p>
                        </div>

                        <div style="margin-top: 24px; text-align: center;">
                            <button type="submit" class="btn btn-primary" id="uploadBtn" disabled>
                                <i class="fas fa-upload"></i> Upload Gambar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- DIVIDER -->
            <div class="section-divider">
                <span><i class="fas fa-users"></i> DATA GURU & TENAGA PENDIDIK</span>
            </div>

            <!-- ============================= -->
            <!-- SECTION 2: DATA GURU -->
            <!-- ============================= -->

            <!-- FORM TAMBAH GURU -->
            <div class="form-card">
                <div class="form-card-header">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Guru Baru</span>
                </div>
                <div class="form-card-body">
                    <form method="POST" action="{{ route('admin.struktur.guru.store') }}" enctype="multipart/form-data" class="guru-form">
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

                        <div class="form-group">
                            <label class="form-label optional">Foto Guru (opsional)</label>
                            <input 
                                type="file" 
                                class="form-control" 
                                name="foto" 
                                accept="image/*"
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
                                <th style="width: 10%;">Foto</th>
                                <th style="width: 28%;">Nama Guru</th>
                                <th style="width: 24%;">Mata Pelajaran</th>
                                <th style="width: 20%;">NIP</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guru as $item)
                            <tr>
                                <td>
                                    <strong>{{ $loop->iteration }}</strong>
                                </td>
                                <td>
                                    @if($item->foto_url)
                                        <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="guru-photo">
                                    @else
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #e2e8f0, #cbd5e0); display: flex; align-items: center; justify-content: center; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                            <i class="fas fa-user" style="color: #718096; font-size: 20px;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong style="color: var(--text-dark);">{{ $item->nama }}</strong>
                                </td>
                                <td>
                                    <span class="badge">
                                        {{ $item->mata_pelajaran }}
                                    </span>
                                </td>
                                <td>
                                    <code style="color: var(--text-light); font-size: 11px;">
                                        {{ $item->nip_display }}
                                    </code>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-warning" 
                                            onclick="openEditModal({{ $item->id }})"
                                            title="Edit Data"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form 
                                            method="POST" 
                                            action="{{ route('admin.struktur.guru.delete', $item) }}" 
                                            onsubmit="return confirm('Yakin ingin menghapus guru ini?');"
                                            style="display: inline;"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
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

<!-- ✅ MODAL EDIT - DIPINDAH KE LUAR CONTAINER! -->
@foreach($guru as $item)
<div class="modal fade" id="editGuru{{ $item->id }}" tabindex="-1" aria-labelledby="editGuruLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruLabel{{ $item->id }}">
                    <i class="fas fa-user-edit"></i> Edit Data Guru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.struktur.guru.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label required">Nama Guru</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="nama" 
                            value="{{ $item->nama }}" 
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Mata Pelajaran</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="mata_pelajaran" 
                            value="{{ $item->mata_pelajaran }}" 
                            required
                        >
                    </div>
                    <div class="form-group">
                        <label class="form-label optional">NIP</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="nip" 
                            value="{{ $item->nip }}"
                            placeholder="Boleh dikosongkan"
                        >
                        <small style="color: var(--text-muted); font-size: 12px; margin-top: 6px; display: block;">
                            <i class="fas fa-info-circle"></i> Opsional
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label optional">Ganti Foto</label>
                        @if($item->foto_url)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ $item->foto_url }}" alt="Current" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                                <p style="font-size: 12px; color: #666; margin-top: 5px;">Foto saat ini</p>
                            </div>
                        @endif
                        <input 
                            type="file" 
                            class="form-control" 
                            name="foto" 
                            accept="image/*"
                        >
                        <small style="color: var(--text-muted); font-size: 12px; margin-top: 6px; display: block;">
                            <i class="fas fa-info-circle"></i> Kosongkan jika tidak ingin mengganti foto
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== UPLOAD GAMBAR STRUKTUR ==========
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');
    const uploadBtn = document.getElementById('uploadBtn');

    // File Input Change
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validasi ukuran file (5MB = 5242880 bytes)
            if (file.size > 5242880) {
                alert('Ukuran file terlalu besar! Maksimal 5MB.');
                fileInput.value = '';
                return;
            }

            // Validasi tipe file
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak valid! Hanya JPG, PNG, GIF, atau SVG yang diperbolehkan.');
                fileInput.value = '';
                return;
            }

            // Preview gambar
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                filePreview.style.display = 'block';
                uploadBtn.disabled = false;
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag & Drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            fileInput.dispatchEvent(new Event('change'));
        }
    });

    // Form Submit Loading
    document.getElementById('uploadFormElement').addEventListener('submit', function() {
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
        uploadBtn.disabled = true;
    });

    // ========== FORM GURU ==========
    const guruForm = document.querySelector('.guru-form');
    if (guruForm) {
        guruForm.addEventListener('submit', function(e) {
            const submitBtn = guruForm.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
    }
});

// ✅ FUNCTION UNTUK BUKA MODAL EDIT (FIXED!)
function openEditModal(guruId) {
    const modalElement = document.getElementById('editGuru' + guruId);
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
}
</script>

@endsection