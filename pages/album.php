<?php
    include "../utils/sessionhandler.php";
    
    session_start();

    if(!validate_session_private()){
        header("Location: ../pages/error.php?ErrorMSG=Session Timed Out");
        die();
      }

    $title = "Album";
    $module = "albumView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
