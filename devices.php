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

        <?php foreach($results as $result): ?>
            <div class="device">
                <p><?php echo $result['name']; ?></p>
                <p><?php echo $result['amount']; ?></p>
            </div>       
        <?php endforeach; ?>

    </div>

    <a href="addDevice.php" class="btn btnSecondary">Toevoegen</a>

    <script src="js/script.js"></script>

</body>

</html>