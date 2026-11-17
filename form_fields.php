<label>Student No.</label><input name="student_no" required value="<?= e($s['student_no'] ?? '') ?>">
<label>Full Name</label><input name="full_name" required value="<?= e($s['full_name'] ?? '') ?>">
<label>Course</label><input name="course" required value="<?= e($s['course'] ?? 'BSIT') ?>">
<label>Year Level</label>
<select name="year_level">
<?php foreach ([1,2,3,4] as $y): ?><option value="<?= $y ?>" <?= (($s['year_level'] ?? 1) == $y) ? 'selected' : '' ?>><?= $y ?></option><?php endforeach; ?>
</select>
<label>Email</label><input type="email" name="email" value="<?= e($s['email'] ?? '') ?>">
