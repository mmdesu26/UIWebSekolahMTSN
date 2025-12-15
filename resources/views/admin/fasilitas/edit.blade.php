@extends('layouts.admin')

@section('title', 'Edit Fasilitas Sekolah')
@section('page-title', 'Edit Fasilitas Sekolah')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_fasilitas.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="form-container">
        
        <div class="form-header">
            <i class="fas fa-edit"></i>
            <h5>Edit Fasilitas: {{ $fasilitas->nama }}</h5>
        </div>

        <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Fasilitas -->
            <div class="form-group">
                <label class="form-label">Nama Fasilitas <span class="required">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                       value="{{ old('nama', $fasilitas->nama) }}" placeholder="Contoh: Laboratorium Komputer" required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="form-group">
                <label class="form-label">Kategori <span class="required">*</span></label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="utama" {{ old('kategori', $fasilitas->kategori) == 'utama' ? 'selected' : '' }}>Fasilitas Utama</option>
                    <option value="pendukung" {{ old('kategori', $fasilitas->kategori) == 'pendukung' ? 'selected' : '' }}>Fasilitas Pendukung</option>
                </select>
                <div class="help-text">Utama: Fasilitas dengan deskripsi lengkap. Pendukung: Fasilitas dengan deskripsi singkat</div>
                @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label class="form-label">Deskripsi <span class="required">*</span></label>
                <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" 
                          placeholder="Jelaskan fasilitas ini secara detail..." required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Icon -->
            <div class="form-group">
                <label class="form-label">Icon (FontAwesome) <span class="required">*</span></label>
                <input type="text" name="icon" id="iconInput" class="form-control @error('icon') is-invalid @enderror" 
                       value="{{ old('icon', $fasilitas->icon) }}" placeholder="Contoh: fas fa-laptop" required>
                <div class="help-text">Gunakan class FontAwesome. Lihat: <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com/icons</a></div>
                @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                <!-- Icon Preview -->
                <div class="icon-preview" id="iconPreview">
                    <i id="iconDisplay" class="{{ $fasilitas->icon }}"></i>
                    <p>Preview Icon</p>
                </div>

                <!-- Icon Examples -->
                <div class="icon-examples">
                    <h6>Contoh Icon Populer:</h6>
                    <div class="icon-list">
                        <div class="icon-example"><i class="fas fa-laptop"></i> fas fa-laptop</div>
                        <div class="icon-example"><i class="fas fa-book"></i> fas fa-book</div>
                        <div class="icon-example"><i class="fas fa-mosque"></i> fas fa-mosque</div>
                        <div class="icon-example"><i class="fas fa-flask"></i> fas fa-flask</div>
                        <div class="icon-example"><i class="fas fa-futbol"></i> fas fa-futbol</div>
                        <div class="icon-example"><i class="fas fa-wifi"></i> fas fa-wifi</div>
                        <div class="icon-example"><i class="fas fa-parking"></i> fas fa-parking</div>
                        <div class="icon-example"><i class="fas fa-clinic-medical"></i> fas fa-clinic-medical</div>
                    </div>
                </div>
            </div>

            <!-- Fitur -->
            <div class="form-group">
                <label class="form-label">Fitur-Fitur (Opsional untuk Fasilitas Utama)</label>
                <div class="fitur-container">
                    <div id="fiturWrapper">
                        @if($fasilitas->fitur && count($fasilitas->fitur) > 0)
                            @foreach($fasilitas->fitur as $fitur)
                            <div class="fitur-item">
                                <input type="text" name="fitur[]" class="form-control fitur-input" 
                                       placeholder="Contoh: AC & Ventilasi Baik" value="{{ $fitur }}">
                                <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endforeach
                        @else
                            <div class="fitur-item">
                                <input type="text" name="fitur[]" class="form-control fitur-input" 
                                       placeholder="Contoh: AC & Ventilasi Baik">
                                <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn-add-fitur" onclick="addFitur()">
                        <i class="fas fa-plus"></i> Tambah Fitur
                    </button>
                </div>
                <div class="help-text">Tambahkan fitur-fitur yang dimiliki fasilitas ini (contoh: AC, Internet Stabil, dll)</div>
            </div>

            <!-- Urutan -->
            <div class="form-group">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" 
                       value="{{ old('urutan', $fasilitas->urutan) }}" min="0">
                <div class="help-text">Semakin kecil angka, semakin atas posisi tampilnya</div>
                @error('urutan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status Aktif -->
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" 
                           value="1" {{ old('is_active', $fasilitas->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        <i class="fas fa-check-circle"></i> Aktifkan Fasilitas Ini
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('admin.fasilitas.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Update Fasilitas
                </button>
            </div>

        </form>

    </div>
</div>
@endsection

@section('js')
<script>
// Icon Preview
document.getElementById('iconInput').addEventListener('input', function() {
    const iconClass = this.value.trim();
    const iconDisplay = document.getElementById('iconDisplay');
    
    if (iconClass) {
        iconDisplay.className = iconClass;
    }
});

// Add Fitur
function addFitur() {
    const wrapper = document.getElementById('fiturWrapper');
    const newItem = document.createElement('div');
    newItem.className = 'fitur-item';
    newItem.innerHTML = `
        <input type="text" name="fitur[]" class="form-control fitur-input" placeholder="Contoh: AC & Ventilasi Baik">
        <button type="button" class="btn-remove-fitur" onclick="removeFitur(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    wrapper.appendChild(newItem);
}

// Remove Fitur
function removeFitur(button) {
    const wrapper = document.getElementById('fiturWrapper');
    if (wrapper.children.length > 1) {
        button.closest('.fitur-item').remove();
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: 'Minimal harus ada satu input fitur!'
        });
    }
}
</script>
@endsection