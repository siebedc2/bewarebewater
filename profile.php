<?php

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // get user_id from the user that is logged in
    $userId = User::getUserId();

    // get all devices of the logged in user
    $profile = User::getUserData($userId);

    // get all familymembers of the user
    $results = User::getAllMembers($userId);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Be Ware Be Water - Profiel</title>
</head>

<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="profile">
        <h2>Profiel</h2>

        <div class="profileImg">
            <img src="images/profilePictures/profile.jpg" alt="Profile image">
            <div class="backimg"></div>
       </div>

        <!-- echo name  -->
        <h3><?php echo $profile['firstname'] . " " . $profile['lastname']; ?></h3>

    </div>

    <div class="familyMembers">
        <?php foreach ($results as $result): ?>
            <!-- Echo the profile picture of the person-->
            <div class="familyMember" data-id="<?php echo $result['id'] ?>">
                <p class="delete">X</p>
                <div class="profileImg">
                    <img src="images/profilePictures/<?php echo $result['avatar'] ?>" alt="Profile image">
                    <div class="backimg"></div>
                </div>

                <!-- Echo firstname and lastname of member -->
                <p class="firstname"><?php echo $result['firstname']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    

    <a href="addFamilyMember.php" class="btn btnSecondary">Familielid toevoegen</a>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/deleteMember.js"></script>
</body>

</html>
