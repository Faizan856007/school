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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="bg-gradient"></div>

<header class="header">

<div class="container">

<a href="#" class="logo">

<div class="logo-box">

<i class="fa-solid fa-graduation-cap"></i>

</div>

<div>

<h2>Green Valley</h2>

<span>International School</span>

</div>

</a>

<nav class="navbar">

<ul>

<li><a href="#home" class="active">Home</a></li>
<li><a href="#about">About</a></li>
<li><a href="#academics">Academics</a></li>
<li><a href="#campus">Campus</a></li>
<li><a href="#gallery">Gallery</a></li>
<li><a href="#contact">Contact</a></li>

</ul>

</nav>

<div class="header-buttons">

<a href="#" class="login-btn">
Login
</a>

<a href="#" class="apply-btn">
Apply Now
</a>

</div>
</div>

</header>

<section class="hero">

<div class="container hero-grid">

<div class="hero-left">

<div class="hero-tag">

⭐ Admissions Open 2026–27

</div>

<h1>

Building

Future

<span>Leaders</span>

Through

Innovation

</h1>

<p>

Experience world-class education with smart classrooms,
experienced teachers, innovation labs, sports excellence,
and a vibrant learning environment.

</p>

<div class="hero-buttons">

    <a href="#" class="primary-btn">
        Explore Campus
    </a>

    <a href="#" class="secondary-btn">
        Watch Video
        <i class="fa-solid fa-play"></i>
    </a>

</div>


<div class="hero-stats">

<div>

<h2>2500+</h2>

<span>Students</span>

</div>

<div>

<h2>150+</h2>

<span>Teachers</span>

</div>

<div>

<h2>100%</h2>

<span>Results</span>

</div>

</div>

</div>

<div class="hero-right">

    <img src="images/hero.png"  alt="Green Valley School">

    <!-- Floating Card 1 -->
    <div class="floating-card card-1">
        <i class="fa-solid fa-award"></i>
        <div>
            <h4>25+</h4>
            <p>Years Excellence</p>
        </div>
    </div>

    <!-- Floating Card 2 -->
    <div class="floating-card card-2">
        <i class="fa-solid fa-user-graduate"></i>
        <div>
            <h4>98%</h4>
            <p>Success Rate</p>
        </div>
    </div>

    <!-- Floating Card 3 -->
    <div class="floating-card card-3">
        <i class="fa-solid fa-medal"></i>
        <div>
            <h4>50+</h4>
            <p>National Awards</p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <span></span>
    </div>

</div>
</div>
</section>
<!-- =========================
     ABOUT SECTION
========================== -->

<section class="about" id="about">

    <div class="container about-grid">

        <div class="about-image">

            <img src="images/campus.png" alt="Campus">

            <div class="experience-box">

                <h2>25+</h2>

                <span>Years of Excellence</span>

            </div>

        </div>

        <div class="about-content">

            <span class="section-title">
                ABOUT OUR SCHOOL
            </span>

            <h2>
                Shaping Bright Minds For A Better Tomorrow
            </h2>

            <p>

                Green Valley International School provides a modern,
                innovative and inspiring learning environment where
                students grow academically, socially and personally.

            </p>

            <div class="about-features">

                <div class="feature-item">

                    <i class="fa-solid fa-check"></i>

                    Smart Digital Classrooms

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-check"></i>

                    Experienced Faculty

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-check"></i>

                    Sports & Activities

                </div>

                <div class="feature-item">

                    <i class="fa-solid fa-check"></i>

                    Robotics & Innovation Lab

                </div>

            </div>

            <a href="#" class="primary-btn">

                Discover More

            </a>

        </div>

    </div>

</section>
<!-- =========================
ACADEMICS
========================== -->

<section class="academics" id="academics">

    <div class="container">

        <div class="section-header">

            <span>ACADEMICS</span>

            <h2>World Class Learning Programs</h2>

            <p>
                Our curriculum blends academics, technology, sports and creativity
                to prepare students for the future.
            </p>

        </div>

        <div class="academic-grid">

            <div class="academic-card">

                <div class="academic-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <h3>Primary School</h3>

                <p>
                    Strong foundation with activity-based learning and modern teaching.
                </p>

                <a href="#">Read More →</a>

            </div>

            <div class="academic-card">

                <div class="academic-icon">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>

                <h3>Middle School</h3>

                <p>
                    STEM education, coding, robotics and project-based learning.
                </p>

                <a href="#">Read More →</a>

            </div>

            <div class="academic-card">

                <div class="academic-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <h3>Senior School</h3>

                <p>
                    Career-focused education with excellent board examination results.
                </p>

                <a href="#">Read More →</a>

            </div>

        </div>

    </div>

</section>
<!-- =========================
CAMPUS EXPERIENCE
========================== -->

