@extends('layouts.admin')

@section('title', 'Master Data Ekstrakurikuler')
@section('page-title', 'Master Data Ekstrakurikuler')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <!-- FORM TAMBAH -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> Tambah Ekstrakurikuler Baru
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.ekstrakurikuler.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama ekstrakurikuler" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal</label>
                        <input type="text" class="form-control" name="jadwal" placeholder="Contoh: Senin & Rabu, 15:30-17:00" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pembina</label>
                        <input type="text" class="form-control" name="pembina" placeholder="Nama pembina ekstrakurikuler" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prestasi</label>
                        <textarea class="form-control" name="prestasi" rows="3" placeholder="Daftar prestasi yang telah diraih" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Ekstrakurikuler
                    </button>
                </form>
            </div>
        </div>

        <!-- DAFTAR -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list"></i> Daftar Ekstrakurikuler ({{ count($ekstrakurikuler) }} item)
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pembina</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ekstrakurikuler as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item['name'] }}</strong></td>
                            <td>{{ $item['pembina'] }}</td>
                            <td><small>{{ $item['jadwal'] }}</small></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                    data-bs-target="#editEkstra{{ $item['id'] }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.ekstrakurikuler.delete', $item['id']) }}" 
                                    style="display:inline;" onsubmit="return confirm('Hapus ekstrakurikuler ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- MODAL EDIT -->
                        <div class="modal fade" id="editEkstra{{ $item['id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Ekstrakurikuler</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.ekstrakurikuler.update', $item['id']) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Ekstrakurikuler</label>
                                                <input type="text" class="form-control" name="name" value="{{ $item['name'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jadwal</label>
                                                <input type="text" class="form-control" name="jadwal" value="{{ $item['jadwal'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pembina</label>
                                                <input type="text" class="form-control" name="pembina" value="{{ $item['pembina'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Prestasi</label>
                                                <textarea class="form-control" name="prestasi" rows="3" required>{{ $item['prestasi'] }}</textarea>
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
                                <i class="fas fa-inbox"></i> Belum ada data ekstrakurikuler
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