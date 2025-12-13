document.addEventListener('DOMContentLoaded', function () {
    // ===== SMOOTH PAGE LOAD =====
    const cards = document.querySelectorAll('.form-card, .table-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // ===== FORM VALIDATION WITH FEEDBACK =====
    const form = document.querySelector('form[action*="ekstra.add"]');
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

    // ===== EDIT MODAL ANIMATION =====
    const editButtons = document.querySelectorAll('button[data-bs-toggle="modal"]');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-bs-target');
            const modal = document.querySelector(targetId);
            if (modal) {
                modal.querySelector('.modal-dialog').style.animation = 'slideDown 0.4s ease-out';
            }
        });
    });

    // ===== DELETE CONFIRMATION WITH ANIMATION =====
    const deleteForms = document.querySelectorAll('form[action*="ekstra.delete"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (confirm('Yakin ingin menghapus?')) {
                this.submit();
            }
        });
    });

    // ===== TABLE ROW HOVER EFFECT =====
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

    // ===== CSRF TOKEN AUTO-INCLUDE =====
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        const token = document.querySelector('input[name="_token"]');
        if (token) {
            console.log('CSRF Token tersedia');
        }
    }

    // ===== EMPTY STATE ANIMATION =====
    const emptyState = document.querySelector('.text-center.py-5');
    if (emptyState) {
        const icon = emptyState.querySelector('i');
        if (icon) {
            icon.style.animation = 'float 3s ease-in-out infinite';
        }
    }

    // ===== RESPONSIVE TABLE HANDLING =====
    function handleTableResponsiveness() {
        const table = document.querySelector('.table');
        const container = document.querySelector('.table-responsive');

        if (window.innerWidth <= 768 && table) {
            container.style.overflowX = 'auto';
        }
    }

    handleTableResponsiveness();
    window.addEventListener('resize', handleTableResponsiveness);

    // ===== FORM RESET ANIMATION =====
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('reset', function () {
            this.style.animation = 'fadeIn 0.4s ease-out';
        });
    });

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function (e) {
        // Ctrl+Enter untuk submit form
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            const activeForm = document.activeElement.closest('form');
            if (activeForm) {
                activeForm.submit();
            }
        }
    });

    console.log('Admin Ekstrakurikuler Dashboard - Siap!');
});