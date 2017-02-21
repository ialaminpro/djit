<<<<<<< HEAD
<?php
//session_start();
include_once 'php/db_connect.php';
include_once 'php/functions.php';
 
session_start();
print_r($_SESSION);exit();
//$_SESSION['login_string'] = $_GET['login_string'];
//$_SESSION['username'] = $_GET['username'];
//$_SESSION['email'] = $_GET['email'];
//$_SESSION['user_id'] = $_GET['user_id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : 
            
            header( "Location: index.php" );
            
            ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                This is an example protected page.  To access this page, users
                must be logged in.  At some stage, we'll also check the role of
                the user, so pages will be able to determine the type of user
                authorised to access the page.
            </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : 
             header( "Location: login.php" );
            
            ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
=======
<?php
//session_start();
include_once 'php/db_connect.php';
include_once 'php/functions.php';
 
session_start();
print_r($_SESSION);exit();
//$_SESSION['login_string'] = $_GET['login_string'];
//$_SESSION['username'] = $_GET['username'];
//$_SESSION['email'] = $_GET['email'];
//$_SESSION['user_id'] = $_GET['user_id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : 
            
            header( "Location: index.php" );
            
            ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                This is an example protected page.  To access this page, users
                must be logged in.  At some stage, we'll also check the role of
                the user, so pages will be able to determine the type of user
                authorised to access the page.
            </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : 
             header( "Location: login.php" );
            
            ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
>>>>>>> origin/master
</html>