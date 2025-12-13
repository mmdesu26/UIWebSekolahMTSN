// NAVBAR SHRINK ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('.navbar')?.classList.toggle('scrolled', window.scrollY > 50);
});

// SCROLL TO TOP BUTTON
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

// AUTO-CLOSE MOBILE NAV AFTER CLICK
document.querySelectorAll('.navbar .nav-link').forEach(link => {
    link.addEventListener('click', () => {
        const nav = document.querySelector('.navbar-collapse');
        if (!nav) return;
        // Bootstrap adds the "show" class when expanded
        if (nav.classList.contains('show')) {
            const bsCollapse = bootstrap.Collapse.getOrCreateInstance(nav);
            bsCollapse.hide();
        }
    });
});