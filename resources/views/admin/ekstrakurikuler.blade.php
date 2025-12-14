@extends('layouts.admin')

@section('title', 'Master Data Ekstrakurikuler')
@section('page-title', 'Master Data Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <!-- Form Tambah Ekstrakurikuler -->
    <div class="card mb-4 form-card" id="formCard">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Ekstrakurikuler Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ekstra.add') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jadwal <span class="text-danger">*</span></label>
                        <input type="text" name="jadwal" class="form-control @error('jadwal') is-invalid @enderror" value="{{ old('jadwal') }}" placeholder="Senin & Rabu, 15:00-17:00" required>
                        @error('jadwal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pembina <span class="text-danger">*</span></label>
                        <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina') }}" required>
                        @error('pembina') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Prestasi <span class="text-muted">(Kosongkan jika belum ada)</span></label>
                        <textarea name="prestasi" class="form-control @error('prestasi') is-invalid @enderror" rows="4">{{ old('prestasi') }}</textarea>
                        @error('prestasi') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Ekstrakurikuler
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Ekstrakurikuler -->
    <div class="card table-card">
        <div class="card-header table-card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list"></i> Daftar Ekstrakurikuler</span>
            <span class="badge bg-light text-dark">{{ $ekstrakurikuler->count() }} data</span>
        </div>
        <div class="card-body p-0">
            @if($ekstrakurikuler->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <p>Belum ada data ekstrakurikuler</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jadwal</th>
                                <th>Pembina</th>
                                <th>Prestasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ekstrakurikuler as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->jadwal }}</td>
                                <td>{{ $item->pembina }}</td>
                                <td>
                                    @if($item->prestasi)
                                        {!! Str::limit(nl2br(e($item->prestasi)), 100) !!}
                                    @else
                                        <em class="text-muted">Belum ada prestasi</em>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit → ke halaman edit terpisah -->
                                    <a href="{{ route('admin.ekstra.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.ekstra.delete', $item->id) }}" method="POST" class="d-inline delete-form">
    @csrf
    @method('DELETE') <!-- Tambahkan ini karena route delete biasanya memerlukan method DELETE -->

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

<!-- Optional: JS untuk efek halaman (animasi, notifikasi, dll) -->
<script src="{{ asset('js/admin-ekskul.js') }}"></script>
@endsection