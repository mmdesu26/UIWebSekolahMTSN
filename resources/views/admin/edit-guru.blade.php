@extends('layouts.admin')

@section('title', 'Edit Data Guru')
@section('page-title', 'Edit Data Guru')

@section('content')
<div class="container-fluid">
    <div class="card edit-guru-card">
        <div class="card-header">
            <i class="fas fa-user-edit"></i> Edit Data Guru: {{ $guru->nama }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.struktur.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" id="editGuruForm">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Nama Guru -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Guru <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            name="nama" 
                            class="form-control @error('nama') is-invalid @enderror" 
                            value="{{ old('nama', $guru->nama) }}" 
                            required
                            placeholder="Masukkan nama lengkap guru"
                        >
                        @error('nama') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Mata Pelajaran -->
                    <div class="col-md-6">
                        <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            name="mata_pelajaran" 
                            class="form-control @error('mata_pelajaran') is-invalid @enderror" 
                            value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" 
                            required
                            placeholder="Contoh: Matematika, Bahasa Indonesia"
                        >
                        @error('mata_pelajaran') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div class="col-md-6">
                        <label class="form-label">Nomor Induk Pegawai (NIP)</label>
                        <input 
                            type="text" 
                            name="nip" 
                            class="form-control @error('nip') is-invalid @enderror" 
                            value="{{ old('nip', $guru->nip) }}"
                            placeholder="Contoh: 198503151234567890 (opsional)"
                        >
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> Boleh dikosongkan jika belum memiliki NIP
                        </small>
                        @error('nip') 
                            <small class="text-danger d-block">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Foto Guru -->
                    <div class="col-md-6">
                        <label class="form-label">Ganti Foto Guru</label>
                        <input 
                            type="file" 
                            name="foto" 
                            class="form-control @error('foto') is-invalid @enderror" 
                            accept="image/*"
                            id="fotoInput"
                        >
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> Kosongkan jika tidak ingin mengganti foto
                        </small>
                        @error('foto') 
                            <small class="text-danger d-block">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Preview Foto Saat Ini -->
                    @if($guru->foto_url)
                    <div class="col-12">
                        <div class="current-photo-section">
                            <label class="form-label">Foto Saat Ini:</label>
                            <div class="photo-preview-wrapper">
                                <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="current-photo" id="currentPhoto">
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Preview Foto Baru -->
                    <div class="col-12" id="newPhotoPreview" style="display: none;">
                        <div class="new-photo-section">
                            <label class="form-label">Preview Foto Baru:</label>
                            <div class="photo-preview-wrapper">
                                <img src="" alt="Preview" class="new-photo" id="newPhoto">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.struktur.index') }}" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/edit-guru.css') }}">
<script src="{{ asset('js/edit-guru.js') }}"></script>
@endsection