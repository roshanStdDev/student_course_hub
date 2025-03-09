<?php
// Set page variables
$page_title = 'Programme Details';
$full_width = false;

// Get programme ID from URL parameter
$programme_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Mock data for demonstration
$programmes = [
    1 => [
        'title' => 'BSc Computer Science',
        'level' => 'Undergraduate',
        'level_id' => 1,
        'badge' => 'BSc',
        'duration' => '3 years full-time',
        'leader' => 'Dr. Sarah Johnson',
        'description' => 'Our BSc Computer Science programme provides a solid foundation in computing principles, algorithms, data structures, and software development. Students will gain practical experience in multiple programming languages and explore cutting-edge topics like artificial intelligence, data science, and cybersecurity.',
        'career_prospects' => 'Graduates pursue careers as software developers, systems analysts, IT consultants, and more. Many continue to postgraduate study or enter research and development roles.',
        'entry_requirements' => 'BBB at A-level including Mathematics or Computer Science. BTEC DDM in Computing or related subject. International Baccalaureate: 30 points including Higher Level Mathematics.',
        'modules' => [
            'Year 1' => ['Programming Fundamentals', 'Computer Systems Architecture', 'Mathematics for Computing', 'Introduction to Web Development', 'Professional Skills', 'Database Systems'],
            'Year 2' => ['Object-Oriented Programming', 'Data Structures and Algorithms', 'Operating Systems', 'Software Engineering', 'Human-Computer Interaction', 'Networks and Security'],
            'Year 3' => ['Final Year Project', 'Artificial Intelligence', 'Advanced Software Engineering', 'Big Data Analytics', 'Mobile Application Development', 'Cloud Computing']
        ]
    ],
    // Other programme data would go here
];

// Get current programme data
$programme = isset($programmes[$programme_id]) ? $programmes[$programme_id] : $programmes[1];

// Include header
require_once 'includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title"><?php echo htmlspecialchars($programme['title']); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="programmes.php?level=<?php echo $programme['level_id']; ?>"><?php echo $programme['level']; ?> Programmes</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($programme['title']); ?></li>
            </ol>
        </nav>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>