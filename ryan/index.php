<?php
    
    
    //include the database coonnection file so we can use $conn
    include 'db.php';
    //IF the form was submitted with the add butoon:
        if (isset($_POST['add'])){
            //get values from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            //build a simple SQL INSERT QUERY (for learing only not secure for real apps )
            $sql = "INSERT INTO students (name, email) VALUES ('$name','$email')";
            
            //run the query on the database to display in the table 
            mysqli_query($conn, $sql);
            }   
            //Get all students from the database to display in the table 
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn,$sql);
            
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>simple CRUD</title>
                <link rel="stylesheet" href="index.css">
            
            </head>
            <body>
                <h1>Student Database</h1>
                <!-- form to add a new student -->

                <h2>Add a student</h2>
                <!-- when the form is submitted, it sends data back to index.php using POST -->
                <form method="post"action="index.php">
                <label>NAME:</label>
                <input type="text" name="name" required>
                <br><br>
                <label>Email:</label>
                <input type="email" name="email" required>
                <br><br>

                <!-- the name "add" on this button is used in PHP (isset($_POST['add'])) -->
                <button type="submit" name ="add">Add Student</button>
                    </form>

                    <hr>

                    <!-- Table showing all the students pulled from the database -->
                     <h2>All students</h2>

                     <table border="1" cellpadding="8" cellspacing="0">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>

                    <?php // Loop through all rows returned from the database
                    while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                    <td><?php echo $row['id']?></td>
                            <!-- use html special characters to avoid HTML issues with specialcharacters -->
                        <td><?php echo htmlspecialchars($row['name']);?></td>
                        <td><?php echo htmlspecialchars($row['email']);?></td>
                        
                        <!-- links pass the student id in the URL -->
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row ['id']; ?>">Delete</a?>
                        </td>
                        </tr>
                        <?php } ?>
                    </table>
                    

                        
                    



            </body>
            </html>
        