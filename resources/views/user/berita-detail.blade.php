@extends('layouts.app')

@section('title', $berita->title . ' - MTsN 1 Magetan')

@section('content')
    <!-- Hero Section dengan Background Gambar -->
    <section 
        class="news-detail-hero position-relative text-white d-flex align-items-center"
        style="background-image: url('{{ $berita->image ?? asset('images/default-berita.jpg') }}');
               background-size: cover;
               background-position: center;
               min-height: 65vh;">
        
        <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 bg-dark opacity-50"></div>
        
        <div class="container position-relative z-2">
            <div class="hero-content max-w-4xl mx-auto text-center">
                <span class="news-badge px-4 py-2 rounded text-sm font-semibold mb-4 d-inline-block
                    {{ $berita->tipe === 'pengumuman' ? 'bg-warning text-dark' : 'bg-primary' }}">
                    {{ ucfirst($berita->tipe ?? 'berita') }}
                </span>

                <h1 class="display-4 fw-bold mb-4">{{ $berita->title }}</h1>

                <div class="news-meta-detail d-flex justify-content-center gap-4 flex-wrap text-light opacity-90">
                    <span>
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ $berita->news_date?->translatedFormat('d F Y') 
                           ?? $berita->created_at->translatedFormat('d F Y') }}
                    </span>
                    <span>
                        <i class="fas fa-user me-2"></i>
                        {{ $berita->user?->name ?? 'Admin' }}
                    </span>
                    @if($berita->source)
                        <span>
                            <i class="fas fa-link me-2"></i> {{ $berita->source }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Artikel -->
    <section class="news-detail-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <article class="news-article card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-body p-4 p-md-5">

                            {{-- Gambar Utama (jika ada) --}}
                            @if($berita->image)
                                <img 
                                    src="{{ $berita->image }}" 
                                    class="img-fluid rounded-3 mb-5 shadow-sm w-100 object-fit-cover" 
                                    style="max-height: 500px;" 
                                    alt="{{ $berita->title }}">
                            @endif

                            {{-- Sumber (jika ada) --}}
                            @if($berita->source)
                                <div class="alert alert-info small py-2 px-3 d-inline-block rounded mb-4">
                                    <strong>Sumber:</strong> {{ $berita->source }}
                                </div>
                            @endif

                            {{-- Isi Konten --}}
                            <div class="content lh-lg fs-5 text-dark">
                                {!! nl2br(e($berita->content)) !!}
                                {{-- atau kalau pakai editor (TinyMCE/Quill), pakai {!! $berita->content !!} --}}
                            </div>

                            <hr class="my-5 border-secondary-subtle">

                            {{-- Tombol Kembali --}}
                            <div class="text-center">
                                <a href="{{ route('berita') }}" 
                                   class="btn btn-outline-primary btn-lg px-5">
                                    Kembali ke Daftar Berita
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/berita-detail.css') }}">
@endpush