@extends('layouts.admin')

@section('title', 'Kelola Berita & Pengumuman')
@section('page-title', 'Kelola Berita & Pengumuman')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Form Tambah Berita Baru --}}
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Berita / Pengumuman Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Judul Berita <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="judul" 
                                           class="form-control @error('judul') is-invalid @enderror"
                                           value="{{ old('judul') }}" 
                                           placeholder="Masukkan judul..." 
                                           required>
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tipe <span class="text-danger">*</span></label>
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
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Gambar Berita</label>
                            <input type="file" name="image_file" class="form-control mb-2" accept="image/*" id="imageInput">

                            <input type="url" 
                                   name="image_url" 
                                   class="form-control @error('image_url') is-invalid @enderror" 
                                   placeholder="Atau masukkan URL gambar (opsional)" 
                                   value="{{ old('image_url') }}">
                            @error('image_url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <!-- Preview untuk upload file -->
                            <div class="mt-3" id="imagePreview" style="display: none;">
                                <p class="small text-muted mb-1">Pratinjau upload:</p>
                                <img id="previewImg" src="" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Berita</label>
                                    <input type="date" 
                                           name="news_date" 
                                           class="form-control" 
                                           value="{{ old('news_date', now()->format('Y-m-d')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sumber (opsional)</label>
                                    <input type="text" 
                                           name="source" 
                                           class="form-control" 
                                           value="{{ old('source') }}"
                                           placeholder="Contoh: Kompas.com, Website Resmi, dll">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Konten Berita <span class="text-danger">*</span></label>
                            <textarea name="konten" 
                                      class="form-control @error('konten') is-invalid @enderror" 
                                      rows="8"
                                      placeholder="Tuliskan isi berita secara lengkap..." 
                                      required>{{ old('konten') }}</textarea>
                            @error('konten')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="is_published" 
                                       value="1"
                                       {{ old('is_published', 1) ? 'checked' : '' }} 
                                       id="publish">
                                <label class="form-check-label fw-bold text-success" for="publish">
                                    Tampilkan di website (Publish)
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-save me-2"></i> Simpan Berita
                        </button>
                    </form>
                </div>
            </div>

            {{-- Daftar Berita --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Berita & Pengumuman</h5>
                    <span class="badge bg-light text-dark fs-6">{{ $berita->count() }} item</span>
                </div>
                <div class="card-body p-0">
                    @if($berita->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Judul</th>
                                        <th width="12%">Tipe</th>
                                        <th width="10%">Tanggal</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Aksi</th>
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
                                                    $badge = match($item->tipe) {
                                                        'berita' => 'bg-info',
                                                        'pengumuman' => 'bg-warning text-dark',
                                                        'kegiatan' => 'bg-success',
                                                        default => 'bg-secondary'
                                                    };
                                                @endphp
                                                <span class="badge {{ $badge }}">
                                                    {{ ucfirst($item->tipe) }}
                                                </span>
                                            </td>
                                            <td>{{ $item->news_date?->format('d/m/Y') ?? $item->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @if($item->is_published)
                                                    <span class="badge bg-success">Published</span>
                                                @else
                                                    <span class="badge bg-secondary">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning text-white me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

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

                                        {{-- Modal Edit Berita --}}
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.berita.update', $item->id) }}" 
                                                          method="POST" 
                                                          enctype="multipart/form-data" 
                                                          novalidate>
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title">Edit Berita: {{ Str::limit($item->title, 30) }}</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi sama seperti form tambah, tapi dengan old + data item -->
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold">Judul Berita <span class="text-danger">*</span></label>
                                                                        <input type="text" 
                                                                               name="judul" 
                                                                               class="form-control @error('judul') is-invalid @enderror"
                                                                               value="{{ old('judul', $item->title) }}" 
                                                                               required>
                                                                        @error('judul')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold">Tipe <span class="text-danger">*</span></label>
                                                                        <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                                                                            <option value="berita" {{ old('tipe', $item->tipe) == 'berita' ? 'selected' : '' }}>Berita</option>
                                                                            <option value="pengumuman" {{ old('tipe', $item->tipe) == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                                                            <option value="kegiatan" {{ old('tipe', $item->tipe) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                                                        </select>
                                                                        @error('tipe')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold">Gambar Berita</label>
                                                                <input type="file" name="image_file" class="form-control mb-2" accept="image/*">

                                                                <input type="url" 
                                                                       name="image_url" 
                                                                       class="form-control @error('image_url') is-invalid @enderror" 
                                                                       placeholder="Atau ganti dengan URL gambar" 
                                                                       value="{{ old('image_url') }}">
                                                                @error('image_url')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror

                                                                @if($item->image)
                                                                    <div class="mt-3">
                                                                        <p class="small text-muted mb-1">Gambar saat ini:</p>
                                                                        <img src="{{ $item->image }}" class="img-thumbnail" style="max-height: 150px;">
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Tanggal Berita</label>
                                                                        <input type="date" 
                                                                               name="news_date" 
                                                                               class="form-control" 
                                                                               value="{{ old('news_date', $item->news_date?->format('Y-m-d')) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Sumber</label>
                                                                        <input type="text" 
                                                                               name="source" 
                                                                               class="form-control" 
                                                                               value="{{ old('source', $item->source) }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold">Konten Berita <span class="text-danger">*</span></label>
                                                                <textarea name="konten" 
                                                                          class="form-control @error('konten') is-invalid @enderror" 
                                                                          rows="8" 
                                                                          required>{{ old('konten', $item->content) }}</textarea>
                                                                @error('konten')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" 
                                                                           type="checkbox" 
                                                                           name="is_published" 
                                                                           value="1"
                                                                           {{ old('is_published', $item->is_published) ? 'checked' : '' }}>
                                                                    <label class="form-check-label fw-bold text-success">
                                                                        Tampilkan di website (Publish)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Update Berita</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>Belum ada berita atau pengumuman.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-berita.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/admin-berita.js') }}"></script>
@endpush