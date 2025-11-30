@extends('layouts.admin')

@section('title', 'Berita & Pengumuman')
@section('page-title', 'Kelola Berita & Pengumuman')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <!-- FORM TAMBAH -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> Tambah Berita/Pengumuman Baru
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.berita.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul berita/pengumuman" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe</label>
                        <select class="form-control" name="tipe" required>
                            <option value="">Pilih Tipe</option>
                            <option value="berita">Berita</option>
                            <option value="pengumuman">Pengumuman</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konten</label>
                        <textarea class="form-control" name="konten" rows="5" placeholder="Isi berita/pengumuman" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Berita
                    </button>
                </form>
            </div>
        </div>

        <!-- DAFTAR -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list"></i> Daftar Berita & Pengumuman ({{ count($berita) }} item)
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ substr($item['judul'], 0, 40) }}</strong></td>
                            <td>
                                @if($item['tipe'] == 'berita')
                                    <span class="badge bg-info">Berita</span>
                                @else
                                    <span class="badge bg-warning">Pengumuman</span>
                                @endif
                            </td>
                            <td>{{ date('d/m/Y', strtotime($item['tanggal'])) }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                    data-bs-target="#editBerita{{ $item['id'] }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.berita.delete', $item['id']) }}" 
                                    style="display:inline;" onsubmit="return confirm('Hapus berita ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- MODAL EDIT -->
                        <div class="modal fade" id="editBerita{{ $item['id'] }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Berita/Pengumuman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.berita.update', $item['id']) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Judul</label>
                                                <input type="text" class="form-control" name="judul" value="{{ $item['judul'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tipe</label>
                                                <select class="form-control" name="tipe" required>
                                                    <option value="berita" @if($item['tipe'] == 'berita') selected @endif>Berita</option>
                                                    <option value="pengumuman" @if($item['tipe'] == 'pengumuman') selected @endif>Pengumuman</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Konten</label>
                                                <textarea class="form-control" name="konten" rows="5" required>{{ $item['konten'] }}</textarea>
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
                                <i class="fas fa-inbox"></i> Belum ada data berita
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