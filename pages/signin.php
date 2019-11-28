<?php

    session_start();

    $title = "Sign in";

    $module = "igninView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
