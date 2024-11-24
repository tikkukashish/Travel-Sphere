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

    <?php
    include('header.php');
    ?>

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
