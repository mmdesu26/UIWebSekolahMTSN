@extends('layouts.admin')

@section('title', 'Sejarah Sekolah')
@section('page-title', 'Kelola Sejarah Sekolah')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-history"></i> Sejarah Sekolah MTsN 1 Magetan
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.sejarah.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Konten Sejarah</label>
                        <textarea class="form-control" name="content" rows="10" required>{{ $sejarah['content'] }}</textarea>
                        <small class="form-text text-muted">Masukkan sejarah lengkap MTsN 1 Magetan</small>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection