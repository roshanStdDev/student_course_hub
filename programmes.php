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

<?php require_once 'includes/footer.php'; ?>