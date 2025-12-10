@extends('layouts.admin')

@section('title', 'Kelola Struktur Organisasi')
@section('page-title', 'Kelola Struktur Organisasi')

@section('content')

<style>
    :root {
        --primary-color: #667eea;
        --primary-dark: #5568d3;
        --success-color: #48bb78;
        --danger-color: #f56565;
        --text-dark: #2d3748;
        --text-light: #718096;
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

    .form-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }

    .form-card:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-4px);
    }

    .form-card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 18px;
        font-weight: 700;
    }

    .form-card-header i {
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

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-color), #e53e3e);
        color: white;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(245, 101, 101, 0.3);
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

    .empty-state {
        padding: 60px 30px;
        text-align: center;
        background: var(--light-bg);
        border-radius: 12px;
    }

    .empty-state i {
        font-size: 64px;
        color: var(--border-color);
        margin-bottom: 16px;
        opacity: 0.5;
    }

    .empty-state p {
        font-size: 16px;
        color: var(--text-light);
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
    }
</style>

<div class="struktur-container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <!-- INFO BOX -->
            <div class="info-box">
                <i class="fas fa-info-circle"></i>
                <p><strong>Petunjuk:</strong> Upload gambar struktur organisasi sekolah dalam format JPG, PNG, GIF, atau SVG dengan ukuran maksimal 5MB. Disarankan menggunakan gambar dengan resolusi tinggi agar tampilan jelas.</p>
            </div>

            @if(session('struktur_organisasi_gambar') || $strukturGambar)
            <!-- PREVIEW GAMBAR -->
            <div class="preview-card">
                <div class="preview-card-header">
                    <i class="fas fa-image"></i>
                    <span>Preview Gambar Struktur Organisasi</span>
                </div>
                <div class="preview-card-body">
                    <img src="{{ asset('storage/' . (session('struktur_organisasi_gambar') ?? $strukturGambar)) }}" alt="Struktur Organisasi" class="preview-image">
                    
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
                    <span>{{ (session('struktur_organisasi_gambar') || $strukturGambar) ? 'Ganti' : 'Upload' }} Gambar Struktur Organisasi</span>
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

            @if(!session('struktur_organisasi_gambar') && !$strukturGambar)
            <!-- EMPTY STATE -->
            <div class="empty-state">
                <i class="fas fa-image"></i>
                <p><strong>Belum ada gambar struktur organisasi</strong></p>
                <p>Upload gambar struktur organisasi untuk menampilkan informasi kepada pengunjung website.</p>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>

@endsection