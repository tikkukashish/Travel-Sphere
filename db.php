<?php
        $con = mysqli_connect("localhost","root","");
        mysqli_query($con,"CREATE DATABASE IF NOT EXISTS travel_db");
        mysqli_query($con,"USE travel_db");
?>