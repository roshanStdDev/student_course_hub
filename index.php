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



<?php require_once 'includes/footer.php'; ?>