<section class="campus" id="campus">

    <div class="container campus-grid">

        <div class="campus-content">

            <span class="section-title">
                CAMPUS EXPERIENCE
            </span>

            <h2>Explore Our Modern Campus</h2>

            <p>
                Our campus is designed to inspire learning with smart classrooms,
                advanced science labs, robotics, digital libraries, sports arenas,
                art studios and innovation spaces.
            </p>

            <div class="campus-list">

                <div><i class="fa-solid fa-check"></i> Smart Digital Classrooms</div>

                <div><i class="fa-solid fa-check"></i> Robotics & AI Lab</div>

                <div><i class="fa-solid fa-check"></i> Olympic Sports Facilities</div>

                <div><i class="fa-solid fa-check"></i> Library & Innovation Hub</div>

            </div>

            <a href="#" class="primary-btn">
                Virtual Campus Tour
            </a>

        </div>

        <div class="campus-image">

            <img src="images/campus.png" alt="Campus">

            <a href="#" class="play-btn">
                <i class="fa-solid fa-play"></i>
            </a>

        </div>

    </div>

</section>
<!-- =========================
GALLERY SECTION
========================== -->

<section class="gallery" id="gallery">

    <div class="container">

        <div class="section-header">

            <span>OUR GALLERY</span>

            <h2>School Life Moments</h2>

            <p>
                Explore memorable moments from our campus, classrooms,
                sports events and cultural activities.
            </p>

        </div>

        <div class="gallery-grid">

            <div class="gallery-item">
                <img src="images/gallery1.webp" alt="Gallery">
            </div>

            <div class="gallery-item">
                <img src="images/gallery2.jpg" alt="Gallery">
            </div>

            <div class="gallery-item">
                <img src="images/gallery3.jfif" alt="Gallery">
            </div>

            <div class="gallery-item">
                <img src="images/gallery4.jpg" alt="Gallery">
            </div>

            <div class="gallery-item">
                <img src="images/gallery5.jfif" alt="Gallery">
            </div>

            <div class="gallery-item">
                <img src="images/gallery6.jpg" alt="Gallery">
            </div>

        </div>

    </div>

</section>

<!-- =========================
TESTIMONIAL SECTION
========================== -->

<section class="testimonial" id="testimonial">

    <div class="container">

        <div class="section-header">

            <span>TESTIMONIALS</span>

            <h2>What Parents Say</h2>

            <p>
                Hear from parents who trust Green Valley International School
                for their children's education and future.
            </p>

        </div>

        <div class="testimonial-grid">

            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p>
                    "The teachers are highly supportive and the learning
                    environment is excellent. My child enjoys coming to school every day."
                </p>

                <div class="parent">

                    <img src="images/parent1.jpg" alt="Parent">

                    <div>
                        <h4>Rahul Sharma</h4>
                        <span>Parent</span>
                    </div>

                </div>

            </div>

            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p>
                    "Amazing campus, smart classrooms and outstanding academic
                    results. Highly recommended for quality education."
                </p>

                <div class="parent">

                    <img src="images/parent2.jfif" alt="Parent">

                    <div>
                        <h4>Priya Verma</h4>
                        <span>Parent</span>
                    </div>

                </div>

            </div>

            <div class="testimonial-card">

                <div class="stars">
                    ★★★★★
                </div>

                <p>
                    "The focus on sports, technology and personality development
                    makes this school truly exceptional."
                </p>

                <div class="parent">

                    <img src="images/parent3.jpg" alt="Parent">

                    <div>
                        <h4>Amit Singh</h4>
                        <span>Parent</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
CONTACT SECTION
========================== -->

<section class="contact" id="contact">

    <div class="container contact-grid">

        <div class="contact-info">

            <span class="section-title">
                CONTACT US
            </span>

            <h2>Let's Talk About Your Child's Future</h2>

            <p>
                We'd love to hear from you. Visit our campus or
                contact us for admissions and enquiries.
            </p>

            <div class="contact-box">

                <i class="fa-solid fa-location-dot"></i>

                <div>
                    <h4>Address</h4>
                    <p>Green Valley International School,<br>New Delhi, India</p>
                </div>

            </div>

            <div class="contact-box">

                <i class="fa-solid fa-phone"></i>

                <div>
                    <h4>Phone</h4>
                    <p>+91 98765 43210</p>
                </div>

            </div>

            <div class="contact-box">

                <i class="fa-solid fa-envelope"></i>

                <div>
                    <h4>Email</h4>
                    <p>info@greenvalley.edu.in</p>
                </div>

            </div>

        </div>

        <div class="contact-form">

            <form>

                <input type="text" placeholder="Your Name">

                <input type="email" placeholder="Email Address">

                <input type="text" placeholder="Phone Number">

                <textarea rows="6" placeholder="Your Message"></textarea>

/BUTTON/
               <button class="send-btn">Send Message</button>

            </form>

        </div>

    </div>

</section>

<!-- =========================
FOOTER
========================== -->

<footer class="footer">

    <div class="container">

        <h2>Green Valley International School</h2>

        <p>
            Building Future Leaders Through Innovation.
        </p>

        <div class="footer-social">

            <a href="#"><i class="fab fa-facebook-f"></i></a>

            <a href="#"><i class="fab fa-instagram"></i></a>

            <a href="#"><i class="fab fa-youtube"></i></a>

            <a href="#"><i class="fab fa-linkedin-in"></i></a>

        </div>

        <p class="copyright">
            © 2026 Green Valley International School. All Rights Reserved.
        </p>

    </div>

</footer>
<script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
