<?php
// Start the session
session_start();

// Handle logout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Unset all session variables
  session_unset();

  // Destroy the session
  session_destroy();

  // Redirect to the homepage
  header('Location: homepage1.php'); // Replace 'index.html' with the desired homepage URL
  exit();
}
?>