<?php require_login(); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Student Records Manager</title>
<link rel="stylesheet" href="style.css"></head><body>
<header><strong>Student Records Manager</strong>
<span>Logged in as <?= e($_SESSION['user']) ?>
<a href="index.php">Students</a><a href="add.php">Add Student</a><a href="test.php">System Check</a><a href="logout.php">Logout</a></span></header>
<div class="container">
