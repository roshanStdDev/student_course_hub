<?php
// Set page variables
$page_title = 'Our Programmes';
$full_width = false;

// Get level from URL parameter (1 = Undergraduate, 2 = Postgraduate)
$level = isset($_GET['level']) ? intval($_GET['level']) : null;

// Filter title based on level
$filter_title = '';
if ($level === 1) {
    $filter_title = 'Undergraduate';
} elseif ($level === 2) {
    $filter_title = 'Postgraduate';
}

// Include header
require_once 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title"><?php echo $filter_title ? $filter_title . ' Programmes' : 'All Programmes'; ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $filter_title ? $filter_title . ' Programmes' : 'All Programmes'; ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section">
    <div class="container">
        <div class="filter-container">
            <div class="filter-header">
                <h2 class="filter-title">Browse Programmes</h2>
            </div>
            <div class="filter-options">
                <a href="programmes.php" class="filter-link <?php echo !$level ? 'active' : ''; ?>">All Programmes</a>
                <a href="programmes.php?level=1" class="filter-link <?php echo $level === 1 ? 'active' : ''; ?>">Undergraduate</a>
                <a href="programmes.php?level=2" class="filter-link <?php echo $level === 2 ? 'active' : ''; ?>">Postgraduate</a>
            </div>
        </div>
    </div>
</section>

<!-- Programmes List -->
<section class="programmes-list-section">
    <div class="container">
        <?php if ($level === 1 || $level === null): ?>
        <!-- Undergraduate Programmes -->
        <div class="section-header">
            <h2 class="section-title">Undergraduate Programmes</h2>
        </div>
        
        <div class="programmes-grid">
            <!-- BSc Computer Science -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="BSc Computer Science" class="programme-image">
                <div class="programme-badge badge-undergraduate">
                    <span>BSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Computer Science</h3>
                    <p class="programme-description">Develop a deep understanding of algorithms, data structures, and software engineering principles. Learn programming languages such as Python, Java, and C++, while exploring cutting-edge areas like artificial intelligence and machine learning.</p>
                    <p class="programme-leader">Programme Leader: Dr. Sarah Johnson</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=1" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=1" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <!-- BSc Software Engineering -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="BSc Software Engineering" class="programme-image">
                <div class="programme-badge badge-undergraduate">
                    <span>BSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Software Engineering</h3>
                    <p class="programme-description">Focus on the practical aspects of building robust, scalable software systems. Learn agile methodologies, DevOps practices, and gain hands-on experience in software architecture, testing, and deployment.</p>
                    <p class="programme-leader">Programme Leader: Prof. Michael Chen</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=2" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=2" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <!-- BSc Cyber Security -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="BSc Cyber Security" class="programme-image">
                <div class="programme-badge badge-undergraduate">
                    <span>BSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Cyber Security</h3>
                    <p class="programme-description">Learn how to protect systems, networks, and programs from digital attacks. Study cryptography, network security, ethical hacking, and digital forensics while developing critical thinking skills for identifying and mitigating security vulnerabilities.</p>
                    <p class="programme-leader">Programme Leader: Dr. Alicia Rodriguez</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=3" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=3" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($level === 2 || $level === null): ?>
        <!-- Postgraduate Programmes -->
        <div class="section-header">
            <h2 class="section-title">Postgraduate Programmes</h2>
        </div>
        
        <div class="programmes-grid">
            <!-- MSc Advanced Computer Science -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="MSc Advanced Computer Science" class="programme-image">
                <div class="programme-badge badge-postgraduate">
                    <span>MSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Advanced Computer Science</h3>
                    <p class="programme-description">Deepen your computer science knowledge with advanced theoretical concepts and practical skills. Specialize in areas such as distributed systems, high-performance computing, or computational intelligence while conducting cutting-edge research.</p>
                    <p class="programme-leader">Programme Leader: Prof. David Williams</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=4" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=4" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <!-- MSc Artificial Intelligence -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="MSc Artificial Intelligence" class="programme-image">
                <div class="programme-badge badge-postgraduate">
                    <span>MSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Artificial Intelligence</h3>
                    <p class="programme-description">Master the theory and application of AI algorithms and systems. Study machine learning, deep learning, natural language processing, and computer vision while developing innovative AI solutions for real-world problems.</p>
                    <p class="programme-leader">Programme Leader: Dr. Rebecca Liu</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=5" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=5" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <!-- MSc Data Science -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="MSc Data Science" class="programme-image">
                <div class="programme-badge badge-postgraduate">
                    <span>MSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Data Science</h3>
                    <p class="programme-description">Learn to extract insights from complex data using statistical methods and programming. Master data preprocessing, exploratory analysis, visualization, and predictive modeling while developing expertise in tools like Python, R, and SQL.</p>
                    <p class="programme-leader">Programme Leader: Prof. James Thompson</p>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=6" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=6" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>