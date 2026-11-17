<?php
require 'config.php';
require_login();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = db()->prepare('INSERT INTO students (student_no, full_name, course, year_level, email) VALUES (?,?,?,?,?)');
    $yl = (int)$_POST['year_level'];
    $stmt->bind_param('sssis', $_POST['student_no'], $_POST['full_name'], $_POST['course'], $yl, $_POST['email']);
    if ($stmt->execute()) { header('Location: index.php?msg=' . urlencode('Student added.')); exit; }
    $err = 'Could not save: ' . $stmt->error;
}
require 'header.php';
?>
<div class="card"><h2>Add Student</h2>
<?php if ($err): ?><div class="msg err"><?= e($err) ?></div><?php endif; ?>
<form method="post"><?php include 'form_fields.php'; ?>
<button class="btn" type="submit">Save</button> <a class="btn red" href="index.php">Cancel</a></form></div></div></body></html>
