<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('SITE_NAME', 'Greenfield School');
define('BASE_URL', '');

function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function isLoggedIn() {
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? e($pageTitle) . ' - ' . SITE_NAME : SITE_NAME; ?></title>
<link rel="stylesheet" href="style.css">
 <script src="main.js"></script>

     <link rel="stylesheet" href="style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

    
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
 

 
<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-col">
            <h3><?php echo SITE_NAME; ?></h3>
            <p>Nurturing curious minds since 1998.</p>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="<?php echo BASE_URL; ?>/admissions.php">Admissions</a>
            <a href="<?php echo BASE_URL; ?>/academics.php">Academics</a>
            <a href="<?php echo BASE_URL; ?>/contact.php">Contact</a>
            <a href="<?php echo BASE_URL; ?>/faq.php">FAQ</a>
        </div>
        <div class="footer-col">
            <h4>Parent Portal</h4>
            <a href="<?php echo BASE_URL; ?>/auth/login.php">Login</a>
            <a href="<?php echo BASE_URL; ?>/auth/register.php">Register</a>
        </div>
        <div class="footer-col">
            <h4>Contact</h4>
            <p>123 School Road, Your City</p>
            <p>info@greenfieldschool.test</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.
    </div>
</footer>
 
<script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
