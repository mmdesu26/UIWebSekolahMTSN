@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')

<!-- Link to CSS -->
<link rel="stylesheet" href="{{ asset('css/admin/galeri.css') }}">

<!-- Page Header -->
<div class="galeri-header">
    <div class="galeri-header-content">
        <h2>
            <i class="fas fa-images"></i>
            <span>Kelola Galeri</span>
        </h2>
        <p>📸 Kelola foto dan embed media dengan mudah</p>
    </div>
</div>

<!-- Success Alert -->
@if(session('success'))
<div class="alert alert-success" role="alert">
    <i class="fas fa-check-circle"></i>
    <div>
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
</div>
@endif

<!-- Error Alert -->
@if(session('error'))
<div class="alert alert-error" role="alert">
    <i class="fas fa-exclamation-circle"></i>
    <div>
        <strong>Gagal!</strong> {{ session('error') }}
    </div>
</div>
@endif

<!-- Button Add -->
<div style="margin-bottom: clamp(16px, 2.5vw, 20px); display: flex; justify-content: flex-end;">
    <button class="btn-add" onclick="openAddModal()" type="button">
        <i class="fas fa-plus-circle"></i>
        <span>Tambah Media Baru</span>
    </button>
</div>

<!-- Gallery Grid -->
<div class="galeri-container">
    @if(count($galeri) > 0)
    <div class="gallery-grid">
        @foreach($galeri as $item)
        <div class="gallery-card">
            <div class="img-wrapper">
                @if(!empty($item['embed_link']))
                    @php
                        $isYoutube = strpos($item['embed_link'], 'youtube.com') !== false || strpos($item['embed_link'], 'youtu.be') !== false;
                        $isTikTok = strpos($item['embed_link'], 'tiktok.com') !== false;
                        $isInstagram = strpos($item['embed_link'], 'instagram.com') !== false;
                    @endphp

                    @if($isYoutube)
                        {!! getYoutubeEmbed($item['embed_link']) !!}
                        <span class="embed-badge">
                            <i class="fab fa-youtube"></i>
                            YOUTUBE
                        </span>
                    @elseif($isTikTok)
                        {!! getTikTokEmbed($item['embed_link']) !!}
                        <span class="embed-badge">
                            <i class="fab fa-tiktok"></i>
                            TIKTOK
                        </span>
                    @elseif($isInstagram)
                        {!! getInstagramEmbed($item['embed_link']) !!}
                        <span class="embed-badge">
                            <i class="fab fa-instagram"></i>
                            INSTAGRAM
                        </span>
                    @else
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0;">
                            <i class="fas fa-link" style="font-size: 48px; color: #999;"></i>
                        </div>
                        <span class="embed-badge">
                            <i class="fas fa-link"></i>
                            EMBED
                        </span>
                    @endif
                @elseif(!empty($item['gambar']))
                    @php
                        $isVideo = in_array(pathinfo($item['gambar'], PATHINFO_EXTENSION), ['mp4', 'webm', 'ogg', 'mov']);
                    @endphp

                    @if($isVideo)
                        <video width="100%" height="100%" style="object-fit: cover;" controls>
                            <source src="{{ $item['gambar'] }}" type="video/{{ pathinfo($item['gambar'], PATHINFO_EXTENSION) }}">
                            Your browser does not support the video tag.
                        </video>
                        <span class="video-badge">
                            <i class="fas fa-play-circle"></i>
                            VIDEO
                        </span>
                    @else
                        <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" loading="lazy">
                    @endif
                @else
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0;">
                        <i class="fas fa-image" style="font-size: 48px; color: #999;"></i>
                    </div>
                @endif
            </div>
            <div class="gallery-card-body">
                <div class="gallery-card-title" title="{{ $item['judul'] }}">{{ $item['judul'] }}</div>
                <div class="gallery-card-actions">
                    <button class="btn-action btn-edit" onclick='openEditModal(@json($item))' type="button" title="Edit Media">
                        <div class="btn-action-content">
                            <i class="fas fa-edit"></i>
                            <span>Edit</span>
                        </div>
                    </button>
                    <button class="btn-action btn-delete" onclick="confirmDelete({{ $item['id'] }})" type="button" title="Hapus Media">
                        <div class="btn-action-content">
                            <i class="fas fa-trash"></i>
                            <span>Hapus</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-images"></i>
        <p>Belum ada media galeri. Mulai tambahkan foto atau embed media baru!</p>
    </div>
    @endif
