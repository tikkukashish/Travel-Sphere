<?php

$clientId = "KJ03ahnCTtMlrueI1dlazlTnGOoCtATw";
$clientSecret = "w1GTjVdITpWVr5Zk";

function getAccessToken($clientId, $clientSecret) {
    $url = "https://test.api.amadeus.com/v1/security/oauth2/token";
    $data = [
        'grant_type' => 'client_credentials',
        'client_id' => $clientId,
        'client_secret' => $clientSecret
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);
    $response = json_decode($response, true);
    if (isset($response['access_token'])) {
        return $response['access_token'];
    } else {
        echo "Error: Unable to fetch access token.";
        return null;
    }
}

function getFlightOffers($accessToken, $origin, $destination, $departureDate, $returnDate = null, $adults = 1) {
    $url = "https://test.api.amadeus.com/v2/shopping/flight-offers";
    $params = [
        'originLocationCode' => $origin,
        'destinationLocationCode' => $destination,
        'departureDate' => $departureDate,
        'adults' => $adults,
    ];

    if ($returnDate) {
        $params['returnDate'] = $returnDate;
    }

    $queryString = http_build_query($params);
    echo"$queryString";
    $url = $url . "?" . $queryString;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);
    return json_decode($response, true);
}

$accessToken = getAccessToken($clientId, $clientSecret);

$origin = "DEL"; 
$destination = "BOM"; 
$departureDate = "2024-12-01"; 
$returnDate = "2024-12-10"; 
$adults = 1;


$flightOffers = getFlightOffers($accessToken, $origin, $destination, $departureDate, $returnDate, $adults);

$seenFlights = [];


echo "<h2>Available Flights:</h2>";
$i = 0;
foreach ($flightOffers['data'] as $offer) {
    if ($i == 5) break;
    $itinerary = $offer['itineraries'][0]['segments'][0];
    $price = $offer['price']['total'];

    $uniqueKey = $itinerary['departure']['iataCode'] . "-" . 
                 $itinerary['arrival']['iataCode'] . "-" . 
                 $itinerary['departure']['at'];

    if (in_array($uniqueKey, $seenFlights)) {
        continue;
    }

    $i++;
    $seenFlights[] = $uniqueKey;

    echo "<p>Flight from {$itinerary['departure']['iataCode']} to {$itinerary['arrival']['iataCode']}</p>";
    echo "<p>Departure: {$itinerary['departure']['at']}</p>";
    echo "<p>Arrival: {$itinerary['arrival']['at']}</p>";
    echo "<p>Price: $ {$price}</p>";
    echo "<p>Flight No: {$itinerary['carrierCode']}{$itinerary['number']}</p><hr>";
    
}
?>
