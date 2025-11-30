@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #2d6a4f 0%, #52b788 100%);
        padding: 30px;
        border-radius: 15px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(45, 106, 79, 0.3);
    }

    .page-header h2 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
    }

    .page-header p {
        margin: 10px 0 0 0;
        opacity: 0.95;
    }

    .btn-add {
        background: linear-gradient(135deg, #2d6a4f 0%, #52b788 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(45, 106, 79, 0.3);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(45, 106, 79, 0.4);
        color: white;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 25px;
    }

    .gallery-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(45, 106, 79, 0.2);
    }

    .gallery-card .img-wrapper {
        position: relative;
        overflow: hidden;
    }

    .gallery-card .img-wrapper::after {
        content: '🔍';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        font-size: 3rem;
        background: rgba(45, 106, 79, 0.9);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        opacity: 0;
    }

    .gallery-card:hover .img-wrapper::after {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }

    .gallery-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.1);
    }

    .gallery-card-body {
        padding: 20px;
    }

    .gallery-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .gallery-card-date {
        font-size: 0.9rem;
        color: #999;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .gallery-card-links {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link.youtube {
        background: #ff000015;
        color: #ff0000;
    }

    .social-link.instagram {
        background: #e4405f15;
        color: #e4405f;
    }

    .social-link:hover {
        transform: scale(1.05);
    }

    .gallery-card-actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        flex: 1;
        padding: 8px 15px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-edit {
        background: #ffc107;
        color: #333;
    }

    .btn-edit:hover {
        background: #ffb300;
        transform: scale(1.05);
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        animation: fadeIn 0.3s ease;
        overflow-y: auto;
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        animation: slideDown 0.3s ease;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .modal-header h3 {
        margin: 0;
        color: #333;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .modal-close {
        font-size: 28px;
        cursor: pointer;
        color: #999;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        color: #dc3545;
        transform: rotate(90deg);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-group label .optional {
        font-weight: 400;
        color: #999;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #52b788;
        box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.1);
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: -9999px;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 15px;
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .file-input-label:hover {
        background: #e9ecef;
        border-color: #52b788;
    }

    .file-name {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #666;
    }

    .img-preview {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 15px;
        display: none;
        border: 2px solid #e0e0e0;
    }

    .img-preview.show {
        display: block;
    }

    .btn-submit {
        background: linear-gradient(135deg, #2d6a4f 0%, #52b788 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(45, 106, 79, 0.4);
    }

    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 500;
        animation: slideDown 0.3s ease;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .page-header h2 {
            font-size: 1.5rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .modal-content {
            width: 95%;
            padding: 20px;
        }
    }
</style>

<div class="page-header">
    <h2>📸 Kelola Galeri</h2>
    <p>Kelola foto-foto kegiatan sekolah</p>
</div>

@if(session('success'))
<div class="alert alert-success">
    ✅ {{ session('success') }}
</div>
@endif

<div class="text-end mb-4">
    <button class="btn-add" onclick="openAddModal()">
        ➕ Tambah Foto Baru
    </button>
</div>

<div class="gallery-grid">
    @foreach($galeri as $item)
    <div class="gallery-card">
        <div class="img-wrapper">
            <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}">
        </div>
        <div class="gallery-card-body">
            <div class="gallery-card-title">{{ $item['judul'] }}</div>
            <div class="gallery-card-date">
                📅 {{ date('d F Y', strtotime($item['tanggal'])) }}
            </div>
            
            @if(isset($item['link_youtube']) || isset($item['link_instagram']))
            <div class="gallery-card-links">
                @if(isset($item['link_youtube']) && $item['link_youtube'])
                <a href="{{ $item['link_youtube'] }}" target="_blank" class="social-link youtube">
                    🎥 YouTube
                </a>
                @endif
                
                @if(isset($item['link_instagram']) && $item['link_instagram'])
                <a href="{{ $item['link_instagram'] }}" target="_blank" class="social-link instagram">
                    📷 Instagram
                </a>
                @endif
            </div>
            @endif
            
            <div class="gallery-card-actions">
                <button class="btn-action btn-edit" onclick='openEditModal(@json($item))'>
                    ✏️ Edit
                </button>
                <button class="btn-action btn-delete" onclick="confirmDelete({{ $item['id'] }})">
                    🗑️ Hapus
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Add -->
<div class="modal" id="addModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Tambah Foto Baru</h3>
            <span class="modal-close" onclick="closeModal('addModal')">&times;</span>
        </div>
        <form action="{{ route('admin.galeri.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul Foto</label>
                <input type="text" name="judul" required placeholder="Masukkan judul foto">
            </div>
            
            <div class="form-group">
                <label>Upload Gambar</label>
                <div class="file-input-wrapper">
                    <input type="file" name="gambar" id="addGambar" accept="image/*" required onchange="previewImage('addGambar', 'addPreview')">
                    <label for="addGambar" class="file-input-label">
                        📁 Pilih Gambar
                        <span style="font-size: 0.85rem; color: #999;">(Max: 2MB)</span>
                    </label>
                </div>
                <div class="file-name" id="addFileName"></div>
                <img id="addPreview" class="img-preview">
            </div>
            
            <div class="form-group">
                <label>Link YouTube <span class="optional">(Opsional)</span></label>
                <input type="url" name="link_youtube" placeholder="https://youtube.com/watch?v=...">
            </div>
            
            <div class="form-group">
                <label>Link Instagram <span class="optional">(Opsional)</span></label>
                <input type="url" name="link_instagram" placeholder="https://instagram.com/p/...">
            </div>
            
            <button type="submit" class="btn-submit">💾 Simpan Foto</button>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Foto</h3>
            <span class="modal-close" onclick="closeModal('editModal')">&times;</span>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul Foto</label>
                <input type="text" name="judul" id="editJudul" required>
            </div>
            
            <div class="form-group">
                <label>Upload Gambar Baru <span class="optional">(Opsional - Kosongkan jika tidak ingin mengubah)</span></label>
                <div class="file-input-wrapper">
                    <input type="file" name="gambar" id="editGambar" accept="image/*" onchange="previewImage('editGambar', 'editPreview')">
                    <label for="editGambar" class="file-input-label">
                        📁 Pilih Gambar Baru
                        <span style="font-size: 0.85rem; color: #999;">(Max: 2MB)</span>
                    </label>
                </div>
                <div class="file-name" id="editFileName"></div>
                <img id="editPreview" class="img-preview">
            </div>
            
            <div class="form-group">
                <label>Link YouTube <span class="optional">(Opsional)</span></label>
                <input type="url" name="link_youtube" id="editYoutube" placeholder="https://youtube.com/watch?v=...">
            </div>
            
            <div class="form-group">
                <label>Link Instagram <span class="optional">(Opsional)</span></label>
                <input type="url" name="link_instagram" id="editInstagram" placeholder="https://instagram.com/p/...">
            </div>
            
            <button type="submit" class="btn-submit">💾 Update Foto</button>
        </form>
    </div>
</div>

<!-- Form Delete (Hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
</form>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function openEditModal(item) {
        document.getElementById('editJudul').value = item.judul;
        document.getElementById('editYoutube').value = item.link_youtube || '';
        document.getElementById('editInstagram').value = item.link_instagram || '';
        
        // Show current image
        if (item.gambar) {
            document.getElementById('editPreview').src = item.gambar;
            document.getElementById('editPreview').classList.add('show');
        }
        
        document.getElementById('editForm').action = `/admin/galeri/update/${item.id}`;
        document.getElementById('editModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Reset forms
        if (modalId === 'addModal') {
            document.querySelector('#addModal form').reset();
            document.getElementById('addPreview').classList.remove('show');
            document.getElementById('addFileName').textContent = '';
        } else if (modalId === 'editModal') {
            document.getElementById('editPreview').classList.remove('show');
            document.getElementById('editFileName').textContent = '';
        }
    }

    function previewImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const fileNameDisplay = document.getElementById(inputId.replace('Gambar', 'FileName'));
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.add('show');
            }
            
            reader.readAsDataURL(input.files[0]);
            
            // Show file name
            if (fileNameDisplay) {
                fileNameDisplay.textContent = '📄 ' + input.files[0].name;
            }
        } else {
            preview.classList.remove('show');
            if (fileNameDisplay) {
                fileNameDisplay.textContent = '';
            }
        }
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/galeri/delete/${id}`;
            form.submit();
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            const modalId = event.target.id;
            closeModal(modalId);
        }
    }

    // Auto hide alert after 5 seconds
    setTimeout(function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.animation = 'fadeOut 0.5s ease';
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);
</script>

<style>
@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}
</style>
@endsection