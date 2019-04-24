<?php 
    require_once("bootstrap/bootstrap.php");
    if (!empty($_POST)) {
        $conn = Db::getConnection();
        /**
        * htmlspecialchars prevents the abuse of html tags in the input fields
        * the tags included will be transformed into text instead and will be part of the input
        */
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $statement = $conn->prepare("select * from user where email = :email");
        $statement->bindParam(":email", $email); # the email parameter is bound to :email to prevent sql-injection
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            header("location: index.php");
        } else {
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
                Sorry, we can't log you in with that email address and password. Can you try again?
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