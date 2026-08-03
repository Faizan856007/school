<?php
/**
 * Dashboard Page
 * -----------------------------------------------------
 * Protected page — only accessible to logged-in users.
 * Displays a welcome message and basic statistics
 * (total students, teachers, classes).
 */

require_once 'includes/auth.php';
require_once 'config/database.php';

// Guard: redirect to login if not authenticated
requireLogin();

// ---- Fetch dashboard statistics ----
try {
    $totalStudents = (int) $pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
    $totalTeachers = (int) $pdo->query("SELECT COUNT(*) FROM teachers")->fetchColumn();
    $totalClasses  = (int) $pdo->query("SELECT COUNT(*) FROM classes")->fetchColumn();
} catch (PDOException $e) {
    // If the optional demo tables don't exist, default to 0 instead of crashing
    $totalStudents = 0;
    $totalTeachers = 0;
    $totalClasses  = 0;
}

$pageTitle = 'Dashboard - School Management System';
require_once 'includes/header.php';
?>

<div class="welcome-banner">
    <h1>Welcome, <?php echo sanitize($_SESSION['user_name']); ?> 👋</h1>
    <p>Role: <?php echo sanitize($_SESSION['user_role']); ?> &middot; You are logged in to the School Management System.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">🧑‍🎓</div>
        <div class="stat-info">
            <div class="stat-value"><?php echo $totalStudents; ?></div>
            <div class="stat-label">Total Students</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">👩‍🏫</div>
        <div class="stat-info">
            <div class="stat-value"><?php echo $totalTeachers; ?></div>
            <div class="stat-label">Total Teachers</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">🏫</div>
        <div class="stat-info">
            <div class="stat-value"><?php echo $totalClasses; ?></div>
            <div class="stat-label">Total Classes</div>
        </div>
    </div>
</div>

<div class="dashboard-panel">
    <h2>Getting Started</h2>
    <p>
        This is a demo dashboard for the School Management System login module.
        You can extend this page with student management, teacher management,
        attendance, timetables, and more.
    </p>
</div>

<?php require_once 'includes/footer.php'; ?>