</div>

<!-- Modal Add -->
<div class="modal" id="addModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-image"></i>
                <span>Tambah Media Baru</span>
            </h3>
            <button class="modal-close" onclick="closeModal('addModal')" type="button" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="{{ route('admin.galeri.add') }}" method="POST" enctype="multipart/form-data" id="addForm">
            @csrf
            <div class="form-group">
                <label for="addJudul">Judul Media <span style="color: red;">*</span></label>
                <input 
                    type="text" 
                    id="addJudul"
                    name="judul" 
                    required 
                    placeholder="Masukkan judul media"
                >
            </div>

            <!-- File Upload -->
            <div class="file-upload-wrapper">
                <label class="file-upload-label">Upload Gambar/Video (Opsional)</label>
                <label class="file-upload-box" for="fileInput">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>
                        Klik untuk memilih file atau drag & drop di sini
                        <br>
                        <small>Format: JPG, PNG, GIF, WebP, MP4, WebM (Maks: 50MB)</small>
                    </p>
                </label>
                <input 
                    type="file" 
                    id="fileInput" 
                    class="file-input"
                    name="gambar"
                    accept="image/jpeg,image/png,image/gif,image/webp,video/mp4,video/webm,video/ogg,video/quicktime"
                    onchange="handleFileUpload(event)"
                >
                <div id="fileName" class="file-name"></div>
            </div>

            <div id="uploadPreviewContainer" class="preview-container"></div>

            <div class="form-group">
                <label for="addEmbedLink">Embed Link (Opsional)</label>
                <input 
                    type="text" 
                    id="addEmbedLink"
                    name="embed_link" 
                    placeholder="Paste link YouTube, TikTok, Instagram (opsional)"
                    onchange="previewEmbedLink('addEmbedLink', 'addEmbedPreview')"
                    oninput="previewEmbedLink('addEmbedLink', 'addEmbedPreview')"
                >
                <small>
                    ✓ YouTube: https://www.youtube.com/watch?v=... atau https://youtu.be/...
                    <br>✓ TikTok: https://www.tiktok.com/@user/video/...
                    <br>✓ Instagram: https://www.instagram.com/p/...
                    <br><em style="color: var(--warning-color);">* Jika embed link diisi, gambar/video upload akan diabaikan</em>
                </small>
            </div>
            <div id="addEmbedPreview" class="preview-container"></div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i>
                <span>Simpan Media</span>
            </button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-edit"></i>
                <span>Edit Media</span>
            </h3>
            <button class="modal-close" onclick="closeModal('editModal')" type="button" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            <div class="form-group">
                <label for="editJudul">Judul Media <span style="color: red;">*</span></label>
                <input 
                    type="text" 
                    id="editJudul"
                    name="judul" 
                    required
                >
            </div>
            <div class="form-group">
                <label for="editGambar">URL Gambar/Video (Opsional)</label>
                <input 
                    type="text" 
                    id="editGambar"
                    name="gambar"
                    placeholder="https://example.com/image.jpg atau /storage/galeri/..."
                    onchange="previewMediaFromLink('editGambar', 'editPreviewContainer')"
                    oninput="previewMediaFromLink('editGambar', 'editPreviewContainer')"
                >
                <small>Kosongkan jika tidak ingin mengubah gambar</small>
            </div>
            <div id="editPreviewContainer" class="preview-container"></div>
            
            <div class="form-group">
                <label for="editEmbedLink">Embed Link (Opsional)</label>
                <input 
                    type="text" 
                    id="editEmbedLink"
                    name="embed_link"
                    placeholder="Paste link YouTube, TikTok, Instagram"
                    onchange="previewEmbedLink('editEmbedLink', 'editEmbedPreview')"
                    oninput="previewEmbedLink('editEmbedLink', 'editEmbedPreview')"
                >
                <small>Kosongkan jika tidak ingin menggunakan embed</small>
            </div>
            <div id="editEmbedPreview" class="preview-container"></div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i>
                <span>Update Media</span>
            </button>
        </form>
    </div>
</div>

<!-- Form Delete (Hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('POST')
</form>

<!-- Link to JS -->
<script src="{{ asset('js/admin/galeri.js') }}"></script>

@endsection