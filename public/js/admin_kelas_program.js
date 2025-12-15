// Admin Kelas Program JavaScript

// Confirm Delete Function
function confirmDelete(id, nama) {
    Swal.fire({
        title: 'Hapus Program?',
        html: `Apakah Anda yakin ingin menghapus program:<br><strong>${nama}</strong>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('delete-form');
            form.action = `/admin/kelas-program/${id}`;
            form.submit();
        }
    });
}

// Auto hide alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 5000);
    });
});