<?php
    include "../classes/user/user.php";
    include "../utils/formvalidator.php";

    session_start();

    if(isset($_SESSION["userID"]))
    {
        header("Location: ../pages/error.php?ErrorMSG=Already%20logged!");
        die();
    }
    
    //prendre les variables du Post
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pw = $_POST["password"];
    $pwv = $_POST["passwordValidation"];

    //Validation Posts
    $val = new validator();
    if(!$val->validate_email($email) || !$val->validate_password($pw))
    {
        header("Location: ../pages/error.php?ErrorMSG=Invalid email or password");
        die();
    }

    $aUser = new User();
    
    //validateLogin
    if(!$aUser->register($email,$username, $pw, $pwv))
    {
        header("Location: ../pages/error.php?ErrorMSG=invalid email or password");
        die();
    }

    header("Location: ../pages/signin.php");
    die();
?>