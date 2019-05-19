<?php 

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();

    // get top 3 devices with the most amount of water
    $devices = Device::getMostAmout($userId);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Be Ware Be Water - Home</title>
</head>

<body class="background">
    
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- begin of dashboardcontainer -->
    <div id="dashboardContainer">
        <div class="dashboardDiv" id="usage">
            <h1 id="currentUsage">100 <span id="liter">L</span></h1>
            <img src="images/graph.png" alt="graph" id="graph">
        </div>

        <div class="dashboardDiv" id="add">
            <h2>Apparaat toevoegen</h2>
            <a href="addDevice.php"><img src="images/add.png" alt="plus"></a>
        </div>
        
        <div class="dashboardDiv" id="ranking">
            <h2>Grootste verbruikers</h2>
            <?php foreach($devices as $device): ?>
                <div class="rankDevice">
                    <p class="rankName"><?php echo $device['name']; ?></p>
                    <p class="rankUsage"><?php echo $device['amount'] / 10 . 'L'; ?></p>
                </div>
            <?php endforeach; ?>       
        </div>

        <div class="dashboardDiv" id="pay">
            <h2>Te betalen</h2>
            <h1>€99</h1>
        </div>
    </div>
    <!-- end of dashboardcontainer-->

    <script src="js/script.js"></script>
</body>
</html>