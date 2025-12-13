// ==================== SIDEBAR TOGGLE FUNCTIONS ====================
function toggleSidebar() {
    document.body.classList.toggle('sidebar-open');
}

function closeSidebar() {
    document.body.classList.remove('sidebar-open');
}

// ==================== INITIALIZATION ====================
document.addEventListener('DOMContentLoaded', function () {
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ==================== GET ELEMENTS (Don't create new ones) ====================
    const sidebar = document.querySelector('.sidebar');
    const navbar = document.querySelector('.navbar-custom');
    const overlay = document.querySelector('.sidebar-overlay');
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const closeBtn = document.querySelector('.sidebar-close');

    // Check if all elements exist
    if (!sidebar || !navbar || !overlay || !toggleBtn || !closeBtn) {
        console.error('Required elements not found');
        return;
    }

    // ==================== SIDEBAR FUNCTIONS ====================
    const openSidebar = () => {
        document.body.classList.add('sidebar-open');
        toggleBtn.setAttribute('aria-expanded', 'true');
        // Prevent background scroll on mobile
        document.body.style.overflow = 'hidden';
    };

    const closeSidebarFunc = () => {
        document.body.classList.remove('sidebar-open');
        toggleBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    const toggleSidebarFunc = () => {
        if (document.body.classList.contains('sidebar-open')) {
            closeSidebarFunc();
        } else {
            openSidebar();
        }
    };

    // ==================== EVENT LISTENERS ====================
    // Toggle button click
    toggleBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggleSidebarFunc();
    });

    // Close button click
    closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        closeSidebarFunc();
    });

    // Overlay click
    overlay.addEventListener('click', (e) => {
        e.preventDefault();
        closeSidebarFunc();
    });

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && document.body.classList.contains('sidebar-open')) {
            closeSidebarFunc();
        }
    });

    // Close sidebar when clicking a nav link on mobile/tablet
    sidebar.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', () => {
            // Only close if on mobile/tablet (screen width <= 1024px)
            if (window.innerWidth <= 1024) {
                closeSidebarFunc();
            }
        });
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Close sidebar if window is resized to desktop size
            if (window.innerWidth > 1024) {
                closeSidebarFunc();
            }
        }, 250);
    });

    // ==================== ENSURE SIDEBAR IS CLOSED ON MOBILE LOAD ====================
    if (window.innerWidth <= 1024) {
        closeSidebarFunc();
    }

    // ==================== STAGGER ANIMATION FOR NAV LINKS ====================
    if (!prefersReducedMotion) {
        const navLinks = document.querySelectorAll('.sidebar nav a');
        navLinks.forEach((link, index) => {
            link.style.animationDelay = `${0.1 + (index * 0.05)}s`;
        });
    }

    // ==================== AUTO-DISMISS ALERTS ====================
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            if (alert && alert.parentElement) {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => {
                    if (alert.parentElement) {
                        alert.remove();
                    }
                }, 150);
            }
        }, 5000);
    });

    // ==================== SMOOTH SCROLL FOR ANCHORS ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ==================== BUTTON TAP FEEDBACK ====================
    if (!prefersReducedMotion) {
        toggleBtn.addEventListener('pointerdown', () => toggleBtn.classList.add('is-pressed'));
        toggleBtn.addEventListener('pointerup', () => toggleBtn.classList.remove('is-pressed'));
        toggleBtn.addEventListener('pointerleave', () => toggleBtn.classList.remove('is-pressed'));
    }

    // ==================== ACCESSIBILITY ENHANCEMENTS ====================
    // Trap focus inside sidebar when open on mobile
    const focusableElements = sidebar.querySelectorAll(
        'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])'
    );
    
    if (focusableElements.length > 0) {
        const firstFocusable = focusableElements[0];
        const lastFocusable = focusableElements[focusableElements.length - 1];

        sidebar.addEventListener('keydown', (e) => {
            if (!document.body.classList.contains('sidebar-open')) return;

            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    // Shift + Tab
                    if (document.activeElement === firstFocusable) {
                        e.preventDefault();
                        lastFocusable.focus();
                    }
                } else {
                    // Tab
                    if (document.activeElement === lastFocusable) {
                        e.preventDefault();
                        firstFocusable.focus();
                    }
                }
            }
        });
    }

    // ==================== IMPROVE TOUCH INTERACTIONS ====================
    let touchStartX = 0;
    let touchStartY = 0;

    // Swipe to close sidebar on mobile
    sidebar.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
    }, { passive: true });

    sidebar.addEventListener('touchend', (e) => {
        if (!document.body.classList.contains('sidebar-open')) return;

        const touchEndX = e.changedTouches[0].clientX;
        const touchEndY = e.changedTouches[0].clientY;
        const deltaX = touchEndX - touchStartX;
        const deltaY = Math.abs(touchEndY - touchStartY);

        // Swipe left to close (must be horizontal swipe)
        if (deltaX < -50 && deltaY < 50) {
            closeSidebarFunc();
        }
    }, { passive: true });

    // ==================== PERFORMANCE OPTIMIZATION ====================
    // Add will-change on interaction
    toggleBtn.addEventListener('mouseenter', () => {
        if (!prefersReducedMotion) {
            toggleBtn.style.willChange = 'transform';
        }
    });

    toggleBtn.addEventListener('mouseleave', () => {
        toggleBtn.style.willChange = 'auto';
    });

    // ==================== CONSOLE LOG ====================
    console.log('%c✨ Admin Panel Ready!', 'color: #667eea; font-size: 16px; font-weight: bold;');
    console.log('%cResponsive sidebar initialized', 'color: #764ba2; font-size: 12px;');
    console.log(`%cScreen width: ${window.innerWidth}px`, 'color: #667eea; font-size: 11px;');
});

// ==================== UTILITY FUNCTIONS ====================
// Debounce for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Add pressed state CSS if not exists
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