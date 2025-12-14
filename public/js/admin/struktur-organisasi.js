// struktur-organisasi.js

document.addEventListener('DOMContentLoaded', function() {
    // ========== UPLOAD GAMBAR STRUKTUR ==========
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');
    const uploadBtn = document.getElementById('uploadBtn');

    if (fileInput) {
        // File Input Change
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validasi ukuran file (5MB = 5242880 bytes)
                if (file.size > 5242880) {
                    alert('Ukuran file terlalu besar! Maksimal 5MB.');
                    fileInput.value = '';
                    return;
                }

                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak valid! Hanya JPG, PNG, GIF, atau SVG yang diperbolehkan.');
                    fileInput.value = '';
                    return;
                }

                // Preview gambar
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    filePreview.style.display = 'block';
                    uploadBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if (uploadArea) {
        // Drag & Drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                fileInput.dispatchEvent(new Event('change'));
            }
        });
    }

    // Form Submit Loading
    const uploadFormElement = document.getElementById('uploadFormElement');
    if (uploadFormElement) {
        uploadFormElement.addEventListener('submit', function() {
            uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
            uploadBtn.disabled = true;
        });
    }

    // ========== FORM GURU ==========
    const guruForm = document.querySelector('.guru-form');
    if (guruForm) {
        guruForm.addEventListener('submit', function(e) {
            const submitBtn = guruForm.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
    }

    // ========== SWEET ALERT UNTUK DELETE ==========
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let title = 'Yakin ingin menghapus data ini?';
            let text = 'Data yang dihapus tidak dapat dikembalikan!';

            if (form.action.includes('guru')) {
                title = 'Yakin hapus data guru ini?';
            } else if (form.action.includes('struktur')) {
                title = 'Yakin hapus gambar struktur organisasi?';
            }

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});