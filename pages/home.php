<?php

    session_start();

    $title = "Home";

    $module = "homeView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
