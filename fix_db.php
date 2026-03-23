<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/db.php';

$columns = [
    'shipping_name' => "VARCHAR(100) NOT NULL AFTER total_price",
    'shipping_email' => "VARCHAR(100) NOT NULL AFTER shipping_name",
    'shipping_address' => "TEXT NOT NULL AFTER shipping_email",
    'payment_method' => "VARCHAR(50) DEFAULT 'COD' AFTER shipping_address"
];

$success = true;
foreach($columns as $col => $def) {
    $check = mysqli_query($conn, "SHOW COLUMNS FROM orders LIKE '$col'");
    if($check && mysqli_num_rows($check) == 0) {
        if(!mysqli_query($conn, "ALTER TABLE orders ADD COLUMN $col $def")) {
            echo "Error adding $col: " . mysqli_error($conn) . "<br>";
            $success = false;
        }
    } else if (!$check) {
        echo "Error checking column $col: " . mysqli_error($conn) . "<br>";
        $success = false;
    }
}

if($success) {
    echo "<h1>Database checkout columns fixed successfully!</h1>";
    echo "<p>You can now checkout correctly. <a href='index.php'>Go back to Home</a></p>";
}
?>
