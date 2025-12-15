@extends('layouts.admin')

@section('title', 'Manajemen Kelas Program')
@section('page-title', 'Manajemen Kelas Program')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kelas_program.css') }}">
@endsection

@section('content')
<div class="kelas-program-container">
    
    <div class="header-section">
        <h2><i class="fas fa-chalkboard-teacher"></i> Manajemen Kelas Program</h2>
        <a href="{{ route('admin.kelas-program.create') }}" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Program
        </a>
    </div>

    <!-- Program Unggulan -->
    <div class="program-section">
        <h3 class="section-title">
            <i class="fas fa-star"></i> Program Unggulan
        </h3>
        
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="80">Icon</th>
                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th width="100">Urutan</th>
                        <th width="100">Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($programs->where('kategori', 'unggulan') as $program)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="icon-preview" style="background-color: {{ $program->warna }}">
                                <i class="fas {{ $program->icon_class }}"></i>
                            </div>
                        </td>
                        <td><strong>{{ $program->nama }}</strong></td>
                        <td>{{ Str::limit($program->deskripsi, 60) }}</td>
                        <td class="text-center">{{ $program->urutan }}</td>
                        <td>
                            <span class="badge {{ $program->is_active ? 'badge-success' : 'badge-secondary' }}">
                                {{ $program->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.kelas-program.edit', $program->id) }}" class="btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn-delete" onclick="confirmDelete({{ $program->id }}, '{{ $program->nama }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada program unggulan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Kelas Program -->
    <div class="program-section">
        <h3 class="section-title">
            <i class="fas fa-school"></i> Kelas Program
        </h3>
        
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="80">Icon</th>
                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th width="100">Urutan</th>
                        <th width="100">Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($programs->where('kategori', 'kelas') as $program)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="icon-preview" style="background-color: {{ $program->warna }}">
                                <i class="fas {{ $program->icon_class }}"></i>
                            </div>
                        </td>
                        <td><strong>{{ $program->nama }}</strong></td>
                        <td>{{ Str::limit($program->deskripsi, 60) }}</td>
                        <td class="text-center">{{ $program->urutan }}</td>
                        <td>
                            <span class="badge {{ $program->is_active ? 'badge-success' : 'badge-secondary' }}">
                                {{ $program->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.kelas-program.edit', $program->id) }}" class="btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn-delete" onclick="confirmDelete({{ $program->id }}, '{{ $program->nama }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada kelas program</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Delete (Hidden) -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

</div>
@endsection

@section('js')
<script src="{{ asset('js/admin_kelas_program.js') }}"></script>
@endsection