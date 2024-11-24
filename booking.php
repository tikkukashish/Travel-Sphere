<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="booking.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    
    <!-- header -->

    <?php
    include('header.php');
    ?>

    <!-- body -->

        <img src="media\booking.jpg" class="bgimage">

    <form name="search bar" action="iata.php" class="search_bar">
        <input type="search" id="search-bar" placeholder="City or Location" name="destination">
        <label for="search-bar" class="bx bx-search search_btn"></label>
    </form>

    <script src="booking.js"></script>

</body>
</html>