<?php echo isset($full_width) && $full_width ? '' : '</div>'; ?>
    </main>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col main">
                    <h4 class="footer-title">Student Course Hub</h4>
                    <p>Explore our undergraduate and postgraduate programmes to find the perfect course for your future academic and career goals.</p>
                    <div class="social-links">
                        <a href="#" class="social-icon" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-col links">
                    <h5 class="footer-title">Programmes</h5>
                    <ul class="footer-links">
                        <li><a href="programmes.php?level=1">Undergraduate</a></li>
                        <li><a href="programmes.php?level=2">Postgraduate</a></li>
                        <li><a href="search.php">Search Programmes</a></li>
                    </ul>
                </div>
                <div class="footer-col links">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Open Days</a></li>
                        <li><a href="#">How to Apply</a></li>
                        <li><a href="#">Student Life</a></li>
                    </ul>
                </div>
                <div class="footer-col contact">
                    <h5 class="footer-title">Contact</h5>
                    <address class="contact-info">
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            Gateway House, Leicester, LE1 9BH
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@university.edu">info@dmustduniversity.edu</a>
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+441234567890">+44 1234 567890</a>
                        </p>
                    </address>
                </div>
            </div>
            
            <div class="footer-divider"></div>
            
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; <?php echo date('Y'); ?> Student Course Hub. All rights reserved.
                </p>
                <ul class="legal-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Accessibility</a></li>
                </ul>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="public/js/main.js"></script>
</body>
</html>