<?php
include 'db_connect.php';

$name = $_POST['name'];
$contact = $_POST['contact'];
$origin = $_POST['origin'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$space = $_POST['space'];

// Prepare the SQL statement to insert data into the table
$sql = "INSERT INTO requests (Name, ContactNumber, Origin, Destination, DateOfTravel, SpaceAvailable)
        VALUES ('$name', '$contact', '$origin', '$destination', '$date', '$space')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    // Data inserted successfully
    mysqli_close($conn);
    header("Location: homepage1.php?success=true");
    exit();
} else {
    // Error in inserting data
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
