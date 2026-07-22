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


</head>
<body>
    
<body>

<header>

<div class="logo">

<div class="logo-box">
<i class="fas fa-graduation-cap"></i>
</div>

<div class="school-name">
<h2>Future Bright School</h2>
<p>Learn • Grow • Shine</p>
</div>

</div>


<nav>

<ul>

<li><a href="#">Home</a></li>

<li><a href="#">About</a></li>

<li><a href="#">Academics</a></li>

<li><a href="#">Admission</a></li>

<li><a href="#">Gallery</a></li>

<li><a href="#">Contact</a></li>

</ul>

</nav>

<div class="header-btn">

<a href="#" class="btn">
Apply Now
</a>

</div>

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
