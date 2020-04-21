<?php

// Database credentials
$user="a3003225_balwant";
$password="Balwant1234";
$db= "a3003225_scp";

//Make Database Connection
$connection = new mysqli('localhost', $user, $password, $db) or die(mysqli_error($connection));
   

// fetch data from the table and save to result variable 
$result = $connection->query("select * from subject") or die($connection->error());

//check form form submission
 if(isset($_POST['item_no']))
 {
     //create variables for storing data from form
     $item_number= $_POST['item_no'];
     $obj_class = $_POST['obj_class'];
     $subject_image = $_POST['subject_image'];
     $procedures = $_POST['procedures'];
     $description = $_POST['description'];
     $reference = $_POST['reference'];

     //insert data into database
     $sql= "insert into subject (item_no, obj_class, subject_image, specialprocedures, description, reference)
     values ('$item_number', '$obj_class', '$subject_image', '$procedures', '$description', '$reference')";

    //display message
    if($connection->query($sql) === TRUE)
    {
        echo "
        <h2>Record added successfully to Database</h2>
        <p><a href= 'index.php'>Go Back to index page</a></p>
       ";
    }
    else
    {
        echo "
        <h2>Error</h2>
        <p>{$connection->error()}</p>
        <p><a href= 'index.php'>Go Back to index page</a></p>
        ";
    }

 }

?>