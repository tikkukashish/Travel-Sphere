<?php

    require('db.php');
    session_start();

    if (isset($_REQUEST['LoginUsername'])){
        $username = $_REQUEST['LoginUsername'];
        $password = $_REQUEST['Password'];
        
        $query = "SELECT * FROM userlogin WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1){
            $_SESSION['username'] = $username;
            header("Location: homepage.php");
        }
    }

?>