@extends('layouts.admin')

@section('title', 'Visi & Misi')
@section('page-title', 'Kelola Visi & Misi')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-lightbulb"></i> Visi & Misi MTsN 1 Magetan
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.visi-misi.update') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label"><strong>VISI</strong></label>
                        <textarea class="form-control" name="visi" rows="4" required>{{ $visiMisi['visi'] }}</textarea>
                        <small class="form-text text-muted">Masukkan visi sekolah</small>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label"><strong>MISI</strong></label>
                        <textarea class="form-control" name="misi" rows="6" required>{{ $visiMisi['misi'] }}</textarea>
                        <small class="form-text text-muted">Masukkan misi sekolah (pisahkan dengan enter untuk multiple misi)</small>
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