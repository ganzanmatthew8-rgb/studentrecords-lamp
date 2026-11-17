<?php
require 'config.php';
require 'header.php';
$q = trim($_GET['q'] ?? '');
if ($q !== '') {
    $like = "%$q%";
    $stmt = db()->prepare('SELECT * FROM students WHERE student_no LIKE ? OR full_name LIKE ? OR course LIKE ? ORDER BY id DESC');
    $stmt->bind_param('sss', $like, $like, $like);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    $res = db()->query('SELECT * FROM students ORDER BY id DESC');
}
$total = db()->query('SELECT COUNT(*) c FROM students')->fetch_assoc()['c'];
$courses = db()->query('SELECT COUNT(DISTINCT course) c FROM students')->fetch_assoc()['c'];
?>
<?php if (!empty($_GET['msg'])): ?><div class="msg ok"><?= e($_GET['msg']) ?></div><?php endif; ?>
<div class="stats">
<div class="card"><h2><?= (int)$total ?></h2>Total Students</div>
<div class="card"><h2><?= (int)$courses ?></h2>Courses</div>
</div>
<div class="card">
<form method="get" style="display:flex;gap:8px">
<input name="q" placeholder="Search by student no., name or course" value="<?= e($q) ?>" style="margin:0">
<button class="btn" type="submit">Search</button>
<a class="btn green" href="add.php">+ Add</a>
</form></div>
<div class="card"><table>
<tr><th>Student No.</th><th>Name</th><th>Course</th><th>Year</th><th>Email</th><th>Actions</th></tr>
<?php while ($r = $res->fetch_assoc()): ?>
<tr><td><?= e($r['student_no']) ?></td><td><?= e($r['full_name']) ?></td><td><?= e($r['course']) ?></td>
<td><?= e($r['year_level']) ?></td><td><?= e($r['email']) ?></td>
<td><a class="btn" href="edit.php?id=<?= (int)$r['id'] ?>">Edit</a>
<a class="btn red" href="delete.php?id=<?= (int)$r['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a></td></tr>
<?php endwhile; ?>
</table></div></div></body></html>
