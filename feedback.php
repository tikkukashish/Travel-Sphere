<!DOCTYPE html>
<head>
    <title>FEEDBACK</title>
    <meta charset="UTF - 8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedback.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="homepage.css" rel="stylesheet">
</head>
<body>

    <!-- header -->

    <header>
        <a href="homepage.php" class="logo">Travel<span>Sphere</span></a> 
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="booking.php">Book</a>
            <a href="package.php">Holiday Packages</a>
            <a href="contactus.php">Contact Us</a>
            <a href="mytrips.php">My Trips</a>
        </nav>


            <?php
            session_start();
            if(!isset($_SESSION["username"])){
                echo"   
                        <div class='icon'>
                        <nav class='navigation'><a href='travel_login.php'>Log in</a>
                        </div>
            
                    ";
            }
            else{
                $username = $_SESSION['username'];
                echo"

                    <div class='icon'>  
                        <nav class='navigation'><a>$username</a><a href='logout.php'>Log out</a></nav>
                    </div>

                ";
            }
            ?>
        <form name="search bar" action="" class="search_bar">
            <input type="search" id="search-bar" placeholder="City or Location">
            <label for="search-bar" class="bx bx-search search_btn"></label>
        </form>

    </header>

    <!-- body -->

    <h1 class="TopHeading"> FEEDBACK FORM </h1>
    <div class="wholediv">
        <div class="div1">
            <h1 class="heading"><center><br>Send us your Feedback!</center></h1>
            <center><h4 class="text">Do you have any suggestions or found some bug?<br>Let us know in the field below</h4></center>
        </div>
        <div class="div2">
            <p class="experience">
                How was your experience?<br>
                <form class="emotion">
                    <label><input type="radio" name="emotion"> Very Good</label>
                    <label><input type="radio" name="emotion"> Good</label>
                    <label><input type="radio" name="emotion"> Okay</label>
                    <label><input type="radio" name="emotion"> Bad</label>
                    <label><input type="radio" name="emotion"> Very bad</label>
                </form>
                    
                    <textarea class="message" placeholder="Describe your experience here"></textarea>
                <form class="problem">
                    <label><input type="radio" name="problem"> Bug</label>
                    <label><input type="radio" name="problem"> Suggestion</label>
                    <label><input type="radio" name="problem"> Others</label>
                    <input type="button" value="SEND FEEDBACK" class="button">
                </form>
            </p>
        </div>
    </div>
</body>
</html>
