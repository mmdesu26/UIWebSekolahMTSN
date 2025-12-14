@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita / Pengumuman')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <i class="fas fa-edit"></i> Edit Berita: {{ $berita->title }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->title) }}" required>
                        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                        <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                            <option value="berita" {{ $berita->tipe == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="pengumuman" {{ $berita->tipe == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="kegiatan" {{ $berita->tipe == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        </select>
                        @error('tipe') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="10" required>{{ old('konten', $berita->content) }}</textarea>
                        @error('konten') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gambar Baru (Kosongkan jika tidak diganti)</label>
                        <input type="file" name="image_file" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">URL Gambar Baru (Opsional)</label>
                        <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $berita->image ?? '') }}">
                        @if($berita->image)
                            <div class="mt-3">
                                <p class="small text-muted mb-1">Gambar saat ini:</p>
                                <img src="{{ $berita->image }}" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Berita</label>
                        <input type="date" name="news_date" class="form-control" value="{{ old('news_date', $berita->news_date?->format('Y-m-d')) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sumber (Opsional)</label>
                        <input type="text" name="source" class="form-control" value="{{ old('source', $berita->source) }}">
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', $berita->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold">
                                <i class="fas fa-eye text-success"></i> Tampilkan di website (Publish)
                            </label>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Berita
                        </button>
                        <a href="{{ route('admin.berita') }}" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection