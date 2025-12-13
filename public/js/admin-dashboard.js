document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==================== ENHANCED NUMBER COUNTER ==================== */
    const counters = document.querySelectorAll('.stat-card-number');

    const animateCounter = (el) => {
        const target = parseInt((el.textContent || '0').replace(/\D/g, ''), 10);
        if (Number.isNaN(target)) return;

        // If reduced motion, set directly
        if (prefersReducedMotion) {
            el.textContent = target;
            return;
        }

        const duration = 1200; // ms - increased for smoother animation
        const start = performance.now();
        const from = 0;

        const tick = (now) => {
            const elapsed = now - start;
            const t = Math.min(1, elapsed / duration);
            
            // easeOutExpo for more dramatic effect
            const eased = t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
            const value = Math.floor(from + (target - from) * eased);
            el.textContent = value;

            if (t < 1) {
                requestAnimationFrame(tick);
            } else {
                el.textContent = target;
                // Add completion animation
                el.classList.add('counter-complete');
                setTimeout(() => el.classList.remove('counter-complete'), 600);
            }
        };

        requestAnimationFrame(tick);
    };

    const ioSupported = 'IntersectionObserver' in window;

    if (ioSupported && !prefersReducedMotion) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(c => observer.observe(c));
    } else {
        counters.forEach(animateCounter);
    }

    /* ==================== ENHANCED TABLE ROW REVEAL ==================== */
    const rows = document.querySelectorAll('.data-table tbody tr');

    if (!prefersReducedMotion && rows.length > 0) {
        rows.forEach((row, index) => {
            // Set initial state
            row.style.opacity = '0';
            row.style.transform = 'translateX(25px)';
            row.style.willChange = 'transform, opacity';

            // Use IntersectionObserver for better performance
            if (ioSupported) {
                const rowObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                row.style.transition = 'all 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
                                row.style.opacity = '1';
                                row.style.transform = 'translateX(0)';
                            }, 100 + (index * 80));
                            rowObserver.unobserve(row);
                        }
                    });
                }, { threshold: 0.1 });

                rowObserver.observe(row);
            } else {
                setTimeout(() => {
                    row.style.transition = 'all 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, 100 + (index * 80));
            }
        });
    }

    /* ==================== STAT CARD INTERACTIONS ==================== */
    const statCards = document.querySelectorAll('.stat-card');
    
    statCards.forEach((card, index) => {
        // Add hover sound effect (optional - can be enabled)
        card.addEventListener('mouseenter', () => {
            if (!prefersReducedMotion) {
                card.style.willChange = 'transform';
            }
        });

        card.addEventListener('mouseleave', () => {
            card.style.willChange = 'auto';
        });

        // Add click ripple effect
        card.addEventListener('click', function(e) {
            if (prefersReducedMotion) return;

            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    /* ==================== DATA CARD ENHANCEMENTS ==================== */
    const dataCards = document.querySelectorAll('.data-card');
    
    dataCards.forEach((card) => {
        // Parallax effect on mouse move
        if (!prefersReducedMotion) {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const deltaX = (x - centerX) / centerX;
                const deltaY = (y - centerY) / centerY;
                
                const rotateX = deltaY * 3;
                const rotateY = deltaX * 3;
                
                card.style.transform = `perspective(1000px) rotateX(${-rotateX}deg) rotateY(${rotateY}deg) translateY(-10px) scale(1.02)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        }
    });

    /* ==================== BADGE ENHANCEMENTS ==================== */
    const badges = document.querySelectorAll('.badge');
    
    badges.forEach((badge) => {
        badge.addEventListener('mouseenter', function() {
            if (!prefersReducedMotion) {
                this.style.willChange = 'transform';
            }
        });

        badge.addEventListener('mouseleave', function() {
            this.style.willChange = 'auto';
        });
    });

    /* ==================== BUTTON ENHANCEMENTS ==================== */
    const buttons = document.querySelectorAll('.btn');
    
    buttons.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            if (prefersReducedMotion) return;

            // Create ripple effect
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.width = ripple.style.height = '100px';
            ripple.style.marginLeft = '-50px';
            ripple.style.marginTop = '-50px';
            ripple.style.left = e.offsetX + 'px';
            ripple.style.top = e.offsetY + 'px';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    /* ==================== TABLE SORTING (OPTIONAL) ==================== */
    const tableHeaders = document.querySelectorAll('.data-table thead th');
    
    tableHeaders.forEach((header, index) => {
        header.style.cursor = 'pointer';
        header.style.userSelect = 'none';
        
        header.addEventListener('click', function() {
            const table = this.closest('table');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            
            // Skip if no data
            if (rows.length === 0 || rows[0].querySelector('.empty-state')) return;
            
            const isAscending = this.classList.contains('sort-asc');
            
            // Remove all sort classes
            tableHeaders.forEach(h => h.classList.remove('sort-asc', 'sort-desc'));
            
            // Add appropriate class
            this.classList.add(isAscending ? 'sort-desc' : 'sort-asc');
            
            // Sort rows
            rows.sort((a, b) => {
                const aValue = a.cells[index].textContent.trim();
                const bValue = b.cells[index].textContent.trim();
                
                if (isAscending) {
                    return bValue.localeCompare(aValue, undefined, { numeric: true });
                } else {
                    return aValue.localeCompare(bValue, undefined, { numeric: true });
                }
            });
            
            // Re-append sorted rows
            rows.forEach(row => tbody.appendChild(row));
        });
    });

    /* ==================== SMOOTH SCROLL TO TOP ==================== */
    const createScrollToTopBtn = () => {
        const btn = document.createElement('button');
        btn.innerHTML = '<i class="fas fa-arrow-up"></i>';
        btn.className = 'scroll-to-top';
        btn.setAttribute('aria-label', 'Scroll to top');
        btn.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        `;
        
        document.body.appendChild(btn);
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                btn.style.opacity = '1';
                btn.style.transform = 'scale(1)';
            } else {
                btn.style.opacity = '0';
                btn.style.transform = 'scale(0)';
            }
        });
        
        btn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.boxShadow = '0 8px 20px rgba(102, 126, 234, 0.4)';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 4px 12px rgba(102, 126, 234, 0.3)';
        });
    };

    createScrollToTopBtn();

    /* ==================== LOADING STATE HANDLER ==================== */
    const addLoadingState = (element) => {
        const loader = document.createElement('div');
        loader.className = 'loading-spinner';
        loader.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        loader.style.cssText = `
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: var(--primary-color);
        `;
        element.style.position = 'relative';
        element.appendChild(loader);
        
        return () => loader.remove();
    };

    /* ==================== EMPTY STATE ANIMATION ==================== */
    const emptyStates = document.querySelectorAll('.empty-state');
    
    emptyStates.forEach((state) => {
        const icon = state.querySelector('i');
        if (icon && !prefersReducedMotion) {
            setInterval(() => {
                icon.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    icon.style.transform = 'scale(1)';
                }, 300);
            }, 3000);
        }
    });

    /* ==================== PERFORMANCE OPTIMIZATION ==================== */
    // Lazy load images if any
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    /* ==================== ADD RIPPLE CSS ==================== */
    if (!document.getElementById('ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                from {
                    transform: scale(0);
                    opacity: 1;
                }
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .ripple-effect {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.5);
                pointer-events: none;
                animation: ripple 0.6s ease-out;
            }
            
            .counter-complete {
                animation: pulse 0.6s ease-out;
            }
            
            @keyframes pulse {
                0%, 100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.05);
                }
            }
            
            .sort-asc::after {
                content: ' ↑';
                color: var(--primary-color);
            }
            
            .sort-desc::after {
                content: ' ↓';
                color: var(--primary-color);
            }
        `;
        document.head.appendChild(style);
    }

    /* ==================== CONSOLE MESSAGE ==================== */
    console.log('%c✨ Dashboard Enhanced ✨', 'color: #667eea; font-size: 20px; font-weight: bold;');
    console.log('%cAnimasi dan interaksi telah diaktifkan!', 'color: #764ba2; font-size: 14px;');
});

/* ==================== UTILITY FUNCTIONS ==================== */
// Debounce function for performance
function debounce(func, wait) {
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

// Throttle function for performance
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}