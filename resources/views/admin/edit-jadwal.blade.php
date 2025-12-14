@extends('layouts.admin')

@section('title', 'Edit Jadwal Pelajaran')
@section('page-title', 'Edit Jadwal Pelajaran')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/edit-jadwal.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card Edit Jadwal -->
            <div class="card edit-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5><i class="fas fa-edit"></i> Edit Jadwal Pelajaran</h5>
                        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" id="formEditJadwal">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <!-- Kelas -->
                            <div class="col-md-6">
                                <label class="form-label">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas" class="form-select @error('kelas') is-invalid @enderror" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ old('kelas', $jadwal->kelas) == $kelas ? 'selected' : '' }}>
                                        Kelas {{ $kelas }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Hari -->
                            <div class="col-md-6">
                                <label class="form-label">Hari <span class="text-danger">*</span></label>
                                <select name="hari" class="form-select @error('hari') is-invalid @enderror" required>
                                    <option value="">Pilih Hari</option>
                                    @foreach($hariList as $hari)
                                    <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>
                                        {{ $hari }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('hari')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jam Mulai -->
                            <div class="col-md-6">
                                <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                                <input type="time" name="jam_mulai" 
                                       class="form-control @error('jam_mulai') is-invalid @enderror" 
                                       value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                                @error('jam_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jam Selesai -->
                            <div class="col-md-6">
                                <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                                <input type="time" name="jam_selesai" 
                                       class="form-control @error('jam_selesai') is-invalid @enderror" 
                                       value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
                                @error('jam_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mata Pelajaran -->
                            <div class="col-12">
                                <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                                <input type="text" name="mata_pelajaran" 
                                       class="form-control @error('mata_pelajaran') is-invalid @enderror" 
                                       value="{{ old('mata_pelajaran', $jadwal->mata_pelajaran) }}" 
                                       placeholder="Contoh: Matematika" required>
                                @error('mata_pelajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Urutan -->
                            <div class="col-md-6">
                                <label class="form-label">Urutan <span class="text-muted">(Opsional)</span></label>
                                <input type="number" name="urutan" 
                                       class="form-control @error('urutan') is-invalid @enderror" 
                                       value="{{ old('urutan', $jadwal->urutan) }}" 
                                       placeholder="Otomatis jika kosong" min="1">
                                @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Checkbox Istirahat -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="is_istirahat" 
                                           class="form-check-input" 
                                           id="editIstirahat" 
                                           {{ old('is_istirahat', $jadwal->is_istirahat) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="editIstirahat">
                                        Jadwal ini adalah waktu istirahat
                                    </label>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 mt-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Jadwal
                                    </button>
                                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/edit-jadwal.js') }}"></script>
@endsection