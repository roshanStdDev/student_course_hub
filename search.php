<?php
// Set page variables
$page_title = 'Search Programmes';
$full_width = false;

// Include header
require_once 'includes/header.php';
?>

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

<?php
// Helper function to remove a specific query parameter from the current URL
function removeQueryParam($param) {
    $params = $_GET;
    unset($params[$param]);
    return '?' . http_build_query($params);
}

require_once 'includes/footer.php'; 
?>