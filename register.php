<?php
require_once __DIR__ . '/../config/config.php';

if (isLoggedIn()) redirect('parent/dashboard.php');

$errors = [];
$old = ['full_name' => '', 'email' => '', 'phone' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['full_name'] = trim($_POST['full_name'] ?? '');
    $old['email']     = trim($_POST['email'] ?? '');
    $old['phone']     = trim($_POST['phone'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm          = $_POST['confirm_password'] ?? '';

    if ($old['full_name'] === '') $errors[] = 'Full name is required.';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if (strlen($password) < 8) $errors[] = 'Password must be at least 8 characters.';
    if ($password !== $confirm) $errors[] = 'Passwords do not match.';

    if (empty($errors)) {
        $db = getDB();
        $stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$old['email']]);
        if ($stmt->fetch()) {
            $errors[] = 'An account with that email already exists.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare(
                'INSERT INTO users (full_name, email, phone, password_hash, role) VALUES (?, ?, ?, ?, "parent")'
            );
            $stmt->execute([$old['full_name'], $old['email'], $old['phone'], $hash]);
            redirect('auth/login.php?registered=1');
        }
    }
}

$pageTitle = 'Register';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="form-wrap">
    <h2 class="text-center">Create a Parent Account</h2>
    <p class="text-center">Register to access your child's dashboard, attendance, results and more.</p>

    <?php foreach ($errors as $err): ?>
        <div class="alert alert-error"><?php echo e($err); ?></div>
    <?php endforeach; ?>

    <form method="POST" novalidate>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo e($old['full_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo e($old['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" value="<?php echo e($old['phone']); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" minlength="8" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" minlength="8" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    <div class="form-foot">
        Already have an account? <a href="<?php echo BASE_URL; ?>/auth/login.php">Login here</a>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
