<?php
// Set page variables
$page_title = 'Search Programmes';
$full_width = false;

// Include header
require_once 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Search Programmes</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search Programmes</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Search Section -->
<section class="search-section">
    <div class="section-header">
        <h2 class="section-title">Search Programmes</h2>
        <p class="section-description">Find the perfect programme for your academic journey</p>
    </div>

    <div class="search-container">
        <form class="search-form-large" action="search.php" method="get">
            <div class="search-input-group">
                <input type="search" name="q" id="search-query" 
                    value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>" 
                    placeholder="Search by programme name, keyword or subject area..." 
                    class="search-input-large">
                <button type="submit" class="search-button-large">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            
            <div class="search-filters">
                <div class="filter-group">
                    <label for="level">Study Level</label>
                    <select name="level" id="level" class="filter-select">
                        <option value="">All Levels</option>
                        <option value="1" <?php echo (isset($_GET['level']) && $_GET['level'] == 1) ? 'selected' : ''; ?>>Undergraduate</option>
                        <option value="2" <?php echo (isset($_GET['level']) && $_GET['level'] == 2) ? 'selected' : ''; ?>>Postgraduate</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="faculty">Faculty</label>
                    <select name="faculty" id="faculty" class="filter-select">
                        <option value="">All Faculties</option>
                        <option value="computing" <?php echo (isset($_GET['faculty']) && $_GET['faculty'] == 'computing') ? 'selected' : ''; ?>>Computing, Engineering & Media</option>
                        <option value="business" <?php echo (isset($_GET['faculty']) && $_GET['faculty'] == 'business') ? 'selected' : ''; ?>>Business & Law</option>
                        <option value="health" <?php echo (isset($_GET['faculty']) && $_GET['faculty'] == 'health') ? 'selected' : ''; ?>>Health & Life Sciences</option>
                        <option value="arts" <?php echo (isset($_GET['faculty']) && $_GET['faculty'] == 'arts') ? 'selected' : ''; ?>>Arts, Design & Humanities</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="study-mode">Study Mode</label>
                    <select name="mode" id="study-mode" class="filter-select">
                        <option value="">All Modes</option>
                        <option value="full" <?php echo (isset($_GET['mode']) && $_GET['mode'] == 'full') ? 'selected' : ''; ?>>Full-time</option>
                        <option value="part" <?php echo (isset($_GET['mode']) && $_GET['mode'] == 'part') ? 'selected' : ''; ?>>Part-time</option>
                        <option value="distance" <?php echo (isset($_GET['mode']) && $_GET['mode'] == 'distance') ? 'selected' : ''; ?>>Distance Learning</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Search Results Section -->
<section class="search-results-section">
    <?php if (isset($_GET['q']) || isset($_GET['level']) || isset($_GET['faculty']) || isset($_GET['mode'])): ?>
        <div class="section-header">
            <h3 class="results-title">Search Results</h3>
            <div class="results-count">
                <!-- In a real application, this would come from database query -->
                <span>Showing 3 results</span>
            </div>
        </div>
        
        <div class="active-filters">
            <?php if (isset($_GET['q']) && !empty($_GET['q'])): ?>
                <div class="filter-tag">
                    Search: <?php echo htmlspecialchars($_GET['q']); ?>
                    <a href="<?php echo removeQueryParam('q'); ?>" class="remove-filter" aria-label="Remove this filter">×</a>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['level']) && !empty($_GET['level'])): ?>
                <div class="filter-tag">
                    Level: <?php echo $_GET['level'] == 1 ? 'Undergraduate' : 'Postgraduate'; ?>
                    <a href="<?php echo removeQueryParam('level'); ?>" class="remove-filter" aria-label="Remove this filter">×</a>
                </div>
            <?php endif; ?>
            
            <!-- Add more active filters as needed -->
            
            <?php if (isset($_GET['q']) || isset($_GET['level']) || isset($_GET['faculty']) || isset($_GET['mode'])): ?>
                <a href="search.php" class="clear-all-filters">Clear All Filters</a>
            <?php endif; ?>
        </div>
        
        <div class="programmes-grid">
            <!-- Example search results (in a real app, these would be populated from a database) -->
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="Computer Science" class="programme-image">
                <div class="programme-badge badge-undergraduate">
                    <span>BSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Computer Science</h3>
                    <p class="programme-description">Gain a solid foundation in computer science theory and practice with our industry-accredited programme.</p>
                    <p class="programme-leader">Programme Leader: Dr. Sarah Johnson</p>
                    <div class="programme-meta">
                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Full-time, Part-time</span>
                        <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Campus-based</span>
                    </div>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=1" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=1" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="Data Science" class="programme-image">
                <div class="programme-badge badge-postgraduate">
                    <span>MSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Data Science</h3>
                    <p class="programme-description">Develop the skills to analyze complex data and derive meaningful insights with our specialized programme.</p>
                    <p class="programme-leader">Programme Leader: Prof. Robert Chen</p>
                    <div class="programme-meta">
                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Full-time</span>
                        <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Campus-based</span>
                    </div>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=2" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=2" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
            
            <div class="programme-card">
                <img src="public/images/programme-placeholder.jpg" alt="Artificial Intelligence" class="programme-image">
                <div class="programme-badge badge-postgraduate">
                    <span>MSc</span>
                </div>
                <div class="programme-body">
                    <h3 class="programme-title">Artificial Intelligence</h3>
                    <p class="programme-description">Explore the cutting-edge field of AI with our comprehensive programme covering machine learning and neural networks.</p>
                    <p class="programme-leader">Programme Leader: Dr. Emily Wong</p>
                    <div class="programme-meta">
                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Full-time, Part-time</span>
                        <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Campus-based, Distance</span>
                    </div>
                </div>
                <div class="programme-footer">
                    <a href="programme-details.php?id=3" class="btn btn-primary">View Details</a>
                    <a href="register-interest.php?id=3" class="btn btn-outline">Register Interest</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="no-results">
            <p>Use the search box and filters above to find programmes that match your interests.</p>
        </div>
    <?php endif; ?>
</section>

<?php
// Helper function to remove a specific query parameter from the current URL
function removeQueryParam($param) {
    $params = $_GET;
    unset($params[$param]);
    return '?' . http_build_query($params);
}

require_once 'includes/footer.php'; 
?>