@extends('layouts.admin')

@section('title', 'Master Data Akreditasi & Prestasi')
@section('page-title', 'Master Data Akreditasi & Prestasi')

@section('content')
<div class="container-fluid">

    <!-- EDIT AKREDITASI -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-certificate"></i> Edit Data Akreditasi Sekolah
        </div>
        <div class="card-body">
            <form action="{{ route('admin.akreditasi.update') }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3 align-items-end">
                    <div class="col-md-2">
                        <label>Peringkat <span class="text-danger">*</span></label>
                        <input type="text" name="peringkat" class="form-control" 
                               value="{{ old('peringkat', $akreditasi->peringkat) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label>Nomor SK <span class="text-danger">*</span></label>
                        <input type="text" name="nomor_sk" class="form-control" 
                               value="{{ old('nomor_sk', $akreditasi->nomor_sk) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label>Tanggal SK <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_sk" class="form-control" 
                               value="{{ old('tanggal_sk', $akreditasi->tanggal_sk) }}" required>
                    </div>
                    <div class="mt-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" rows="2" class="form-control">{{ old('keterangan', $akreditasi->keterangan) }}</textarea>
                </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Akreditasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- FORM TAMBAH PRESTASI -->
    <div class="card mb-4 form-card">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Prestasi Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prestasi.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label>Nama Prestasi <span class="text-danger">*</span></label>
                        <input type="text" name="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror" 
                               value="{{ old('nama_prestasi') }}" 
                               placeholder="Contoh: Juara 1 KSM Tingkat Kabupaten" required>
                        @error('nama_prestasi') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Upload Gambar <span class="text-muted">(Opsional)</span></label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                        @error('gambar') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Atau URL Gambar <span class="text-muted">(Opsional)</span></label>
                        <input type="url" name="gambar_url" class="form-control @error('gambar_url') is-invalid @enderror" 
                               value="{{ old('gambar_url') }}" 
                               placeholder="https://...">
                        @error('gambar_url') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-trophy"></i> Simpan Prestasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TABEL DAFTAR PRESTASI -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-trophy text-warning"></i> Daftar Prestasi</span>
            <span class="badge bg-light text-dark">{{ $prestasi->count() }} data</span>
        </div>
        <div class="card-body p-0">
            @if($prestasi->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <p>Belum ada prestasi tercatat</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Prestasi</th>
                                <th>Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->nama_prestasi }}</strong></td>
                                <td>
                                    @if($item->gambar)
                                        <img src="{{ $item->gambar }}" alt="{{ $item->nama_prestasi }}" style="max-height: 60px; border-radius: 6px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
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

<link rel="stylesheet" href="{{ asset('css/admin-prestasi.css') }}">

@push('scripts')
<script src="{{ asset('js/admin-prestasi.js') }}"></script>
@endpush

@endsection