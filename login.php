<?php 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <h2 class="formTitle">Login</h2>

        <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                Sorry, we can't log you in with that email address and password. Can you try again?
            </p>
        </div>
        <?php endif; ?>
        <div class="formInput">
            <div class="formField">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <div class="formField">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="formField">
                <input type="submit" value="login" class="btn btnPrimary">
            </div>
        </div>

        <div class="redirectLink">
            <p>No account yet? <a href="register.php"> Sign up here</a></p>
        </div>
    </form>

</body>

</html>