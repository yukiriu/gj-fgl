<?php
    include "../utils/sessionhandler.php";
    
    session_start();
    
    if(isset($_SESSION["userID"]))
    {
        header("Location: ../error.php?ErrorMSG=Already%20Logged!");
        die();
    }

    $title = "Sign in";

    $module = "signinView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
