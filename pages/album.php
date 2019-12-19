<?php

    session_start();

    $title = "Album";

    $module = "albumView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
