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
include('getAccessToken.php');
include('currency.php');

session_start();

$accessToken = getAccessToken($clientId, $clientSecret);

if (!$accessToken) {
    die("Error: Unable to get access token.");
}

$cityCode = $_SESSION['destinationCode']; 
$radius = 30; 
// Request hotels with ratings 3, 4, 5
$url = "https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=$cityCode&radius=$radius&radiusUnit=KM&ratings=3,4,5";

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

// Get hotel IDs from the response
$hotelIds = array_map(fn($hotel) => $hotel['hotelId'], $data['data']); // Get all hotel IDs

// Batch hotelIds into chunks of 20
$chunks = array_chunk($hotelIds, 50);

$i = 0;

echo "<h2>Available Hotels:</h2>";
?>
<form>
    <table border : 1px class="t_details">
        <thead>
            <tr>
        <th></th><th>HOTEL NAME</th><th>RATING</th><th>CHECK-IN</th><th>CHECK-OUT</th><th>PRICE</th>
        </tr>
        </thead>
<?php
foreach ($chunks as $batch) {
    if ($i >= 3) break; // Limit to 3 batches for testing

    $hotelIdList = implode(',', $batch); // Create a comma-separated string for the hotelIds
    $checkInDate = '2024-11-30';
    // Send a request for hotel offers for this batch
    $offersUrl = "https://test.api.amadeus.com/v3/shopping/hotel-offers?hotelIds=$hotelIdList&checkInDate=$checkInDate";
    
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
        $i+=count($offerData['data']);
        foreach ($offerData['data'] as $hotel) {
            $hotelId = $hotel['hotel']['hotelId']; // Extract hotelId from offer data

            // Match rating from the $data['data'] based on hotelId
            $rating = 'Not available'; // Default in case rating is not found
            foreach ($data['data'] as $d) {
                if ($d['hotelId'] == $hotelId) {
                    $rating = $d['rating'] ?? 'Not available';
                    break;
                }
            }

            // Display hotel details
            $hotelName = $hotel['hotel']['name'];
            $price = $hotel['offers'][0]['price']['total'];
            $currency = $hotel['offers'][0]['price']['currency'];
            $checkInDate = $hotel['offers'][0]['checkInDate'];
            $checkOutDate = $hotel['offers'][0]['checkOutDate'];

            //$convertedPrice = convertPrice($price, $currencyCode, $currency,$apiKey);
            echo "<tbody><tr><td><input type='radio' name ='HName' value='".$hotelName."'>";
            echo "<td>".$hotelName."</td>";
            echo "<td>".$rating."</td>";
            echo "<td>".$checkInDate."</td><td>".$checkOutDate."</td>";
            echo "<td>".$price."</td>";
        }
    }

}

?>

</table>
<input type = 'submit' class="submit">

<?php
    if(isset($_REQUEST['HName'])){

        foreach($offerData['data'] as $hotel){
            $HName = $_REQUEST['HName'];
            if ($hotel['hotel']['name'] == $HName){
                $_SESSION['bill'] += $hotel['offers'][0]['price']['total'];
                $_SESSION['HotelName'] = $HName;
                header('Location: confirmBooking.php');
            }
        }
    }
?>

</form>


</body></html>
