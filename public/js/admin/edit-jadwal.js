document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('formEditJadwal');
    if (form) {
        form.addEventListener('submit', function(e) {
            const jamMulai = document.querySelector('input[name="jam_mulai"]').value;
            const jamSelesai = document.querySelector('input[name="jam_selesai"]').value;

            // Validate time
            if (jamMulai && jamSelesai && jamMulai >= jamSelesai) {
                e.preventDefault();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Waktu Tidak Valid',
                    text: 'Jam selesai harus lebih besar dari jam mulai!',
                    confirmButtonColor: '#667eea'
                });
            }
        });
    }

    // Auto-focus first input
    const firstInput = document.querySelector('.form-select');
    if (firstInput) {
        firstInput.focus();
    }
});