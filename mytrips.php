<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="homepage.css" rel="stylesheet">
    <link href="mytrips.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
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
    </header>

    <!-- body  -->
    <section>
        <div class="content">
        <div class="trip">Trip Details</div>
        <table name="details" class="t_details">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Destination</th>
                <th>Flight Number</th>
                <th>Hotel</th>
                <th>Departure</th>
                <th>Arrival</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>idk</td>
                <td>1001</td>
                <td>abcd</td>
                <td>20/11/24</td>
                <td>23/11/24</td>
            </tr>

            <tr>
                <td>2</td>
                <td>idk</td>
                <td>1001</td>
                <td>abcd</td>
                <td>20/11/24</td>
                <td>23/11/24</td>
            </tr>

            </tbody>

        </table>
        </div>
    </section>
</body>
</html>