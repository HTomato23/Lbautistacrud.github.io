<?php
    // Database credentials
    $servername = "localhost"; // Change this to your database server name if different
    $username = "id22172938_htomato"; // Change this to your database username
    $password = "Lanz4565$"; // Change this to your database password
    $dbname = "id22172938_student_db"; // Change this to your database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //executes if the connection has failed.
    if ($conn == false){
        die("Connection failed: ". mysqli_connect_error());
    }
?>
