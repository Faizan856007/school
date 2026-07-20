<?php
require_once __DIR__ . '/../config/config.php';

if (isLoggedIn()) redirect('parent/dashboard.php');

$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errors[] = 'Please enter both email and password.';
    } else {
        $db = getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $errors[] = 'Invalid email or password.';
        } elseif ($user['status'] !== 'active') {
            $errors[] = 'This account has been deactivated. Please contact the school office.';
        } else {
            session_regenerate_id(true);
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['full_name'];
            $_SESSION['user_role']  = $user['role'];
            $_SESSION['user_email'] = $user['email'];

            if ($user['role'] === 'admin') {
                redirect('admin/dashboard.php'); // build this out separately if needed
            } else {
                redirect('parent/dashboard.php');
            }
        }
    }
}

$pageTitle = 'Login';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="form-wrap">
    <h2 class="text-center">Welcome Back</h2>
    <p class="text-center">Log in to the Parent Portal.</p>

    <?php if (isset($_GET['registered'])): ?>
        <div class="alert alert-success">Account created successfully. Please log in.</div>
    <?php endif; ?>

    <?php foreach ($errors as $err): ?>
        <div class="alert alert-error"><?php echo e($err); ?></div>
    <?php endforeach; ?>

    <form method="POST" novalidate>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo e($email); ?>" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="form-foot">
        <a href="<?php echo BASE_URL; ?>/auth/forgot-password.php">Forgot password?</a>
        &nbsp;·&nbsp;
        Don't have an account? <a href="<?php echo BASE_URL; ?>/auth/register.php">Register</a>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
