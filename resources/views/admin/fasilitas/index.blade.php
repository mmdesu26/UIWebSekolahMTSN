@extends('layouts.admin')

@section('title', 'Kelola Fasilitas Sekolah')
@section('page-title', 'Kelola Fasilitas Sekolah')

@section('css')
<style>
    .fasilitas-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e0e0e0;
    }
    
    .section-header h5 {
        margin: 0;
        color: #1a5f3a;
        font-weight: 700;
        font-size: 1.3rem;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #1a5f3a, #2d8659);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26, 95, 58, 0.3);
        color: white;
    }
    
    .fasilitas-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .fasilitas-table thead {
        background: linear-gradient(135deg, #1a5f3a, #2d8659);
        color: white;
    }
    
    .fasilitas-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 0.95rem;
    }
    
    .fasilitas-table td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: top;
    }
    
    .fasilitas-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .fasilitas-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #f39c12, #f5b041);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .fasilitas-name {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
        font-size: 1.05rem;
    }
    
    .fasilitas-desc {
        color: #7f8c8d;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 10px;
    }
    
    .fitur-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }
    
    .fitur-badge {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .badge-kategori {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .badge-utama {
        background: #e3f2fd;
        color: #1565c0;
    }
    
    .badge-pendukung {
        background: #fff3e0;
        color: #e65100;
    }
    
    .badge-status {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .badge-active {
        background: #c8e6c9;
        color: #2e7d32;
    }
    
    .badge-inactive {
        background: #ffcdd2;
        color: #c62828;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-action {
        padding: 8px 15px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }
    
    .btn-edit {
        background: #2196f3;
        color: white;
    }
    
    .btn-edit:hover {
        background: #1976d2;
        transform: translateY(-2px);
        color: white;
    }
    
    .btn-toggle {
        background: #ff9800;
        color: white;
    }
    
    .btn-toggle:hover {
        background: #f57c00;
        transform: translateY(-2px);
    }
    
    .btn-delete {
        background: #f44336;
        color: white;
    }
    
    .btn-delete:hover {
        background: #d32f2f;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #7f8c8d;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #bdc3c7;
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .urutan-badge {
        background: #f5f5f5;
        color: #666;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .fasilitas-table {
            font-size: 0.9rem;
        }
        
        .fasilitas-table th,
        .fasilitas-table td {
            padding: 10px;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>
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