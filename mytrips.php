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
<?php
    include('header.php');
?>



    <!-- body  -->
    <section>
        <div class="content">
        <?php
        session_start();
        if (isset($_SESSION['Confirmed'])){
            if($_SESSION['Confirmed']==1){
                echo "<div class='confirm'>Confirmed!</div>" ;
                $_SESSION['Confirmed']=0;
            }
        }
        ?>
        <div class="trip">Trip Details</div>
        <table name="details" class="t_details">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Flight Number</th>
                <th>Hotel</th>

            </tr>
            </thead>

            <tbody>
            <?php
                require('db.php');
                $username = $_SESSION['username'];
                $query = "SELECT * FROM trips WHERE Username='$username'";
                $result = mysqli_query($con,$query);



                $i=1;
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$i++."</td>";
                    echo "<td>".$row['Destination']."</td>";
                    echo "<td>".$row['Departure']."</td>";
                    echo "<td>".$row['Flight_No']."</td>";
                    echo "<td>".$row['Hotel']."</td></tr>";
                }
            ?>

            </tbody>

        </table>
        <?php
        if(mysqli_num_rows($result)==0){
                    echo "<br><br><center><h2>You have no upcoming trips.</h2></center>";
        }
        ?>
        </div>
    </section>
</body>
</html>