<?php
    $con = mysqli_connect("localhost","root","","travel_db");
    if (!$con){
        $con = mysqli_connect("localhost","root","");
        mysqli_query($con,"CREATE DATABASE travel_db");
        mysqli_query($con,"USE travel_db");
    }
?>