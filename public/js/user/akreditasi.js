// ==================== AOS INITIALIZATION ====================
document.addEventListener('DOMContentLoaded', function() {
    // Check if AOS is loaded
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });
    }
});