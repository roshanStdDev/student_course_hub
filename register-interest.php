<?php
// Set page variables
$page_title = 'Register Interest';
$full_width = false;

// Include header
require_once 'includes/header.php';

// In a real application, this would be fetched from a database
$programme_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Example programme data (in a real app this would come from a database)
$programmes = [
    1 => [
        'title' => 'Computer Science',
        'level' => 'Undergraduate',
        'badge' => 'BSc',
        'faculty' => 'Computing, Engineering & Media'
    ],
    2 => [
        'title' => 'Data Science',
        'level' => 'Postgraduate',
        'badge' => 'MSc',
        'faculty' => 'Computing, Engineering & Media'
    ],
    3 => [
        'title' => 'Artificial Intelligence',
        'level' => 'Postgraduate',
        'badge' => 'MSc',
        'faculty' => 'Computing, Engineering & Media'
    ]
];

// Check if the programme exists
$programme = isset($programmes[$programme_id]) ? $programmes[$programme_id] : null;

// Process form submission
$form_submitted = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form validation would go here
    // For demonstration, just setting the form as submitted
    $form_submitted = true;
}
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Register Your Interest</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <?php if ($programme): ?>
                    <li class="breadcrumb-item"><a href="programmes.php">Programmes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register Interest: <?php echo htmlspecialchars($programme['title']); ?></li>
                <?php else: ?>
                    <li class="breadcrumb-item active" aria-current="page">Register Interest</li>
                <?php endif; ?>
            </ol>
        </nav>
    </div>
</section>


<?php require_once 'includes/footer.php'; ?>