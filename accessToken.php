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
?>