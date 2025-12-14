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

// Observe program unggulan cards
document.querySelectorAll('.program-unggulan-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(card);
});

// Observe program cards
document.querySelectorAll('.program-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(card);
});

// ==================== CARD HOVER EFFECTS - PROGRAM UNGGULAN ==================== 
document.querySelectorAll('.program-unggulan-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.program-unggulan-card').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
                c.style.transform = 'scale(0.98)';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.program-unggulan-card').forEach(c => {
            c.style.opacity = '1';
            c.style.transform = 'scale(1)';
        });
    });
});

// ==================== CARD HOVER EFFECTS - PROGRAM KELAS ==================== 
document.querySelectorAll('.program-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.program-card').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
                c.style.transform = 'scale(0.98)';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.program-card').forEach(c => {
            c.style.opacity = '1';
            c.style.transform = 'scale(1)';
        });
    });
});

// ==================== BUTTON CLICK EFFECTS ==================== 
document.querySelectorAll('.btn-program-detail, .btn-program-daftar').forEach(btn => {
    btn.addEventListener('mousedown', function() {
        this.style.transform = 'scale(0.95)';
    });
    
    btn.addEventListener('mouseup', function() {
        this.style.transform = '';
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

// ==================== ACCESSIBILITY ==================== 
document.querySelectorAll('.btn-program-detail, .btn-program-daftar').forEach(btn => {
    btn.setAttribute('role', 'button');
    btn.setAttribute('tabindex', '0');
    
    btn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            btn.click();
        }
    });
});

// ==================== PARALLAX EFFECT ON SCROLL ==================== 
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-program-content');
    
    if (heroContent && scrolled <= window.innerHeight) {
        heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
        heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
    }
});

// ==================== LAZY LOADING ANIMATION ==================== 
const fadeInElements = document.querySelectorAll('.section-intro-program, .section-divider, .cta-program-section');

const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-visible');
        }
    });
}, {
    threshold: 0.2
});

fadeInElements.forEach(el => {
    fadeObserver.observe(el);
});

// ==================== COUNTER ANIMATION FOR STATS (if needed) ==================== 
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start);
        }
    }, 16);
}

// ==================== SCROLL TO TOP FUNCTIONALITY ==================== 
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

// ==================== PREVENT ANIMATION ON PAGE LOAD ==================== 
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
});

// ==================== RESPONSIVE MENU HANDLING (if needed) ==================== 
let lastScrollTop = 0;
const header = document.querySelector('header');

if (header) {
    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
}

// ==================== PERFORMANCE OPTIMIZATION ==================== 
// Debounce function for scroll events
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

// Apply debounce to scroll events if needed
const debouncedScroll = debounce(() => {
    // Add any scroll-based functionality here
}, 10);

window.addEventListener('scroll', debouncedScroll);

// ==================== CONSOLE MESSAGE ==================== 
console.log('%cMTsN 1 Magetan', 'font-size: 24px; color: #1a5f3a; font-weight: bold;');
console.log('%cKelas Program Page Loaded Successfully ✓', 'font-size: 14px; color: #27ae60;');