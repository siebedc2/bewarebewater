<?php
    
    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();
    
    // get the settings of the user
    $settings = User::getSettings($userId);


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
    <title>Be Ware Be Water - Familie</title>
</head>

<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="settings">
        <h2>Instellingen</h2>

        
        <div class="data">
            <div class="dataField">
                <p>Soort woning</p>
                <p><?php echo $settings['house_type']; ?></p>
            </div>

            <div class="dataField">
                <p>Woonplaats</p>
                <p><?php echo $settings['location']; ?></p>
            </div>

            <div class="dataField">
                <p>Watermaatschappij</p>
                <p><?php echo $settings['water_company']; ?></p>
            </div>    
        </div>
        
        <a href="editSettings.php" class="btn btnSecondary">Instellingen bewerken</a>
        <!--<a href="">Wachtwoord aanpassen</a>-->
      
    </div>

    

    <script src="js/script.js"></script>

</body>

</html>