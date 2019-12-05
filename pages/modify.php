<?php
    include "../utils/sessionhandler.php";
    
    session_start();

    if(!validate_session()){
        header("Location: ../pages/error.php?ErrorMSG=Session Timed Out");
        die();
      }

    $title = "Modify";

    $module = "modifyView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
