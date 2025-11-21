<?php
include 'db.php';

// Get the student id from the URL, for example edit.php?id=3
$id = $_GET['id'];

// If the update form was submitted:
if (isset($_POST['update'])) {
    // Get the new values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Build the SQL UPDATE query
    $sql = "UPDATE students SET name='$name', email='$email' WHERE id='$id'";

    // Run the update query
    mysqli_query($conn, $sql);

    // After updating, go back to the main page
    header("Location: index.php");
    exit;
}

// If the form is not submitted yet, we need to load the current student data
$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result); // Get the row as an associative array
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>

<h1>Edit Student</h1>

<!-- The form is pre-filled with the current data from the database -->
<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($student['name']); ?>" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($student['email']); ?>" required>
    <br><br>

    
    <!-- When this is clicked, PHP sees $_POST['update'] -->
    
        <button type="submit" name="update">Save Changes</button>
         </form>
        <p><a href="index.php">Back to list</a></p>
    </body>
    </html>