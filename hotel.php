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
    $url = "https://test.api.amadeus.com/v3/shopping/hotel-offers";
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

$accessToken = getAccessToken($clientId, $clientSecret);

$cityCode = "NYC"; // Example for New York, use appropriate city code
$checkInDate = "2024-12-01"; 
$checkOutDate = "2024-12-10"; 
$adults = 1;

$hotelOffers = getHotelOffers($accessToken, $cityCode, $checkInDate, $checkOutDate, $adults);

$seenHotels = [];

print_r($hotelOffers);

echo "<h2>Available Hotels:</h2>";
$i = 0;
foreach ($hotelOffers['data'] as $offer) {
    if ($i == 5) break;
    $hotel = $offer['hotel'];
    $price = $offer['offers'][0]['price']['total'];

    $uniqueKey = $hotel['name'] . "-" . $hotel['address']['lines'][0] . "-" . 
                 $hotel['address']['postalCode'];

    if (in_array($uniqueKey, $seenHotels)) {
        continue;
    }

    $i++;
    $seenHotels[] = $uniqueKey;

    echo "<p>Hotel: {$hotel['name']}</p>";
    echo "<p>Address: {$hotel['address']['lines'][0]}, {$hotel['address']['postalCode']}</p>";
    echo "<p>Price: $ {$price}</p><hr>";
}
?>
