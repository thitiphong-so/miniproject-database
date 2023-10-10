<?php

    session_start();
    include('server.php'); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Page</title>
    <link rel="stylesheet" href="reg-and-login.css">
</head>
<body>

    <section>
        <div class="wrapper">
            <span class="icon-close">
                <!-- <ion-icon name="close-outline"></ion-icon> -->
                <a href="index.php"><ion-icon name="close-outline"></ion-icon></a>
            </span>
            <div class="form-box login">
                <h2>Login</h2>
                <form action="login_db.php" method="post">
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
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <input type="text" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label for=""><input type="checkbox">Remember Me </label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" name="login_user" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have a account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>Register</h2>
                <form action="register_db.php" method="post">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <input type="text" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" name="password_1" required>
                        <label for="password_1">Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" name="password_2" required>
                        <label for="password_2">Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label for=""><input type="checkbox">I agree the terms & conditions </label>
                    </div>
                    <button type="submit" name="reg_user" class="btn">Register</button>
                    <div class="login-register">
                        <p>Already have a account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>