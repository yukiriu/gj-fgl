<?php
    include "../utils/sessionhandler.php";
    
    session_start();

    if(!validate_session_private())
    {
      if(!isset($_SESSION["userID"]))
      {
        header("Location: ../pages/error.php?ErrorMSG=You Must Sign In Compadre");
        die();
      }
      else
      {  
        header("Location: ../pages/error.php?ErrorMSG=Session Timed Out");
        die();
      } 
    }

    $title = "Create Album";

    $module = "createalbumView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
