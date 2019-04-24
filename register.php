<?php 
    


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <form action="" method="post">
        <h2 class="formTitle">Signup</h2>

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
                <input type="text" name="firstname">
            </div>
            <div class="formField">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname">
            </div>
            <div class="formField">
                <label for="username">Username</label>
                <p id="usernameFeedback" class="ajaxFeedback hidden"></p>
                <input type="text" id="username" name="username">
            </div>
            <div class="formField">
                <label for="email">Email</label>
                <p id="emailFeedback" class="ajaxFeedback hidden"></p>
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