<?php 

    require_once("bootstrap/bootstrap.php");

    if(!empty($_POST['apparaat']) && !epmty($_POST['kamer'])){
        $userId = User::getUserId();
        $results = Device::addDevice($userId);

    }

    




?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Apparaat toevoegen</title>
</head>
<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="devices">
        <h2>Apparaat toevoegen</h2>

        <form action="" method="POST">
            <div class="formField">
                <label for="apparaat">Apparaat</label>
                <input type="text" name="apparaat">
            </div>

            <div class="formField">
                <label for="kamer">Kamer</label>
                <input type="text" name="kamer">
            </div>
        </form>

    </div>

    <a href="addDevice.php" class="btn btnSecondary">Toevoegen</a>

    <script src="js/script.js"></script>
    
</body>
</html>