<?php
    


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
    <div class="profile">
        <h2>Familie</h2>

        <div class="profileImg">
            <img src="images/profilePictures/profile.jpg" alt="Profile image">
            <div class="backimg"></div>
       </div>
      
    </div>

    <a href="#" class="btn btnSecondary">Toevoegen</a>

    <script src="js/script.js"></script>

</body>

</html>