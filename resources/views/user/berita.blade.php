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
            @for($i = 1; $i <= 6; $i++)
            <div class="news-card" style="animation: fadeInUp 0.6s ease-out; animation-delay: {{ ($i - 1) * 0.1 }}s;">
                <div class="news-image">
                    <img src="https://via.placeholder.com/400x250/1a5f3a/ffffff?text=Berita+{{ $i }}" alt="Berita {{ $i }}">
                    <span class="news-badge">
                        @if($i % 3 == 0)
                            Pengumuman
                        @elseif($i % 3 == 2)
                            Kegiatan
                        @else
                            Berita
                        @endif
                    </span>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span><i class="fas fa-calendar"></i> {{ date('d M Y', strtotime('-' . $i . ' days')) }}</span>
                        <span><i class="fas fa-user"></i> Admin</span>
                    </div>
                    <h3>Judul Berita atau Pengumuman Penting Nomor {{ $i }}</h3>
                    <p>Deskripsi singkat tentang berita atau pengumuman yang relevan dengan kegiatan dan informasi terkini dari MTsN 1 Magetan...</p>
                    <a href="#" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endfor
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
@endsection