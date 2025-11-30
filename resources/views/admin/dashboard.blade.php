@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- STAT CARDS -->
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-chalkboard-user" style="font-size: 40px; color: #667eea;"></i>
                <h3 class="mt-2">{{ $data['total_guru'] }}</h3>
                <p class="text-muted">Total Guru</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-star" style="font-size: 40px; color: #764ba2;"></i>
                <h3 class="mt-2">{{ $data['total_ekstrakurikuler'] }}</h3>
                <p class="text-muted">Ekstrakurikuler</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="fas fa-newspaper" style="font-size: 40px; color: #f093fb;"></i>
                <h3 class="mt-2">{{ $data['total_berita'] }}</h3>
                <p class="text-muted">Berita & Pengumuman</p>
            </div>
        </div>
    </div>
</div>

<!-- RECENT DATA -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-users"></i> Guru Terbaru
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data['guru_terbaru'] as $guru)
                        <tr>
                            <td>{{ $guru['nama'] }}</td>
                            <td><span class="badge bg-primary">{{ $guru['mata_pelajaran'] }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">Belum ada data guru</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.guru') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-arrow-right"></i> Lihat Semua
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-newspaper"></i> Berita Terbaru
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tipe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data['berita_terbaru'] as $berita)
                        <tr>
                            <td>{{ substr($berita['judul'], 0, 30) }}...</td>
                            <td>
                                @if($berita['tipe'] == 'berita')
                                    <span class="badge bg-info">Berita</span>
                                @else
                                    <span class="badge bg-warning">Pengumuman</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted">Belum ada data berita</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.berita') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-arrow-right"></i> Lihat Semua
                </a>
            </div>
        </div>
    </div>
</div>
@endsection