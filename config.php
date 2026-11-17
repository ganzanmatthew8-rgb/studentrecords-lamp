<?php
// Database credentials - must match the user created in MariaDB (see deployment guide)
define('DB_HOST', 'localhost');
define('DB_NAME', 'student_db');
define('DB_USER', 'student_user');
define('DB_PASS', 'StrongPass@2026');

session_start();

function db() {
    static $conn = null;
    if ($conn === null) {
        mysqli_report(MYSQLI_REPORT_OFF);
        $conn = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die('Database connection failed: ' . htmlspecialchars($conn->connect_error));
        }
        $conn->set_charset('utf8mb4');
    }
    return $conn;
}

function require_login() {
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
