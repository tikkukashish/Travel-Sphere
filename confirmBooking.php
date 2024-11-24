<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="homepage.css" rel=stylesheet>
     <link href="tables.css" rel=stylesheet>
    <title>Document</title>
</head> 

<body>

<!-- header-->

<?php
    include('header.php');
?>

<?php
    session_start();
    $FlightNo = $_SESSION['FlightNo'];
    $HotelName = $_SESSION['HotelName'];
    $bill = $_SESSION['bill'];
    $departureDate = $_SESSION['departureDate'];
    $destination = $_SESSION['destination'];
?>
<h2>Trip Details</h2>
<form>
<table border : 1px class="t_details">
   <thead>
    <tr>
        <th>DESTINATION</th><th>DEPARTURE</th><th>FLIGHT NO</th><th>HOTEL</th><th>PRICE</th>
    </tr>
    </thead>
    <tbody>
     <tr>
     <?php
        echo "<td>".$destination."</td><td>".$departureDate."</td><td>".$FlightNo."</td><td>".$HotelName."</td><td>".$bill."</td>";
     ?>
     </tr>
    </tbody>
</table>
<input type = 'submit' class="submit" value="Confirm" formaction="insertTrip.php">

</form>
</body></html>