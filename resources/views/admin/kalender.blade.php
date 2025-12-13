@extends('layouts.admin')

@section('title', 'Kelola Kalender Pendidikan')

@section('content')
<div class="container-fluid py-4">
    
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1"><i class="fas fa-calendar-alt"></i> Kalender Pendidikan</h2>
            <p class="text-muted mb-0">Kelola jadwal kegiatan akademik tahun ajaran 2024/2025</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus"></i> Tambah Kegiatan
        </button>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#semua">
                <i class="fas fa-list"></i> Semua Kegiatan ({{ $kalenders->count() }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#ganjil">
                <i class="fas fa-calendar-week"></i> Semester Ganjil ({{ $kalenders->where('semester', 'ganjil')->count() }})
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#genap">
                <i class="fas fa-calendar-week"></i> Semester Genap ({{ $kalenders->where('semester', 'genap')->count() }})
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

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Kegiatan Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.kalender.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Semester <span class="text-danger">*</span></label>
                            <select name="semester" class="form-select" required>
                                <option value="">Pilih Semester</option>
                                <option value="ganjil">Semester Ganjil (Juli - Desember)</option>
                                <option value="genap">Semester Genap (Januari - Juni)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                <option value="akademik">📚 Akademik</option>
                                <option value="libur">🏝️ Libur Nasional</option>
                                <option value="kegiatan">⭐ Kegiatan</option>
                                <option value="ujian">📝 Ujian</option>
                                <option value="penting">❗ Penting</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Selesai <small class="text-muted">(Opsional)</small></label>
                            <input type="date" name="tanggal_selesai" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Masa Pengenalan Lingkungan Sekolah (MPLS)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control" rows="4" placeholder="Deskripsi lengkap tentang kegiatan..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit (akan diisi via JS) -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Semester <span class="text-danger">*</span></label>
                            <select name="semester" id="edit_semester" class="form-select" required>
                                <option value="ganjil">Semester Ganjil (Juli - Desember)</option>
                                <option value="genap">Semester Genap (Januari - Juni)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" id="edit_kategori" class="form-select" required>
                                <option value="akademik">📚 Akademik</option>
                                <option value="libur">🏝️ Libur Nasional</option>
                                <option value="kegiatan">⭐ Kegiatan</option>
                                <option value="ujian">📝 Ujian</option>
                                <option value="penting">❗ Penting</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_mulai" id="edit_tanggal_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="edit_tanggal_selesai" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="edit_judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" id="edit_keterangan" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .badge {
        padding: 6px 12px;
        font-weight: 600;
        font-size: 12px;
    }
    .badge-akademik {
        background: #e7d4f5;
        color: #9b59b6;
    }
    .badge-libur {
        background: #ffe5e5;
        color: #e74c3c;
    }
    .badge-kegiatan {
        background: #d4edda;
        color: #28a745;
    }
    .badge-ujian {
        background: #fff3cd;
        color: #f39c12;
    }
    .badge-penting {
        background: #d1ecf1;
        color: #17a2b8;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
</style>

<script>
function editKalender(id, semester, tanggalMulai, tanggalSelesai, judul, keterangan, kategori) {
    document.getElementById('editForm').action = `/admin/kalender/${id}`;
    document.getElementById('edit_semester').value = semester;
    document.getElementById('edit_tanggal_mulai').value = tanggalMulai;
    document.getElementById('edit_tanggal_selesai').value = tanggalSelesai || '';
    document.getElementById('edit_judul').value = judul;
    document.getElementById('edit_keterangan').value = keterangan;
    document.getElementById('edit_kategori').value = kategori;
    
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function deleteKalender(id, judul) {
    if (confirm(`Apakah Anda yakin ingin menghapus kegiatan "${judul}"?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/kalender/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

@endsection