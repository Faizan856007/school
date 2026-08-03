<?php
/**
 * Authentication Helper Functions
 * ------------------------------------------------------
 * Reusable functions for session handling, login guarding,
 * and basic output sanitization.
 *
 * NOTE on "Remember Me":
 * Since the users table only has the 5 required columns
 * (no extra token column), "Remember Me" is implemented by
 * simply extending the PHP session cookie's lifetime instead
 * of the default "until browser closes" behavior. This keeps
 * the user logged in across browser restarts without needing
 * to change the database schema.
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check whether a user is currently logged in.
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Redirect helper.
 */
function redirect(string $location): void
{
    header("Location: " . $location);
    exit();
}

/**
 * Force a user to be logged in to view a page.
 * Redirects to login.php otherwise.
 */
function requireLogin(): void
{
    if (!isLoggedIn()) {
        redirect('login.php');
    }
}

/**
 * Sanitize plain text for safe HTML output (basic XSS protection).
 */
function sanitize(string $data): string
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
