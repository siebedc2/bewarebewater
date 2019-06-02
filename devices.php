<?php
    
    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();

    // get all devices of the logged in user
    $results = User::getAllDevices($userId);
    

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
    <title>Be Ware Be Water - Apparaten</title>
</head>

<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="devices">
        <h2>Apparaten</h2>

        <div class="allDevices">
            <?php foreach($results as $result): ?>
                <div class="device" data-id="<?php echo $result['id'] ?>">
                    <p class="deviceName"><?php echo $result['name']; ?></p>
                    <p class="deviceAmount"><?php echo $result['amount'] . ' l'; ?></p>
                    <p class ="delete">X</p>
                </div>       
            <?php endforeach; ?>
        </div>
    </div>

    <a href="addDevice.php" class="btn btnSecondary">Apparaat toevoegen</a>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/deleteDevice.js"></script>
</body>

</html>