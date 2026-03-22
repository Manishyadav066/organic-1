<?php
$host = "sql303.infinityfree.com";
$user = "if0_41449450";
$pass = "Manish1273";
$dbname = "if0_41449450_XXX"; // Update 'XXX' to the actual database name if you masked it

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
