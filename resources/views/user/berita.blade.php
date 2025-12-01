@extends('layouts.app')

@section('title', 'Berita & Pengumuman - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Berita & Pengumuman</h2>
            <p class="section-subtitle">Informasi terkini dari MTsN 1 Magetan</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; margin-top: 50px;">
            @foreach($data['berita'] as $index => $item)
            <div class="news-card" style="animation: fadeInUp 0.6s ease-out; animation-delay: {{ $index * 0.1 }}s;">
                <div class="news-image">
                    <img src="{{ $item['gambar'] ?? 'https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita' }}" alt="{{ $item['title'] ?? 'Berita' }}">
                    <span class="news-badge {{ $item['tipe'] ?? 'berita' }}">
                        {{ ucfirst($item['tipe'] ?? 'berita') }}
                    </span>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span><i class="fas fa-calendar"></i> {{ isset($item['tanggal']) ? date('d M Y', strtotime($item['tanggal'])) : date('d M Y') }}</span>
                        <span><i class="fas fa-user"></i> Admin</span>
                    </div>
                    <h3>{{ $item['title'] ?? 'Judul Berita' }}</h3>
                    <p>{{ isset($item['content']) ? Str::limit($item['content'], 120) : 'Deskripsi berita...' }}</p>
                    <a href="#" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div style="display: flex; justify-content: center; gap: 10px; margin-top: 50px;">
            <a href="#" class="btn" style="background: #e9ecef; color: var(--dark-text); padding: 10px 15px; border-radius: 5px;">← Sebelumnya</a>
            <a href="#" class="btn" style="background: var(--primary-color); color: white; padding: 10px 15px; border-radius: 5px;">1</a>
            <a href="#" class="btn" style="background: #e9ecef; color: var(--dark-text); padding: 10px 15px; border-radius: 5px;">2</a>
            <a href="#" class="btn" style="background: #e9ecef; color: var(--dark-text); padding: 10px 15px; border-radius: 5px;">3</a>
            <a href="#" class="btn" style="background: #e9ecef; color: var(--dark-text); padding: 10px 15px; border-radius: 5px;">Selanjutnya →</a>
        </div>
    </div>
</section>

<style>
    .news-badge.pengumuman {
        background: var(--secondary-color);
    }

    .news-badge.kegiatan {
        background: var(--success-color);
    }
</style>
@endsection