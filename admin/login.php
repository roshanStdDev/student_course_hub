<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin login for Student Course Hub - Manage programmes, enquiries, and applications.">
    
    <title>Admin Login - Student Course Hub</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/login_logout_header_footer.css">
    
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="login-header">
        <div class="container header-container">
            <a href="../index.php" class="logo">
                <svg width="30" height="30" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0L0 4v8l8 4 8-4V4L8 0zm0 1.2L14.6 4l-3 1.5L5 3 8 1.2zM4 4.6l3.2 1.6v3.8c-1-.5-2-1-3.2-1.6V4.6zm4.8 5.4V6.2L12 4.6v3.8l-3.2 1.6z"/>
                </svg>
                <h1>Student Course Hub</h1>
            </a>
        </div>
    </header>

    <footer class="login-footer">
        <div class="container">
            <p class="copyright">
                &copy; <?php echo date('Y'); ?> Student Course Hub. All rights reserved.
            </p>
        </div>
    </footer>
    
</body>
</html>