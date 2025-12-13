// SMOOTH SCROLL
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#' || href === '') return;
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// INTERSECTION OBSERVER UNTUK ANIMASI (REVEAL ON SCROLL)
const prefersReducedMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches;

const revealTargets = document.querySelectorAll(
    [
        '.info-card',
        '.about-image',
        '.about-text',
        '.news-card',
        '.feature-item',
        '.ppdb-image',
        '.ekskul-card',
        '.social-box',
        '.contact-item',
        '.contact-form-box',
        '.map-container'
    ].join(',')
);

if (!prefersReducedMotion && revealTargets.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -120px 0px' }
    );

    revealTargets.forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
    });
}

// FORM VALIDATION (CONTACT)
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const inputs = this.querySelectorAll('input, textarea');
    let valid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            valid = false;
            input.style.borderColor = 'var(--accent-color)';
        } else {
            input.style.borderColor = 'var(--border-color)';
        }
    });
    if (valid) {
        alert('Pesan Anda telah terkirim! Terima kasih telah menghubungi kami.');
        this.reset();
    } else {
        alert('Harap lengkapi semua form yang tersedia.');
    }
});

// KEYBOARD NAVIGATION (Arrow Up/Down)
document.addEventListener('keydown', e => {
    if (e.key === 'ArrowDown') window.scrollBy({ top: 100, behavior: 'smooth' });
    if (e.key === 'ArrowUp') window.scrollBy({ top: -100, behavior: 'smooth' });
});

// ACTIVE NAV LINK ON SCROLL
window.addEventListener('scroll', () => {
    let current = '';
    document.querySelectorAll('section[id]').forEach(section => {
        if (pageYOffset >= section.offsetTop - 200) {
            current = section.getAttribute('id');
        }
    });
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
});

// HERO PARALLAX (SUBTLE)
const heroBg = document.querySelector('.hero-bg');
if (heroBg && !prefersReducedMotion) {
    window.addEventListener(
        'scroll',
        () => {
            const y = window.scrollY || 0;
            heroBg.style.transform = `translateY(${Math.min(y * 0.15, 60)}px)`;
        },
        { passive: true }
    );
}