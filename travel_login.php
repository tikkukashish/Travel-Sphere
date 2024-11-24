<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="travel_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="media\login.jpg" alt="">
            </div>
            <div class="login__forms">
                <form action="" class="login__registre" id="login-in" method="get">
                    <h1 class="login__title">Sign In</h1>

                    <div class="login__box">
                        <i class='bx bxs-user-circle login__icon'></i>
                        <input type="text" placeholder="Username" class="login__input" name="LoginUsername">
                    </div>

                    <div class="login__box">
                        <i class='bx bxs-lock login__icon'></i>
                        <input type="password" placeholder="Password" class="login__input" name="Password">
                        
                    </div>

                    <a href="forgotlogin.php" class="login__forgot">Forgot password?</a>

                    <button type="submit" class="login__button">Sign In</button>

                    <div>
                        <?php
                        include("login.php");
                        ?>
                        <span class="login__account">Don't have an Account ?</span>
                        <span class="login__signin" id="sign-up">Sign Up</span>
                    </div>
                </form>
                <form action="" class="login__create none" id="login-up" method="post">
                    <h1 class="login__title">Create Account</h1>

                    <div class="login__box">
                        <i class='bx bxs-user-circle login__icon'></i>
                        <input type="text" placeholder="Username" class="login__input" name="Username">
                    </div>

                    <div class="login__box">
                        <i class='bx bxs-envelope login__icon' ></i>
                        <input type="text" placeholder="Email" class="login__input" name="Email">
                    </div>

                    <div class="login__box">
                        <i class='bx bxs-lock login__icon'></i>
                        <input type="password" placeholder="Password" class="login__input" name="Password">
                        
                    </div>
                    <br>

                    <button type="submit" class="login__button">Sign In</button>


                    <div>

                        <span class="login__account">Already have an Account ?</span>
                        <span class="login__signup" id="sign-in">Sign In <br></span>
                        <?php
                        include("signup.php");
                        ?>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="travel_login.js"></script>
</body>
</html>