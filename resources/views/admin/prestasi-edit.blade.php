@extends('layouts.admin')

@section('title', 'Edit Prestasi')
@section('page-title', 'Edit Prestasi')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <i class="fas fa-trophy"></i> Edit Prestasi: {{ $prestasi->nama_prestasi }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_prestasi" 
                               class="form-control @error('nama_prestasi') is-invalid @enderror" 
                               value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" 
                               required>
                        @error('nama_prestasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upload Gambar Baru (Kosongkan jika tidak diganti)</label>
                        <input type="file" 
                               name="gambar" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               accept="image/*">
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">URL Gambar Baru (Opsional)</label>
                        <input type="url" 
                               name="gambar_url" 
                               class="form-control @error('gambar_url') is-invalid @enderror" 
                               value="{{ old('gambar_url') }}">
                        @error('gambar_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        @if($prestasi->gambar)
                            <div class="mt-3">
                                <p class="small text-muted mb-2">Gambar saat ini:</p>
                                <img src="{{ $prestasi->gambar }}" class="img-thumbnail rounded shadow-sm" style="max-height: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Prestasi
                        </button>
                        <a href="{{ route('admin.prestasi') }}" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection