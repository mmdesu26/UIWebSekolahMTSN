@extends('layouts.admin')

@section('title', 'Edit Fasilitas Sekolah')
@section('page-title', 'Edit Fasilitas Sekolah')

@section('css')
<style>
    .form-container {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        max-width: 900px;
        margin: 0 auto;
    }
    
    .form-header {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-bottom: 20px;
        margin-bottom: 30px;
        border-bottom: 2px solid #e0e0e0;
    }
    
    .form-header i {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2196f3, #1976d2);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .form-header h5 {
        margin: 0;
        color: #2196f3;
        font-weight: 700;
        font-size: 1.4rem;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        display: block;
    }
    
    .required {
        color: #f44336;
    }
    
    .form-control, .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #2196f3;
        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.1);
    }
    
    .icon-preview {
        margin-top: 10px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        text-align: center;
    }
    
    .icon-preview i {
        font-size: 3rem;
        color: #2196f3;
    }
    
    .icon-preview p {
        margin: 10px 0 0;
        color: #7f8c8d;
        font-size: 0.9rem;
    }
    
    .fitur-container {
        border: 2px dashed #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        background: #f8f9fa;
    }
    
    .fitur-item {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
        align-items: center;
    }
    
    .fitur-item:last-child {
        margin-bottom: 0;
    }
    
    .fitur-input {
        flex: 1;
    }
    
    .btn-remove-fitur {
        background: #f44336;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .btn-remove-fitur:hover {
        background: #d32f2f;
    }
    
    .btn-add-fitur {
        background: #2196f3;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 15px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }
    
    .btn-add-fitur:hover {
        background: #1976d2;
    }
    
    .form-check {
        padding: 15px;
        background: #e3f2fd;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .form-check-input {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    
    .form-check-label {
        font-weight: 600;
        color: #1565c0;
        cursor: pointer;
        margin: 0;
    }
    
    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #e0e0e0;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #2196f3, #1976d2);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
    }
    
    .btn-cancel {
        background: #6c757d;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }
    
    .btn-cancel:hover {
        background: #5a6268;
        color: white;
    }
    
    .help-text {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-top: 5px;
    }
    
    .icon-examples {
        margin-top: 10px;
        padding: 15px;
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }
    
    .icon-examples h6 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .icon-examples .icon-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .icon-example {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: #7f8c8d;
    }
    
    .icon-example i {
        font-size: 1.2rem;
        color: #2196f3;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn-submit, .btn-cancel {
            width: 100%;
            justify-content: center;
        }
        
        .icon-examples .icon-list {
            grid-template-columns: 1fr;
        }
    }
</style>
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