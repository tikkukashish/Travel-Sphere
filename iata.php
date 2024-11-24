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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
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

function getCityCode($cityName, $accessToken) {
    
    $url = "https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY&keyword=" . urlencode($cityName);

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
        return null;
    }

    curl_close($ch);
    $data = json_decode($response, true);

    if (isset($data['data'][0]['iataCode'])) {
        return $data['data'][0]['iataCode'];
    } else {
        echo "City not found or no matching city code.";
        return null;
    }
}

// Usage example
$accessToken = getAccessToken($clientId, $clientSecret);
$cityName = $_REQUEST['destination']; // Replace with your city name
echo"$cityName";
$cityCode = getCityCode($cityName, $accessToken);

if ($cityCode) {
    session_start();
    $_SESSION['destination'] = $cityName;
    $_SESSION['destinationCode'] = $cityCode;
    header("Location: flight.php");
} else {
    echo "City Not Available";
}

?>
