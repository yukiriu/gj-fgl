<?php

    session_start();

    $title = "Upload Image";

    $module = "uploadImageView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
