<?php

    session_start();

    $title = "Modify";

    $module = "modifyView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
