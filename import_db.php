<?php
require 'includes/db.php';

$sql = file_get_contents('database.sql');

if (!$sql) {
    die("Error: Could not read database.sql file.");
}

echo "Importing database...<br>";

if (mysqli_multi_query($conn, $sql)) {
    do {
        // Store first result set
        if ($result = mysqli_store_result($conn)) {
            mysqli_free_result($result);
        }
    } while (mysqli_more_results($conn) && mysqli_next_result($conn));
    echo "<h3>✅ Database imported successfully!</h3>";
    echo "<a href='index.php'>Go to Website</a>";
} else {
    echo "<h3>❌ Error importing database: " . mysqli_error($conn) . "</h3>";
}
?>
