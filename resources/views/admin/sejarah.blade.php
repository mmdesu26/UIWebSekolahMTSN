@extends('layouts.admin')

@section('title', 'Sejarah Sekolah')
@section('page-title', 'Kelola Sejarah Sekolah')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/sejarah.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- Main Container -->
<div class="sejarah-container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <!-- Main Card -->
            <div class="sejarah-card">
                <div class="sejarah-card-header">
                    <i class="fas fa-history sejarah-card-header-icon"></i>
                    <h3>Sejarah Sekolah MTsN 1 Magetan</h3>
                </div>

                <div class="sejarah-card-body">
                    <form method="POST" action="{{ route('admin.sejarah.update') }}" enctype="multipart/form-data" class="sejarah-form" id="sejarahForm">
                        @csrf

                        <!-- Image Upload Section -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-image"></i>
                                <span>Gambar Sejarah</span>
                            </label>
                            
                            <div class="image-upload-container">
                                <div class="image-preview-wrapper">
                                    @if($sejarah && $sejarah->image)
                                    <div class="current-image">
                                        <img src="{{ Storage::url($sejarah->image) }}" alt="Sejarah Image" id="imagePreview">
                                        <button type="button" class="btn-delete-image" onclick="deleteImage()" title="Hapus Gambar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @else
                                    <div class="no-image" id="noImagePlaceholder">
                                        <i class="fas fa-image"></i>
                                        <p>Belum ada gambar</p>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="upload-input-wrapper">
                                    <label for="imageInput" class="btn-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Pilih Gambar</span>
                                    </label>
                                    <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
                                    <small class="form-text">
                                        📷 Format: JPG, PNG, GIF | Max: 2MB | Rekomendasi: 1200x800px
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Editor Toolbar -->
                        <div class="editor-toolbar">
                            <div class="toolbar-group">
                                <button type="button" class="toolbar-btn" title="Bold" onclick="insertMarkdown('**', '**')">
                                    <i class="fas fa-bold"></i>
                                </button>
                                <button type="button" class="toolbar-btn" title="Italic" onclick="insertMarkdown('*', '*')">
                                    <i class="fas fa-italic"></i>
                                </button>
                                <button type="button" class="toolbar-btn" title="Underline" onclick="insertMarkdown('__', '__')">
                                    <i class="fas fa-underline"></i>
                                </button>
                            </div>
                            <div class="toolbar-group">
                                <button type="button" class="toolbar-btn" title="Heading" onclick="insertMarkdown('\n## ', '\n')">
                                    <i class="fas fa-heading"></i>
                                </button>
                                <button type="button" class="toolbar-btn" title="List" onclick="insertMarkdown('\n- ', '')">
                                    <i class="fas fa-list"></i>
                                </button>
                                <button type="button" class="toolbar-btn" title="Quote" onclick="insertMarkdown('\n> ', '')">
                                    <i class="fas fa-quote-left"></i>
                                </button>
                            </div>
                            <div class="toolbar-group">
                                <button type="button" class="toolbar-btn" title="Clear Format" onclick="clearFormat()">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Content Textarea -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Konten Sejarah</span>
                            </label>
                            <textarea 
                                class="form-control sejarah-textarea" 
                                name="content" 
                                id="contentTextarea"
                                placeholder="Tuliskan sejarah lengkap MTsN 1 Magetan dengan detail yang komprehensif. Gunakan toolbar untuk memformat teks."
                                required
                            >{{ $sejarah->content ?? '' }}</textarea>
                            <small class="form-text">
                                📝 Gunakan tombol di atas untuk memformat teks, atau tulis konten dengan markup sederhana
                            </small>

                            <!-- Text Statistics -->
                            <div class="text-stats">
                                <div class="stat-item">
                                    <i class="fas fa-font stat-icon"></i>
                                    <span class="stat-label">Karakter:</span>
                                    <span class="stat-value char-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-align-left stat-icon"></i>
                                    <span class="stat-label">Kata:</span>
                                    <span class="stat-value word-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-paragraph stat-icon"></i>
                                    <span class="stat-label">Paragraf:</span>
                                    <span class="stat-value paragraph-count">0</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-clock stat-icon"></i>
                                    <span class="stat-label">Est. Baca:</span>
                                    <span class="stat-value read-time">0 min</span>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <!-- Buttons -->
<div class="btn-container">
    <button type="submit" class="btn btn-primary">
        <div class="btn-content">
            <i class="fas fa-save"></i>
            <span>Simpan Perubahan</span>
        </div>
    </button>
    <button type="button" class="btn btn-secondary" onclick="cancelForm()">
        <div class="btn-content">
            <i class="fas fa-times"></i>
            <span>Batal</span>
        </div>
    </button>
</div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/admin/sejarah.js') }}"></script>
@endsection