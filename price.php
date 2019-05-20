<?php 

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();

    // get the amount of familymembers
    $memberAmout = User::getAmountOfFamilyMembers($userId);

    // current usage
    $currentUsage = User::getCurrentUsage($userId);

    // set amount of water for 1 month
    $water_amount = ($memberAmout['count'] + 1) * (99 * 31);

    // set prices for the used water
    $price = ($currentUsage['total'] / 1000) * 4.3;

    // average amount
    $avg = User::avgAmount($userId);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Be Ware Be Water - Te betalen</title>
</head>
<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <div class="tips">
        <h2>Te betalen</h2>

        <div class="priceDiv1 priceDiv">
            <img src="images/coins.png" alt="">   
            <h3>€ <?php echo $price ?></h3>
        </div>   

        <div class="priceDiv vergelijking">
            <h4>Vergelijking</h4>
            <p>Is hetzelfde als 3 zwembaden</p>
        </div>
        
        <div class="priceDiv avg">
            <h4>Gemiddelde</h4>
            <p><?php echo $avg['avg'] . "L" ?></p>
        </div>

        <div class="priceDiv tip">
            <h4>Tips</h4>
            <p>Zorg voor volledig gevulde toestellen</p>
        </div>

    </div>
    


    <script src="js/script.js"></script>
</body>
</html>