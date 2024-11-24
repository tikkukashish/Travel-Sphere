<html><body>
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
    <table border : 1px>
        <th></th><th>DEPARTURE</th><th>ARRIVAL</th><th>ETD</th><th>ETA</th><th>PRICE</th><th>FLIGHT NO</th>
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
    echo "<tr><td><input type='radio' name ='FNo' value='".$itinerary['carrierCode'].$itinerary['number']."'>";
    echo "<td>".$itinerary['departure']['iataCode']."</td> <td>".$itinerary['arrival']['iataCode']."</td>";
    echo "<td>".$itinerary['departure']['at']."</td>";
    echo "<td>".$itinerary['arrival']['at']."</td>";
    echo "<td>".$price.$currency."</td>";
    echo "<td>".$itinerary['carrierCode'].$itinerary['number']."</td></tr>";
}

?>

</table>
<input type = 'submit'>
</form>

</body></html>