<?php

    session_start();

    $title = "Sign up";

    $module = "signup.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
