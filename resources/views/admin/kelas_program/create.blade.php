@extends('layouts.admin')

@section('title', 'Tambah Kelas Program')
@section('page-title', 'Tambah Kelas Program')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kelas_program_form.css') }}">
@endsection

@section('content')
<div class="form-container">
    
    <div class="form-header">
        <h2><i class="fas fa-plus-circle"></i> Tambah Program Baru</h2>
        <a href="{{ route('admin.kelas-program.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="{{ route('admin.kelas-program.store') }}" method="POST" class="program-form">
        @csrf

        <div class="form-grid">
            
            <!-- Nama Program -->
            <div class="form-group full-width">
                <label for="nama">
                    <i class="fas fa-tag"></i> Nama Program
                    <span class="required">*</span>
                </label>
                <input type="text" id="nama" name="nama" class="form-control" 
                       value="{{ old('nama') }}" required placeholder="Contoh: Program Sains">
                @error('nama')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group full-width">
                <label for="deskripsi">
                    <i class="fas fa-align-left"></i> Deskripsi
                    <span class="required">*</span>
                </label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" 
                          required placeholder="Jelaskan program ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pilih Icon -->
            <div class="form-group">
                <label for="icon_class">
                    <i class="fas fa-icons"></i> Pilih Icon
                    <span class="required">*</span>
                </label>
                <div class="icon-selector">
                    @foreach($icons as $iconClass => $iconName)
                        <div class="icon-option">
                            <input type="radio" id="icon_{{ $iconClass }}" name="icon_class" 
                                   value="{{ $iconClass }}" {{ old('icon_class') == $iconClass ? 'checked' : '' }} required>
                            <label for="icon_{{ $iconClass }}">
                                <i class="fas {{ $iconClass }}"></i>
                                <span>{{ $iconName }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('icon_class')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pilih Warna -->
            <div class="form-group">
                <label for="warna">
                    <i class="fas fa-palette"></i> Pilih Warna
                    <span class="required">*</span>
                </label>
                <div class="color-selector">
                    @foreach($colors as $colorCode => $colorName)
                        <div class="color-option">
                            <input type="radio" id="color_{{ str_replace('#', '', $colorCode) }}" 
                                   name="warna" value="{{ $colorCode }}" 
                                   {{ old('warna') == $colorCode ? 'checked' : '' }} required>
                            <label for="color_{{ str_replace('#', '', $colorCode) }}" 
                                   style="background-color: {{ $colorCode }}">
                                <i class="fas fa-check"></i>
                                <span class="color-name">{{ $colorName }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('warna')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="form-group">
                <label for="kategori">
                    <i class="fas fa-list"></i> Kategori
                    <span class="required">*</span>
                </label>
                <select id="kategori" name="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="unggulan" {{ old('kategori') == 'unggulan' ? 'selected' : '' }}>Program Unggulan</option>
                    <option value="kelas" {{ old('kategori') == 'kelas' ? 'selected' : '' }}>Kelas Program</option>
                </select>
                @error('kategori')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Urutan -->
            <div class="form-group">
                <label for="urutan">
                    <i class="fas fa-sort-numeric-up"></i> Urutan Tampil
                    <span class="required">*</span>
                </label>
                <input type="number" id="urutan" name="urutan" class="form-control" 
                       value="{{ old('urutan', 0) }}" required min="0">
                <small class="form-text">Semakin kecil angka, semakin awal ditampilkan</small>
                @error('urutan')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Fitur-Fitur -->
            <div class="form-group full-width">
                <label>
                    <i class="fas fa-list-check"></i> Fitur-Fitur Program
                </label>
                <div id="fitur-container">
                    <div class="fitur-item">
                        <input type="text" name="fitur[]" class="form-control" placeholder="Contoh: Laboratorium lengkap">
                        <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <button type="button" class="btn-add-fitur" onclick="addFitur()">
                    <i class="fas fa-plus"></i> Tambah Fitur
                </button>
            </div>

            <!-- Status Aktif -->
            <div class="form-group full-width">
                <div class="form-check">
                    <input type="checkbox" id="is_active" name="is_active" class="form-check-input" 
                           {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">
                        <i class="fas fa-toggle-on"></i> Program Aktif (ditampilkan di website)
                    </label>
                </div>
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Simpan Program
            </button>
            <a href="{{ route('admin.kelas-program.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>

    </form>

</div>
@endsection

@section('js')
<script src="{{ asset('js/admin_kelas_program_form.js') }}"></script>
@endsection