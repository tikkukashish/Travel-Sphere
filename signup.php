<?php

    require('db.php');

    if (isset($_REQUEST['Username'])){
        $username = $_REQUEST['Username'];
        $email = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];

        mysqli_query("CREATE TABLE IF NOT EXISTS userlogin(username varchar(40), email varchar(80), password varchar(40))");
        
        $query = "INSERT INTO userlogin VALUES('$username','$email','$password')";

        $result = mysqli_query($con,$query);
        if($result){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: homepage.php");
        }

    }

?>