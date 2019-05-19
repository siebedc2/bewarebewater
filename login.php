<?php 

    require_once("bootstrap/bootstrap.php");
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(User::canLogin($email, $password)){
            User::doLogin($email);
        } 
        
        else {
            $error = true;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Login</title>
</head>

<body class="background">

    <h2>Welkom!</h2>

    <img class="logo" src="images/logo.png" alt="Logo">

    <form action="" method="post">     

        <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                Sorry, we can't log you in with that email address and password.
            </p>
        </div>
        <?php endif; ?>
        <div class="formInput">
            <div class="formField">
                <label for="email">E-mailadres</label>
                <input type="text" name="email">
            </div>
            <div class="formField">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password">
            </div>

            <div class="formField">
                <input type="submit" value="Login" class="btn btnPrimary">
            </div>
        </div>

        <div class="redirectLink">
            <p>No account yet? <a href="register.php"> Sign up here</a></p>
        </div>
    </form>

</body>

</html>