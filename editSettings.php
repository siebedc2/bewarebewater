<?php
    
    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();
    
    // get the settings of the user
    $settings = User::getSettings($userId);

    if(!empty($_POST)) {
        $houseType = $_POST['woning'];
        $location = $_POST['woonplaats'];
        $waterCompany = $_POST['watermaatschappij'];

        try {
            if(User::doChangeSettings($houseType, $location, $waterCompany) == true) {
                header("location: settings.php");
            }
        }

        catch (Throwable $t) {
            $error = $t->getMessage();
        }

    }


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

        <form action="" method="POST">
            <div class="formInput">
                <div class="formField">
                    <label for="woning">Soort woning</label>
                    <input type="text" name="woning" placeholder="Typ hier..." value="<?php echo $settings['house_type']; ?>">
                </div>

                <div class="formField">
                    <label for="woonplaats">Woonplaats</label>
                    <input type="text" name="woonplaats" placeholder="Typ hier..." value="<?php echo $settings['location']; ?>">
                </div>

                <div class="formField">
                    <label for="watermaatschappij">Watermaathschappij</label>
                    <input type="text" name="watermaatschappij" placeholder="Typ hier..." value="<?php echo $settings['water_company']; ?>">
                </div>

                <input type="submit" value="Opslaan" name="upload" class="btn btnSecondary">
            </div>
        </form>
      
    </div>

    

    <script src="js/script.js"></script>

</body>

</html>