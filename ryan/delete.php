<?php
// Include the database connection
include 'db.php';
// Get the student id from the URL, for example delete.php?id=5
$id = $_GET['id'];
// Build a simple DELETE query
$sql = "DELETE FROM students WHERE id=$id";
// Run the delete query
mysqli_query($conn, $sql);
// After deleting, go back to the main page
header("Location: index.php");
exit;
?>