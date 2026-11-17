<?php
require 'config.php';
require_login();
require 'header.php';
$db = db();
$ver = $db->server_info;
$cnt = $db->query('SELECT COUNT(*) c FROM students')->fetch_assoc()['c'];
?>
<div class="card"><h2>System Check</h2>
<div class="msg ok"><strong>Database connection successful.</strong></div>
<table>
<tr><th>Web server</th><td><?= e($_SERVER['SERVER_SOFTWARE']) ?></td></tr>
<tr><th>Server IP</th><td><?= e($_SERVER['SERVER_ADDR']) ?></td></tr>
<tr><th>Your (client) IP</th><td><?= e($_SERVER['REMOTE_ADDR']) ?></td></tr>
<tr><th>PHP version</th><td><?= e(PHP_VERSION) ?></td></tr>
<tr><th>Database server</th><td><?= e($ver) ?></td></tr>
<tr><th>Database</th><td><?= e(DB_NAME) ?> (user: <?= e(DB_USER) ?>)</td></tr>
<tr><th>Student records</th><td><?= (int)$cnt ?></td></tr>
</table>
<p><a class="btn" href="info.php" target="_blank">Open phpinfo()</a></p></div></div></body></html>
