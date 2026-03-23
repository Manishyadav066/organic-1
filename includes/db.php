<?php
$host = "db";
$user = "root";
$pass = "root";
$dbname = "organic_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
