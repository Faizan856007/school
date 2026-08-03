<?php
/**
 * Entry Point
 * -----------------------------------------------------
 * Redirects the visitor to the dashboard if already
 * logged in, otherwise to the login page.
 */

require_once 'includes/auth.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
} else {
    redirect('login.php');
}