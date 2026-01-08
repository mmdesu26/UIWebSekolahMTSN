@extends('layouts.admin')

@section('title', 'Duplikat Jadwal Kelas')
@section('page-title', 'Duplikat Jadwal Kelas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/edit-jadwal.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Card Duplikat Jadwal -->
            <div class="card edit-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <i class="fas fa-info-circle"></i> 
                        Fitur ini akan menyalin semua jadwal dari satu kelas ke kelas lainnya. 
                        <strong>Jadwal kelas tujuan akan dihapus dan diganti.</strong>
                    </div>

                    <form action="{{ route('admin.jadwal.duplicate') }}" method="POST" id="formDuplikatJadwal">
                        @csrf

                        <div class="row g-3">
                            <!-- Dari Kelas -->
                            <div class="col-12">
                                <label class="form-label">Dari Kelas <span class="text-danger">*</span></label>
                                <select name="from_kelas" class="form-select @error('from_kelas') is-invalid @enderror" required>
                                    <option value="">Pilih Kelas Sumber</option>
                                    @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ old('from_kelas') == $kelas ? 'selected' : '' }}>
                                        Kelas {{ $kelas }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('from_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ke Kelas -->
                            <div class="col-12">
                                <label class="form-label">Ke Kelas <span class="text-danger">*</span></label>
                                <select name="to_kelas" class="form-select @error('to_kelas') is-invalid @enderror" required>
                                    <option value="">Pilih Kelas Tujuan</option>
                                    @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ old('to_kelas') == $kelas ? 'selected' : '' }}>
                                        Kelas {{ $kelas }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('to_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 mt-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-copy"></i> Duplikat Jadwal
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
<script>
    document.getElementById('formDuplikatJadwal').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin duplikat jadwal?',
            text: 'Jadwal kelas tujuan akan dihapus dan diganti dengan jadwal kelas sumber!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#17a2b8',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, duplikat!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection