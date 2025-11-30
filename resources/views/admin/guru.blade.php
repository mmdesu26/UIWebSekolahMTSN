@extends('layouts.admin')

@section('title', 'Master Data Guru')
@section('page-title', 'Master Data Guru')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <!-- FORM TAMBAH GURU -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> Tambah Guru Baru
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.guru.add') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap guru" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="mata_pelajaran" placeholder="Mata pelajaran yang diampu" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">NIP</label>
                                <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Guru
                    </button>
                </form>
            </div>
        </div>

        <!-- DAFTAR GURU -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list"></i> Daftar Guru ({{ count($guru) }} guru)
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item['nama'] }}</strong></td>
                            <td><span class="badge bg-info">{{ $item['mata_pelajaran'] }}</span></td>
                            <td>{{ $item['nip'] }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                    data-bs-target="#editGuru{{ $item['id'] }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.guru.delete', $item['id']) }}" 
                                    style="display:inline;" onsubmit="return confirm('Hapus guru ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- MODAL EDIT -->
                        <div class="modal fade" id="editGuru{{ $item['id'] }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Guru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.guru.update', $item['id']) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Guru</label>
                                                <input type="text" class="form-control" name="nama" value="{{ $item['nama'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" name="mata_pelajaran" value="{{ $item['mata_pelajaran'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">NIP</label>
                                                <input type="text" class="form-control" name="nip" value="{{ $item['nip'] }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="fas fa-inbox"></i> Belum ada data guru
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection