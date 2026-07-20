<?php
require_once __DIR__ . '/../config/config.php';

$errors = [];
$success = false;
$resetLink = null; // shown on-screen only because this demo has no SMTP configured

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    } else {
        $db = getDB();
        $stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Always show the same success message whether or not the email exists,
        // so we don't leak which emails are registered.
        $success = true;

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $stmt = $db->prepare('UPDATE users SET reset_token = ?, reset_token_expires = ? WHERE id = ?');
            $stmt->execute([$token, $expires, $user['id']]);

            $resetLink = BASE_URL . '/auth/reset-password.php?token=' . $token;

            // In production, email this link instead of displaying it:
            // mail($email, 'Reset your password', "Reset link: $resetLink");
        }
    }
}

$pageTitle = 'Forgot Password';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="form-wrap">
    <h2 class="text-center">Reset Your Password</h2>
    <p class="text-center">Enter your email and we'll send you a reset link.</p>

    <?php foreach ($errors as $err): ?>
        <div class="alert alert-error"><?php echo e($err); ?></div>
    <?php endforeach; ?>

    <?php if ($success): ?>
        <div class="alert alert-success">
            If an account exists with that email, a reset link has been generated.
        </div>
        <?php if ($resetLink): ?>
            <!-- DEV NOTE: no SMTP server is configured in this starter kit,
                 so the link is shown directly here for testing. Wire up mail()
                 or a mail library (e.g. PHPMailer) in production and remove this block. -->
            <div class="alert alert-success">
                Dev mode - reset link: <a href="<?php echo e($resetLink); ?>"><?php echo e($resetLink); ?></a>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <form method="POST" novalidate>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
        </form>
    <?php endif; ?>

    <div class="form-foot">
        <a href="<?php echo BASE_URL; ?>/auth/login.php">Back to login</a>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
