<?php
require 'config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = db()->prepare('SELECT id, username, password FROM users WHERE username = ?');
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    if ($row && password_verify($_POST['password'], $row['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = $row['username'];
        header('Location: index.php');
        exit;
    }
    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Login - Student Records</title>
<link rel="stylesheet" href="style.css"></head><body>
<div class="login card">
<h2>Student Records Manager</h2>
<?php if ($error): ?><div class="msg err"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<label>Username</label><input name="username" required autofocus>
<label>Password</label><input type="password" name="password" required>
<button class="btn" type="submit">Login</button>
</form>
</div></body></html>
