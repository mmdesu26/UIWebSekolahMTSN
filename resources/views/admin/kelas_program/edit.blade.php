@extends('layouts.admin')

@section('title', 'Edit Kelas Program')
@section('page-title', 'Edit Kelas Program')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kelas_program_form.css') }}">
@endsection

@section('content')
<div class="form-container">
    
    <div class="form-header">
        <h2><i class="fas fa-edit"></i> Edit Program: {{ $program->nama }}</h2>
    </div>

    <form action="{{ route('admin.kelas-program.update', $program->id) }}" method="POST" class="program-form">
        @csrf
        @method('PUT')

        <div class="form-grid">
            
            <!-- Nama Program -->
            <div class="form-group full-width">
                <label for="nama">
                    <i class="fas fa-tag"></i> Nama Program
                    <span class="required">*</span>
                </label>
                <input type="text" id="nama" name="nama" class="form-control" 
                       value="{{ old('nama', $program->nama) }}" required>
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
                          required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
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
                                   value="{{ $iconClass }}" 
                                   {{ old('icon_class', $program->icon_class) == $iconClass ? 'checked' : '' }} required>
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
                                   {{ old('warna', $program->warna) == $colorCode ? 'checked' : '' }} required>
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
                    <option value="unggulan" {{ old('kategori', $program->kategori) == 'unggulan' ? 'selected' : '' }}>Program Unggulan</option>
                    <option value="kelas" {{ old('kategori', $program->kategori) == 'kelas' ? 'selected' : '' }}>Kelas Program</option>
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
                       value="{{ old('urutan', $program->urutan) }}" required min="0">
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
                    @if(old('fitur'))
                        @foreach(old('fitur') as $fitur)
                            <div class="fitur-item">
                                <input type="text" name="fitur[]" class="form-control" value="{{ $fitur }}">
                                <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @elseif($program->fitur && is_array($program->fitur))
                        @foreach($program->fitur as $fitur)
                            <div class="fitur-item">
                                <input type="text" name="fitur[]" class="form-control" value="{{ $fitur }}">
                                <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="fitur-item">
                            <input type="text" name="fitur[]" class="form-control" placeholder="Contoh: Laboratorium lengkap">
                            <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)" style="display: none;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn-add-fitur" onclick="addFitur()">
                    <i class="fas fa-plus"></i> Tambah Fitur
                </button>
            </div>

            <!-- Status Aktif -->
            <div class="form-group full-width">
                <div class="form-check">
                    <input type="checkbox" id="is_active" name="is_active" class="form-check-input" 
                           {{ old('is_active', $program->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">
                        <i class="fas fa-toggle-on"></i> Program Aktif (ditampilkan di website)
                    </label>
                </div>
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Update Program
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