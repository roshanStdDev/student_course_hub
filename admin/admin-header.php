<?php
// Start session if not already started (for authentication)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Get current page name for navigation highlighting
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin dashboard for Student Course Hub - Manage programmes, enquiries, and applications.">
    
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' - ' : ''; ?>Admin Portal</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/admin-header_footer.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon">
</head>
<body class="admin-panel">
    
    <!-- Admin Header -->
    <header class="admin-header">
        <div class="container admin-header-container">
            <!-- Logo -->
            <a href="dashboard.php" class="admin-logo">
                <svg width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0L0 4v8l8 4 8-4V4L8 0zm0 1.2L14.6 4l-3 1.5L5 3 8 1.2zM4 4.6l3.2 1.6v3.8c-1-.5-2-1-3.2-1.6V4.6zm4.8 5.4V6.2L12 4.6v3.8l-3.2 1.6z"/>
                </svg>
                <h1>Admin Portal</h1>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button class="admin-menu-toggle" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Admin Navigation -->
            <nav class="admin-nav">
                <ul class="admin-nav-list">
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'dashboard.php' ? 'active' : ''; ?>" 
                           href="dashboard.php">
                           <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'programmes.php' ? 'active' : ''; ?>" 
                           href="programmes.php">
                           <i class="fas fa-graduation-cap"></i> Programmes
                        </a>
                    </li>
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'enquiries.php' ? 'active' : ''; ?>" 
                           href="enquiries.php">
                           <i class="fas fa-question-circle"></i> Enquiries
                        </a>
                    </li>
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'applications.php' ? 'active' : ''; ?>" 
                           href="applications.php">
                           <i class="fas fa-clipboard-list"></i> Applications
                        </a>
                    </li>
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'events.php' ? 'active' : ''; ?>" 
                           href="events.php">
                           <i class="fas fa-calendar-alt"></i> Events
                        </a>
                    </li>
                    <li class="admin-nav-item">
                        <a class="admin-nav-link <?php echo $current_page === 'settings.php' ? 'active' : ''; ?>" 
                           href="settings.php">
                           <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Admin User Menu -->
            <div class="admin-user-menu">
                <button class="admin-user-toggle">
                    <div class="admin-user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <span class="admin-username"><?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="admin-dropdown-menu">
                    <li><a href="profile.php"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="help.php"><i class="fas fa-question-circle"></i> Help</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="admin-main-content">
        <div class="admin-content-container"> 