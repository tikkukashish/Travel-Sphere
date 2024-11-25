<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="package.css" rel="stylesheet">
    <link href="homepage.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Holiday Packages</title>
</head>
<body>

<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['login'] = 1;
        header('Location: travel_login.php');
    }
?>
    <!-- header -->
    <?php include('header.php'); ?>

    <!-- body -->
    <section class="package" id="package">
        <div class="container">
            <p class="section-subtitle">Popular Packages</p>
            <h2 class="section-title">Checkout Our Packages</h2>

            <ul class="package-list">
                <!-- Paris Package -->
                <li>
                    <div class="package-card">
                        <figure class="card-banner">
                            <img src="media/packages/paris.jpg" alt="Paris" loading="lazy">
                        </figure>
                        <div class="card-content">
                            <h3 class="h3 card-title">Paris</h3>
                            <p class="card-text">Paris, the "City of Light," is known for its art, fashion, gastronomy, and culture. A romantic destination with charming streets, historical monuments, and exquisite cuisine.</p>
                            <ul class="card-meta-list">
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-time'></i>
                                        <p class="text">5D/4N</p>
                                    </div>
                                </li>
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-group'></i>
                                        <p class="text">Travellers: 2</p>
                                    </div>
                                </li>
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-map'></i>
                                        <p class="text">France</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="wrapper">
                                <p class="price">Rs. 1,50,000 <span>/ per person</span></p>
                            </div>
                            <!-- Form to send data -->
                            <form action="tripDetails.php" method="post">
                                <input type="hidden" name="destination" value="Paris">
                                <input type="hidden" name="departureDate" value="2024-12-28">
                                <input type="hidden" name="FlightNo" value="AF123">
                                <input type="hidden" name="HotelName" value="Hotel de Paris">
                                <input type="hidden" name="bill" value="150000">
                                <button type="submit" class="btn btn-secondary">Book Now</button>
                            </form>
                        </div>
                    </div>
                </li>

                <!-- Kyoto Package -->
                <li>
                    <div class="package-card">
                        <figure class="card-banner">
                            <img src="media/packages/kyoto.jpg" alt="Kyoto" loading="lazy">
                        </figure>
                        <div class="card-content">
                            <h3 class="h3 card-title">Kyoto</h3>
                            <p class="card-text">Kyoto is famous for its classical Buddhist temples, stunning gardens, and traditional wooden houses.</p>
                            <ul class="card-meta-list">
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-time'></i>
                                        <p class="text">6D/5N</p>
                                    </div>
                                </li>
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-group'></i>
                                        <p class="text">Travellers: 2</p>
                                    </div>
                                </li>
                                <li class="card-meta-item">
                                    <div class="meta-box">
                                        <i class='bx bxs-map'></i>
                                        <p class="text">Japan</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="wrapper">
                                <p class="price">Rs. 1,85,000 <span>/ per person</span></p>
                            </div>
                            <!-- Form to send data -->
                            <form action="tripDetails.php" method="post">
                                <input type="hidden" name="destination" value="Kyoto">
                                <input type="hidden" name="departureDate" value="2024-12-28">
                                <input type="hidden" name="FlightNo" value="JAL456">
                                <input type="hidden" name="HotelName" value="Kyoto Grand Hotel">
                                <input type="hidden" name="bill" value="185000">
                                <button type="submit" class="btn btn-secondary">Book Now</button>
                            </form>
                        </div>
                    </div>
                </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="media\packages\new york.jpg" alt="New york city" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">New York City</h3>

                  <p class="card-text">
                    New York City is a vibrant metropolis known for its iconic skyline and Broadway shows. It's a melting pot of cultures and offers endless entertainment, world-class shopping, and diverse dining experiences.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-time' ></i>

                        <p class="text">3D/4N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-group' ></i>

                        <p class="text">Travellers: 2</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-map' ></i>

                        <p class="text">USA</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                  </div>

                  <p class="price">
                    rs. 1,65,000
                    <span>/ per person</span>
                  </p>
                  <form action="tripDetails.php" method="post">
                  <input type="hidden" name="destination" value="New York City">
                  <input type="hidden" name="departureDate" value="2024-12-27">
                  <input type="hidden" name="FlightNo" value="UA789">
                  <input type="hidden" name="HotelName" value="The Plaza">
                  <input type="hidden" name="bill" value="165000">
                  <button type="submit" class="btn btn-secondary">Book Now</button>
                  </form>




                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="media\packages\rome.jpg" alt="Rome" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Rome</h3>

                  <p class="card-text">
                    Rome, the "Eternal City," is a treasure trove of history, art, and architecture. It's home to ancient ruins alongside Renaissance masterpieces in the Vatican Museums.                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-time' ></i>

                        <p class="text">5D/4N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-group' ></i>

                        <p class="text">Travellers: 2</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-map' ></i>

                        <p class="text">Italy</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                  </div>

                  <p class="price">
                    rs. 1,35,000
                    <span>/ per person</span>
                  </p>

                  <form action="tripDetails.php" method="post">
                  <input type="hidden" name="destination" value="Rome">
                  <input type="hidden" name="departureDate" value="2024-12-25">
                  <input type="hidden" name="FlightNo" value="ITA101">
                  <input type="hidden" name="HotelName" value="Rome Imperial Hotel">
                  <input type="hidden" name="bill" value="135000">
                  <button type="submit" class="btn btn-secondary">Book Now</button>
                  </form>


                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="media\packages\syndey.jpg" alt="Sydney" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Sydney</h3>

                  <p class="card-text">
                    Sydney is known for its stunning harborfront, iconic Sydney Opera House, Harbour Bridge, and beautiful beaches like Bondi Beach. It's a perfect blend of natural beauty, urban sophistication, and vibrant culture.                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-time' ></i>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-group' ></i>

                        <p class="text">Travellers: 2</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-map' ></i>

                        <p class="text">Australia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                  </div>

                  <p class="price">
                    rs. 2,11,000
                    <span>/ per person</span>
                  </p>

                  <form action="tripDetails.php" method="post">
                  <input type="hidden" name="destination" value="Sydney">
                  <input type="hidden" name="departureDate" value="2024-12-30">
                  <input type="hidden" name="FlightNo" value="QF202">
                  <input type="hidden" name="HotelName" value="Sydney Harbour View Hotel">
                  <input type="hidden" name="bill" value="211000">
                  <button type="submit" class="btn btn-secondary">Book Now</button>
                  </form>


                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="media\packages\dubai.jpg" alt="Dubai" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Dubai</h3>

                  <p class="card-text">
                    Dubai is famous for its ultramodern architecture, luxury shopping, and vibrant nightlife. Experience desert safaris, indoor skiing, and world-class dining.                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-time' ></i>

                        <p class="text">4D/3N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-group' ></i>

                        <p class="text">Travellers: 2</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <i class='bx bxs-map' ></i>

                        <p class="text">UAE</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                  </div>

                  <p class="price">
                    rs. 1,45,000
                    <span>/ per person</span>
                  </p>

                  <form action="tripDetails.php" method="post">
                  <input type="hidden" name="destination" value="Dubai">
                  <input type="hidden" name="departureDate" value="2025-01-05">
                  <input type="hidden" name="FlightNo" value="EK303">
                  <input type="hidden" name="HotelName" value="Burj Al Arab">
                  <input type="hidden" name="bill" value="145000">
                  <button type="submit" class="btn btn-secondary">Book Now</button>
                  </form>


                </div>

              </div>
            </li>

          </ul>


        </div>
      </section>
