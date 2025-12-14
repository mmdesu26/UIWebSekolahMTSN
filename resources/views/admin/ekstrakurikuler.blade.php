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
            <form action="{{ route('admin.ekstra.add') }}" method="POST" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" 
                               required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jadwal <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="jadwal" 
                               class="form-control @error('jadwal') is-invalid @enderror"
                               value="{{ old('jadwal') }}" 
                               placeholder="Senin & Rabu, 15:00-17:00" 
                               required>
                        @error('jadwal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pembina <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="pembina" 
                               class="form-control @error('pembina') is-invalid @enderror"
                               value="{{ old('pembina') }}" 
                               required>
                        @error('pembina')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Prestasi <span class="text-muted">(Jika tidak ada bisa diisi dengan "-")</span></label>
                        <textarea name="prestasi" 
                                  class="form-control @error('prestasi') is-invalid @enderror" 
                                  rows="3">{{ old('prestasi') }}</textarea>
                        @error('prestasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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
                                <td>{{ Str::limit($item->prestasi, 60) ?: '<em class="text-muted">Belum ada prestasi</em>' }}</td>
                                <td class="text-center">
                                    <!-- Edit -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Hapus dengan SweetAlert -->
                                    <form action="{{ route('admin.ekstra.delete', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit{{ $item->id }}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.ekstra.update', $item->id) }}" method="POST" novalidate>
                                            @csrf
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Edit {{ $item->name }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                                                    <input type="text" 
                                                           name="name" 
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ old('name', $item->name) }}" 
                                                           required>
                                                    @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jadwal <span class="text-danger">*</span></label>
                                                    <input type="text" 
                                                           name="jadwal" 
                                                           class="form-control @error('jadwal') is-invalid @enderror"
                                                           value="{{ old('jadwal', $item->jadwal) }}" 
                                                           required>
                                                    @error('jadwal')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Pembina <span class="text-danger">*</span></label>
                                                    <input type="text" 
                                                           name="pembina" 
                                                           class="form-control @error('pembina') is-invalid @enderror"
                                                           value="{{ old('pembina', $item->pembina) }}" 
                                                           required>
                                                    @error('pembina')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Prestasi <span class="text-muted">((Jika tidak ada bisa diisi dengan "-"))</span></label>
                                                    <textarea name="prestasi" 
                                                              class="form-control @error('prestasi') is-invalid @enderror" 
                                                              rows="3">{{ old('prestasi', $item->prestasi) }}</textarea>
                                                    @error('prestasi')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
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

<!-- CSS & JS -->
<link rel="stylesheet" href="{{ asset('css/admin-ekskul.css') }}">
<script src="{{ asset('js/admin-ekskul.js') }}"></script>

@endsection