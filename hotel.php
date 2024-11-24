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
    return $response['access_token'] ?? null;
}

$accessToken = getAccessToken($clientId, $clientSecret);
if (!$accessToken) {
    die("Error: Unable to get access token.");
}

$cityCode = 'NYC'; 
$radius = 5; 
$ratings = 4; 

$url = "https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=$cityCode&radius=$radius&radiusUnit=KM&ratings=$ratings";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $accessToken"
]);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
    curl_close($ch);
    die();
}

curl_close($ch);

$data = json_decode($response, true);
if (!isset($data['data']) || count($data['data']) === 0) {
    die("No hotels found for the given city code.");
}

$hotelIds = array_map(fn($hotel) => $hotel['hotelId'], $data['data']);

$i = 0;

foreach ($hotelIds as $hotelId) {

    $checkInDate = '2024-11-30'; 
    $adults = 1; 
    $roomQuantity = 1; 

    $offersUrl = "https://test.api.amadeus.com/v3/shopping/hotel-offers?hotelIds=$hotelId";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $offersUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken"
    ]);

    $offerResponse = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        continue;
    }

    curl_close($ch);

    $offerData = json_decode($offerResponse, true);
    if (isset($offerData['data']) && count($offerData['data']) > 0) {
        if (++$i > 5) break;
        foreach ($offerData['data'] as $hotel) {
            $hotelName = $hotel['hotel']['name'];
            $price = $hotel['offers'][0]['price']['total'];
            $currency = $hotel['offers'][0]['price']['currency'];
            $checkInDate = $hotel['offers'][0]['checkInDate'];
            $checkOutDate = $hotel['offers'][0]['checkOutDate'];
            
            // Hotel ratings and distance from city center with isset checks
            $rating = $hotel['hotel']['rating'] ?? 'Not available';  // Default if rating is missing
            
            // Check if location key exists and then access distance
            $distance = isset($hotel['hotel']['location']['distance']) ? $hotel['hotel']['location']['distance'] : 'Not available';  

            echo "<div>";
            echo "<h3>Hotel Name: $hotelName</h3>";
            echo "<p>Price: $price $currency</p>";
            echo "<p>Rating: $rating stars</p>";
            echo "<p>Distance from City Centre: $distance km</p>";
            echo "<p>Check-in: $checkInDate</p>";
            echo "<p>Check-out: $checkOutDate</p>";
            echo "</div><br>";
        }
    }
}

?>
