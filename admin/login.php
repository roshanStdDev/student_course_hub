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

    <!-- Login Section -->
    <section class="login-section">
        <div class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <h2>Admin Login</h2>
                    <p>Enter your credentials to access the admin dashboard</p>
                </div>
                
                <?php if(isset($_SESSION['login_error'])): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php 
                        echo $_SESSION['login_error']; 
                        unset($_SESSION['login_error']);
                    ?>
                </div>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['logout_message'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php 
                        echo $_SESSION['logout_message']; 
                        unset($_SESSION['logout_message']);
                    ?>
                </div>
                <?php endif; ?>
                
                <form class="auth-form" action="process-login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="username" name="username" class="form-control" required autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group remember-me">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember_me">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                        <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                
                <div class="auth-footer">
                    <p>Need help? <a href="mailto:support@dmustduniversity.edu">Contact Support</a></p>
                    <p><a href="../index.php"><i class="fas fa-arrow-left"></i> Return to Main Site</a></p>
                </div>
            </div>
        </div>
    </section>

    <footer class="login-footer">
        <div class="container">
            <p class="copyright">
                &copy; <?php echo date('Y'); ?> Student Course Hub. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Alert auto-dismiss
        const alerts = document.querySelectorAll('.alert');
        
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500);
            }, 5000);
        });
    </script>
</body>
</html>