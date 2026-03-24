<?php
// Aiven MySQL database details
$host = getenv('DB_HOST') ?: "mysql-1f273354-organic-store.i.aivencloud.com";
$port = getenv('DB_PORT') ?: 19570;
$user = getenv('DB_USER') ?: "avnadmin";
$dbname = getenv('DB_NAME') ?: "defaultdb";

// Read password securely
$pass = getenv('DB_PASS');
if (!$pass && file_exists(__DIR__ . '/db_pass.php')) {
    include __DIR__ . '/db_pass.php';
}

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
