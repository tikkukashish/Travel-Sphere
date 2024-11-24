<!DOCTYPE html>
<head>
    <title>CONTACT US</title>
    <meta charset="UTF - 8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php
    include('header.php');
?>

    <!-- body -->

    <img src="back02.png" class="background">
    <center class="text">
        <p class="heading">Have Some Questions?</p>
        <p class="para1">
            Thank You for your interest in our services. Please fill out the form below and <br>
            we will get back to you promptly regarding your request.
        </p>    
    </center>    
    <div class="Odiv">
        <div><img src="media\contact us image.jpg" class="image"></div>
        <div class="details">
            <form class="form">
                <input type="text" placeholder="First Name*" class="firstName"><br>
                <input type="text" placeholder="Last Name*"><br>
                <input type="email" placeholder="Email*"><br>
                <textarea class="message" placeholder="Message"></textarea>
                <input type="submit" class="button">
            </form>
        </div>
    </div>
    <div class="feedback">
        <br><br>GIVE US YOUR VALUABLE FEEDBACK: <a href="Feedback.php">CLICK HERE<br></a>
    </div>
    
    <!-- footer -->

</body>
</html>