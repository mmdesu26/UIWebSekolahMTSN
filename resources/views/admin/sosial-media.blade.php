@extends('layouts.admin')

@section('title', 'Sosial Media')
@section('page-title', 'Kelola Sosial Media')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-share-alt"></i> Daftar Sosial Media Sekolah
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Platform</th>
                            <th>Handle/Username</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sosialMedia as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item['platform'] == 'Facebook')
                                    <i class="fab fa-facebook" style="color: #1877F2;"></i> {{ $item['platform'] }}
                                @elseif($item['platform'] == 'Instagram')
                                    <i class="fab fa-instagram" style="color: #E4405F;"></i> {{ $item['platform'] }}
                                @elseif($item['platform'] == 'YouTube')
                                    <i class="fab fa-youtube" style="color: #FF0000;"></i> {{ $item['platform'] }}
                                @elseif($item['platform'] == 'WhatsApp')
                                    <i class="fab fa-whatsapp" style="color: #25D366;"></i> {{ $item['platform'] }}
                                @endif
                            </td>
                            <td>{{ $item['handle'] }}</td>
                            <td><a href="{{ $item['link'] }}" target="_blank">Kunjungi</a></td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMedia{{ $loop->index }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada sosial media</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection