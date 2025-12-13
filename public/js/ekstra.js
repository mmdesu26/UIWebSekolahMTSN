// ==================== UI INTERACTIONS (NO COLOR/CONTENT CHANGES) ====================
(function () {
  const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Scroll Reveal (JS adds classes; HTML content unchanged)
  const revealSelectors = [
    '.ekstra-section-header',
    '.ekstra-card',
    '.benefit-item',
    '.achievement-card',
    '.stat-ekstra-item',
    '.benefits-section',
    '.achievements-section'
  ];

  const revealEls = Array.from(document.querySelectorAll(revealSelectors.join(',')));
  revealEls.forEach((el) => el.classList.add('reveal'));

  if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -10% 0px' }
    );

    revealEls.forEach((el) => observer.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  }

  // Smooth Scroll for in-page anchors
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (!href || href === '#') return;

      const target = document.querySelector(href);
      if (!target) return;

      e.preventDefault();
      target.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth', block: 'start' });
    });
  });

  // Keyboard usability (non-invasive)
  document.addEventListener('keydown', (e) => {
    const tag = (e.target && e.target.tagName) ? e.target.tagName.toLowerCase() : '';
    if (tag === 'input' || tag === 'textarea' || (e.target && e.target.isContentEditable)) return;

    if (e.key === 'ArrowDown') {
      window.scrollBy({ top: 120, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    } else if (e.key === 'ArrowUp') {
      window.scrollBy({ top: -120, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    }
  });
})();
