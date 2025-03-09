// Admin Panel JavaScript for Student Course Hub

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuToggle = document.querySelector('.admin-menu-toggle');
    const adminNav = document.querySelector('.admin-nav');
    
    if (menuToggle && adminNav) {
        menuToggle.addEventListener('click', function() {
            adminNav.classList.toggle('active');
        });
    }
    
    // User dropdown menu toggle
    const userToggle = document.querySelector('.admin-user-toggle');
    const userMenu = document.querySelector('.admin-dropdown-menu');
    
    if (userToggle && userMenu) {
        // Use click instead of hover for better mobile experience
        userToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            userMenu.classList.toggle('show');
        });
        
        // Close user menu when clicking outside
        document.addEventListener('click', function(e) {
            if (userMenu.classList.contains('show') && !userToggle.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.remove('show');
            }
        });
    }
    
    // Responsive adjustments for window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768 && adminNav) {
            adminNav.classList.remove('active');
        }
    });
});