<?php
    $con = mysqli_connect("localhost","root","","travel_db");
    if (!$con){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>