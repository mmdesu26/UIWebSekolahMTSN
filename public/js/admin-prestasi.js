document.addEventListener('DOMContentLoaded', function () {
    // ===== IMAGE PREVIEW FUNCTIONALITY =====
    const gambarInput = document.getElementById('gambarInput');
    if (gambarInput) {
        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('gambarPreview');
            const previewImg = document.getElementById('previewGambar');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                    preview.style.animation = 'fadeIn 0.4s ease-out';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    }

    console.log('Admin Prestasi Dashboard - Siap!');
});