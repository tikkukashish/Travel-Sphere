<?php

    require('db.php');

    if (isset($_REQUEST['Username'])){
        $username = $_REQUEST['Username'];
        $email = $_REQUEST['Email'];
        $password = $_REQUEST['Password'];

       // mysqli_query("CREATE TABLE IF NOT EXISTS userlogin(Username varchar(40), Email varchar(80), Password varchar(40))");
        
        $query = "INSERT INTO userlogin VALUES('$username','$email','$password')";

        $result = mysqli_query($con,$query);
        if($result){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: homepage.php");
        }
        else{
            print (mysqli_errno);
        }

    }

?>