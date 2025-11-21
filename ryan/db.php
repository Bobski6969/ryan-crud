<?php

    //database connection settings

    $host = "localhost"; //server name
    $user = "root"; // default XAMPP username
    $pass = ""; //default XAMPP password is empty
    $db = "crud_demo";//the database we created 
    $conn = mysqli_connect($host,$user,$pass,$db);

    //if connection fails stop the script and show an error

    if(!$conn){
        die("Connecion failed ". myslqi_connect_error());
    }


?>