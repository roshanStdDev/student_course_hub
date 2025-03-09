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

<?php require_once 'includes/footer.php'; ?>