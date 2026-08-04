<?php
/**
 * Database Configuration
 * ------------------------------------------------------
 * Creates a single PDO connection object used throughout
 * the application. Uses prepared statements everywhere to
 * prevent SQL Injection.
 */

// ---- Database credentials ----
// Reads from environment variables (set these in Render's dashboard),
// falling back to XAMPP defaults for local development.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'school_management');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: ''); // default XAMPP MySQL password is empty

try {
    // DSN (Data Source Name)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    // PDO options: throw exceptions, fetch as associative array, use real prepared statements
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, // real prepared statements -> prevents SQL injection
    ];

    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

} catch (PDOException $e) {
    // In production, log this instead of displaying it
    die("Database connection failed: " . $e->getMessage());
}
