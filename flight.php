<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="homepage.css" rel=stylesheet>
     <link href="flight.css" rel=stylesheet>
    <title>Document</title>
</head> 

<body>

<!-- header-->

    <header>
        <a href="homepage.php" class="logo">Travel<span>Sphere</span></a> 
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="booking.php">Book</a>
            <a href="package.php">Holiday Packages</a>
            <a href="contactus.php">Contact Us</a>
            <a href="mytrips.php">My Trips</a>
        </nav>


            <?php
            session_start();
            if(!isset($_SESSION["username"])){
                echo"   
                        <div class='icon'>
                        <nav class='navigation'><a href='travel_login.php'>Log in</a>
                        </div>
            
                    ";
            }
            else{
                $username = $_SESSION['username'];
                echo"

                    <div class='icon'>  
                        <nav class='navigation'><a>$username</a><a href='logout.php'>Log out</a></nav>
                    </div>

                ";
            }
            ?>
        <form name="search bar" action="" class="search_bar">
            <input type="search" id="search-bar" placeholder="City or Location">
            <label for="search-bar" class="bx bx-search search_btn"></label>
        </form>

    </header>

<?php

include('currency.php');
include('accessToken.php');


// Function to fetch flight offers (with price conversion)
function getFlightOffers($accessToken, $origin, $destination, $departureDate, $returnDate = null, $adults = 1) {
    $url = "https://test.api.amadeus.com/v2/shopping/flight-offers";
    $params = [
        'originLocationCode' => $origin,
        'destinationLocationCode' => $destination,
        'departureDate' => $departureDate,
        'adults' => $adults,
        'max' => 10,
    ];

    if ($returnDate) {
        $params['returnDate'] = $returnDate;
    }

    $queryString = http_build_query($params);

    $url = $url . "?" . $queryString;

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken
    ]);

    // Execute the request and get the response
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);
    return json_decode($response, true);
}



session_start();

// Replace with your actual API credentials and destination
$accessToken = getAccessToken($clientId, $clientSecret);
if (!$accessToken) {
    die("Error: Unable to get access token.");
}  


$origin = "DEL";  // Origin location code (example: Delhi)
$destination = $_SESSION['destination'];  // Destination location code (dynamic)
$departureDate = "2024-11-30";  // Departure date // Return date (if needed)
$adults = 1;

// Fetch flight offers
$flightOffers = getFlightOffers($accessToken, $origin, $destination, $departureDate, $returnDate=null, $adults);

// Convert flight prices
$currency = "INR";  // Convert to INR (Indian Rupees)


$i=0;
$seenFlights=[];
echo "<h2>Available Flights:</h2>";
?>

<form>
    <table border : 1px class="t_details">
        <thead>
            <tr>
        <th></th><th>DEPARTURE</th><th>ARRIVAL</th><th>ETD</th><th>ETA</th><th>PRICE</th><th>FLIGHT NO</th>
        </tr>
        </thead>
<?php
foreach ($flightOffers['data'] as $offer) {

    if ($i==5)break;
    
    // Extract flight details
    $itinerary = $offer['itineraries'][0]['segments'][0];
    $price = $offer['price']['total'];
    $currencyCode = $offer['price']['currency'];

    $uniqueKey = $itinerary['departure']['iataCode'] . "-" . 
    $itinerary['arrival']['iataCode'] . "-" . 
    $itinerary['departure']['at'];

    if (in_array($uniqueKey, $seenFlights)) {
    continue;
    }

    $i++;
    $seenFlights[] = $uniqueKey;

    // Convert the price to the desired currency (e.g., INR)
    //$convertedPrice = convertPrice($price, $currencyCode, $currency,$apiKey);
    echo "<tbody><tr><td><input type='radio' name ='FNo' value='".$itinerary['carrierCode'].$itinerary['number']."'>";
    echo "<td>".$itinerary['departure']['iataCode']."</td> <td>".$itinerary['arrival']['iataCode']."</td>";
    echo "<td>".$itinerary['departure']['at']."</td>";
    echo "<td>".$itinerary['arrival']['at']."</td>";
    echo "<td>".$price.$currency."</td>";
    echo "<td>".$itinerary['carrierCode'].$itinerary['number']."</td></tr></tbody>";
}

?>

</table>
<input type = 'submit' class="submit">
<?php
    if(isset($_REQUEST['FNo'])){

        foreach($flightOffers['data'] as $offer){
            $FlightNo = $_REQUEST['FNo'];
            $itinerary = $offer['itineraries'][0]['segments'][0];
            if ($itinerary['carrierCode'].$itinerary['number'] == $FlightNo){
                $_SESSION['bill'] = $offer['price']['total'];
            }
        }
    }
?>
</form>

</body></html>