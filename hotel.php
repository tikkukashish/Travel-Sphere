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

function getHotelOffers($accessToken, $cityCode, $checkInDate, $checkOutDate, $adults = 1) {
    $url = "https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city";
    $params = [
        'cityCode' => $cityCode,
        'checkInDate' => $checkInDate,
        'checkOutDate' => $checkOutDate,
        'adults' => $adults,
    ];

    $queryString = http_build_query($params);
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

$accessToken = getAccessToken($clientId, $clientSecret);  // Replace with your actual access token
echo "$accessToken";
$cityCode = 'NYC';               // Hotel ID
$adults = 1;                         // Number of adults
$checkInDate = '2024-11-30';         // Check-in date 

// Build the API URL with the correct parameters
$url = "https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=PAR&radius=5&radiusUnit=KM&hotelSource=ALL";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $accessToken"  // Authorization with the access token
]);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check for errors in the cURL request
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Decode the JSON response from the API
    $data = json_decode($response, true);

    // Check if there is hotel data in the response
    if (isset($data['data']) && count($data['data']) > 0) {
        echo "<h2>Hotel Offers:</h2>";
        // Loop through each hotel offer and display the details
        foreach ($data['data'] as $hotel) {
            echo "<div>";
            echo "<h3>Hotel Name: " . $hotel['hotel']['name'] . "</h3>";
            echo "<p>Location: " . $hotel['hotel']['address']['cityName'] . ", " . $hotel['hotel']['address']['countryCode'] . "</p>";
            echo "<p>Price: " . $hotel['offers'][0]['price']['total'] . " " . $hotel['offers'][0]['price']['currency'] . "</p>";
            echo "<p>Check-in: " . $hotel['offers'][0]['checkInDate'] . "</p>";
            echo "<p>Check-out: " . $hotel['offers'][0]['checkOutDate'] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "<p>No hotel offers found for your search criteria.</p>";
    }
}

curl_close($ch);

?>
