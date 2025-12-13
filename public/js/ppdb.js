// ==================== INTERSECTION OBSERVER (Scroll reveal) ====================
// Enhances perceived quality without changing the page's content or palette.
const observerOptions = {
    threshold: 0.12,
    rootMargin: '0px 0px -10% 0px'
};

const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
    });
}, observerOptions);

const revealSelectors = [
    '.ppdb-section-header',
    '.info-card',
    '.timeline-section',
    '.timeline-item',
    '.requirements-section',
    '.requirement-item',
    '.steps-section',
    '.step-card',
    '.cta-registration',
    '.faq-section',
    '.faq-item'
];

document.querySelectorAll(revealSelectors.join(',')).forEach((el) => {
    // Use CSS-based reveal for smoother composition
    el.classList.add('reveal');
    revealObserver.observe(el);
});

// ==================== SMOOTH SCROLL ==================== 
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#' || href === '') return;
        
        e.preventDefault();
        const targetId = href.substring(1);
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// ==================== KEYBOARD NAVIGATION ==================== 
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowDown') {
        window.scrollBy({ top: 100, behavior: 'smooth' });
    } else if (e.key === 'ArrowUp') {
        window.scrollBy({ top: -100, behavior: 'smooth' });
    }
});

// ==================== FAQ TOGGLE (Accessible accordion) ====================
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach((item) => {
    const question = item.querySelector('.faq-question');
    const answer = item.querySelector('.faq-answer');
    if (!question || !answer) return;

    // Initial state: collapsed (animated via CSS)
    item.classList.remove('is-open');
    answer.style.maxHeight = '0px';

    // Improve accessibility without changing the markup content
    question.setAttribute('role', 'button');
    question.setAttribute('tabindex', '0');
    question.setAttribute('aria-expanded', 'false');

    const toggle = () => {
        const isOpen = item.classList.toggle('is-open');
        question.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        // Height animation: measure content each time to stay responsive
        answer.style.maxHeight = isOpen ? `${answer.scrollHeight}px` : '0px';
    };

    question.addEventListener('click', toggle);
    question.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggle();
        }
    });
});

// Recalculate open accordion heights on resize (keeps it responsive)
window.addEventListener('resize', () => {
    document.querySelectorAll('.faq-item.is-open .faq-answer').forEach((answer) => {
        answer.style.maxHeight = `${answer.scrollHeight}px`;
    });
});