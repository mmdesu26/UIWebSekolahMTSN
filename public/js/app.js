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
// DROPDOWN HANDLER - Bootstrap Native + Hover Desktop
// ====================================
document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.navbar .dropdown');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (!toggle || !menu) return;

        // Biarkan data-bs-toggle tetap ada → Bootstrap handle click mobile

        // Hover untuk desktop
        let hoverTimeout;

        dropdown.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                clearTimeout(hoverTimeout);
                bootstrap.Dropdown.getOrCreateInstance(toggle).show();
            }
        });

        dropdown.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                hoverTimeout = setTimeout(() => {
                    bootstrap.Dropdown.getOrCreateInstance(toggle).hide();
                }, 200);
            }
        });
    });

    // Auto-close navbar collapse HANYA saat klik link biasa atau dropdown item
    // (TIDAK saat klik dropdown-toggle)
    document.querySelectorAll('.navbar .nav-link:not(.dropdown-toggle), .navbar .dropdown-item').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992 && navbarCollapse?.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
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

document.addEventListener('DOMContentLoaded', function () {
    const animatedElements = document.querySelectorAll('.news-card, .info-card, .ekskul-card, .gallery-item');
    animatedElements.forEach(el => observer.observe(el));
});