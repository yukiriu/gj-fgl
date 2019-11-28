<?php

    session_start();

    $title = "Sign in";

    $module = "signin.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
