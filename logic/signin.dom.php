<?php
    include "../classes/user/user.php";
    include "../utils/formvalidator.php";

    session_start();

    if(isset($_SESSION["userID"]))
    {
        header("Location: ../error.php?ErrorMSG=already%20logged%20in!");
        die();
    }
    
    //prendre les variables du Post
    $email = $_POST["email"];
    $pw = $_POST["pw"];

    //Validation Posts
    $aUser = new User();
    
    //validateLogin
    if($aUser->Login($email, $pw))
    {
        header("Location: ../home.php");
        die();
    }

    header("Location: ../error.php?ErrorMSG=invalid email or password");
    die();
    ?>
    
