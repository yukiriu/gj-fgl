<?php
    include "../utils/sessionhandler.php";

    session_start();

    if(!validate_session_public()){
        header("Location: ../pages/error.php?ErrorMSG=Session Timed Out");
        die();
      }

    $title = "searchresults";

    
    $module = "searchView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
