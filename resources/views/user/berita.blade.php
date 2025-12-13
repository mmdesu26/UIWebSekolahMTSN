@extends('layouts.app')

@section('title', 'Berita & Pengumuman - MTsN 1 Magetan')

@section('content')

<section class="news-hero">
    <div class="container">
        <div class="news-hero-content">
            <h1>
                <i class="fas fa-newspaper" style="margin-right: 15px;"></i>
                Berita & Pengumuman
            </h1>
            <p>Informasi terkini dari MTsN 1 Magetan</p>
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container">

        @if($berita->count() > 0)

            <div class="news-grid">
                @foreach($berita as $index => $item)

                    <div class="news-item reveal" style="transition-delay: {{ $loop->index * 0.08 }}s;">
                        <div class="news-card">

                            <div class="news-thumb">
                                <img src="{{ $item->image ?? 'https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita' }}" 
                                alt="{{ $item->title }}">

                                <span class="news-badge {{ $item->tipe == 'pengumuman' ? 'pengumuman' : 'berita' }}">
                                {{ ucfirst($item->tipe ?? 'berita') }}
                            </span>
                            </div>

                            <div class="news-body">
                                <div class="news-meta">
                                    <span><i class="fas fa-calendar"></i> {{ $item->created_at->format('d M Y') }}</span>
                                    <span><i class="fas fa-user"></i> {{ $item->user?->name ?? 'Admin' }}</span>
                                </div>

                                <h3 class="news-title">{{ $item->title }}</h3>

                                <p class="news-excerpt">{{ Str::limit(strip_tags($item->content), 120) }}</p>

                                <div class="news-footer">
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="news-link">
                                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>

            <!-- Pagination Laravel -->
            <div class="mt-5">
                {{ $berita->links() }}
            </div>

        @else
            <div class="text-center py-5">
                <p class="text-muted">Belum ada berita atau pengumuman.</p>
            </div>
        @endif

    </div>
</section>

<link rel="stylesheet" href="{{ asset('css/berita.css') }}">
<script src="{{ asset('js/berita.js') }}"></script>

@endsection
