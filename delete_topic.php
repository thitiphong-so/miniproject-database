<?php
 session_start();
 include('server.php');
 $errors = array();
 
$Topic_ID =$_GET['Topic_ID'];
            echo "error pass1";
    if (isset($_GET['Topic_ID'])){
            
            $sql ="DELETE FROM comments WHERE Topic_ID ='$Topic_ID'";
            mysqli_query($conn, $sql);
            $sql2 =" DELETE FROM topics WHERE Topic_ID ='$Topic_ID'";
            mysqli_query($conn, $sql2);
            header("location: blog.php");
        
        }
        
?>