@extends('layouts.admin')

@section('title', 'Kelola Berita & Pengumuman')
@section('page-title', 'Kelola Berita & Pengumuman')

@section('content')
<div class="container-fluid">
    <!-- Form Tambah -->
    <div class="card mb-4 form-card">
        <div class="form-card-header">
            <i class="fas fa-plus-circle"></i> Tambah Berita / Pengumuman Baru
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="judul" 
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul') }}" 
                               placeholder="Masukkan judul berita..." 
                               required>
                        @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                        <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="berita" {{ old('tipe') == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="pengumuman" {{ old('tipe') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="kegiatan" {{ old('tipe') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        </select>
                        @error('tipe')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea name="konten" 
                                  class="form-control @error('konten') is-invalid @enderror" 
                                  rows="6"
                                  placeholder="Tuliskan isi berita secara lengkap..." 
                                  required>{{ old('konten') }}</textarea>
                        @error('konten')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gambar Berita</label>
                        <input type="file" 
                               name="image_file" 
                               class="form-control @error('image_file') is-invalid @enderror" 
                               accept="image/*" 
                               id="imageInput">
                        @error('image_file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mt-2" id="imagePreview" style="display: none;">
                            <img id="previewImg" src="" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">URL Gambar (Opsional)</label>
                        <input type="url" 
                               name="image_url" 
                               class="form-control @error('image_url') is-invalid @enderror" 
                               placeholder="Atau masukkan URL gambar" 
                               value="{{ old('image_url') }}">
                        @error('image_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Berita</label>
                        <input type="date" 
                               name="news_date" 
                               class="form-control" 
                               value="{{ old('news_date', now()->format('Y-m-d')) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Sumber (Opsional)</label>
                        <input type="text" 
                               name="source" 
                               class="form-control" 
                               value="{{ old('source') }}"
                               placeholder="Contoh: Kompas.com, Website Resmi">
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="is_published" 
                                   value="1"
                                   {{ old('is_published', 1) ? 'checked' : '' }} 
                                   id="publish">
                            <label class="form-check-label fw-bold" for="publish">
                                <i class="fas fa-eye text-success"></i> Tampilkan di website (Publish)
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Berita
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
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
                                <th width="50">No</th>
                                <th>Judul</th>
                                <th width="100">Tipe</th>
                                <th width="110">Tanggal</th>
                                <th width="100">Status</th>
                                <th width="120" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ Str::limit($item->title, 50) }}</strong>
                                    @if($item->image)
                                        <i class="fas fa-image text-success ms-2" title="Ada gambar"></i>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $badgeClass = match($item->tipe) {
                                            'berita' => 'bg-info',
                                            'pengumuman' => 'bg-warning text-dark',
                                            'kegiatan' => 'bg-success',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($item->tipe) }}</span>
                                </td>
                                <td>{{ $item->news_date?->format('d/m/Y') ?? $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($item->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- Edit -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
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
                                        <form action="{{ route('admin.berita.update', $item->id) }}" 
                                              method="POST" 
                                              enctype="multipart/form-data" 
                                              novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Edit Berita</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                                    <input type="text" 
                                                           name="judul" 
                                                           class="form-control @error('judul') is-invalid @enderror"
                                                           value="{{ old('judul', $item->title) }}" 
                                                           required>
                                                    @error('judul')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                                        <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                                                            <option value="berita" {{ old('tipe', $item->tipe) == 'berita' ? 'selected' : '' }}>Berita</option>
                                                            <option value="pengumuman" {{ old('tipe', $item->tipe) == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                                            <option value="kegiatan" {{ old('tipe', $item->tipe) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                                        </select>
                                                        @error('tipe')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tanggal Berita</label>
                                                        <input type="date" 
                                                               name="news_date" 
                                                               class="form-control" 
                                                               value="{{ old('news_date', $item->news_date?->format('Y-m-d')) }}">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Sumber</label>
                                                    <input type="text" 
                                                           name="source" 
                                                           class="form-control" 
                                                           value="{{ old('source', $item->source) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
                                                    <textarea name="konten" 
                                                              class="form-control @error('konten') is-invalid @enderror" 
                                                              rows="6"
                                                              required>{{ old('konten', $item->content) }}</textarea>
                                                    @error('konten')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Gambar Berita</label>
                                                    <input type="file" 
                                                           name="image_file" 
                                                           class="form-control mb-2" 
                                                           accept="image/*">
                                                    <input type="url" 
                                                           name="image_url" 
                                                           class="form-control @error('image_url') is-invalid @enderror" 
                                                           placeholder="Atau ganti dengan URL gambar" 
                                                           value="{{ old('image_url', $item->image) }}">
                                                    @error('image_url')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror

                                                    @if($item->image)
                                                        <div class="mt-3">
                                                            <p class="small text-muted mb-2">Gambar saat ini:</p>
                                                            <img src="{{ $item->image }}" class="img-thumbnail rounded shadow-sm" style="max-height: 120px;">
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                           type="checkbox" 
                                                           name="is_published" 
                                                           value="1"
                                                           {{ old('is_published', $item->is_published) ? 'checked' : '' }}>
                                                    <label class="form-check-label">
                                                        <i class="fas fa-eye text-success"></i> Tampilkan di website (Publish)
                                                    </label>
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
<link rel="stylesheet" href="{{ asset('css/admin-berita.css') }}">
<script src="{{ asset('js/admin-berita.js') }}"></script>

@endsection