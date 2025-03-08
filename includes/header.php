<?php
// Start session if not already started (for authentication)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore undergraduate and postgraduate programmes at our university. Find your perfect degree programme and register your interest today.">
    
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' - ' : ''; ?>Student Course Hub</title>
    
     
    <!-- Favicon -->
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
</head>
<body>
    
    <!-- Header -->
    <header>
        <div class="container header-container">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <svg width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0L0 4v8l8 4 8-4V4L8 0zm0 1.2L14.6 4l-3 1.5L5 3 8 1.2zM4 4.6l3.2 1.6v3.8c-1-.5-2-1-3.2-1.6V4.6zm4.8 5.4V6.2L12 4.6v3.8l-3.2 1.6z"/>
                </svg>
                <h1>Student Course Hub</h1>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Navigation -->
            <nav class="main-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page_title === 'Home' ? 'active' : ''; ?>" 
                           <?php echo $page_title === 'Home' ? 'aria-current="page"' : ''; ?> 
                           href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                            Programmes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="programmes.php">All Programmes</a></li>
                            <li><div class="dropdown-divider"></div></li>
                            <li><a class="dropdown-item" href="programmes.php?level=1">Undergraduate</a></li>
                            <li><a class="dropdown-item" href="programmes.php?level=2">Postgraduate</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page_title === 'Search Programmes' ? 'active' : ''; ?>" 
                           href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/login.php">Admin Login</a>
                    </li>
                </ul>
                
                <!-- Search Form -->
                <form class="search-form" action="search.php" method="get">
                    <input class="search-input" type="search" name="q" placeholder="Search programmes..." aria-label="Search">
                    <button class="search-button" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </nav>
        </div>
    </header>