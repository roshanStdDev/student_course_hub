<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Clear all session variables
$_SESSION = array();

// Delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Delete the remember me cookie if it exists
if (isset($_COOKIE['admin_remember'])) {
    setcookie('admin_remember', '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to login page with a logout message
session_start(); // Start a new session to store the logout message
$_SESSION['logout_message'] = "You have been successfully logged out.";
header('Location: login.php');
exit;
?>