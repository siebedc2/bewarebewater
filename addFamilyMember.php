<?php 

    require_once("bootstrap/bootstrap.php");

    if (!empty($_GET['name'])) {
        $name = $_GET['name'];
        $results = User::searchMember($name);
    } 

    $results = User::getAllusers();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Toevoegen familie</title>
</head>
<body>

    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <!-- SHOW data from DB -->
    <div class="family">
        <h2>Toevoegen familie</h2>

        <form action="" method="GET">
            <div class="searchBar" id="search">
                <input type="text" id="name" name="name">
            </div>
        </form>       

        <?php foreach ($results as $result): ?>
            <div class="user">
                <p><?php echo $result['firstname'] . " " . $result['lastname']; ?></p>
                
            </div>

        <?php endforeach; ?>

      
    </div>
    

    <script src="js/script.js"></script>
</body>
</html>