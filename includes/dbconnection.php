<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "agmsdb", 3305);

// Check connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ❌ DO NOT echo anything here
?>
