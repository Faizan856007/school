/**
 * School Management System - Client-side Validation
 * -----------------------------------------------------
 * NOTE: This is only a UX convenience layer. All real
 * security validation happens server-side in PHP (login.php),
 * since client-side JS can always be bypassed.
 */

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    if (!loginForm) return;

    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const togglePasswordBtn = document.getElementById('togglePassword');

    /**
     * Simple, reliable email pattern check.
     */
    function isValidEmail(value) {
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(value.trim());
    }

    /**
     * Show/hide a field-level error message.
     */
    function setFieldError(inputEl, errorEl, message) {
        if (message) {
            inputEl.classList.add('input-error');
            errorEl.textContent = message;
            errorEl.classList.add('show');
        } else {
            inputEl.classList.remove('input-error');
            errorEl.textContent = '';
            errorEl.classList.remove('show');
        }
    }

    /**
     * Validate the email field.
     */
    function validateEmail() {
        const value = emailInput.value.trim();
        if (value === '') {
            setFieldError(emailInput, emailError, 'Email is required.');
            return false;
        }
        if (!isValidEmail(value)) {
            setFieldError(emailInput, emailError, 'Please enter a valid email address.');
            return false;
        }
        setFieldError(emailInput, emailError, '');
        return true;
    }

    /**
     * Validate the password field.
     */
    function validatePassword() {
        const value = passwordInput.value;
        if (value === '') {
            setFieldError(passwordInput, passwordError, 'Password is required.');
            return false;
        }
        if (value.length < 6) {
            setFieldError(passwordInput, passwordError, 'Password must be at least 6 characters.');
            return false;
        }
        setFieldError(passwordInput, passwordError, '');
        return true;
    }

    // Real-time validation as the user types / leaves a field
    emailInput.addEventListener('blur', validateEmail);
    passwordInput.addEventListener('blur', validatePassword);
    emailInput.addEventListener('input', () => setFieldError(emailInput, emailError, ''));
    passwordInput.addEventListener('input', () => setFieldError(passwordInput, passwordError, ''));

    // Toggle password visibility
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePasswordBtn.textContent = isPassword ? 'Hide' : 'Show';
        });
    }

    // Final validation before submitting the form to PHP
    loginForm.addEventListener('submit', function (e) {
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();

        if (!isEmailValid || !isPasswordValid) {
            e.preventDefault(); // stop submission, let user fix errors
        }
    });
});