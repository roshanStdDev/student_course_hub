<?php
// Set page variables
$page_title = 'Home';
$full_width = false;

// Include header
require_once 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-container">
                <div class="hero-content">
                    <h1 class="hero-title">Discover Your Future</h1>
                    <p class="hero-description">Explore our undergraduate and postgraduate programmes to find the perfect course for your academic journey.</p>
                    <div class="hero-buttons">
                        <a href="programmes.php" class="btn btn-primary">View All Programmes</a>
                        <a href="search.php" class="btn btn-light">Search Programmes</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="public/images/campus.png" alt="University Campus" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <section class="programmes-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Undergraduate Programmes</h2>
                <a href="programmes.php?level=1" class="view-all-link desktop-view-all">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="programmes-grid">
                <!-- Static programme cards -->
                <div class="programme-card">
                    <img src="public/images/programme-placeholder.jpg" alt="Computer Science" class="programme-image">
                    <div class="programme-badge badge-undergraduate">
                        <span>BSc</span>
                    </div>
                    <div class="programme-body">
                        <h3 class="programme-title">Computer Science</h3>
                        <p class="programme-description">Gain a solid foundation in computer science theory and practice...</p>
                        <p class="programme-leader">Programme Leader: Dr. Sarah Johnson</p>
                    </div>
                    <div class="programme-footer">
                        <a href="programme-details.php?id=1" class="btn btn-primary">View Details</a>
                        <a href="register-interest.php?id=1" class="btn btn-outline">Register Interest</a>
                    </div>
                </div>
                <div class="programme-card">
                    <img src="public/images/programme-placeholder.jpg" alt="Computer Science" class="programme-image">
                    <div class="programme-badge badge-undergraduate">
                        <span>BSc</span>
                    </div>
                    <div class="programme-body">
                        <h3 class="programme-title">Computer Science</h3>
                        <p class="programme-description">Gain a solid foundation in computer science theory and practice...</p>
                        <p class="programme-leader">Programme Leader: Dr. Sarah Johnson</p>
                    </div>
                    <div class="programme-footer">
                        <a href="programme-details.php?id=1" class="btn btn-primary">View Details</a>
                        <a href="register-interest.php?id=1" class="btn btn-outline">Register Interest</a>
                    </div>
                </div>
                <div class="programme-card">
                    <img src="public/images/programme-placeholder.jpg" alt="Computer Science" class="programme-image">
                    <div class="programme-badge badge-undergraduate">
                        <span>BSc</span>
                    </div>
                    <div class="programme-body">
                        <h3 class="programme-title">Computer Science</h3>
                        <p class="programme-description">Gain a solid foundation in computer science theory and practice...</p>
                        <p class="programme-leader">Programme Leader: Dr. Sarah Johnson</p>
                    </div>
                    <div class="programme-footer">
                        <a href="programme-details.php?id=1" class="btn btn-primary">View Details</a>
                        <a href="register-interest.php?id=1" class="btn btn-outline">Register Interest</a>
                    </div>
                </div>
                <!-- More programme cards -->
            </div>
        </div>
    </section>

        <!-- Features Section -->

    <section class="features-section">
        <div class="container">
            <div class="feature-card">
                <h2 class="feature-card-title">Why Choose Our University</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Excellence in Teaching</h3>
                            <p>Our programmes are taught by leading experts in their fields, providing cutting-edge education with practical insights.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Industry Connections</h3>
                            <p>Strong partnerships with industry leaders ensure our curriculum remains relevant and our graduates are highly employable.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Global Community</h3>
                            <p>Join a diverse community of students and academics from around the world, enriching your educational experience.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Research Excellence</h3>
                            <p>Our university is at the forefront of groundbreaking research, with opportunities for students to participate in innovative projects.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="feature-content">
                            <h3>State-of-the-Art Facilities</h3>
                            <p>Access modern laboratories, libraries, and digital resources designed to enhance your learning experience.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Career Support</h3>
                            <p>Benefit from dedicated career services, internship opportunities, and professional development workshops throughout your studies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php require_once 'includes/footer.php'; ?>