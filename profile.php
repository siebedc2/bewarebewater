<?php

require_once("bootstrap/bootstrap.php");

//Check if user session is active (Is user logged in?)
if( isset($_SESSION['email']) ){
    //User is logged in, no redirect needed!
}else{
    //User is not logged in, redirect to login.php!
   header("location: login.php");
}

$conn = Db::getConnection();

// get email from current user
// $_SESSION['email']
$email = $_SESSION['email'];


// GET data from DB
$statement = $conn->prepare("select * from user where email = :email");
$statement->bindParam(":email", $email);
$statement->execute();
$profile = $statement->fetch(PDO::FETCH_ASSOC);
// Edit button click
// Pop-up: ask old password
// Go to editProfile.php


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
    <title>Profile</title>
</head>

<body>
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="profile">
        <h2>Profile</h2>

        <div class="profileImg">
            <img src="images/profilePictures/profile.jpg" alt="Profile image">
            <div class="backimg"></div>
       </div>

        <!-- echo name  -->
        <h3><?php echo $profile['firstname'] . " " . $profile['lastname']; ?></h3>



    </div>

    <a href="family.php" class="btn btnSecondary">Familie</a>

    <script src="js/script.js"></script>

</body>

</html>
