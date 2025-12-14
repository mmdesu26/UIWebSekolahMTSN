// ====================================
// NAVBAR SHRINK ON SCROLL
// ====================================
window.addEventListener('scroll', () => {
    document.querySelector('.navbar')?.classList.toggle('scrolled', window.scrollY > 50);
});

// ====================================
// SCROLL TO TOP BUTTON
// ====================================
const scrollTopBtn = document.querySelector('.scroll-top');
if (scrollTopBtn) {
    const toggleScrollTop = () => {
        scrollTopBtn.classList.toggle('show', window.scrollY > 400);
    };
    toggleScrollTop();
    window.addEventListener('scroll', toggleScrollTop, { passive: true });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ====================================
// DROPDOWN HANDLER - SUPER FIXED!
// ====================================
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.navbar .dropdown');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    // DISABLE Bootstrap dropdown behavior untuk manual control
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (!toggle || !menu) return;
        
        // Remove Bootstrap data attributes yang bisa interfere
        toggle.removeAttribute('data-bs-toggle');
        toggle.removeAttribute('data-toggle');
        
        // ==========================================
        // MOBILE: Click/Touch Handler
        // ==========================================
        const handleMobileClick = function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                
                const isOpen = menu.classList.contains('show');
                
                console.log('Dropdown clicked:', isOpen ? 'closing' : 'opening'); // Debug
                
                // Close ALL other dropdowns
                dropdowns.forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                        const otherToggle = otherDropdown.querySelector('.dropdown-toggle');
                        if (otherMenu) otherMenu.classList.remove('show');
                        if (otherToggle) otherToggle.setAttribute('aria-expanded', 'false');
                        otherDropdown.classList.remove('show');
                    }
                });
                
                // Toggle current dropdown
                if (isOpen) {
                    menu.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.classList.remove('show');
                } else {
                    menu.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');
                    dropdown.classList.add('show');
                }
                
                return false;
            }
        };
        
        // Multiple event listeners untuk memastikan bekerja
        toggle.addEventListener('click', handleMobileClick, true);
        toggle.addEventListener('touchend', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                handleMobileClick(e);
            }
        }, true);
        
        // ==========================================
        // DESKTOP: Hover Handler
        // ==========================================
        let hoverTimeout;
        
        dropdown.addEventListener('mouseenter', function() {
            if (window.innerWidth >= 992) {
                clearTimeout(hoverTimeout);
                menu.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
                dropdown.classList.add('show');
            }
        });
        
        dropdown.addEventListener('mouseleave', function() {
            if (window.innerWidth >= 992) {
                hoverTimeout = setTimeout(() => {
                    menu.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                    dropdown.classList.remove('show');
                }, 150);
            }
        });
        
        // ==========================================
        // Dropdown Item Click
        // ==========================================
        const items = menu.querySelectorAll('.dropdown-item');
        items.forEach(item => {
            item.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href && href !== '#') {
                    // Allow navigation
                    setTimeout(() => {
                        // Close dropdown
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                        dropdown.classList.remove('show');
                        
                        // Close mobile navbar
                        if (window.innerWidth < 992 && navbarCollapse) {
                            const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                            if (bsCollapse) {
                                bsCollapse.hide();
                            }
                        }
                    }, 150);
                }
            });
        });
    });
    
    // ==========================================
    // Click outside to close
    // ==========================================
    document.addEventListener('click', function(e) {
        if (window.innerWidth < 992) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    const toggle = dropdown.querySelector('.dropdown-toggle');
                    if (menu) menu.classList.remove('show');
                    if (toggle) toggle.setAttribute('aria-expanded', 'false');
                    dropdown.classList.remove('show');
                });
            }
        }
    });
    
    // ==========================================
    // Window Resize Handler
    // ==========================================
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            dropdowns.forEach(dropdown => {
                const menu = dropdown.querySelector('.dropdown-menu');
                const toggle = dropdown.querySelector('.dropdown-toggle');
                if (menu) menu.classList.remove('show');
                if (toggle) toggle.setAttribute('aria-expanded', 'false');
                dropdown.classList.remove('show');
            });
        }, 250);
    });
});

// ====================================
// AUTO-CLOSE MOBILE NAV AFTER CLICK
// ====================================
document.querySelectorAll('.navbar .nav-link:not(.dropdown-toggle)').forEach(link => {
    link.addEventListener('click', () => {
        const nav = document.querySelector('.navbar-collapse');
        if (!nav) return;
        
        if (window.innerWidth < 992 && nav.classList.contains('show')) {
            const bsCollapse = bootstrap.Collapse.getInstance(nav);
            if (bsCollapse) {
                bsCollapse.hide();
            }
        }
    });
});

// ====================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ====================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href.length > 1) {
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// ====================================
// ANIMATION ON SCROLL
// ====================================
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-visible');
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.news-card, .info-card, .ekskul-card, .gallery-item');
    animatedElements.forEach(el => observer.observe(el));
});

// ====================================
// FORCE FIX - Load event backup
// ====================================
window.addEventListener('load', function() {
    console.log('Dropdown fix loaded'); // Debug
    
    // Ensure all dropdown toggles are clickable
    document.querySelectorAll('.navbar .dropdown-toggle').forEach(toggle => {
        toggle.style.cursor = 'pointer';
        toggle.style.pointerEvents = 'auto';
        toggle.style.userSelect = 'none';
    });
    
    // Ensure all dropdown items are clickable
    document.querySelectorAll('.navbar .dropdown-item').forEach(item => {
        item.style.cursor = 'pointer';
        item.style.pointerEvents = 'auto';
    });
});