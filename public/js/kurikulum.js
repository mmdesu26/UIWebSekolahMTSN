// ==================== SMOOTH SCROLL ====================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        e.preventDefault();
        const targetId = href.substring(1);
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        }
    });
});

// ==================== INTERSECTION OBSERVER ====================
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe kurikulum boxes
document.querySelectorAll('.kurikulum-box').forEach((box, index) => {
    box.style.opacity = '0';
    box.style.transform = 'translateY(30px)';
    box.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(box);
});

// Observe mapel cards
document.querySelectorAll('.mapel-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = `all 0.5s ease ${index * 0.05}s`;
    observer.observe(card);
});

// ==================== PARALLAX EFFECT ON SCROLL ====================
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-kurikulum-content');
    
    if (heroContent && scrolled <= window.innerHeight) {
        heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
        heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
    }
});

// ==================== SCROLL TO TOP BUTTON ====================
const scrollToTopBtn = document.createElement('button');
scrollToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
scrollToTopBtn.className = 'scroll-to-top';
scrollToTopBtn.style.cssText = `
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--primary-color);
    color: white;
    border: none;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
`;

document.body.appendChild(scrollToTopBtn);

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollToTopBtn.style.opacity = '1';
        scrollToTopBtn.style.visibility = 'visible';
    } else {
        scrollToTopBtn.style.opacity = '0';
        scrollToTopBtn.style.visibility = 'hidden';
    }
});

scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

scrollToTopBtn.addEventListener('mouseenter', function() {
    this.style.transform = 'scale(1.1)';
    this.style.background = 'var(--primary-light)';
});

scrollToTopBtn.addEventListener('mouseleave', function() {
    this.style.transform = 'scale(1)';
    this.style.background = 'var(--primary-color)';
});

// ==================== CARD HOVER EFFECTS ====================
document.querySelectorAll('.kurikulum-box').forEach(box => {
    box.addEventListener('mouseenter', function() {
        document.querySelectorAll('.kurikulum-box').forEach(b => {
            if (b !== this) {
                b.style.opacity = '0.7';
            }
        });
    });
    
    box.addEventListener('mouseleave', function() {
        document.querySelectorAll('.kurikulum-box').forEach(b => {
            b.style.opacity = '1';
        });
    });
});

// ==================== PERFORMANCE OPTIMIZATION ====================
function debounce(func, wait = 10) {
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

const debouncedScroll = debounce(() => {
    // Additional scroll functionality if needed
}, 10);

window.addEventListener('scroll', debouncedScroll);

// ==================== CONSOLE MESSAGE ====================
console.log('%cMTsN 1 Magetan', 'font-size: 24px; color: #1a5f3a; font-weight: bold;');
console.log('%cKurikulum Page Loaded Successfully ✓', 'font-size: 14px; color: #27ae60;');