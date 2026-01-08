@extends('layouts.admin')

@section('title', 'Kelola Berita & Pengumuman')
@section('page-title', 'Kelola Berita & Pengumuman')

@section('content')
<div class="container-fluid">
    <!-- Form Tambah Berita -->
    <div class="card mb-4 form-card" id="formCard">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Berita / Pengumuman Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                        <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="berita" {{ old('tipe') == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="pengumuman" {{ old('tipe') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        </select>
                        @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="8" required>{{ old('konten') }}</textarea>
                        @error('konten') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gambar Berita</label>
                        <input type="file" name="image_file" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">URL Gambar (Opsional)</label>
                        <input type="url" name="image_url" class="form-control" value="{{ old('image_url') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Berita</label>
                        <input type="date" name="news_date" class="form-control" value="{{ old('news_date', now()->format('Y-m-d')) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sumber (Opsional)</label>
                        <input type="text" name="source" class="form-control" value="{{ old('source') }}">
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold">
                                <i class="fas fa-eye text-success"></i> Tampilkan di website (Publish)
                            </label>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Berita
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Berita -->
    <div class="card table-card">
        <div class="card-header table-card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list"></i> Daftar Berita & Pengumuman</span>
            <span class="badge bg-light text-dark">{{ $berita->count() }} data</span>
        </div>
        <div class="card-body p-0">
            @if($berita->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <p>Belum ada berita atau pengumuman</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ Str::limit($item->title, 50) }}</strong>
                                    @if($item->image) <i class="fas fa-image text-success ms-2" title="Ada gambar"></i> @endif
                                </td>
                                <td>
                                    @php
                                        $badgeClass = match($item->tipe) {
                                            'berita' => 'bg-info',
                                            'pengumuman' => 'bg-warning text-dark',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($item->tipe) }}</span>
                                </td>
                                <td>{{ $item->news_date?->format('d/m/Y') ?? $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge {{ $item->is_published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit → Redirect ke halaman edit -->
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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

<link rel="stylesheet" href="{{ asset('css/admin-berita.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        let title = 'Yakin ingin menghapus data ini?';

        if (form.action.includes('prestasi')) {
            title = 'Yakin hapus prestasi ini?';
        } else if (form.action.includes('ekstra')) {
            title = 'Yakin hapus ekstrakurikuler ini?';
        } else if (form.action.includes('berita')) {
            title = 'Yakin hapus berita ini?';
        }

        Swal.fire({
            title: title,
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection