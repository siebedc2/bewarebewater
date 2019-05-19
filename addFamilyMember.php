<?php 

    // require all classes
    require_once("bootstrap/bootstrap.php");

    // logged in a user?
    User::userLoggedIn();

    // if the fields are not empty
    if (!empty($_GET['name'])) {
        // get value of the fields
        $name = $_GET['name'];

        // search the user in the db
        $results = User::searchMember($name);
    } 

    else {
        $userId = User::getUserId();
        $results = User::getAllusers($userId);
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
    <title>Be Ware Be Water - Toevoegen familielid</title>
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
            <div class="formInput">
                <div class="searchBar" id="search">
                    <input type="text" id="name" name="name">
                </div>
            </div>
        </form>       

        <?php foreach ($results as $result): ?>
            <div class="user">
                <p><?php echo $result['firstname'] . " " . $result['lastname']; ?></p>
                <a class="addBtn" data-id="<?php echo $result['id'] ?>" href="#">Toevoegen</a>                
            </div>
        <?php endforeach; ?>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/addMember.js"></script>
</body>
</html>