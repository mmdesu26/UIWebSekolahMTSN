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
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 5px;
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
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        animation: slideDown 0.3s ease;
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

    .img-preview {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 15px;
        display: none;
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
        <form action="{{ route('admin.galeri.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul Foto</label>
                <input type="text" name="judul" required placeholder="Masukkan judul foto">
            </div>
            <div class="form-group">
                <label>URL Gambar</label>
                <input type="url" name="gambar" id="addGambar" required placeholder="https://example.com/image.jpg" onchange="previewImage('addGambar', 'addPreview')">
                <img id="addPreview" class="img-preview">
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
        <form id="editForm" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul Foto</label>
                <input type="text" name="judul" id="editJudul" required>
            </div>
            <div class="form-group">
                <label>URL Gambar</label>
                <input type="url" name="gambar" id="editGambar" required onchange="previewImage('editGambar', 'editPreview')">
                <img id="editPreview" class="img-preview">
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
        document.getElementById('editGambar').value = item.gambar;
        document.getElementById('editPreview').src = item.gambar;
        document.getElementById('editPreview').classList.add('show');
        document.getElementById('editForm').action = `/admin/galeri/update/${item.id}`;
        document.getElementById('editModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function previewImage(inputId, previewId) {
        const url = document.getElementById(inputId).value;
        const preview = document.getElementById(previewId);
        
        if (url) {
            preview.src = url;
            preview.classList.add('show');
        } else {
            preview.classList.remove('show');
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
            event.target.classList.remove('active');
            document.body.style.overflow = 'auto';
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
@endsection