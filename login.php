<?php
/**
 * Login Page
 * -----------------------------------------------------
 * Handles displaying the login form AND processing the
 * login submission (email + password) using PDO prepared
 * statements and password_verify().
 */

require_once 'includes/auth.php';
require_once 'config/database.php';

// If already logged in, go straight to dashboard
if (isLoggedIn()) {
    redirect('dashboard.php');
}

$errors = [];
$emailValue = '';

// ---- Handle form submission ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $emailValue = trim($_POST['email'] ?? '');
    $password   = $_POST['password'] ?? '';
    $rememberMe = isset($_POST['remember_me']);

    // ---- Server-side validation (never trust the client) ----
    if ($emailValue === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    // ---- If basic validation passed, check credentials ----
    if (empty($errors)) {
        try {
            // Prepared statement -> prevents SQL Injection
            $stmt = $pdo->prepare(
                "SELECT id, name, email, password, role FROM users WHERE email = :email LIMIT 1"
            );
            $stmt->bindParam(':email', $emailValue, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch();

            // Verify user exists AND password matches the stored hash
            if ($user && password_verify($password, $user['password'])) {

                // Prevent session fixation attacks
                session_regenerate_id(true);

                // Store user info in session
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email']= $user['email'];
                $_SESSION['user_role'] = $user['role'];

                // ---- Remember Me ----
                // Extend the session cookie lifetime to 30 days instead of
                // expiring when the browser closes.
                if ($rememberMe) {
                    $lifetime = time() + (30 * 24 * 60 * 60); // 30 days
                    setcookie(session_name(), session_id(), $lifetime, '/');
                }

                redirect('dashboard.php');

            } else {
                // Generic message on purpose (don't reveal which field was wrong)
                $errors[] = 'Invalid email or password.';
            }

        } catch (PDOException $e) {
            $errors[] = 'Something went wrong. Please try again later.';
        }
    }
}

$pageTitle = 'Login - School Management System';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">

    <div class="login-card">
        <div class="login-header">
            <span class="logo-icon">🎓</span>
            <h1>School Management System</h1>
            <p>Sign in to access your dashboard</p>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['logout']) && $_GET['logout'] === '1'): ?>
            <div class="alert alert-success">You have been logged out successfully.</div>
        <?php endif; ?>

        <form id="loginForm" action="login.php" method="POST" novalidate>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="admin@school.com"
                    value="<?php echo htmlspecialchars($emailValue); ?>"
                    autocomplete="username"
                    required
                >
                <span class="field-error" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                    <button type="button" class="toggle-password" id="togglePassword">Show</button>
                </div>
                <span class="field-error" id="passwordError"></span>
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember_me" id="rememberMe">
                    Remember Me
                </label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-primary">Sign In</button>
        </form>

        <div class="demo-hint">
            Demo Admin Login — Email: <strong>admin@school.com</strong> · Password: <strong>Admin@123</strong>
        </div>

        <p class="login-footer-note">
            &copy; <?php echo date('Y'); ?> School Management System. All rights reserved.
        </p>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>