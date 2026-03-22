<?php
session_start();

// Default user for testing cart before Login is built
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; 
}

require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

// Adjust this URL to match your local server environment if needed
define('BASE_URL', 'http://localhost/organic-1.0.0/');
?>
