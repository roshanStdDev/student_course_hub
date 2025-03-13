<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Set page variables
$page_title = 'Manage Modules';
$full_width = false;

// Process delete action
$success_message = '';
$error_message = '';

// Mock data for modules
$modules = [
    [
        'ModuleID' => 1,
        'ModuleName' => 'Introduction to Computer Science',
        'ModuleLeader' => 'Dr. Alan Smith',
        'ProgrammeCount' => 3
    ],
    [
        'ModuleID' => 2,
        'ModuleName' => 'Web Development',
        'ModuleLeader' => 'Prof. Sarah Johnson',
        'ProgrammeCount' => 2
    ],
    [
        'ModuleID' => 3,
        'ModuleName' => 'Database Systems',
        'ModuleLeader' => 'Dr. Michael Brown',
        'ProgrammeCount' => 4
    ],
    [
        'ModuleID' => 4,
        'ModuleName' => 'Artificial Intelligence',
        'ModuleLeader' => 'Prof. James Wilson',
        'ProgrammeCount' => 1
    ],
    [
        'ModuleID' => 5,
        'ModuleName' => 'Software Engineering',
        'ModuleLeader' => 'Dr. Emily Davis',
        'ProgrammeCount' => 5
    ],
    [
        'ModuleID' => 6,
        'ModuleName' => 'Network Security',
        'ModuleLeader' => 'Prof. Robert Taylor',
        'ProgrammeCount' => 0
    ],
    [
        'ModuleID' => 7,
        'ModuleName' => 'Mobile Application Development',
        'ModuleLeader' => null,
        'ProgrammeCount' => 2
    ],
    [
        'ModuleID' => 8,
        'ModuleName' => 'Cloud Computing',
        'ModuleLeader' => 'Dr. Lisa Martinez',
        'ProgrammeCount' => 3
    ]
];

// Calculate statistics
$total_modules = count($modules);
$modules_with_programmes = 0;
$modules_with_leaders = 0;

foreach ($modules as $module) {
    if ($module['ProgrammeCount'] > 0) {
        $modules_with_programmes++;
    }
    
    if (!empty($module['ModuleLeader'])) {
        $modules_with_leaders++;
    }
}

$unassigned_percentage = $total_modules > 0 ? round(($total_modules - $modules_with_programmes) / $total_modules * 100) : 0;
$leaderless_percentage = $total_modules > 0 ? round(($total_modules - $modules_with_leaders) / $total_modules * 100) : 0;


// Include header
require_once 'admin-header.php';
?>
<link rel="stylesheet" href="../public/css/modules.css">
<!-- Page Header -->
<div class="module-header-banner">
    <div class="module-header-content">
        <h2>Manage Modules</h2>
        <p>View, add, edit, and delete modules in the system. You can also assign modules to programmes and staff members.</p>
    </div>
    <div class="module-header-actions">
        <a href="module-add.php" class="module-btn module-btn-sm">
            <i class="fas fa-plus"></i> Add New Module
        </a>
        <a href="module-report.php" class="module-btn module-btn-sm module-btn-light">
            <i class="fas fa-chart-bar"></i> Generate Report
        </a>
    </div>
</div>

<!-- Success/Error Messages -->
<?php if ($success_message): ?>
    <div class="module-alert module-alert-success">
        <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success_message); ?>
    </div>
<?php endif; ?>

<?php if ($error_message): ?>
    <div class="module-alert module-alert-danger">
        <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error_message); ?>
    </div>
<?php endif; ?>


<?php require_once 'admin-footer.php'; ?>