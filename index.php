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

    <title><?php echo SITE_NAME; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>

    <!-- Logo -->
    <div class="logo">
        <div class="logo-box">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="school-name">
            <h2><?php echo SITE_NAME; ?></h2>
            <p>Learn • Grow • Shine</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="academics.php">Academics</a></li>
            <li><a href="admissions.php">Admissions</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Button -->
    <div class="header-btn">
        <a href="admissions.php" class="btn">
            Apply Now
        </a>
    </div>

</header>
<script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
