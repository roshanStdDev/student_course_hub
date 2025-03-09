<?php
// Set page variables
$page_title = 'Register Interest';
$full_width = false;

// Include header
require_once 'includes/header.php';

// In a real application, this would be fetched from a database
$programme_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Example programme data (in a real app this would come from a database)
$programmes = [
    1 => [
        'title' => 'Computer Science',
        'level' => 'Undergraduate',
        'badge' => 'BSc',
        'faculty' => 'Computing, Engineering & Media'
    ],
    2 => [
        'title' => 'Data Science',
        'level' => 'Postgraduate',
        'badge' => 'MSc',
        'faculty' => 'Computing, Engineering & Media'
    ],
    3 => [
        'title' => 'Artificial Intelligence',
        'level' => 'Postgraduate',
        'badge' => 'MSc',
        'faculty' => 'Computing, Engineering & Media'
    ]
];

// Check if the programme exists
$programme = isset($programmes[$programme_id]) ? $programmes[$programme_id] : null;

// Process form submission
$form_submitted = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form validation would go here
    // For demonstration, just setting the form as submitted
    $form_submitted = true;
}
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Register Your Interest</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <?php if ($programme): ?>
                    <li class="breadcrumb-item"><a href="programmes.php">Programmes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register Interest: <?php echo htmlspecialchars($programme['title']); ?></li>
                <?php else: ?>
                    <li class="breadcrumb-item active" aria-current="page">Register Interest</li>
                <?php endif; ?>
            </ol>
        </nav>
    </div>
</section>

<section class="register-interest-section">
    <div class="section-header">
        <h2 class="section-title">Register Your Interest</h2>
    </div>

    <div class="form-container">
        <?php if ($form_submitted): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                <h3>Thank You for Your Interest!</h3>
                <p>We have received your request for information about 
                   <?php echo $programme ? htmlspecialchars($programme['title']) : 'our programmes'; ?>. 
                   A member of our team will be in touch with you shortly.</p>
                <div class="success-actions">
                    <a href="index.php" class="btn btn-primary">Return to Homepage</a>
                    <a href="programmes.php" class="btn btn-outline">View All Programmes</a>
                </div>
            </div>
        <?php else: ?>
            <?php if ($programme): ?>
                <div class="programme-info">
                    <div class="programme-badge <?php echo $programme['level'] === 'Undergraduate' ? 'badge-undergraduate' : 'badge-postgraduate'; ?>">
                        <?php echo htmlspecialchars($programme['badge']); ?>
                    </div>
                    <h3><?php echo htmlspecialchars($programme['title']); ?></h3>
                    <p><?php echo htmlspecialchars($programme['faculty']); ?></p>
                </div>
            <?php endif; ?>

            <form action="register-interest.php<?php echo $programme_id ? '?id=' . $programme_id : ''; ?>" method="post" class="register-form">
                <?php if (!$programme): ?>
                    <div class="form-group">
                        <label for="programme">Programme of Interest</label>
                        <select name="programme" id="programme" class="form-control" required>
                            <option value="">Select a Programme</option>
                            <option value="1">BSc Computer Science</option>
                            <option value="2">MSc Data Science</option>
                            <option value="3">MSc Artificial Intelligence</option>
                            <!-- More programmes would be listed here -->
                        </select>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="programme_id" value="<?php echo $programme_id; ?>">
                <?php endif; ?>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name*</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name*</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address*</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="country">Country of Residence*</label>
                    <select id="country" name="country" class="form-control" required>
                        <option value="">Select your country</option>
                        <option value="UK">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="AU">Australia</option>
                        <!-- More countries would be listed here -->
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="education">Highest Education Level*</label>
                    <select id="education" name="education" class="form-control" required>
                        <option value="">Select your highest education</option>
                        <option value="high-school">High School / Secondary School</option>
                        <option value="college">College Diploma</option>
                        <option value="bachelors">Bachelor's Degree</option>
                        <option value="masters">Master's Degree</option>
                        <option value="doctorate">Doctorate</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="start_date">Intended Start Date*</label>
                    <select id="start_date" name="start_date" class="form-control" required>
                        <option value="">Select your preferred start</option>
                        <option value="2025-09">September 2025</option>
                        <option value="2026-01">January 2026</option>
                        <option value="2026-09">September 2026</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="questions">Questions or Comments</label>
                    <textarea id="questions" name="questions" class="form-control" rows="4"></textarea>
                </div>
                
                <div class="form-group checkbox-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="consent" name="consent" required>
                        <label for="consent">I consent to the university contacting me about the programme and related information*</label>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                    <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; ?>" class="btn btn-outline">Cancel</a>
                </div>
                
                <p class="form-disclaimer">* Required fields. By submitting this form, you agree to our <a href="#">Privacy Policy</a>.</p>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>