/*------SACHIN--------*/
const header = document.querySelector(".header");

window.addEventListener("scroll", () => {

if(window.scrollY > 80){

header.classList.add("scrolled");

}else{

header.classList.remove("scrolled");

}

});

const menuBtn=document.querySelector(".menu-btn");
const nav=document.querySelector("nav");

menuBtn.addEventListener("click",()=>{

nav.classList.toggle("active");

if(nav.classList.contains("active")){

menuBtn.innerHTML='<i class="fa-solid fa-xmark"></i>';

}else{

menuBtn.innerHTML='<i class="fa-solid fa-bars"></i>';

}

});
// ==========================================================
// Green Valley International School - main.js
// Handles: mobile menu toggle, header scroll effect,
// active nav link on scroll, back-to-top button,
// and basic contact form feedback.
// ==========================================================

document.addEventListener('DOMContentLoaded', function () {

    /* ---------- Mobile Menu Toggle ---------- */
    const menuToggle = document.getElementById('menuToggle');
    const navbar = document.getElementById('navbar');

    if (menuToggle && navbar) {
        menuToggle.addEventListener('click', function () {
            navbar.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            if (navbar.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu after clicking a link
        navbar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navbar.classList.remove('active');
                const icon = menuToggle.querySelector('i');
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            });
        });
    }

    /* ---------- Header Scroll Effect ---------- */
    const header = document.querySelector('.header');
    const backToTop = document.getElementById('backToTop');

    function handleScroll() {
        const scrollY = window.scrollY || window.pageYOffset;

        if (header) {
            if (scrollY > 40) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        if (backToTop) {
            if (scrollY > 400) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }

        updateActiveLink();
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();

    /* ---------- Active Nav Link on Scroll ---------- */
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.navbar ul li a');

    function updateActiveLink() {
        let currentSection = '';
        const offset = 140;

        sections.forEach(function (section) {
            const sectionTop = section.offsetTop - offset;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(function (link) {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + currentSection) {
                link.classList.add('active');
            }
        });
    }

    /* ---------- Back To Top Button ---------- */
    if (backToTop) {
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ---------- Contact Form Feedback ---------- */
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = contactForm.querySelector('.send-btn');
            const originalText = submitBtn.textContent;

            submitBtn.textContent = 'Message Sent ✓';
            submitBtn.disabled = true;

            setTimeout(function () {
                contactForm.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 2200);
        });
    }

});

const playBtn = document.getElementById("playVideo");
const popup = document.getElementById("videoPopup");
const closeBtn = document.getElementById("closeVideo");
const iframe = document.getElementById("youtubeVideo");

playBtn.addEventListener("click", function(e){
    e.preventDefault();
    popup.style.display = "flex";
    iframe.src = "https://www.youtube.com/embed/K25Q2yDl-9Y?autoplay=1";
});

closeBtn.addEventListener("click", function(){
    popup.style.display = "none";
    iframe.src = "";
});

popup.addEventListener("click", function(e){
    if(e.target === popup){
        popup.style.display = "none";
        iframe.src = "";
    }
});
