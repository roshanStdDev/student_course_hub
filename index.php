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



<?php require_once 'includes/footer.php'; ?>