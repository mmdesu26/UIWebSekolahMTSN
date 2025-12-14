// ==================== FILTER TABS FUNCTIONALITY ====================
const filterTabs = document.querySelectorAll('.filter-tab');
const jadwalContainers = document.querySelectorAll('.jadwal-container');

filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const kelas = tab.dataset.kelas;
        
        // Update active tab
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        
        // Hide all jadwal containers
        jadwalContainers.forEach(container => {
            container.style.display = 'none';
        });
        
        // Show selected jadwal
        const activeContainer = document.getElementById(`jadwal-kelas-${kelas}`);
        if (activeContainer) {
            activeContainer.style.display = 'block';
            
            // Fade in animation
            activeContainer.style.opacity = '0';
            activeContainer.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                activeContainer.style.transition = 'all 0.5s ease';
                activeContainer.style.opacity = '1';
                activeContainer.style.transform = 'translateY(0)';
            }, 50);
        }
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

// Observe jadwal containers
document.querySelectorAll('.jadwal-container').forEach((container, index) => {
    container.style.opacity = '0';
    container.style.transform = 'translateY(30px)';
    container.style.transition = `all 0.6s ease ${index * 0.1}s`;
    observer.observe(container);
});

// Observe table rows
document.querySelectorAll('.jadwal-table tbody tr').forEach((row, index) => {
    row.style.opacity = '0';
    row.style.transform = 'translateX(-20px)';
    row.style.transition = `all 0.4s ease ${index * 0.05}s`;
    observer.observe(row);
});

// ==================== PARALLAX EFFECT ON SCROLL ====================
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-jadwal-content');
    
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

// ==================== TABLE HOVER EFFECTS ====================
document.querySelectorAll('.jadwal-table tbody tr').forEach(row => {
    row.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.01)';
    });
    
    row.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
});

// ==================== BADGE HOVER ANIMATION ====================
document.querySelectorAll('.mapel-badge').forEach(badge => {
    badge.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1) rotate(2deg)';
    });
    
    badge.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1) rotate(0deg)';
    });
});

// ==================== KEYBOARD NAVIGATION ====================
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
        const activeTab = document.querySelector('.filter-tab.active');
        const prevTab = activeTab.previousElementSibling;
        if (prevTab && prevTab.classList.contains('filter-tab')) {
            prevTab.click();
        }
    } else if (e.key === 'ArrowRight') {
        const activeTab = document.querySelector('.filter-tab.active');
        const nextTab = activeTab.nextElementSibling;
        if (nextTab && nextTab.classList.contains('filter-tab')) {
            nextTab.click();
        }
    }
});

// ==================== ACCESSIBILITY ====================
filterTabs.forEach(tab => {
    tab.setAttribute('role', 'button');
    tab.setAttribute('tabindex', '0');
    
    tab.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            tab.click();
        }
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
console.log('%cJadwal Pelajaran Page Loaded Successfully ✓', 'font-size: 14px; color: #27ae60;');