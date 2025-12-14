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
// IMPROVED DROPDOWN HANDLER
// ====================================
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.navbar .dropdown');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (!toggle || !menu) return;
        
        // MOBILE: Click to toggle
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                e.stopPropagation();
                
                const isOpen = toggle.getAttribute('aria-expanded') === 'true';
                
                // Close other dropdowns
                dropdowns.forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        const otherToggle = otherDropdown.querySelector('.dropdown-toggle');
                        const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                        otherToggle?.setAttribute('aria-expanded', 'false');
                        otherMenu?.classList.remove('show');
                        otherDropdown.classList.remove('show');
                    }
                });
                
                // Toggle current
                toggle.setAttribute('aria-expanded', !isOpen);
                menu.classList.toggle('show');
                dropdown.classList.toggle('show');
            }
        });
        
        // DESKTOP: Hover
        dropdown.addEventListener('mouseenter', function() {
            if (window.innerWidth >= 992) {
                toggle.setAttribute('aria-expanded', 'true');
                menu.classList.add('show');
                dropdown.classList.add('show');
            }
        });
        
        dropdown.addEventListener('mouseleave', function() {
            if (window.innerWidth >= 992) {
                toggle.setAttribute('aria-expanded', 'false');
                menu.classList.remove('show');
                dropdown.classList.remove('show');
            }
        });
        
        // Close on item click
        const items = menu.querySelectorAll('.dropdown-item');
        items.forEach(item => {
            item.addEventListener('click', function() {
                toggle.setAttribute('aria-expanded', 'false');
                menu.classList.remove('show');
                dropdown.classList.remove('show');
                
                // Close mobile navbar
                if (window.innerWidth < 992 && navbarCollapse) {
                    const bsCollapse = bootstrap.Collapse.getOrCreateInstance(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });
    });
    
    // Click outside to close (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth < 992) {
            if (!e.target.closest('.navbar')) {
                dropdowns.forEach(dropdown => {
                    const toggle = dropdown.querySelector('.dropdown-toggle');
                    const menu = dropdown.querySelector('.dropdown-menu');
                    toggle?.setAttribute('aria-expanded', 'false');
                    menu?.classList.remove('show');
                    dropdown.classList.remove('show');
                });
            }
        }
    });
    
    // Reset on resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                toggle?.setAttribute('aria-expanded', 'false');
                menu?.classList.remove('show');
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
            const bsCollapse = bootstrap.Collapse.getOrCreateInstance(nav);
            bsCollapse.hide();
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
// ANIMATION ON SCROLL (Optional)
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