<?php

    session_start();

    if(!validate_session()){
        header("Location: ../pages/error.php?ErrorMSG=Session Timed Out");
        die();
    }

    $title = "User";

    $module = "userView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
