<?php

    require('db.php');
    session_start();
    $username = $_SESSION['username'];
    $FlightNo = $_SESSION['FlightNo'];
    $HotelName = $_SESSION['HotelName'];
    $bill = $_SESSION['bill'];
    $departureDate = $_SESSION['departureDate'];
    $destination = $_SESSION['destination'];

    $query = "INSERT INTO trips (Username,Destination,Departure,Flight_No,Hotel,Price) values('".$username."','".$destination."','".$departureDate."','".$FlightNo."','".$HotelName."',".$bill.")";

    $result = mysqli_query($con,$query);
    if($result){
        session_start();
        $_SESSION['username'] = $username;  
        
    }
    header("Location: mytrips.php");
?>