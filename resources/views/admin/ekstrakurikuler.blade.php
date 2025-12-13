@extends('layouts.admin')

@section('title', 'Master Data Ekstrakurikuler')
@section('page-title', 'Master Data Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <!-- Form Tambah -->
    <div class="card mb-4 form-card">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Ekstrakurikuler Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ekstra.add') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Ekstrakurikuler</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jadwal</label>
                        <input type="text" name="jadwal" class="form-control" placeholder="Senin & Rabu, 15:00-17:00" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pembina</label>
                        <input type="text" name="pembina" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Prestasi</label>
                        <textarea name="prestasi" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
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
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Jadwal</th>
                                <th>Pembina</th>
                                <th>Prestasi</th>
                                <th width="120" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ekstrakurikuler as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->jadwal }}</td>
                                <td>{{ $item->pembina }}</td>
                                <td>{{ Str::limit($item->prestasi, 60) }}</td>
                                <td class="text-center">
                                    <!-- Edit -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <form action="{{ route('admin.ekstra.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.ekstra.update', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Edit {{ $item->name }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Jadwal</label>
                                                    <input type="text" name="jadwal" class="form-control" value="{{ $item->jadwal }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Pembina</label>
                                                    <input type="text" name="pembina" class="form-control" value="{{ $item->pembina }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Prestasi</label>
                                                    <textarea name="prestasi" class="form-control" rows="3" required>{{ $item->prestasi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Link CSS file -->
<link rel="stylesheet" href="{{ asset('css/admin-ekskul.css') }}">
<!-- Link JavaScript file -->
<script src="{{ asset('js/admin-ekskul.js') }}"></script>

@endsection