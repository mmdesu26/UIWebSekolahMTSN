@extends('layouts.admin')

@section('title', 'Kelola Jadwal Pelajaran')
@section('page-title', 'Manajemen Jadwal Pelajaran')

@section('css')
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
                        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Jadwal
                        </a>
                        <a href="{{ route('admin.jadwal.duplicate.show') }}" class="btn btn-info">
                            <i class="fas fa-copy"></i> Duplikat Jadwal
                        </a>
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
                                                    <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn-action btn-edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <p>Belum ada jadwal untuk kelas {{ $kelas }}</p>
                        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary btn-sm mt-2">
                            <i class="fas fa-plus"></i> Tambah Jadwal
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/admin/jadwal.js') }}"></script>
<script>
    // SweetAlert for delete confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin hapus jadwal ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection