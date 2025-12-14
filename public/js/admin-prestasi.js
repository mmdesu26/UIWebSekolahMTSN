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
document.addEventListener('DOMContentLoaded', function () {
    const gambarInput = document.getElementById('gambarInput');
    if (gambarInput) {
        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('gambarPreview');
            const img = document.getElementById('previewGambar');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    }
});

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin hapus prestasi ini?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
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
