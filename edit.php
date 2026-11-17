<?php
require 'config.php';
require_login();
$id = (int)($_GET['id'] ?? 0);
$stmt = db()->prepare('SELECT * FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$s = $stmt->get_result()->fetch_assoc();
if (!$s) { header('Location: index.php'); exit; }
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = db()->prepare('UPDATE students SET student_no=?, full_name=?, course=?, year_level=?, email=? WHERE id=?');
    $yl = (int)$_POST['year_level'];
    $u->bind_param('sssisi', $_POST['student_no'], $_POST['full_name'], $_POST['course'], $yl, $_POST['email'], $id);
    if ($u->execute()) { header('Location: index.php?msg=' . urlencode('Student updated.')); exit; }
    $err = 'Could not update: ' . $u->error;
    $s = array_merge($s, $_POST);
}
require 'header.php';
?>
<div class="card"><h2>Edit Student</h2>
<?php if ($err): ?><div class="msg err"><?= e($err) ?></div><?php endif; ?>
<form method="post"><?php include 'form_fields.php'; ?>
<button class="btn" type="submit">Update</button> <a class="btn red" href="index.php">Cancel</a></form></div></div></body></html>
