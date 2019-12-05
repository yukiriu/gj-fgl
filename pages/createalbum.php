<?php

    session_start();

    $title = "Create Album";

    $module = "createalbumView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
