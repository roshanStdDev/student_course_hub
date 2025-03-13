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

<!-- Modules Table -->
<div class="module-card">
    <div class="module-card-header">
        <h2 class="module-card-title">All Modules</h2>
        <a href="module-add.php" class="module-btn module-btn-sm">Add New</a>
    </div>
    <div class="module-card-body">
        <?php if (empty($modules)): ?>
            <p class="module-text-muted">No modules found.</p>
        <?php else: ?>
            <div class="module-table-responsive">
                <table class="module-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Module Name</th>
                            <th>Module Leader</th>
                            <th>Programmes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modules as $module): ?>
                            <tr>
                                <td><?php echo $module['ModuleID']; ?></td>
                                <td><?php echo htmlspecialchars($module['ModuleName']); ?></td>
                                <td><?php echo htmlspecialchars($module['ModuleLeader'] ?? 'Not Assigned'); ?></td>
                                <td>
                                    <?php if ($module['ProgrammeCount'] > 0): ?>
                                        <span class="module-badge"><?php echo $module['ProgrammeCount']; ?></span>
                                    <?php else: ?>
                                        <span class="module-text-muted">None</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="module-action-buttons">
                                        <a href="module-edit.php?id=<?php echo $module['ModuleID']; ?>" class="module-btn module-btn-sm module-btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="module-view.php?id=<?php echo $module['ModuleID']; ?>" class="module-btn module-btn-sm module-btn-view" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="module-btn module-btn-sm module-btn-delete" 
                                           data-id="<?php echo $module['ModuleID']; ?>" 
                                           onclick="confirmDelete(<?php echo $module['ModuleID']; ?>)" 
                                           title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Module Statistics and Quick Actions -->
<div class="module-row">
    <div class="module-col-12 module-col-lg-7">
        <div class="module-card module-mt-4">
            <div class="module-card-header">
                <h2 class="module-card-title">Module Statistics</h2>
            </div>
            <div class="module-card-body">
                <div class="module-stat-list">
                    <div class="module-stat-card module-primary-stat">
                        <div class="module-stat-card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="module-stat-card-value"><?php echo $total_modules; ?></div>
                        <div class="module-stat-card-title">Total Modules</div>
                    </div>
                    
                    <div class="module-stat-card module-secondary-stat">
                        <div class="module-stat-card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="module-stat-card-value"><?php echo $modules_with_programmes; ?></div>
                        <div class="module-stat-card-title">Assigned to Programmes</div>
                        <div class="module-stat-card-desc"><?php echo $total_modules - $modules_with_programmes; ?> unassigned</div>
                    </div>
                    
                    <div class="module-stat-card module-tertiary-stat">
                        <div class="module-stat-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="module-stat-card-value"><?php echo $modules_with_leaders; ?></div>
                        <div class="module-stat-card-title">With Module Leaders</div>
                        <div class="module-stat-card-desc"><?php echo $leaderless_percentage; ?>% need leaders</div>
                    </div>
                    
                    <div class="module-stat-card module-quaternary-stat">
                        <div class="module-stat-card-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="module-stat-card-value"><?php echo 100 - $unassigned_percentage; ?>%</div>
                        <div class="module-stat-card-title">In Programmes</div>
                        <div class="module-stat-card-desc"><?php echo $unassigned_percentage; ?>% standalone</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="module-col-12 module-col-lg-5">
        <div class="module-card module-mt-4">
            <div class="module-card-header">
                <h2 class="module-card-title">Quick Actions</h2>
            </div>
            <div class="module-card-body">
                <div class="module-quick-links">
                    <a href="module-add.php" class="module-quick-link-item">
                        <div class="module-quick-link-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="module-quick-link-text">Add New Module</div>
                    </a>
                    <a href="programme-module-assign.php" class="module-quick-link-item">
                        <div class="module-quick-link-icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="module-quick-link-text">Assign to Programme</div>
                    </a>
                    <a href="module-batch-import.php" class="module-quick-link-item">
                        <div class="module-quick-link-icon">
                            <i class="fas fa-file-import"></i>
                        </div>
                        <div class="module-quick-link-text">Batch Import</div>
                    </a>
                    <a href="module-report.php" class="module-quick-link-item">
                        <div class="module-quick-link-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="module-quick-link-text">Generate Report</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="module-modal" id="deleteModal">
    <div class="module-modal-content">
        <div class="module-modal-header">
            <h3>Confirm Delete</h3>
            <span class="module-close">&times;</span>
        </div>
        <div class="module-modal-body">
            <p>Are you sure you want to delete this module? This action cannot be undone.</p>
        </div>
        <div class="module-modal-footer">
            <form method="post" id="deleteForm">
                <input type="hidden" name="delete_id" id="deleteId">
                <button type="button" class="module-btn module-btn-light" id="cancelDelete">Cancel</button>
                <button type="submit" class="module-btn module-btn-delete">Delete</button>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript for Delete Modal -->
<script>
    // Get the modal
    const modal = document.getElementById('deleteModal');
    
    // Get the form and id field
    const deleteForm = document.getElementById('deleteForm');
    const deleteId = document.getElementById('deleteId');
    
    // Function to show modal and set id
    function confirmDelete(id) {
        modal.style.display = "block";
        deleteId.value = id;
        return false;
    }
    
    // Close the modal when clicking the × button
    document.querySelector('.module-close').addEventListener('click', function() {
        modal.style.display = "none";
    });
    
    // Close the modal when clicking the Cancel button
    document.getElementById('cancelDelete').addEventListener('click', function() {
        modal.style.display = "none";
    });
    
    // Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script>

<?php require_once 'admin-footer.php'; ?>