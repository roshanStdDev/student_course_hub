/**
 * Student Course Hub - Main JavaScript
 * Handles navigation, dropdowns, and other interactive elements
 */

document.addEventListener('DOMContentLoaded', function() {
    // =======================================
    // Mobile Menu Toggle
    // =======================================
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    
    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            this.setAttribute('aria-expanded', 
                this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
            );
        });
        
        // Set initial ARIA state
        menuToggle.setAttribute('aria-expanded', 'false');
    }
    
    // =======================================
    // Dropdown Functionality
    // =======================================
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownMenu = this.nextElementSibling;
            
            // Toggle the current dropdown
            dropdownMenu.classList.toggle('show');
            
            // Set ARIA attributes
            const isExpanded = dropdownMenu.classList.contains('show');
            this.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
            
            // Close other dropdowns
            dropdownToggles.forEach(otherToggle => {
                if (otherToggle !== toggle) {
                    const otherMenu = otherToggle.nextElementSibling;
                    otherMenu.classList.remove('show');
                    otherToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
        
        // Set initial ARIA state
        toggle.setAttribute('aria-expanded', 'false');
    });
    
    // =======================================
    // Close Dropdowns When Clicking Outside
    // =======================================
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
            
            document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
                toggle.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // =======================================
    // Smooth Scrolling for Anchor Links
    // =======================================
    document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 70, // Offset for fixed header
                    behavior: 'smooth'
                });
            }
        });
    });
    
});