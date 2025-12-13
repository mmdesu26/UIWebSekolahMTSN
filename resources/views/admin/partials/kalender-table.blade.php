<div class="card shadow-sm">
    <div class="card-body">
        @if($kalenders->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="12%">Tanggal</th>
                        <th width="10%">Semester</th>
                        <th>Judul Kegiatan</th>
                        <th width="15%">Kategori</th>
                        <th width="8%">Status</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kalenders as $index => $kalender)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <small class="text-muted d-block">
                                <i class="far fa-calendar"></i>
                                {{ $kalender->tanggal_mulai->format('d/m/Y') }}
                            </small>
                            @if($kalender->tanggal_selesai && $kalender->tanggal_mulai != $kalender->tanggal_selesai)
                            <small class="text-muted d-block">
                                <i class="far fa-calendar"></i>
                                {{ $kalender->tanggal_selesai->format('d/m/Y') }}
                            </small>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $kalender->semester == 'ganjil' ? 'bg-info' : 'bg-success' }}">
                                {{ ucfirst($kalender->semester) }}
                            </span>
                        </td>
                        <td>
                            <strong>{{ $kalender->judul }}</strong>
                            <p class="text-muted mb-0 small">{{ Str::limit($kalender->keterangan, 80) }}</p>
                        </td>
                        <td>
                            <span class="badge badge-{{ $kalender->kategori }}">
                                {{ $kalender->kategori_label }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.kalender.toggle', $kalender->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $kalender->is_active ? 'btn-success' : 'btn-secondary' }}" title="{{ $kalender->is_active ? 'Aktif' : 'Nonaktif' }}">
                                    <i class="fas {{ $kalender->is_active ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <button 
                                onclick="editKalender(
                                    {{ $kalender->id }}, 
                                    '{{ $kalender->semester }}', 
                                    '{{ $kalender->tanggal_mulai->format('Y-m-d') }}', 
                                    '{{ $kalender->tanggal_selesai ? $kalender->tanggal_selesai->format('Y-m-d') : '' }}', 
                                    '{{ addslashes($kalender->judul) }}', 
                                    '{{ addslashes($kalender->keterangan) }}',
                                    '{{ $kalender->kategori }}'
                                )" 
                                class="btn btn-sm btn-warning me-1"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button 
                                onclick="deleteKalender({{ $kalender->id }}, '{{ addslashes($kalender->judul) }}')" 
                                class="btn btn-sm btn-danger"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada kegiatan</h5>
            <p class="text-muted">Klik tombol "Tambah Kegiatan" untuk menambahkan jadwal baru</p>
        </div>
        @endif
    </div>
</div>