<?php
    include "../classes/user/user.php";
    include "../utils/formvalidator.php";

    session_start();

    if(isset($_SESSION["userID"]))
    {
        header("Location: ../pages/error.php?ErrorMSG=Already%20logged!");
        die();
    }
    
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pw = $_POST["password"];
    $pwv = $_POST["passwordValidation"];

    $val = new validator();
    if(!$val->validate_email($email) || !$val->validate_password($pw))
    {
        header("Location: ../pages/error.php?ErrorMSG=Invalid email or password!");
        die();
    }

    $aUser = new User();
    
    if(!$aUser->register($email,$username, $pw, $pwv))
    {
        header("Location: ../pages/error.php?ErrorMSG=Passwords do not match!");
        die();
    }

    header("Location: ../pages/signin.php");
    die();
?>