<?php

    session_start();

    $title = "Albums";

    $module = "albumsView.php";
    $content = array();
    array_push($content, $module);

    require_once "../HTML/masterpage.php";

?>
