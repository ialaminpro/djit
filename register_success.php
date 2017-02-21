<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Success</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>Registration successful!</h1>
        <?php
        error_reporting(0);
        session_start();
         header("Location: ../index.php"); exit();?>
        <p>You can now go back to the <a href="index.php">login page</a> and log in</p>
    </body>
</html>