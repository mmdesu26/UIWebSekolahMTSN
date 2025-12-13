// ==================== SIDEBAR TOGGLE FUNCTIONS ====================
function toggleSidebar() {
    document.body.classList.toggle('sidebar-open');
}

function closeSidebar() {
    document.body.classList.remove('sidebar-open');
}


// ==================== INITIALIZATION ====================
document.addEventListener('DOMContentLoaded', function () {
    const prefersReducedMotion =
        window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;


    // ==================== GET ELEMENTS ====================
    const sidebar   = document.querySelector('.sidebar');
    const navbar    = document.querySelector('.navbar-custom');
    const overlay   = document.querySelector('.sidebar-overlay');
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const closeBtn  = document.querySelector('.sidebar-close');


    // ==================== VALIDATION ====================
    if (!sidebar || !navbar || !overlay || !toggleBtn || !closeBtn) {
        console.error('Required elements not found');
        return;
    }


    // ==================== SIDEBAR FUNCTIONS ====================
    const openSidebar = () => {
        document.body.classList.add('sidebar-open');
        toggleBtn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };

    const closeSidebarFunc = () => {
        document.body.classList.remove('sidebar-open');
        toggleBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    const toggleSidebarFunc = () => {
        document.body.classList.contains('sidebar-open')
            ? closeSidebarFunc()
            : openSidebar();
    };


    // ==================== EVENT LISTENERS ====================
    toggleBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggleSidebarFunc();
    });

    closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        closeSidebarFunc();
    });

    overlay.addEventListener('click', (e) => {
        e.preventDefault();
        closeSidebarFunc();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && document.body.classList.contains('sidebar-open')) {
            closeSidebarFunc();
        }
    });


    // ==================== AUTO CLOSE ON NAV CLICK ====================
    sidebar.querySelectorAll('nav a').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 1024) {
                closeSidebarFunc();
            }
        });
    });


    // ==================== WINDOW RESIZE ====================
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 1024) {
                closeSidebarFunc();
            }
        }, 250);
    });


    // ==================== INITIAL MOBILE STATE ====================
    if (window.innerWidth <= 1024) {
        closeSidebarFunc();
    }


    // ==================== STAGGER ANIMATION ====================
    if (!prefersReducedMotion) {
        document.querySelectorAll('.sidebar nav a').forEach((link, index) => {
            link.style.animationDelay = `${0.1 + index * 0.05}s`;
        });
    }


    // ==================== AUTO-DISMISS ALERT ====================
    document.querySelectorAll('.alert').forEach((alert) => {
        setTimeout(() => {
            if (alert?.parentElement) {
                alert.classList.add('fade');
                alert.classList.remove('show');

                setTimeout(() => {
                    alert?.remove();
                }, 150);
            }
        }, 5000);
    });


    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^=\"#\"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        });
    });


    // ==================== BUTTON TAP FEEDBACK ====================
    if (!prefersReducedMotion) {
        toggleBtn.addEventListener('pointerdown', () =>
            toggleBtn.classList.add('is-pressed')
        );
        toggleBtn.addEventListener('pointerup', () =>
            toggleBtn.classList.remove('is-pressed')
        );
        toggleBtn.addEventListener('pointerleave', () =>
            toggleBtn.classList.remove('is-pressed')
        );
    }


    // ==================== ACCESSIBILITY (FOCUS TRAP) ====================
    const focusableElements = sidebar.querySelectorAll(
        'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex=\"-1\"])'
    );

    if (focusableElements.length) {
        const firstFocusable = focusableElements[0];
        const lastFocusable  = focusableElements[focusableElements.length - 1];

        sidebar.addEventListener('keydown', (e) => {
            if (!document.body.classList.contains('sidebar-open')) return;

            if (e.key === 'Tab') {
                if (e.shiftKey && document.activeElement === firstFocusable) {
                    e.preventDefault();
                    lastFocusable.focus();
                } else if (!e.shiftKey && document.activeElement === lastFocusable) {
                    e.preventDefault();
                    firstFocusable.focus();
                }
            }
        });
    }


    // ==================== TOUCH INTERACTION ====================
    let touchStartX = 0;
    let touchStartY = 0;

    sidebar.addEventListener(
        'touchstart',
        (e) => {
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
        },
        { passive: true }
    );

    sidebar.addEventListener(
        'touchend',
        (e) => {
            if (!document.body.classList.contains('sidebar-open')) return;

            const deltaX = e.changedTouches[0].clientX - touchStartX;
            const deltaY = Math.abs(e.changedTouches[0].clientY - touchStartY);

            if (deltaX < -50 && deltaY < 50) {
                closeSidebarFunc();
            }
        },
        { passive: true }
    );


    // ==================== PERFORMANCE ====================
    toggleBtn.addEventListener('mouseenter', () => {
        if (!prefersReducedMotion) {
            toggleBtn.style.willChange = 'transform';
        }
    });

    toggleBtn.addEventListener('mouseleave', () => {
        toggleBtn.style.willChange = 'auto';
    });


    // ==================== CONSOLE LOG ====================
    console.log('%c✨ Admin Panel Ready!', 'color:#667eea;font-size:16px;font-weight:bold;');
    console.log('%cResponsive sidebar initialized', 'color:#764ba2;font-size:12px;');
    console.log(`%cScreen width: ${window.innerWidth}px`, 'color:#667eea;font-size:11px;');
});


// ==================== UTILITY FUNCTIONS ====================
function debounce(func, wait) {
    let timeout;

    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

function throttle(func, limit) {
    let inThrottle;

    return function (...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
}


// ==================== DYNAMIC STYLE ====================
if (!document.getElementById('admin-dynamic-styles')) {
    const style = document.createElement('style');
    style.id = 'admin-dynamic-styles';
    style.textContent = `
        .sidebar-toggle.is-pressed {
            transform: scale(0.95) !important;
        }
    `;
    document.head.appendChild(style);
}


// ==================== SUBMENU TOGGLE ====================
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.menu-toggle').forEach((toggle) => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();

            const parent  = toggle.closest('.menu-parent');
            const submenu = parent.querySelector('.submenu');

            parent.classList.toggle('open');
            submenu.classList.toggle('show');
        });
    });
});
