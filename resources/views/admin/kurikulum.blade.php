@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')
@section('page-title', 'Kelola Kurikulum')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-book-open text-primary me-2"></i>
                    {{ $kurikulum ? 'Edit Data Kurikulum' : 'Tambah Data Kurikulum' }}
                </h5>
                @if($kurikulum)
                    <span class="badge bg-success">
                        <i class="fas fa-check me-1"></i>
                        Data Tersedia
                    </span>
                @else
                    <span class="badge bg-warning">
                        <i class="fas fa-plus me-1"></i>
                        Data Baru
                    </span>
                @endif
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Gagal!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.kurikulum.update') }}" method="POST">
                    @csrf
                    
                    <!-- Nama Kurikulum -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                            Nama Kurikulum Yang Digunakan
                        </label>
                        <input 
                            type="text" 
                            name="nama_kurikulum" 
                            class="form-control @error('nama_kurikulum') is-invalid @enderror" 
                            value="{{ old('nama_kurikulum', $kurikulum->nama_kurikulum ?? '') }}" 
                            placeholder="Contoh: Kurikulum Merdeka"
                            required
                        >
                        @error('nama_kurikulum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Nama kurikulum yang saat ini digunakan di sekolah</small>
                    </div>

                    <!-- Deskripsi Kurikulum -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-align-left text-success me-2"></i>
                            Deskripsi Kurikulum
                        </label>
                        <textarea 
                            name="deskripsi_kurikulum" 
                            class="form-control @error('deskripsi_kurikulum') is-invalid @enderror" 
                            rows="5" 
                            placeholder="Jelaskan tentang kurikulum yang digunakan..."
                            required
                        >{{ old('deskripsi_kurikulum', $kurikulum->deskripsi_kurikulum ?? '') }}</textarea>
                        @error('deskripsi_kurikulum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Penjelasan singkat tentang kurikulum yang diterapkan</small>
                    </div>

                    <!-- Tujuan Kurikulum -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-bullseye text-warning me-2"></i>
                            Tujuan Kurikulum
                        </label>
                        <textarea 
                            name="tujuan_kurikulum" 
                            class="form-control @error('tujuan_kurikulum') is-invalid @enderror" 
                            rows="6" 
                            placeholder="Tuliskan tujuan-tujuan kurikulum (pisahkan dengan enter untuk setiap tujuan)..."
                            required
                        >{{ old('tujuan_kurikulum', $kurikulum->tujuan_kurikulum ?? '') }}</textarea>
                        @error('tujuan_kurikulum')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2 p-3 bg-light rounded">
                            <small class="text-muted">
                                <i class="fas fa-info-circle text-info me-1"></i>
                                <strong>Tips:</strong> Pisahkan setiap tujuan dengan baris baru (Enter) untuk tampilan list yang rapi di frontend
                            </small>
                        </div>
                    </div>

                    <!-- Projek Penguatan Profil Pelajar Pancasila -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="fas fa-project-diagram text-info me-2"></i>
                            Projek Penguatan Profil Pelajar Pancasila
                        </label>
                        <textarea 
                            name="projek_penguatan" 
                            class="form-control @error('projek_penguatan') is-invalid @enderror" 
                            rows="5" 
                            placeholder="Jelaskan tentang projek penguatan profil pelajar Pancasila..."
                            required
                        >{{ old('projek_penguatan', $kurikulum->projek_penguatan ?? '') }}</textarea>
                        @error('projek_penguatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Penjelasan mengenai program projek penguatan yang dilaksanakan</small>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 mt-4 flex-wrap">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>
                            {{ $kurikulum ? 'Simpan Perubahan' : 'Tambah Data' }}
                        </button>
                        
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Dashboard
                        </a>
                        
                        @if($kurikulum)
                            <form action="{{ route('admin.kurikulum.delete') }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('⚠️ Yakin ingin menghapus data kurikulum ini? Data akan hilang permanen dan tidak bisa dikembalikan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-4">
                                    <i class="fas fa-trash me-2"></i>
                                    Hapus Data
                                </button>
                            </form>
                        @endif
                        
                        <div class="ms-auto">
                            <a href="{{ route('akademik.kurikulum') }}" class="btn btn-outline-info px-3" target="_blank">
                                <i class="fas fa-eye me-1"></i>
                                <small>Lihat Preview</small>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview Section -->
@if($kurikulum)
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-eye text-info me-2"></i>
                    Preview Tampilan User
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="kurikulum-box p-4" style="background: #f8f9fa;">
                    <h3 class="text-primary mb-3">
                        <i class="fas fa-book-open me-2"></i>
                        {{ $kurikulum->nama_kurikulum }}
                    </h3>
                    <p class="mb-4" style="white-space: pre-line; font-size: 14px;">
                        {{ Str::limit($kurikulum->deskripsi_kurikulum, 150) }}...
                    </p>
                    
                    <h4 class="text-warning mb-3">
                        <i class="fas fa-bullseye me-2"></i>
                        Tujuan Utama
                    </h4>
                    <ul class="tujuan-list mb-0">
                        @foreach(explode("\n", $kurikulum->tujuan_kurikulum) as $tujuan)
                            @if(trim($tujuan))
                                <li class="mb-2">{{ trim($tujuan) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<style>
    .form-label {
        font-size: 15px;
        margin-bottom: 8px;
    }
    
    .form-control {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        transition: all 0.3s;
        font-size: 14px;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .btn {
        border-radius: 8px;
        padding: 10px 24px;
        font-weight: 600;
        transition: all 0.3s;
        font-size: 14px;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-secondary {
        background: #6c757d;
        border: none;
    }
    
    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }
    
    .btn-danger {
        background: #f56565;
        border: none;
    }
    
    .btn-danger:hover {
        background: #e53e3e;
        transform: translateY(-2px);
    }
    
    .btn-outline-info {
        border-color: #17a2b8;
        color: #17a2b8;
    }
    
    .btn-outline-info:hover {
        background: #17a2b8;
        color: white;
        transform: translateY(-2px);
    }
    
    small.text-muted {
        display: block;
        margin-top: 6px;
        font-size: 13px;
    }

    .invalid-feedback {
        display: block;
        margin-top: 6px;
    }

    .kurikulum-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        transition: all 0.3s;
    }

    .tujuan-list {
        list-style: none;
        padding-left: 0;
    }

    .tujuan-list li {
        padding: 12px 15px;
        margin-bottom: 10px;
        background: white;
        border-left: 4px solid #667eea;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: all 0.3s;
        font-size: 14px;
    }

    .tujuan-list li:hover {
        transform: translateX(10px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .tujuan-list li::before {
        content: "✓";
        color: #667eea;
        font-weight: bold;
        margin-right: 10px;
        font-size: 16px;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 20px;
    }

    .badge {
        font-size: 12px;
        padding: 8px 12px;
    }

    @media (max-width: 768px) {
        .d-flex.gap-2 {
            flex-direction: column;
            align-items: stretch !important;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .ms-auto {
            margin-left: 0 !important;
            text-align: center;
        }
    }
</style>

<script>
// Auto dismiss alerts
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Auto resize textarea
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        // Trigger initial resize
        textarea.dispatchEvent(new Event('input'));
    });

    // Form validation enhancement
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 3000);
    });
});
</script>
@endsection