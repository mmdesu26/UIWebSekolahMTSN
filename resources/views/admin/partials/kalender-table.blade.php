<div class="card table-card">
    <div class="card-body p-0">
        @if($kalenders->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="fas fa-inbox fa-3x mb-3"></i>
                <p>Belum ada data kalender</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Semester</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kalenders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ Str::limit($item->judul, 50) }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($item->keterangan, 60) }}</small>
                            </td>
                            <td>
                                @if($item->semester == 'ganjil')
                                    <span class="badge bg-info">Ganjil</span>
                                @else
                                    <span class="badge bg-warning text-dark">Genap</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $badgeClass = match($item->kategori) {
                                        'akademik' => 'bg-primary',
                                        'libur' => 'bg-danger',
                                        'kegiatan' => 'bg-success',
                                        'ujian' => 'bg-warning text-dark',
                                        'penting' => 'bg-info',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($item->kategori) }}</span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}
                                @if($item->tanggal_selesai)
                                    <br>s/d {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.kalender.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.kalender.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>