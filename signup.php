<?php

    require('db.php');

    if (isset($_REQUEST['Username'])){
        $username = $_REQUEST['Username'];
        $email = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];
        
        $query = "INSERT INTO userlogin VALUES('$username','$email','$password')";

        $result = mysqli_query($con,$query);
        if($result){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: homepage.php");
        }

    }

?>