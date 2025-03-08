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
    
    // =======================================
    // Form Validation Enhancement
    // =======================================
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const requiredInputs = form.querySelectorAll('[required]');
        
        // Add visual indicator for required fields
        requiredInputs.forEach(input => {
            const label = input.previousElementSibling;
            if (label && label.tagName === 'LABEL') {
                label.classList.add('required-field');
            }
        });
        
        // Custom validation messages
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    
                    // Add error state
                    input.classList.add('input-error');
                    
                    // Check for existing error message
                    const existingError = input.nextElementSibling;
                    if (existingError && existingError.classList.contains('error-message')) {
                        existingError.style.display = 'block';
                    } else {
                        // Create error message
                        const errorMessage = document.createElement('div');
                        errorMessage.classList.add('error-message');
                        errorMessage.textContent = `This field is required`;
                        input.insertAdjacentElement('afterend', errorMessage);
                    }
                } else {
                    // Remove error state
                    input.classList.remove('input-error');
                    
                    // Hide error message if exists
                    const existingError = input.nextElementSibling;
                    if (existingError && existingError.classList.contains('error-message')) {
                        existingError.style.display = 'none';
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
});