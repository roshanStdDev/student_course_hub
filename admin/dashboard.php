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
$page_title = 'Admin Dashboard';
$full_width = false;

// Database connection
// require_once '../config/database.php';

// Get database counts and statistics
try {
    $db = new PDO('mysql:host=localhost;dbname=student_course_hub', 'username', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Count programmes by level
    $stmt = $db->query("
        SELECT l.LevelName, COUNT(p.ProgrammeID) as count 
        FROM Programmes p 
        JOIN Levels l ON p.LevelID = l.LevelID 
        GROUP BY p.LevelID
    ");
    $programme_counts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Count total modules
    $stmt = $db->query("SELECT COUNT(*) FROM Modules");
    $total_modules = $stmt->fetchColumn();
    
    // Count total staff
    $stmt = $db->query("SELECT COUNT(*) FROM Staff");
    $total_staff = $stmt->fetchColumn();
    
    // Interest registration statistics
    $stmt = $db->query("
        SELECT COUNT(*) FROM InterestedStudents 
        WHERE RegisteredAt >= DATE_SUB(NOW(), INTERVAL 30 DAY)
    ");
    $recent_interests = $stmt->fetchColumn();
    
    $stmt = $db->query("SELECT COUNT(*) FROM InterestedStudents");
    $total_interests = $stmt->fetchColumn();
    
    // Get recent interest registrations
    $stmt = $db->query("
        SELECT i.*, p.ProgrammeName
        FROM InterestedStudents i
        LEFT JOIN Programmes p ON i.ProgrammeID = p.ProgrammeID
        ORDER BY i.RegisteredAt DESC
        LIMIT 8
    ");
    $recent_registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get popular programmes (most interest registrations)
    $stmt = $db->query("
        SELECT p.ProgrammeID, p.ProgrammeName, l.LevelName, COUNT(i.InterestID) as interest_count
        FROM Programmes p
        LEFT JOIN Levels l ON p.LevelID = l.LevelID
        LEFT JOIN InterestedStudents i ON p.ProgrammeID = i.ProgrammeID
        GROUP BY p.ProgrammeID
        ORDER BY interest_count DESC
        LIMIT 5
    ");
    $popular_programmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get recent activity
    // Add recent interest registrations to activity log
    $stmt = $db->query("
        SELECT 
            'interest_registration' as type,
            i.InterestID as id,
            i.StudentName as title,
            p.ProgrammeName as details,
            i.RegisteredAt as date
        FROM InterestedStudents i
        LEFT JOIN Programmes p ON i.ProgrammeID = p.ProgrammeID
        ORDER BY i.RegisteredAt DESC
        LIMIT 10
    ");
    $recent_activity = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Log error
    error_log('Dashboard Error: ' . $e->getMessage());
    
    // Set default values
    $programme_counts = [];
    $total_modules = 0;
    $total_staff = 0;
    $recent_interests = 0;
    $total_interests = 0;
    $recent_registrations = [];
    $popular_programmes = [];
    $recent_activity = [];
}

// Include header
require_once 'admin-header.php';
?>

<link rel="stylesheet" href="../public/css/dashboard.css">
<!-- Welcome Banner -->
<div class="welcome-banner">
    <div class="welcome-content">
        <h2>Welcome, <?php echo isset($_SESSION['admin_name']) ? htmlspecialchars($_SESSION['admin_name']) : 'Admin'; ?>!</h2>
        <p>This is your Student Course Hub administrative dashboard. Here you can manage programmes, modules, staff, and view student interest registrations.</p>
    </div>
    <div class="welcome-actions">
        <a href="interests.php" class="btn btn-sm">
            <i class="fas fa-clipboard-list"></i> View Interest Registrations
        </a>
        <a href="../index.php" target="_blank" class="btn btn-sm btn-light">
            <i class="fas fa-external-link-alt"></i> Visit Website
        </a>
    </div>
</div>

<?php require_once 'admin-footer.php'; ?>