@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')
@section('page-title', 'Kelola Kurikulum')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-book-open"></i> Edit Data Kurikulum
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kurikulum.update') }}" method="POST">
            @csrf
            
            <!-- Nama Kurikulum -->
            <div class="mb-4">
                <label class="form-label fw-bold">
                    <i class="fas fa-graduation-cap text-primary"></i> Nama Kurikulum Yang Digunakan
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
                    <i class="fas fa-align-left text-success"></i> Deskripsi Kurikulum
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
                    <i class="fas fa-bullseye text-warning"></i> Tujuan Kurikulum
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
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> Tips: Pisahkan setiap tujuan dengan baris baru (Enter)
                </small>
            </div>

            <!-- Projek Penguatan Profil Pelajar Pancasila -->
            <div class="mb-4">
                <label class="form-label fw-bold">
                    <i class="fas fa-project-diagram text-info"></i> Projek Penguatan Profil Pelajar Pancasila
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
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-label {
        font-size: 15px;
        margin-bottom: 8px;
    }
    
    .form-control {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        transition: all 0.3s;
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
    
    small.text-muted {
        display: block;
        margin-top: 6px;
        font-size: 13px;
    }
</style>
@endsection