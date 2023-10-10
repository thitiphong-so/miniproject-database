<?php
    session_start();
    include('server.php');
    $errors = array();
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }
    $Topic_ID=$_GET['Topic_ID'];
    
if(isset($_GET['Topic_ID'])){
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
    <script src="https://kit.fontawesome.com/88dfe94bff.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- NAVBAR -->
    <input class="ck-box" type="checkbox" id="check">
    <nav>
        <div class="container">
            <div class="navbar">
                <div class="navbar-logo">
                <label class="ck-box1" for="check"><ion-icon name="menu-outline" id="btn"></ion-icon></label>
                    <a href="index.php">ECP3N</a>
                </div>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>

                    <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<li><a href="login.php"><ion-icon name="person-outline"></ion-icon>Login</a></li>';
                        }
                    ?>

                    <?php if (isset($_SESSION['success'])) : ?>
                    <div class="success">
                        <h3>
                            <?php 
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                    <?php endif ?>
                    <!-- logged in  user imformation -->
                    <?php if (isset($_SESSION['username'])) : ?>
                        <p><strong><?php echo $_SESSION['username']; ?></strong><a href="index.php?logout='1'" style="color: red; text-decoration: none; margin-left: 1rem;">Logout</a></p>
                        <!-- <p><a href="index.php?logout='1'" style="color: red; text-decoration: none;">Logout</a></p> -->
                    <?php endif ?>
                </ul> 
            </div>
        </div>
    </nav>

    <!-- left sidebar -->
    <div class="sidebar">
        <a href="index.php"><ion-icon name="home-outline"></ion-icon><span>Home Page</span></a>
        <a href="blog.php"><ion-icon name="desktop-outline"></ion-icon><span>DashBoard</span></a>
        <div class="count-all">
            <!-- count comment and topic -->
            <?php
            if (isset($_SESSION['username'])){ ?>
            <?php
                $username=$_SESSION['username'];
                $counttopic = "SELECT COUNT(Topic_ID) FROM topics WHERE username = '$username'";
                mysqli_query($conn,$counttopic);
                $count_topic = $conn->query("$counttopic");
                if ($count_topic->num_rows>0) {
                while($counttopic_row = $count_topic->fetch_assoc()) {?>
                <div class="cn1">
                    <p>จำนวนกระทู้ที่โพสต์ : </p>
                    <div class="cn2">
                        <p><?php echo $counttopic_row['COUNT(Topic_ID)'] ?></p>
                    </div>
                </div>
                <?php
                }
                }
                $username=$_SESSION['username'];
                $countcomment = "SELECT COUNT(Comment_ID)FROM comments WHERE username = '$username'";
                mysqli_query($conn,$countcomment);
                $count_comment = $conn->query("$countcomment");
                if ($count_comment->num_rows>0) {
                    while($countcomment_row = $count_comment->fetch_assoc()) {
                    ?>
                    <div class="cn1">
                        <p>จำนวนแสดงความคิดเห็น :</p>
                        <div class="cn2">
                            <p><?php echo $countcomment_row['COUNT(Comment_ID)'] ?></p>
                        </div>          
                    </div>   
            <?php
                }}}?>
        </div>
    </div>

    <div class="main-content">

        <!-- show topic post -->
        <!-- <div class="container"> -->
        <div class="content">
            <div class="topic-wrapper">
                <?php 
                    // $sql1 = "SELECT id,topic, detail,username FROM news";
                    // mysqli_query($conn, $sql1)
                    $user_check_sametopic="SELECT * FROM topics WHERE Topic_ID='$Topic_ID'";
                    $query = mysqli_query($conn, $user_check_sametopic);
                    $resultcheck = mysqli_fetch_assoc($query);
                    $post_all = $conn->query("$user_check_sametopic"); 
            
                    if ($post_all->num_rows > 0) {
                        while($row = $post_all->fetch_assoc()) {
                ?>
                        <div class="tp">
                            <div class="sh1">
                                <h3><ion-icon name="person-circle-outline"></ion-icon><?php echo $row['username'] ?></h3>
                            </div>
                            <div class="sh2">
                                <h4><?php echo $row['Topic_name'] ?></h4>
                            </div>
                            <div class="sh3">
                                <p><?php echo $row['Topic_detail'] ?></p>
                            </div>

                            <!-- ถ้าเกิดว่า เป็นเจ้าของกระทู้ถึงจะสามารถเห็นแก้ไขได้ -->
                            <?php
                               if (isset($_SESSION['username'])){
                                if (($_SESSION['username']=== $row['username']))
                                {
                            ?>  
                            <div class="input-group">
                                <td><a href="#" type="submit" name="edit_now" class="btn-edit" id="edit">Edit</a></td>
                                <a href="delete_topic.php?Topic_ID=<?php echo $row['Topic_ID']?>" type="submit" name="detele" class="btn-del" >DEL</a></td>
                            </div>
                            <script>
                            // post //
                            document.getElementById("edit").addEventListener("click", function(){
                            document.querySelector(".popup").style.display = "flex";
                            })
                            </script>
                            <?php 
                                }}}}?>  
                        </div><br><br>
                        <!-- comment db. -->
                        <div class="-">
                            <div class="cm0">
                                <?php
                                $comment_query ="SELECT * FROM comments where Topic_ID = '$Topic_ID'";
                                $comment_all = $conn->query("$comment_query");
                                while($comment_row= $comment_all->fetch_assoc()){
                                    ?>
                                    
                                    <div class="cm1">
                                        <div class="cm2">
                                                <h4><ion-icon name="person-circle-outline"></ion-icon><?php echo $comment_row['username']?></h4>
                                        </div>
                                        <div class="sh3">
                                            <p><?php echo $comment_row['Comment_detail']?></p>
                                        </div>
                                        <!-- edit comment -->
                                        
                                        <!-- ถ้าเกิดว่า เป็นเจ้าของคอมเม้นส์ถึงจะสามารถเห็นแก้ไขได้ -->
                                        <?php  if (isset($_SESSION['username'])){
                                            if (($_SESSION['username']=== $comment_row['username']))
                                            { $Comment_ID=$comment_row['Comment_ID'];
                                                
                                                ?>
                                        <div class="cm3">
                                            <a href="editcomment.php?Comment_ID=<?php echo $Comment_ID?>&Topic_ID=<?php echo $Topic_ID?>" type="submit" name="edit_now" class="btn-edit" id="editcomment">Editcomment</a>
                                            <!-- <a href="#?Comment_ID=<?php echo $Comment_ID?>&Topic_ID=<?php echo $Topic_ID?>" type="submit" name="edit_now" class="btn" id="editcomment">Editcomment</a> -->
                                            <a href="delete_comment.php?Comment_ID=<?php echo $Comment_ID?>&Topic_ID=<?php echo $Topic_ID?>" type="submit" name="detele" class="btn-del" >Delete</a>
                                            <?php 
                                            }}?>
                                    </div>        
                                <?php
                                }?>
                            </div>
                        </div>

                <!-- comment post -->
                <hr>
                <div class="cm0">
                    <div class="cm1">
                        <form method="post">
                            <div class="cm2">
                                <p>Comment</p>
                            </div>
                            <div class="sh2">
                                <textarea name="Comment_detail" rows="3" cols="50" style="" placeholder=".........Type your comment here........" required></textarea>
                            </div>
                            <?php
                            if (isset($_SESSION['username'])){ ?>
                            <div class="post-btn">
                                <input type="submit" name="comments">  
                            </div>
                            <?php
                            }else{
                                echo "กรุณาล็อกอินเพื่อคอมเม้นต์ "; ?><a href="login.php">Login</a>          
                              <?php
                              }?> 
                        </form>
                    </div>   
                </div>
                <br>
            </div> 
        </div>
        
        <!-- edit popup  -->
        <div class="popup">
            <div class="popup-content">
                <span class="icon-close">
                    <!-- <ion-icon name="close-outline"></ion-icon> -->
                    <a href="view.php?Topic_ID=<?php echo $Topic_ID ?>"><ion-icon name="close-outline"></ion-icon></a>
                </span>     
                <form  method="post">
                    <div class="topic-group">
                        <label for="Topic_name">Topic</label>
                        <input type="text" name="Topic_name">
                    </div>
                    <div class="topic-group">
                        <label for="Topic_detail">Detail</label>
                        <input type="text" name="Topic_detail">
                    </div>
                    <div style="text-align: center;">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <?php
                                echo "ชื่อผู้ตั้งกระทู้ ";
                                echo $_SESSION['username'];
                            ?>
                        <?php endif ?>
                    </div><br>
                    <div class="input-group">
                        <button type="submit" name="update" class="btn-edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        
    <?php }?>


 <!-- function database -->
    <?php 
    if (isset($_POST['update'])){
    // echo "addtopic pass 1";
    $Topic_name = mysqli_real_escape_string($conn, $_POST['Topic_name']);
    $Topic_detail = mysqli_real_escape_string($conn, $_POST['Topic_detail']);
        // echo "error pass2";
        $sqlupdate ="UPDATE topics SET Topic_name='$Topic_name',Topic_detail='$Topic_detail' WHERE Topic_ID=$Topic_ID;";
        mysqli_query($conn, $sqlupdate);
        ?>
        <script type="text/javascript">
            window.location="view.php?Topic_ID=<?php echo $Topic_ID ?>";
        </script> 
        <?php } ?>
          
    <?php
    if (isset($_POST['comments'])){
    $Comment_detail = $_POST['Comment_detail'];
    $username = $_SESSION['username'];
    mysqli_query($conn,"INSERT INTO comments ( Comment_detail,username,Topic_ID) VALUES ( '$Comment_detail','$username' ,'$Topic_ID')");
    ?>
    <script type="text/javascript">
    window.location="view.php?Topic_ID=<?php echo $Topic_ID ?>";
    </script> 
    <?php }?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>