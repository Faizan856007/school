<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? e($pageTitle) . ' - ' . SITE_NAME : SITE_NAME; ?></title>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
</head>
<body>
 
<header class="site-header">
    <div class="topbar">
        <div class="container topbar-inner">
            <span>📞 +91 98765 43210 &nbsp;|&nbsp; ✉ info@greenfieldschool.test</span>
            <div class="topbar-links">
                <?php if (isLoggedIn()): ?>
                    <a href="<?php echo BASE_URL; ?>/parent/dashboard.php">My Dashboard</a>
                    <a href="<?php echo BASE_URL; ?>/auth/logout.php">Logout</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>/auth/login.php">Login</a>
                    <a href="<?php echo BASE_URL; ?>/auth/register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
 
    <nav class="main-nav">
        <div class="container nav-inner">
            <a href="<?php echo BASE_URL; ?>/index.php" class="logo"><?php echo SITE_NAME; ?></a>
            <button class="nav-toggle" id="navToggle" aria-label="Menu">☰</button>
            <ul class="nav-links" id="navLinks">
                <li><a href="<?php echo BASE_URL; ?>/index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/about.php">About</a></li>
                <li><a href="<?php echo BASE_URL; ?>/admissions.php">Admissions</a></li>
                <li><a href="<?php echo BASE_URL; ?>/academics.php">Academics</a></li>
                <li><a href="<?php echo BASE_URL; ?>/faculty.php">Faculty</a></li>
                <li><a href="<?php echo BASE_URL; ?>/departments.php">Departments</a></li>
                <li><a href="<?php echo BASE_URL; ?>/gallery.php">Gallery</a></li>
                <li><a href="<?php echo BASE_URL; ?>/news.php">News</a></li>
                <li><a href="<?php echo BASE_URL; ?>/events.php">Events</a></li>
                <li><a href="<?php echo BASE_URL; ?>/notice-board.php">Notice Board</a></li>
                <li><a href="<?php echo BASE_URL; ?>/contact.php">Contact</a></li>
                <li><a href="<?php echo BASE_URL; ?>/faq.php">FAQ</a></li>
            </ul>
        </div>
    </nav>
</header>
 
<main>
