<?php

    session_start();

    $title = "home";

    $module = "home.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
