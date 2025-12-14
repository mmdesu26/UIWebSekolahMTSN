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

// Observe visi and misi cards
document.querySelectorAll('.visi-card, .misi-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.2}s`;
    observer.observe(card);
});

// Observe nilai cards
document.querySelectorAll('.nilai-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'scale(0.9)';
    card.style.transition = `all 0.5s ease ${index * 0.1}s`;
    observer.observe(card);
});

// Observe misi list items
document.querySelectorAll('.misi-list li').forEach((item, index) => {
    item.style.opacity = '0';
    item.style.transform = 'translateX(-30px)';
    item.style.transition = `all 0.5s ease ${index * 0.1}s`;
    observer.observe(item);
});

// ==================== PARALLAX EFFECT ON SCROLL ====================
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-visi-misi-content');
    
    if (heroContent && scrolled <= window.innerHeight) {
        heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
        heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
    }
});

// ==================== CARD HOVER EFFECTS - VISI & MISI ====================
document.querySelectorAll('.visi-card, .misi-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.visi-card, .misi-card').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
                c.style.transform = 'scale(0.98)';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.visi-card, .misi-card').forEach(c => {
            c.style.opacity = '1';
            c.style.transform = 'scale(1)';
        });
    });
});

// ==================== CARD HOVER EFFECTS - NILAI ====================
document.querySelectorAll('.nilai-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.nilai-card').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.nilai-card').forEach(c => {
            c.style.opacity = '1';
        });
    });
});

// ==================== NUMBER ANIMATION ON MISI ====================
const animateNumber = (element) => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const number = element.querySelector('.misi-number');
                if (number) {
                    number.style.animation = 'scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                }
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    observer.observe(element);
};

document.querySelectorAll('.misi-list li').forEach(li => {
    animateNumber(li);
});

// ==================== ICON ROTATION ON SCROLL ====================
window.addEventListener('scroll', () => {
    const scrollPosition = window.pageYOffset;
    
    document.querySelectorAll('.nilai-icon-wrapper').forEach((icon, index) => {
        const speed = 0.05 + (index * 0.01);
        icon.style.transform = `rotate(${scrollPosition * speed}deg)`;
    });
});

// ==================== BUTTON CLICK EFFECTS ====================
document.querySelectorAll('.btn-visi-misi-daftar').forEach(btn => {
    btn.addEventListener('mousedown', function() {
        this.style.transform = 'scale(0.95)';
    });
    
    btn.addEventListener('mouseup', function() {
        this.style.transform = '';
    });
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

// ==================== KEYBOARD NAVIGATION ====================
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowDown') {
        window.scrollBy({ top: 100, behavior: 'smooth' });
    } else if (e.key === 'ArrowUp') {
        window.scrollBy({ top: -100, behavior: 'smooth' });
    }
});

// ==================== ACCESSIBILITY ====================
document.querySelectorAll('.btn-visi-misi-daftar').forEach(btn => {
    btn.setAttribute('role', 'button');
    btn.setAttribute('tabindex', '0');
    
    btn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            btn.click();
        }
    });
});

// ==================== LAZY LOADING ANIMATION ====================
const fadeInElements = document.querySelectorAll('.section-intro, .cta-visi-misi-section');

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

// ==================== COUNTER ANIMATION ====================
const animateCounter = (element, target, duration = 1000) => {
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
};

// Animate numbers in misi
document.querySelectorAll('.misi-number').forEach((num, index) => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    animateCounter(num, index + 1, 600);
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    observer.observe(num);
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

// ==================== PREVENT ANIMATION ON PAGE LOAD ====================
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
});

// ==================== CONSOLE MESSAGE ====================
console.log('%cMTsN 1 Magetan', 'font-size: 24px; color: #1a5f3a; font-weight: bold;');
console.log('%cVisi & Misi Page Loaded Successfully ✓', 'font-size: 14px; color: #27ae60;');