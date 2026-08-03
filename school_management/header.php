<?php
/**
 * Shared Header
 * Used by internal pages such as dashboard.php
 * Expects $pageTitle to be optionally set before include.
 */
$pageTitle = $pageTitle ?? 'School Management System';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo sanitize($pageTitle); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <span class="brand-icon">🎓</span>
            <span class="brand-text">School Management System</span>
        </div>
        <?php if (isLoggedIn()): ?>
            <div class="topbar-user">
                <span class="user-chip">
                    <?php echo sanitize($_SESSION['user_name']); ?>
                    (<?php echo sanitize($_SESSION['user_role']); ?>)
                </span>
                <a href="logout.php" class="btn-logout-small">Logout</a>
            </div>
        <?php endif; ?>
    </div>
</header>
<main class="page-content">
