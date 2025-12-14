@extends('layouts.admin')

@section('title', 'Kelola Kalender Pendidikan')
@section('page-title', 'Kelola Kalender Pendidikan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1"><i class="fas fa-calendar-alt"></i> Kalender Pendidikan</h2>
            <p class="text-muted mb-0">Kelola jadwal kegiatan akademik tahun ajaran 2024/2025</p>
        </div>
        <a href="{{ route('admin.kalender.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kegiatan
        </a>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#semua">
                <i class="fas fa-list"></i> Semua ({{ $kalenders->count() }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#ganjil">
                <i class="fas fa-calendar-week"></i> Ganjil ({{ $kalenders->where('semester', 'ganjil')->count() }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#genap">
                <i class="fas fa-calendar-week"></i> Genap ({{ $kalenders->where('semester', 'genap')->count() }})
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Tab Semua -->
        <div class="tab-pane fade show active" id="semua">
            @include('admin.partials.kalender-table', ['kalenders' => $kalenders])
        </div>

        <!-- Tab Semester Ganjil -->
        <div class="tab-pane fade" id="ganjil">
            @include('admin.partials.kalender-table', ['kalenders' => $kalenders->where('semester', 'ganjil')])
        </div>

        <!-- Tab Semester Genap -->
        <div class="tab-pane fade" id="genap">
            @include('admin.partials.kalender-table', ['kalenders' => $kalenders->where('semester', 'genap')])
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/admin/kalender.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/admin/kalender.js') }}"></script>
@endsection