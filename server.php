<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "miniproject_db";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check Connection
    if (!$conn) {
        die("connection failed" . mysqli_connect_error());
    }

?>