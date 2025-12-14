// ==================== TAB SWITCHING FUNCTIONALITY ====================

document.addEventListener('DOMContentLoaded', function() {
    // Get all filter tabs
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    // Add click event to each tab
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const kelas = this.getAttribute('data-kelas');
            
            // Remove active class from all tabs
            filterTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all jadwal containers
            const containers = document.querySelectorAll('.jadwal-container');
            containers.forEach(container => {
                container.style.display = 'none';
            });
            
            // Show selected jadwal container
            const targetContainer = document.getElementById(`jadwal-kelas-${kelas}`);
            if (targetContainer) {
                targetContainer.style.display = 'block';
                
                // Add fade-in animation
                targetContainer.style.opacity = '0';
                setTimeout(() => {
                    targetContainer.style.transition = 'opacity 0.3s ease-in-out';
                    targetContainer.style.opacity = '1';
                }, 10);
            }
        });
    });
});

// ==================== SMOOTH SCROLL (OPTIONAL) ====================
// Smooth scroll untuk navigasi internal jika diperlukan
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});