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

// Include header - in a real application, you'd likely have a separate admin header
require_once 'admin-header.php';?>

<?php require_once 'admin-footer.php'; ?>