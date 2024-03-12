<?php
session_start();

// Connection settings
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sendit";

// Get the user input from the login form
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to check the credentials
$sql = "SELECT * FROM admin WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
            // If Admin login successful, redirect to Admin Homepage
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $enteredusername;
    header("Location: adminHomepage.php");
    exit();
} else {
    // Check manager credentials
    $sql = "SELECT * FROM manager WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If Manager login successful, redirect to Manager Homepage
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $enteredusername;
        header("Location: managerHomepage.php");
        exit();
    } else {
         // Authentication failed
            header("Location: homepage1.php?error=1"); 
            exit();
    }
}

// Close the database connection
$conn->close();
?>
