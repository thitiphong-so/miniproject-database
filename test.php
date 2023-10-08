<?php

    session_start();
    include('server.php'); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Reg Page</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <h3>
                                <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button>Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

 <!-- <?php if (isset($_SESSION['username'])){ ?> -->
                    <!-- <?php }else{ echo"กรุณาลงชื่อเข้าสู่ระบบเพื่อแสดงความคิดเห็น" ?> <a href="login.php" class="login-link" >Login</a>
                        <?php
                        }?>    -->