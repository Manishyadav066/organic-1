<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Default user for testing cart before Login is built
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; 
}

require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

// Ensure Default test user exists to avoid Cart foreign key error
if (isset($conn)) {
    $user_check = mysqli_query($conn, "SELECT id FROM users WHERE id=1");
    if ($user_check && mysqli_num_rows($user_check) == 0) {
        mysqli_query($conn, "INSERT INTO users (id, name, email, password) VALUES (1, 'Test User', 'test@example.com', 'password123')");
    }
}

define('BASE_URL', 'http://localhost:8080/');
?>
