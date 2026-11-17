<?php
require 'config.php';
require_login();
$id = (int)($_GET['id'] ?? 0);
$stmt = db()->prepare('DELETE FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
header('Location: index.php?msg=' . urlencode('Student deleted.'));
