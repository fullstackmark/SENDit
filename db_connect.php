<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("localhost:3306", "root", "", "sendit");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>