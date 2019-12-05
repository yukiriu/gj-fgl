<?php
    include "../classes/user/userTDG.php";
    include "../classes/user/user.php";
    include "../utils/formvalidator.php";


    session_start();
    $currentPw = $_POST["currentPassword"];
    $newPw = $_POST["newPassword"];
    $newPwValidation = $_POST["newPasswordValidation"];

    $aUser = new User();
    $tdg = new UserTDG();
    $val = new Validator();

    if(!($newPw === $newPwValidation) || empty($newPw) || empty($newPwValidation))
    {
        header("Location: ../pages/error.php?ErrorMSG=Passwords do not match!".$newPw . $newPwValidation);   
        die();
    }
    
    if(!$val->validate_password($newPw)){
        header("Location: ../pages/error.php?ErrorMSG=Invalid Password");   
        die();
    }

    $aUser->load_user($tdg->get_by_id($_SESSION["userID"])["email"]);

    if(password_verify($currentPw ,$aUser->get_password())) {
        $tdg->update_password(password_hash($newPw, PASSWORD_DEFAULT), $_SESSION["userID"]);
        header("Location: ../pages/modify.php?info=Password modified!");
        die();
    }

    header("Location: ../pages/error.php?ErrorMSG=Invalid Current Password");
?>