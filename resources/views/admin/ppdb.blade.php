@extends('layouts.admin')

@section('title', 'PPDB')
@section('page-title', 'Kelola PPDB')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-tie"></i> Pengaturan PPDB
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.ppdb.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul PPDB</label>
                        <input type="text" class="form-control" name="judul" value="{{ $ppdb['judul'] }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Dibuka Tanggal</label>
                                <input type="text" class="form-control" name="dibuka" value="{{ $ppdb['dibuka'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Ditutup Tanggal</label>
                                <input type="text" class="form-control" name="ditutup" value="{{ $ppdb['ditutup'] }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kuota Penerimaan</label>
                        <input type="text" class="form-control" name="kuota" value="{{ $ppdb['kuota'] }}" placeholder="Contoh: 120 siswa" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Persyaratan (pisahkan dengan semicolon ;)</label>
                        <textarea class="form-control" name="persyaratan" rows="4" required>{{ $ppdb['persyaratan'] }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konten Deskripsi</label>
                        <textarea class="form-control" name="konten" rows="5" required>{{ $ppdb['konten'] }}</textarea>
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