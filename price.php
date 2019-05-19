<?php 

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();

    // get top 3 devices with the most amount of water
    $devices = Device::getMostAmout($userId);

    // get the amount of familymembers
    $memberAmout = User::getAmountOfFamilyMembers($userId);

    // current usage
    $currentUsage = User::getCurrentUsage($userId);

    // set amount of water for 1 month
    $water_amount = ($memberAmout['count'] + 1) * (99 * 31);

    // set prices for the used water
    $price = ($currentUsage['total'] / 1000) * 4.3;


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Be Ware Be Water - Tips</title>
</head>
<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <div class="tips">
        <h2>Tips</h2>

        <h3>€ <?php echo $price ?></h3>
        
        <div class="avg"><p> gemiddelde van andere families </p></div>

        <div class="tip"><p>tips</p></div>

    </div>
    


    <script src="js/script.js"></script>
</body>
</html>