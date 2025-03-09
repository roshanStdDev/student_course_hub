<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection would be here in a real application
// require_once '../config/db_connection.php';

// For demonstration purposes, we'll use hardcoded credentials
// In a real application, you would verify against database records and use password_hash/password_verify
$admin_username = 'admin';
$admin_password = 'password123'; // In real app, this would be hashed

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize user inputs
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $remember_me = isset($_POST['remember_me']) ? true : false;
    
    // Validate credentials (in a real app, check against database)
    if ($username === $admin_username && $password === $admin_password) {
        // Set session variables
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_id'] = 1; // In a real app, this would be the user's ID from database
        
        // Set remember me cookie if requested (30 days expiry)
        if ($remember_me) {
            $token = bin2hex(random_bytes(32)); // Generate a secure token
            // In a real app, save this token in the database with the user ID
            setcookie('admin_remember', $token, time() + (86400 * 30), '/');
        }
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Invalid credentials, set error message and redirect back to login
        $_SESSION['login_error'] = 'Invalid username or password. Please try again.';
        header('Location: login.php');
        exit;
    }
} else {
    // If someone tries to access this file directly, redirect to login
    header('Location: login.php');
    exit;
}
?>