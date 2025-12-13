@extends('layouts.admin')

@section('title', 'Kelola Jadwal Pelajaran')
@section('page-title', 'Manajemen Jadwal Pelajaran')

@section('css')
<!-- CSS Khusus untuk Jadwal Pelajaran -->
<link rel="stylesheet" href="{{ asset('css/admin/jadwal.css') }}">
@endsection

@section('content')
<div class="row">
    <!-- TOMBOL AKSI UTAMA -->
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="fas fa-plus"></i> Tambah Jadwal
                        </button>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalDuplikat">
                            <i class="fas fa-copy"></i> Duplikat Jadwal
                        </button>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa-info-circle"></i> Kelola jadwal pelajaran untuk setiap kelas
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAB KELAS -->
    <div class="col-12">
        <div class="tab-buttons">
            @foreach($kelasList as $index => $kelas)
            <button class="tab-btn {{ $index === 0 ? 'active' : '' }}" onclick="switchTab('{{ $kelas }}', this)">
                <i class="fas fa-users"></i> Kelas {{ $kelas }}
            </button>
            @endforeach
        </div>

        <!-- CONTENT TAB -->
        @foreach($kelasList as $index => $kelas)
        <div class="tab-content-item {{ $index === 0 ? 'active' : '' }}" id="tab-{{ $kelas }}">
            <div class="card jadwal-card">
                <div class="card-header">
                    <h5><i class="fas fa-calendar-week"></i> Jadwal Kelas {{ $kelas }}</h5>
                </div>
                <div class="card-body p-0">
                    @if(isset($jadwal[$kelas]) && count($jadwal[$kelas]) > 0)
                    <div class="table-responsive">
                        <table class="jadwal-table">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Hari</th>
                                    <th style="width: 15%;">Jam</th>
                                    <th style="width: 25%;">Mata Pelajaran</th>
                                    <th style="width: 10%;">Urutan</th>
                                    <th style="width: 20%; text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hariList as $hari)
                                    @if(isset($jadwal[$kelas][$hari]))
                                        @foreach($jadwal[$kelas][$hari] as $item)
                                        <tr>
                                            <td><strong>{{ $hari }}</strong></td>
                                            <td><span class="badge-waktu">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</span></td>
                                            <td>
                                                @if($item->is_istirahat)
                                                    <span class="badge-istirahat">ISTIRAHAT</span>
                                                @else
                                                    <span class="badge-mapel">{{ $item->mata_pelajaran }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->urutan }}</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group-action">
                                                    <button class="btn-action btn-edit" 
                                                        onclick="editJadwal(
                                                            {{ $item->id }}, 
                                                            '{{ $item->kelas }}', 
                                                            '{{ $item->hari }}', 
                                                            '{{ $item->jam_mulai }}', 
                                                            '{{ $item->jam_selesai }}', 
                                                            '{{ addslashes($item->mata_pelajaran) }}', 
                                                            {{ $item->is_istirahat ? 'true' : 'false' }}, 
                                                            {{ $item->urutan }}
                                                        )">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn-action btn-delete" onclick="confirmDelete({{ $item->id }})">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <p>Belum ada jadwal untuk kelas {{ $kelas }}</p>
                        <button class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="fas fa-plus"></i> Tambah Jadwal
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Jadwal Pelajaran</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="kelas" class="form-select" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}">Kelas {{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari <span class="text-danger">*</span></label>
                        <select name="hari" class="form-select" required>
                            <option value="">Pilih Hari</option>
                            @foreach($hariList as $hari)
                            <option value="{{ $hari }}">{{ $hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="mata_pelajaran" class="form-control" placeholder="Contoh: Matematika" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urutan <span class="text-muted">(Opsional)</span></label>
                        <input type="number" name="urutan" class="form-control" placeholder="Otomatis jika kosong" min="1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_istirahat" class="form-check-input" id="istirahatTambah">
                        <label class="form-check-label" for="istirahatTambah">
                            Jadwal ini adalah waktu istirahat
                        </label>
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

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white;">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Jadwal Pelajaran</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="kelas" id="editKelas" class="form-select" required>
                            @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}">Kelas {{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari <span class="text-danger">*</span></label>
                        <select name="hari" id="editHari" class="form-select" required>
                            @foreach($hariList as $hari)
                            <option value="{{ $hari }}">{{ $hari }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_mulai" id="editJamMulai" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                            <input type="time" name="jam_selesai" id="editJamSelesai" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="mata_pelajaran" id="editMataPelajaran" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="urutan" id="editUrutan" class="form-control" min="1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_istirahat" class="form-check-input" id="editIstirahat">
                        <label class="form-check-label" for="editIstirahat">
                            Jadwal ini adalah waktu istirahat
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL DUPLIKAT -->
<div class="modal fade" id="modalDuplikat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #9b59b6, #8e44ad); color: white;">
                <h5 class="modal-title"><i class="fas fa-copy"></i> Duplikat Jadwal Kelas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.jadwal.duplicate') }}" method="POST" onsubmit="return confirmDuplicate()">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Fitur ini akan menyalin semua jadwal dari satu kelas ke kelas lainnya. <strong>Jadwal kelas tujuan akan dihapus dan diganti.</strong>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dari Kelas <span class="text-danger">*</span></label>
                        <select name="from_kelas" class="form-select" required>
                            <option value="">Pilih Kelas Sumber</option>
                            @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}">Kelas {{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ke Kelas <span class="text-danger">*</span></label>
                        <select name="to_kelas" class="form-select" required>
                            <option value="">Pilih Kelas Tujuan</option>
                            @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}">Kelas {{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-copy"></i> Duplikat
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FORM DELETE (HIDDEN) -->
<form id="formDelete" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@section('js')
<script>
    // Switch Tab Kelas
    function switchTab(kelas, element) {
        // Hide all tabs
        document.querySelectorAll('.tab-content-item').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById('tab-' + kelas).classList.add('active');
        element.classList.add('active');
    }

    // Edit Jadwal Function
    function editJadwal(id, kelas, hari, jamMulai, jamSelesai, mataPelajaran, isIstirahat, urutan) {
        // Set form action
        const form = document.getElementById('formEdit');
        form.action = '{{ url("admin/jadwal") }}/' + id;
        
        // Fill form fields
        document.getElementById('editId').value = id;
        document.getElementById('editKelas').value = kelas;
        document.getElementById('editHari').value = hari;
        document.getElementById('editJamMulai').value = jamMulai;
        document.getElementById('editJamSelesai').value = jamSelesai;
        document.getElementById('editMataPelajaran').value = mataPelajaran;
        document.getElementById('editUrutan').value = urutan;
        document.getElementById('editIstirahat').checked = isIstirahat;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('modalEdit'));
        modal.show();
    }

    // Confirm Delete Function
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus jadwal ini? Tindakan ini tidak dapat dibatalkan!')) {
            const form = document.getElementById('formDelete');
            form.action = '{{ url("admin/jadwal") }}/' + id;
            form.submit();
        }
    }

    // Confirm Duplicate Function
    function confirmDuplicate() {
        return confirm('Yakin ingin menduplikasi jadwal? Jadwal kelas tujuan akan dihapus dan diganti dengan jadwal kelas sumber!');
    }

    // Auto dismiss alerts
    document.addEventListener('DOMContentLoaded', function() {
        // Auto close alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert-dismissible');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Reset form when modal is closed
        document.getElementById('modalTambah').addEventListener('hidden.bs.modal', function () {
            this.querySelector('form').reset();
        });

        document.getElementById('modalEdit').addEventListener('hidden.bs.modal', function () {
            this.querySelector('form').reset();
        });

        document.getElementById('modalDuplikat').addEventListener('hidden.bs.modal', function () {
            this.querySelector('form').reset();
        });
    });
</script>
@endsection