<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="homepage.css" rel="stylesheet">
    <title>TravelSphere</title>
</head>
<body>
   <!-- header -->
    <?php
    include('header.php');
    ?>
    <!-- body section -->

     <section class="home" id="home">

        <div class="tagline">
            <h2>Your Adventure Starts Here !</h2>
            <h3>Book Your Stay Now</h3>
            <a href="booking.php" class="btn">Book</a>
        </div>

        <div class="controls">
            <span class="vid_control active" data-src="media\vid3.mp4"></span>
            <span class="vid_control" data-src="media\vid1.mp4"></span>
            <span class="vid_control" data-src="media\vid2.mp4"></span>
            <span class="vid_control" data-src="media\vid4.mp4"></span>
        </div>

        <div class="vid">
            <video src="media\vid3.mp4" id="video" loop autoplay muted></video>
        </div>
     </section>

     <!-- top picks slide -->

     <section class="picks">
    <div class="recommended">
        Recommended Places
    </div>
    <div class="places-container">

        <div class="place-card">
            <img src="media\recommended places\LA.jpg" alt="Los Angeles">
            <a href="LA.html">Los Angeles</a>
        </div>

        <div class="place-card">
            <img src="media\recommended places\vietnam.jpg" alt="Vietnam">
            <a href="vietnam.html">Vietnam</a>
        </div>

        <div class="place-card">
            <img src="media\recommended places\Paris.jpg" alt="Paris">
            <a href="paris.html">Paris</a>
        </div>

        <div class="place-card">
            <img src="media\recommended places\london.jpg" alt="london">
            <a href="london.html">London</a>
        </div>

        <div class="place-card">
            <img src="media\recommended places\rome.jpg" alt="rome">
            <a href="rome.html">Rome</a>
        </div>

    </div>
</section>
