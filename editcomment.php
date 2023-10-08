<?php
 session_start();
 include('server.php');
 $errors = array();
 $Topic_ID = $_GET['Topic_ID'];
 $Comment_ID = $_GET['Comment_ID'];
           
 if (isset($_GET['Comment_ID'])){?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editcomment</title>
        <link rel="stylesheet" href="blog.css">
    </head>
    <body>
        
        <div class="cm0">
            <div class="cm1">
                <form method="post">
                    <div class="cm2">
                        <p>Comment</p>
                    </div>
                    <div class="sh2">
                        <textarea name="Comment_detail" rows="2" cols="44" style="" placeholder=".........Type your comment here........" required></textarea><br>
                    </div>
                    <?php
                    if (isset($_SESSION['username'])){ ?>
                    <div class="post-btn">
                        <input type="submit" name="updatecomments">  
                    </div>
                    <?php
                    }else{
                        echo "กรุณาล็อกอินเพื่อคอมเม้นต์ "; ?><a href="login.php">Login</a>          
                        <?php
                        }?> 
                </form>
            </div>   
        </div>
        <?php
        if (isset($_POST['updatecomments'])){
            // echo "addtopic pass 1";
            $Comment_detail = mysqli_real_escape_string($conn, $_POST['Comment_detail']);
            // echo "error pass2";
            $sqlupdate ="UPDATE comments SET Comment_detail='$Comment_detail' WHERE Comment_ID=$Comment_ID;";
            mysqli_query($conn, $sqlupdate);
            ?>
            <script type="text/javascript">
            window.location="view.php?Topic_ID=<?php echo $Topic_ID ?>";
            </script> 
        <?php
        }
            
        }?>    
        
    </body>
    </html>