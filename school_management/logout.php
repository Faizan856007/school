<?php
/**
 * Logout Script
 * -----------------------------------------------------
 * Destroys the current session and any "Remember Me"
 * cookie, then redirects back to the login page.
 */

require_once 'includes/auth.php';

// Clear all session variables
$_SESSION = [];

// Destroy the session cookie itself
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Destroy the session data on the server
session_destroy();

// Redirect to login page with a logout confirmation flag
header('Location: login.php?logout=1');
exit();
