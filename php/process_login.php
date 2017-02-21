<?php

include_once 'db_connect.php';
include_once 'functions.php';
error_reporting(0);
session_start(); // Our custom secure way of starting a PHP session.



if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
    //echo login($email, $password, $mysqli);

    if (login($email, $password, $mysqli) == true) {

        // Login success 

        session_write_close();
        
        header("Location: ../index.php");
       // header("Location: ../protected_page.php?" . "login_string=" .$_SESSION['login_string']. "&email=" .$email."&user_id=" .$_SESSION['user_id']."&username=" .$_SESSION['username'] );
        exit();
    } else {
        // Login failed 
        header('Location: ../login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}