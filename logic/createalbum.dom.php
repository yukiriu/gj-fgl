<?php
    include "../classes/album/album.php";
    session_start();

    $albumTitle = $_POST["title"];
    $albumDesc = $_POST["desc"];

    $anAlbum = new Album();

    $anAlbum->add_album($_SESSION["userID"],$albumTitle,time(),$albumDesc);

    header("Location: ../pages/albums.php");
    die();
?>