<?php 
    require_once("bootstrap/bootstrap.php");

    if( !empty($_POST) ){

        //Check if register fields are not empty strings
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) ){

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            //Check if firstname is not longer than 30chars
            //if( User::maxLength($firstname, 30)){
            //    $error = "Firstname cannot be longer than 30 characters.";
            //}

            //Check if lastname is not longer than 30chars
            //if( User::maxLength($lastname, 30)){
            //    $error = "Lastname cannot be longer than 30 characters.";
            //}

            //Check if username is not longer than 30chars
            //if( User::maxLength($username, 30)){
            //    $error = "Username cannot be longer than 30 characters.";
            //}

            //Check if email is legit
            if( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                //Email has valid input
                //Do nothing, advance to next code lines
            }else {
                //email input is not valid, show error to user to check on this field
                $error = "Please use a valid email address!";
            }

            //Check if email is not in our DB yet
            if( User::isEmailAvailable($email) ){
                //Email is available, do nothing
            }else{
                //Email is not available, show error to user
                $error = "A user with this email address is already registered.";
            }

            //Check if username is not in our DB yet
            //if( User::isUsernameAvailable($username) ){
                //Username is available, do nothing
            //}else{
                //Username is not available, show error to user
            //    $error = "This username is already registered.";
            //}

            //Check if password has minimum length of 8 chars
            //Check if username is not longer than 30chars
            if( User::minLength($password, 8)){
                $error = "Password must be minimum 8 chars long.";
            }

            //Do passwords equal?
            if( $password !== $passwordConfirm){
                //Passwords not equal, show error to user
                $error = "Password fields are not equal, please enter them again";
            }

            //Check if no error is set before attempting to create a new user
            if( !isset($error) ){

                //Start new user obj, set properties and call the register function
                $user = new User();

                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($password);

                if( $user->register() ){
                    //Start new session for registered user
                    session_start();
                    $_SESSION['email'] = $user->getEmail();

                    //Redirect to index
                    header("location: index.php");
                }else{
                    //Registration method failed, show error basic error to user (Real error is logged in register method)
                    $error = "User could not be registered, there has been a sudden error.";
                }

            }


        }else{
            //Some fields are empty, show error to user
            $error = "All fields are required! Please check again.";
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
    <title>Register</title>
</head>

<body class="background">
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
                <input type="submit" value="Sign up" 
                .0+>
            </div>
        </div>

        <div class="redirectLink">
            <p>Already have an account? <a href="login.php"> Log in here</a></p>
        </div>
    </form>
</body>

</html>