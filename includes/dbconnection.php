<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "agmsdb", 3305);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection successful
echo "Connected successfully!";
?>
