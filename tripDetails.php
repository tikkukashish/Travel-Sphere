<?php
session_start();

// Retrieve data from POST request
$_SESSION['destination'] = $_POST['destination'];
$_SESSION['departureDate'] = $_POST['departureDate'];
$_SESSION['FlightNo'] = $_POST['FlightNo'];
$_SESSION['HotelName'] = $_POST['HotelName'];
$_SESSION['bill'] = $_POST['bill'];

// Redirect to display trip details
header("Location: confirmBooking.php");
exit;
?>
