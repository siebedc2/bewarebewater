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
    <title>Dashboard</title>
</head>
<body class="background">
    
    <div class="overlay"></div>

    <header>
        <?php include("nav.inc.php");?>
    </header>

    <div id="dashboardContainer">
        <div class="dashboardDiv" id="usage">
            <h1 id="currentUsage">100 <span id="liter">L</span></h1>
            <img src="#" alt="graph" id="graph">
        </div>
        <div class="dashboardDiv" id="add">
            <h2>Apparaat toevoegen</h2>
            <a href="#" id="addButton"></a>
        </div>
        <div class="dashboardDiv" id="ranking">
            <h2>Grootste verbruikers</h2>
            <p class="rankName">Toilet <span class="rankUsage">50L</span></p>
            <p class="rankName">Toilet 2 <span class="rankUsage">40L</span></p>
            <p class="rankName">Douche <span class="rankUsage">30L</span></p>
            <p class="rankName">Bad <span class="rankUsage">25L</span></p>
            <p class="rankName">Afwasmachine <span class="rankUsage">20L</span></p>
            <p class="rankName">Wasmachine <span class="rankUsage">20L</span></p>
        </div>
        <div class="dashboardDiv" id="pay">
            <h2>Te betalen</h2>
            <h2>€99</h2>
        </div>
    </div>


    <script src="js/script.js"></script>
</body>
</html>