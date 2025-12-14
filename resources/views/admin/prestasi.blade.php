@extends('layouts.admin')

@section('title', 'Master Data Prestasi')
@section('page-title', 'Master Data Prestasi')

@section('content')
<div class="container-fluid">
    <!-- Form Tambah -->
    <div class="card mb-4 form-card">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Prestasi Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prestasi.add') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="nama_prestasi" 
                               class="form-control @error('nama_prestasi') is-invalid @enderror" 
                               value="{{ old('nama_prestasi') }}" 
                               placeholder="Masukkan nama prestasi..." 
                               required>
                        @error('nama_prestasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upload Gambar Bukti (Opsional)</label>
                        <input type="file" 
                               name="gambar" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               accept="image/*" 
                               id="gambarInput">
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mt-2" id="gambarPreview" style="display: none;">
                            <img id="previewGambar" src="" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Atau URL Gambar (Opsional)</label>
                        <input type="url" 
                               name="gambar_url" 
                               class="form-control @error('gambar_url') is-invalid @enderror" 
                               placeholder="Atau masukkan URL gambar" 
                               value="{{ old('gambar_url') }}">
                        @error('gambar_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Prestasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card table-card">
        <div class="card-header table-card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-trophy"></i> Daftar Prestasi</span>
            <span class="badge bg-light text-dark">{{ $prestasi->count() }} prestasi</span>
        </div>
        <div class="card-body p-0">
            @if($prestasi->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <p>Belum ada prestasi yang tercatat</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Prestasi</th>
                                <th>Gambar</th>
                                <th width="120" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->nama_prestasi }}</strong></td>
                                <td>
                                    @if($item->gambar)
                                        <img src="{{ $item->gambar }}" alt="Prestasi" style="max-height: 60px; border-radius: 6px;">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit → ke halaman terpisah -->
                                    <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.prestasi.delete', $item->id) }}" method="POST" class="d-inline delete-form">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/admin-ekskul.css') }}">
<script src="{{ asset('js/admin-prestasi.js') }}"></script>

@endsection