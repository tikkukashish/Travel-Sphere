<?php


$apiKey = "cur_live_ndo9pD9sBv3Excgib684DVBMqQ4E0PUkDlYdSS3o";  

function getExchangeRate($baseCurrency, $targetCurrency, $apiKey) {
    // API endpoint URL
    $url = "https://api.currencyapi.com/v3/latest?apikey=$apiKey&base_currency=$baseCurrency&currencies=$targetCurrency";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if the response contains rates
    if (isset($data['data'][$targetCurrency])) {
        return $data['data'][$targetCurrency];
    } else {
        echo "Error: Unable to fetch exchange rate.";
        return null;
    }
}

// Function to convert flight price to another currency
function convertPrice($amount, $fromCurrency, $toCurrency,$apiKey) {
    // Get exchange rate for the conversion
    $rate = getExchangeRate($fromCurrency, $toCurrency, $apiKey);
    if ($rate !== null) {
        return floor($amount * $rate['value']);
    } else {
        return null;
    }
}
?>