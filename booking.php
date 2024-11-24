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

    <header>
        <a href="homepage.php" class="logo">Travel<span>Sphere</span></a> 
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="booking.php">Book</a>
            <a href="package.php">Holiday Packages</a>
            <a href="contactus.php">Contact Us</a>
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
            <input type="search" id="search-bar" placeholder="City or Location" >
            <label for="search-bar" class="bx bx-search search_btn"></label>
        </form>

    </header>

    <!-- body -->

        <img src="D:\JIIT\College\sem 3\DBMS\project\media\rayyu-maldives-Nbu3v_UDg6w-unsplash.jpg" class="bgimage">

    <form name="search bar" action="iata.php" class="search_bar">
        <input type="search" id="search-bar" placeholder="City or Location" name="destination">
        <label for="search-bar" class="bx bx-search search_btn"></label>
    </form>

    <script src="booking.js"></script>

</body>
</html>