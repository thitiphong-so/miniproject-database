<?php
session_start();
include('server.php');
$errors = array();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}else{
    if (isset($_POST['add_topic'])){
        // echo "addtopic pass 1";
        $Topic_name = mysqli_real_escape_string($conn, $_POST['Topic_name']);
        $Topic_detail = mysqli_real_escape_string($conn, $_POST['Topic_detail']);
        $username = $_SESSION['username'];
        
        if (empty($Topic_name)) {
            array_push($errors, "Please fill Topic");
            echo "error Topic_name in";
        }
        if (empty($Topic_detail)) {
            array_push($errors, "Please fill Detail");
            echo "error detail in";
        }
        
        if (count($errors) == 0) {
            // echo "error pass2";
            $sql ="INSERT INTO topics (Topic_name, Topic_detail, username) VALUES ('$Topic_name', '$Topic_detail', '$username')";
            $query = "SELECT * FROM topics WHERE username = '$username' AND Topic_name = '$Topic_name'";
            mysqli_query($conn, $sql);
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                echo "ตั้งกระทู้สำเร็จ";
                echo "success";
                header("location: blog.php");
            } else {
                echo "error";
                array_push($errors, "Please Login");
            
            }
        }
    // ทำ rightner join เพื่อดึงข้อมูลที่เหมือนกันมาทำ เป็นtopic
    }
}
?>