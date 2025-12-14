// ==================== IMAGE MODAL FUNCTIONS ====================
function openImageModal() {
    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Close modal on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

// Prevent modal content click from closing modal
document.addEventListener('DOMContentLoaded', function() {
    const modalContent = document.querySelector('.modal-content');
    if (modalContent) {
        modalContent.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
});

// ==================== FILTER GURU FUNCTIONALITY ====================
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const guruCards = document.querySelectorAll('.guru-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            // Filter cards
            guruCards.forEach((card, index) => {
                const category = card.getAttribute('data-category');
                
                if (filterValue === 'all' || category === filterValue) {
                    card.classList.remove('hide');
                    card.style.animation = `fadeInUp 0.5s ease-out ${index * 0.05}s`;
                } else {
                    card.classList.add('hide');
                }
            });
        });
    });
});

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

// Observe struktur bagan box
document.querySelectorAll('.struktur-bagan-box').forEach((box) => {
    box.style.opacity = '0';
    box.style.transform = 'translateY(30px)';
    box.style.transition = 'all 0.6s ease';
    observer.observe(box);
});

// Observe info cards
document.querySelectorAll('.info-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(card);
});

// Observe guru cards
document.querySelectorAll('.guru-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s ease ${index * 0.05}s`;
    observer.observe(card);
});

// Observe stats cards
document.querySelectorAll('.stat-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'scale(0.9)';
    card.style.transition = `all 0.5s ease ${index * 0.1}s`;
    observer.observe(card);
});

// ==================== PARALLAX EFFECT ON SCROLL ====================
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-struktur-content');
    
    if (heroContent && scrolled <= window.innerHeight) {
        heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
        heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
    }
});

// ==================== CARD HOVER EFFECTS - INFO ====================
document.querySelectorAll('.info-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.info-card').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.info-card').forEach(c => {
            c.style.opacity = '1';
        });
    });
});

// ==================== CARD HOVER EFFECTS - GURU ====================
document.querySelectorAll('.guru-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        document.querySelectorAll('.guru-card:not(.hide)').forEach(c => {
            if (c !== this) {
                c.style.opacity = '0.7';
                c.style.transform = 'scale(0.98)';
            }
        });
    });
    
    card.addEventListener('mouseleave', function() {
        document.querySelectorAll('.guru-card:not(.hide)').forEach(c => {
            c.style.opacity = '1';
            c.style.transform = 'scale(1)';
        });
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

// ==================== COUNTER ANIMATION FOR STATS ====================
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const isPercentage = target.toString().includes('%');
    const numericTarget = parseInt(target);
    const increment = numericTarget / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        if (start >= numericTarget) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start) + (isPercentage ? '%' : '');
        }
    }, 16);
}

// Animate stat numbers when they come into view
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumber = entry.target.querySelector('.stat-number');
            if (statNumber && !statNumber.classList.contains('animated')) {
                statNumber.classList.add('animated');
                const target = statNumber.textContent;
                statNumber.textContent = '0';
                setTimeout(() => {
                    animateCounter(statNumber, target);
                }, 200);
            }
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-card').forEach(card => {
    statsObserver.observe(card);
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
document.querySelectorAll('.filter-btn').forEach(btn => {
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
const fadeInElements = document.querySelectorAll('.section-intro, .stats-summary, .empty-struktur, .empty-guru');

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

// ==================== RESPONSIVE MENU HANDLING ====================
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

// ==================== CONSOLE MESSAGE ====================
console.log('%cMTsN 1 Magetan', 'font-size: 24px; color: #1a5f3a; font-weight: bold;');
console.log('%cStruktur Organisasi Page Loaded Successfully ✓', 'font-size: 14px; color: #27ae60;');