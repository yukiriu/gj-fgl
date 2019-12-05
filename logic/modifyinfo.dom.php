<?php
    include_once "../utils/formvalidator.php";
    include_once "../classes/user/userTDG.php";
    include_once "../classes/user/user.php";

    session_start();

    $aUser = new User();
    $userTDG = new UserTDG();

    $username = $_POST["username"];
    $email = $_POST["email"];

    $aUser = new User();

    $val = new validator();
    if(!$val->validate_email($email))
    {
        header("Location: ../pages/error.php?ErrorMSG=Invalid email");
        die();
    }

    if(!$userTDG->update_info($email, $username, $_SESSION["userID"]))
    {
        header("Location: ../error.php?ErrorMSG=Bad Request");
        die();
    }

    header("Location: ../pages/modify?info=Info modified");
    die();
?>