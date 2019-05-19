<?php
    
    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();
    


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
    <title>Familie</title>
</head>

<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="settings">
        <h2>Instellingen</h2>

        <form action="" method="POST">
            <div class="formField">
                <label for="woning">Soort woning</label>
                <input type="text" name="woning" value="Typ hier...">
            </div>

            <div class="formField">
                <label for="woonplaats">Woonplaats</label>
                <input type="text" name="woonplaats" value="Typ hier...">
            </div>

            <div class="formField">
                <label for="watermaatschappij">Watermaathschappij</label>
                <input type="text" name="watermaatschappij" value="Typ hier...">
            </div>

            <input type="submit" value="Opslaan" name="upload" class="btn btnSecondary">
        </form>
      
    </div>

    

    <script src="js/script.js"></script>

</body>

</html>