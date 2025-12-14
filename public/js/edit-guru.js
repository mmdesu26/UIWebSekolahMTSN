// edit-guru.js

document.addEventListener('DOMContentLoaded', function() {
    // Preview foto baru saat dipilih
    const fotoInput = document.getElementById('fotoInput');
    const newPhotoPreview = document.getElementById('newPhotoPreview');
    const newPhoto = document.getElementById('newPhoto');

    if (fotoInput) {
        fotoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak valid! Hanya JPG, PNG, atau GIF yang diperbolehkan.');
                    fotoInput.value = '';
                    newPhotoPreview.style.display = 'none';
                    return;
                }

                // Validasi ukuran file (maksimal 2MB)
                if (file.size > 2097152) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    fotoInput.value = '';
                    newPhotoPreview.style.display = 'none';
                    return;
                }

                // Preview gambar
                const reader = new FileReader();
                reader.onload = function(e) {
                    newPhoto.src = e.target.result;
                    newPhotoPreview.style.display = 'block';
                    
                    // Scroll ke preview
                    newPhotoPreview.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                };
                reader.readAsDataURL(file);
            } else {
                newPhotoPreview.style.display = 'none';
            }
        });
    }

    // Form submit loading state
    const editGuruForm = document.getElementById('editGuruForm');
    if (editGuruForm) {
        editGuruForm.addEventListener('submit', function(e) {
            const submitBtn = editGuruForm.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
    }
});