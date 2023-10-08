<?php
    session_start();
    include('server.php');

    // if (!isset($_SESSION['username'])) {
    //     $_SESSION['msg'] = "You must log in first";
    //     header('location: login.php');
    // }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เขียนกระทู้</title>
    <link rel="stylesheet" href="blog.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
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
                        <p><strong><?php echo $_SESSION['username']; ?></strong><a href="index.php?logout='1'" style="color: red; text-decoration: none; margin-left: 1rem; font-weight: 600;">Logout</a></p>
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
        <!-- topic post -->
        <div class="post-content">
            <h3>เขียนอะไรซักอย่าง!</h3>
            <div class="post-btn">
                <a href="#" class="button-post" id="botton-post">POST</a>
            </div>
            <br>
        </div>
       
        <div class="popup">
            <div class="popup-content">
                <span class="icon-close">
                        <!-- <ion-icon name="close-outline"></ion-icon> -->
                        <a href="blog.php"><ion-icon name="close-outline"></ion-icon></a>
                </span>
                <form action="add.news.php" method="post">
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="errors">
                        <h3>
                            <?php 
                                echo $_SESSION['errors'];
                                unset($_SESSION['errors']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                
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
                    <button type="submit" name="add_topic" class="btn">POST</button>
                </div>
                </form>
            </div>
        </div>
        <script>
        // popup post //
        document.getElementById("botton-post").addEventListener("click", function(){
        document.querySelector(".popup").style.display = "flex";
        })
        </script>

        <!-- show topic post -->
        <div class="content">
            <div class="topic-wrapper">
                <?php 
                    $sql1 = "SELECT * FROM topics ORDER BY Topic_ID DESC";
                    $post_all = $conn->query("$sql1");
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
                        <a href="view.php?Topic_ID=<?php echo $row['Topic_ID']?> "type="submit" name="edit_now" class="btn-view" >View</a>
                    </div>
                    <?php 
                    }
                    } else { ?>
                        <p>No topic found...</p>
                <?php } ?>
            </div>
        </div>
                
        <!----- FOOTER SECTION--- -->
        <footer>
            <div class="wrapper">
                <div class="last-footer">
                    <div class="last-footer-box">
                        <div class="mini-last-footer-box">
                            <a href="" class="logo">ECP3N</a>
                            <div class="last-box-content">
                                <h4>ABOUT US</h4>
                                <p style="color: rgb(150, 148, 148);">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                            </div>
                        </div>
                        <div class="icon-footer">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="end">
            <div class="wrapper">
                <p>Design by - Dew Chatchawan Ngerthaworn</p>

                <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/88dfe94bff.js" crossorigin="anonymous"></script>

</body>
</html>