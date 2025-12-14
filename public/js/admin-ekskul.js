document.addEventListener('DOMContentLoaded', function () {
    // ===== SMOOTH PAGE LOAD =====
    const cards = document.querySelectorAll('.form-card, .table-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // ===== EDIT BUTTON FUNCTIONALITY =====
    const editButtons = document.querySelectorAll('.edit-btn');
    const mainForm = document.getElementById('mainForm');
    const formTitle = document.getElementById('formTitle');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const cancelBtn = document.getElementById('cancelBtn');
    const formCard = document.getElementById('formCard');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const name = this.dataset.name;
            const jadwal = this.dataset.jadwal;
            const pembina = this.dataset.pembina;
            const prestasi = this.dataset.prestasi;

            // Update form action
            mainForm.action = mainForm.action.replace('/add', `/update/${id}`);

            // Set edit mode
            document.getElementById('editMode').value = '1';

            // Isi form
            document.getElementById('nameInput').value = name;
            document.getElementById('jadwalInput').value = jadwal;
            document.getElementById('pembinaInput').value = pembina;
            document.getElementById('prestasiTextarea').value = prestasi;

            // Update UI
            formTitle.innerHTML = '<i class="fas fa-edit"></i> Edit Ekstrakurikuler';
            submitText.textContent = 'Update';
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-success');
            cancelBtn.style.display = 'inline-block';

            // Scroll & highlight
            formCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            formCard.style.boxShadow = '0 0 30px rgba(102, 126, 234, 0.3)';
            setTimeout(() => {
                formCard.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
            }, 2000);

            setTimeout(() => document.getElementById('nameInput').focus(), 500);
        });
    });

    // ===== CANCEL BUTTON =====
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            mainForm.reset();
            mainForm.action = mainForm.action.replace(/\/update\/\d+/, '/add');
            document.getElementById('editMode').value = '0';

            formTitle.innerHTML = '<i class="fas fa-plus-circle"></i> Tambah Ekstrakurikuler Baru';
            submitText.textContent = 'Simpan';
            submitBtn.classList.remove('btn-success');
            submitBtn.classList.add('btn-primary');
            cancelBtn.style.display = 'none';

            showNotification('Mode edit dibatalkan', 'info');
        });
    }

    // ===== FORM VALIDATION =====
    const form = document.querySelector('form[action*="ekstra"]');
    if (form) {
        form.addEventListener('submit', function (e) {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                    input.addEventListener('input', function () {
                        this.classList.remove('is-invalid');
                    });
                }
            });

            if (!isValid) {
                e.preventDefault();
                showNotification('Harap isi semua field yang diperlukan', 'warning');
            }
        });
    }

    // ===== BUTTON RIPPLE EFFECT =====
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // ===== DELETE CONFIRMATION =====
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil teks dari tombol atau konteks sekitar (opsional, untuk pesan dinamis)
        const button = form.querySelector('button[type="submit"]');
        let title = 'Yakin ingin menghapus data ini?';
        
        // Deteksi berdasarkan route atau tambahkan data-attribute jika perlu
        if (form.action.includes('prestasi')) {
            title = 'Yakin hapus prestasi ini?';
        } else if (form.action.includes('ekstra')) {
            title = 'Yakin hapus ekstrakurikuler ini?';
        }

        Swal.fire({
            title: title,
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

    // ===== TABLE ROW HOVER =====
    const tableRows = document.querySelectorAll('.table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.01)';
        });
        row.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
        });
    });

    // ===== INPUT FOCUS ANIMATION =====
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transformOrigin = 'center';
        });
        input.addEventListener('blur', function () {
            this.parentElement.style.transform = 'scale(1)';
        });
    });

    // ===== NOTIFICATION FUNCTION =====
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideInRight 0.4s ease-out;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            min-width: 300px;
        `;
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.4s ease-out';
            setTimeout(() => notification.remove(), 400);
        }, 4000);
    }

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            const activeForm = document.activeElement.closest('form');
            if (activeForm && !activeForm.classList.contains('delete-form')) {
                activeForm.submit();
            }
        }
        
        if (e.key === 'Escape' && cancelBtn.style.display !== 'none') {
            cancelBtn.click();
        }
    });

    console.log('Admin Ekstrakurikuler Dashboard - Siap!');
});