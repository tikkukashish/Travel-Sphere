<?php

    require('db.php');

    if (isset($_REQUEST['LoginUsername'])){
        $username = $_REQUEST['LoginUsername'];
        $password = $_REQUEST['Password'];

        if (empty($username) || empty($password)){
            $_SESSION['missing']=1;
            header("Location:travel_login.php");
        }
        else{
        
            $query = "SELECT * FROM userlogin WHERE Username='$username' AND Password='$password'";
            $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result)==1){
                $_SESSION['username'] = $username;
                header("Location: homepage.php");
                }
            else{
                $_SESSION['incorrect']=1;
                header("Location:travel_login.php");
        }
        }
    }

?>