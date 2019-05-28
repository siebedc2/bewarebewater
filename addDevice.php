<?php 

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // if the fields are not empty
    if(!empty($_POST['kamer']) && !empty($_POST['apparaat'])){
        // get value of the fields        
        $room = $_POST['kamer'];
        $device = $_POST['apparaat'];

        // get user_id from the user that is logged in
        $userId = User::getUserId();

        if(Device::addDevice($userId, $room, $device)) {
            // go to the devices-page
            header("location: devices.php");
        }

        else {
            // give error message
            $error = true;
        }

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
    <title>Be Ware Be Water - Apparaat toevoegen</title>
</head>
<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="devices">
        <h2>Apparaat toevoegen</h2>

        <!--<p>Hier kunt u een nieuw apparaat toevoegen waarbij het waterverbruik gemeten moet worden.</p>-->

        <form action="" method="POST">
            <?php if (isset($error)): ?>
            <div class="formError">
                <p>
                    We kunnen het apparaat niet toevoegen, probeer opnieuw
                </p>
            </div>
            <?php endif; ?>
            <div class="formInput">
                <div class="formField">
                    <label for="apparaat">Apparaat</label>
                    <input type="text" name="apparaat">
                </div>

                <div class="formField">
                    <label for="kamer">Kamer</label>
                    <input type="text" name="kamer">
                </div>

                <input type="submit" value="Toevoegen" class="btn btnSecondary">
            </div>
        </form>

    </div>

    <script src="js/script.js"></script>
    
</body>
</html>