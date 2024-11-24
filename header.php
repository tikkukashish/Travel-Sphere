<header>
        <a href="homepage.php" class="logo">Travel<span>Sphere</span></a> 
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="booking.php">Book</a>
            <a href="package.php">Holiday Packages</a>
            <a href="contactus.php">Contact Us</a>
 
            <?php
            session_start();
            if(!isset($_SESSION["username"])){
                echo"  
                        </nav> 
                        <div class='icon'>
                        <nav class='navigation'><a href='travel_login.php'>Log in</a>
                        </div>
            
                    ";
            }
            else{
                echo '<a href="mytrips.php">My Trips</a></nav>';
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