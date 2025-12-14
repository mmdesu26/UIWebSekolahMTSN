@extends('layouts.admin')

@section('title', 'Edit Kalender Pendidikan')
@section('page-title', 'Edit Kalender Pendidikan')

@section('content')
<div class="container-fluid">
    <div class="card form-card">
        <div class="form-card-header bg-warning">
            <i class="fas fa-edit"></i> Edit Kegiatan Kalender
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kalender.update', $kalender->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Semester <span class="text-danger">*</span></label>
                        <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
                            <option value="">-- Pilih Semester --</option>
                            <option value="ganjil" {{ old('semester', $kalender->semester) == 'ganjil' ? 'selected' : '' }}>Semester Ganjil (Juli - Desember)</option>
                            <option value="genap" {{ old('semester', $kalender->semester) == 'genap' ? 'selected' : '' }}>Semester Genap (Januari - Juni)</option>
                        </select>
                        @error('semester') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="akademik" {{ old('kategori', $kalender->kategori) == 'akademik' ? 'selected' : '' }}>📚 Akademik</option>
                            <option value="libur" {{ old('kategori', $kalender->kategori) == 'libur' ? 'selected' : '' }}>🏝️ Libur Nasional</option>
                            <option value="kegiatan" {{ old('kategori', $kalender->kategori) == 'kegiatan' ? 'selected' : '' }}>⭐ Kegiatan</option>
                            <option value="ujian" {{ old('kategori', $kalender->kategori) == 'ujian' ? 'selected' : '' }}>📝 Ujian</option>
                            <option value="penting" {{ old('kategori', $kalender->kategori) == 'penting' ? 'selected' : '' }}>❗ Penting</option>
                        </select>
                        @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $kalender->tanggal_mulai) }}" required>
                        @error('tanggal_mulai') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai <small class="text-muted">(Opsional)</small></label>
                        <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $kalender->tanggal_selesai) }}">
                        @error('tanggal_selesai') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $kalender->judul) }}" required>
                        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="6" required>{{ old('keterangan', $kalender->keterangan) }}</textarea>
                        @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <a href="{{ route('admin.kalender.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Kegiatan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/admin-kalender-form.css') }}">
@endsection