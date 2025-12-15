@extends('layouts.admin')

@section('title', 'Kelola Fasilitas Sekolah')
@section('page-title', 'Kelola Fasilitas Sekolah')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_fasilitas.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    
    <!-- Fasilitas Utama Section -->
    <div class="fasilitas-section">
        <div class="section-header">
            <h5><i class="fas fa-school"></i> Fasilitas Utama</h5>
            <a href="{{ route('admin.fasilitas.create') }}" class="btn-add">
                <i class="fas fa-plus-circle"></i> Tambah Fasilitas
            </a>
        </div>

        @if($fasilitasUtama->count() > 0)
        <div class="table-responsive">
            <table class="fasilitas-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Urutan</th>
                        <th style="width: 100px;">Icon</th>
                        <th>Informasi Fasilitas</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fasilitasUtama as $fasilitas)
                    <tr>
                        <td>
                            <span class="urutan-badge">#{{ $fasilitas->urutan }}</span>
                        </td>
                        <td>
                            <div class="fasilitas-icon">
                                <i class="{{ $fasilitas->icon }}"></i>
                            </div>
                        </td>
                        <td>
                            <div class="fasilitas-name">{{ $fasilitas->nama }}</div>
                            <div class="fasilitas-desc">{{ Str::limit($fasilitas->deskripsi, 150) }}</div>
                            @if($fasilitas->fitur && count($fasilitas->fitur) > 0)
                            <div class="fitur-list">
                                @foreach($fasilitas->fitur as $fitur)
                                <span class="fitur-badge">
                                    <i class="fas fa-check-circle"></i> {{ $fitur }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge-status {{ $fasilitas->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $fasilitas->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.fasilitas.edit', $fasilitas->id) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.fasilitas.toggle', $fasilitas->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action btn-toggle">
                                        <i class="fas fa-toggle-on"></i> Toggle
                                    </button>
                                </form>
                                <form action="{{ route('admin.fasilitas.destroy', $fasilitas->id) }}" method="POST" class="delete-form" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h4>Belum Ada Fasilitas Utama</h4>
            <p>Tambahkan fasilitas utama sekolah Anda</p>
        </div>
        @endif
    </div>

    <!-- Fasilitas Pendukung Section -->
    <div class="fasilitas-section">
        <div class="section-header">
            <h5><i class="fas fa-tools"></i> Fasilitas Pendukung</h5>
        </div>

        @if($fasilitasPendukung->count() > 0)
        <div class="table-responsive">
            <table class="fasilitas-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Urutan</th>
                        <th style="width: 100px;">Icon</th>
                        <th>Informasi Fasilitas</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fasilitasPendukung as $fasilitas)
                    <tr>
                        <td>
                            <span class="urutan-badge">#{{ $fasilitas->urutan }}</span>
                        </td>
                        <td>
                            <div class="fasilitas-icon">
                                <i class="{{ $fasilitas->icon }}"></i>
                            </div>
                        </td>
                        <td>
                            <div class="fasilitas-name">{{ $fasilitas->nama }}</div>
                            <div class="fasilitas-desc">{{ Str::limit($fasilitas->deskripsi, 150) }}</div>
                        </td>
                        <td>
                            <span class="badge-status {{ $fasilitas->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $fasilitas->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.fasilitas.edit', $fasilitas->id) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.fasilitas.toggle', $fasilitas->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action btn-toggle">
                                        <i class="fas fa-toggle-on"></i> Toggle
                                    </button>
                                </form>
                                <form action="{{ route('admin.fasilitas.destroy', $fasilitas->id) }}" method="POST" class="delete-form" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h4>Belum Ada Fasilitas Pendukung</h4>
            <p>Tambahkan fasilitas pendukung sekolah Anda</p>
        </div>
        @endif
    </div>

</div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete Confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Hapus Fasilitas?',
                text: 'Data fasilitas akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection