@extends('layouts.admin')

@section('title', 'Kelola Struktur Organisasi & Guru')
@section('page-title', 'Kelola Struktur Organisasi & Guru')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/struktur-organisasi.css') }}">

<div class="struktur-container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">

            <!-- ============================= -->
            <!-- SECTION 1: GAMBAR STRUKTUR -->
            <!-- ============================= -->
            
            <!-- INFO BOX -->
            <div class="info-box">
                <i class="fas fa-info-circle"></i>
                <p><strong>Petunjuk:</strong> Upload gambar struktur organisasi sekolah dalam format JPG, PNG, GIF, atau SVG dengan ukuran maksimal 5MB. Disarankan menggunakan gambar dengan resolusi tinggi agar tampilan jelas.</p>
            </div>

            @if($strukturGambar)
            <!-- PREVIEW GAMBAR -->
            <div class="preview-card">
                <div class="preview-card-header">
                    <i class="fas fa-image"></i>
                    <span>Preview Gambar Struktur Organisasi</span>
                </div>
                <div class="preview-card-body">
                    <img src="{{ asset('storage/' . $strukturGambar) }}" alt="Struktur Organisasi" class="preview-image">
                    
                    <div style="display: flex; gap: 12px; justify-content: center;">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadForm').scrollIntoView({behavior: 'smooth'})">
                            <i class="fas fa-edit"></i> Ganti Gambar
                        </button>
                        <form method="POST" action="{{ route('admin.struktur.delete') }}" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus Gambar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <!-- FORM UPLOAD -->
            <div class="form-card" id="uploadForm">
                <div class="form-card-header">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>{{ $strukturGambar ? 'Ganti' : 'Upload' }} Gambar Struktur Organisasi</span>
                </div>
                <div class="form-card-body">
                    <form method="POST" action="{{ route('admin.struktur.upload') }}" enctype="multipart/form-data" id="uploadFormElement">
                        @csrf
                        
                        <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <p class="upload-text">Klik untuk memilih file atau drag & drop</p>
                            <p class="upload-hint">Format: JPG, PNG, GIF, SVG | Maksimal 5MB</p>
                            <input type="file" name="gambar" id="fileInput" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml" style="display: none;" required>
                        </div>

                        <div id="filePreview" style="display: none; margin-top: 20px; text-align: center;">
                            <img id="previewImg" src="" alt="Preview" style="max-width: 100%; max-height: 400px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                            <p id="fileName" style="margin-top: 12px; font-size: 14px; color: var(--text-dark); font-weight: 600;"></p>
                        </div>

                        <div style="margin-top: 24px; text-align: center;">
                            <button type="submit" class="btn btn-primary" id="uploadBtn" disabled>
                                <i class="fas fa-upload"></i> Upload Gambar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- DIVIDER -->
            <div class="section-divider">
                <span><i class="fas fa-users"></i> DATA GURU & TENAGA PENDIDIK</span>
            </div>

            <!-- ============================= -->
            <!-- SECTION 2: DATA GURU -->
            <!-- ============================= -->

            <!-- FORM TAMBAH GURU -->
            <div class="form-card">
                <div class="form-card-header">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Guru Baru</span>
                </div>
                <div class="form-card-body">
                    <form method="POST" action="{{ route('admin.struktur.guru.store') }}" enctype="multipart/form-data" class="guru-form">
                        @csrf
                        
                        <div class="form-group">
                            <label class="form-label required">Nama Guru</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nama" 
                                placeholder="Nama lengkap guru" 
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label required">Mata Pelajaran</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="mata_pelajaran" 
                                placeholder="Mata pelajaran yang diampu" 
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label optional">Nomor Induk Pegawai (NIP)</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nip" 
                                placeholder="Contoh: 198503151234567890 (boleh dikosongkan)"
                            >
                            <small style="color: var(--text-muted); font-size: 12px; margin-top: 6px; display: block;">
                                <i class="fas fa-info-circle"></i> Anda bisa mengosongkan field ini jika guru belum memiliki NIP
                            </small>
                        </div>

                        <div class="form-group">
                            <label class="form-label optional">Foto Guru (opsional)</label>
                            <input 
                                type="file" 
                                class="form-control" 
                                name="foto" 
                                accept="image/*"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Guru
                        </button>
                    </form>
                </div>
            </div>

            <!-- DAFTAR GURU -->
            <div class="table-card">
                <div class="table-card-header">
                    <i class="fas fa-list"></i>
                    <span>Daftar Guru</span>
                    <div style="margin-left: auto; background: white; color: var(--primary-color); padding: 8px 14px; border-radius: 20px; font-size: 13px; font-weight: 700;">
                        {{ count($guru) }} Guru
                    </div>
                </div>

                @if(count($guru) > 0)
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 8%;">No</th>
                                <th style="width: 10%;">Foto</th>
                                <th style="width: 28%;">Nama Guru</th>
                                <th style="width: 24%;">Mata Pelajaran</th>
                                <th style="width: 20%;">NIP</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guru as $item)
                            <tr>
                                <td>
                                    <strong>{{ $loop->iteration }}</strong>
                                </td>
                                <td>
                                    @if($item->foto_url)
                                        <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="guru-photo">
                                    @else
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #e2e8f0, #cbd5e0); display: flex; align-items: center; justify-content: center; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                            <i class="fas fa-user" style="color: #718096; font-size: 20px;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong style="color: var(--text-dark);">{{ $item->nama }}</strong>
                                </td>
                                <td>
                                    <span class="badge">
                                        {{ $item->mata_pelajaran }}
                                    </span>
                                </td>
                                <td>
                                    <code style="color: var(--text-light); font-size: 11px;">
                                        {{ $item->nip_display }}
                                    </code>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Tombol Edit → Redirect ke halaman edit -->
                                        <a href="{{ route('admin.struktur.guru.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- Hapus -->
                                        <form 
                                            method="POST" 
                                            action="{{ route('admin.struktur.guru.delete', $item) }}" 
                                            class="delete-form"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-user-friends"></i>
                    <p style="font-size: 16px; color: var(--text-dark); font-weight: 600; margin-bottom: 8px;">Belum ada data guru</p>
                    <p style="font-size: 14px; color: var(--text-muted); margin: 0;">Tambahkan data guru menggunakan form di atas</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/admin/struktur-organisasi.js') }}"></script>
@endsection