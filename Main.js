document.addEventListener('DOMContentLoaded', function () {
    // Mobile nav toggle
    const toggle = document.getElementById('navToggle');
    const links = document.getElementById('navLinks');
    if (toggle && links) {
        toggle.addEventListener('click', function () {
            links.classList.toggle('open');
        });
    }

    // Auto-hide alert boxes after a few seconds
    document.querySelectorAll('.alert').forEach(function (alertBox) {
        setTimeout(function () {
            alertBox.style.transition = 'opacity .4s ease';
            alertBox.style.opacity = '0';
            setTimeout(function () { alertBox.remove(); }, 400);
        }, 5000);
    });

    // Chat box: keep scrolled to latest message
    const chatMessages = document.getElementById('chatMessages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
