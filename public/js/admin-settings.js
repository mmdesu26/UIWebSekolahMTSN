document.addEventListener('DOMContentLoaded', function () {
    // ===== SMOOTH PAGE LOAD =====
    const settingsCard = document.querySelector('.settings-card');
    if (settingsCard) {
        settingsCard.style.animationDelay = '0.1s';
    }

    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${index * 0.05}s`;
    });

    // ===== FORM VALIDATION WITH FEEDBACK =====
    const form = document.querySelector('form[action*="settings.update"]');
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
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.pointerEvents = 'none';
            ripple.style.animation = 'rippleEffect 0.6s ease-out';

            this.style.position = 'relative';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // ===== INPUT FOCUS ANIMATION =====
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            const parent = this.closest('.form-group');
            if (parent) {
                parent.style.transform = 'scale(1.01)';
                parent.style.transformOrigin = 'center';
            }
        });
        input.addEventListener('blur', function () {
            const parent = this.closest('.form-group');
            if (parent) {
                parent.style.transform = 'scale(1)';
            }
        });
    });

    // ===== FILE INPUT CUSTOM BEHAVIOR =====
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(fileInput => {
        const wrapper = fileInput.closest('.file-input-wrapper');
        if (wrapper) {
            fileInput.addEventListener('change', function (e) {
                const file = this.files[0];
                if (file) {
                    const hint = wrapper.querySelector('.file-input-hint');
                    if (hint) {
                        hint.innerHTML = `<i class="fas fa-check-circle"></i> ${file.name}`;
                        hint.style.color = '#48bb78';
                    }
                }
            });

            fileInput.addEventListener('dragover', function (e) {
                e.preventDefault();
                wrapper.style.opacity = '0.8';
            });

            fileInput.addEventListener('dragleave', function () {
                wrapper.style.opacity = '1';
            });

            fileInput.addEventListener('drop', function (e) {
                e.preventDefault();
                wrapper.style.opacity = '1';
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    this.files = files;
                    const event = new Event('change', { bubbles: true });
                    this.dispatchEvent(event);
                }
            });
        }
    });

    // ===== SECTION SCROLL ANIMATION =====
    const sections = document.querySelectorAll('.settings-section');
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        section.style.opacity = '0.8';
        section.style.transform = 'translateY(10px)';
        observer.observe(section);
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

    // ===== FORM RESET ANIMATION =====
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('reset', function () {
            this.style.animation = 'fadeIn 0.4s ease-out';
            setTimeout(() => {
                this.style.animation = '';
            }, 400);
        });
    });

    // ===== KEYBOARD SHORTCUTS =====
    document.addEventListener('keydown', function (e) {
        // Ctrl+Enter untuk submit form
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            const form = document.querySelector('form[action*="settings.update"]');
            if (form) {
                form.submit();
            }
        }
    });

    // ===== SCROLL TO TOP ON VALID ERROR =====
    const invalidInputs = document.querySelectorAll('.form-control.is-invalid');
    if (invalidInputs.length > 0) {
        invalidInputs[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        invalidInputs[0].focus();
    }

    console.log('Settings Dashboard - Siap!');
});

// ===== ANIMATION KEYFRAMES =====
const style = document.createElement('style');
style.innerHTML = `
    @keyframes rippleEffect {
        0% {
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            width: 300px;
            height: 300px;
            opacity: 0;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    @media (max-width: 768px) {
        @keyframes slideInRight {
            from {
                transform: translateX(300px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(300px);
                opacity: 0;
            }
        }
    }
`;
document.head.appendChild(style);