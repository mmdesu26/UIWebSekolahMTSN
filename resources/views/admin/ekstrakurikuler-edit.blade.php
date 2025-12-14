@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')
@section('page-title', 'Edit Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <i class="fas fa-edit"></i> Edit Ekstrakurikuler: {{ $ekstra->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ekstra.update', $ekstra->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $ekstra->name) }}" required>
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jadwal <span class="text-danger">*</span></label>
                        <input type="text" name="jadwal" class="form-control @error('jadwal') is-invalid @enderror" value="{{ old('jadwal', $ekstra->jadwal) }}" required>
                        @error('jadwal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pembina <span class="text-danger">*</span></label>
                        <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina', $ekstra->pembina) }}" required>
                        @error('pembina') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Prestasi <span class="text-muted">(Kosongkan jika belum ada)</span></label>
                        <textarea name="prestasi" class="form-control @error('prestasi') is-invalid @enderror" rows="5">{{ old('prestasi', $ekstra->prestasi) }}</textarea>
                        @error('prestasi') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Ekstrakurikuler
                        </button>
                        <a href="{{ route('admin.ekstrakurikuler') }}" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection