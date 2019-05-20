<?php 
    
    // require all classes
    require_once("bootstrap/bootstrap.php");

    if( !empty($_POST) ){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];
        // Try to start new user obj, set properties and call the register function
        try{
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setPasswordConfirmation($passwordConfirm);
            $user->register();
        }
        
        catch( Exception $e){
            $error = $e->getMessage();
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
    <title>Be Ware Be Water - Register</title>
</head>

<body class="background backgroundSignup">
    <form action="" method="post">
        <h2>Welkom!</h2>

        <img class="logo" src="images/logo.png" alt="Logo">

        <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                <?php echo $error ?>
            </p>
        </div>
        <?php endif; ?>

        <div class="formInput">
            <div class="formField">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname">
            </div>

            <div class="formField">
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            
            <div class="formField">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="formField">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="formField">
                <label for="passwordConfirm">Password Confirmation</label>
                <input type="password" name="passwordConfirm">
            </div>

            <div class="formField">
                <input type="submit" value="Sign up" class="btn btnPrimary">
            </div>
        </div>

        <div class="redirectLink">
            <p>Already have an account? <a href="login.php"> Log in here</a></p>
        </div>
    </form>
</body>

</html>