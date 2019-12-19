<?php
    include "../classes/album/album.php";

    session_start();

    $albumID = $_GET["albumID"];

    $anAlbum = new Album();

    $anAlbum->load_album($albumID);

    if(isset($_SESSION["userID"]))
    {
        if($_SESSION["userID"] == $anAlbum->get_creator())
        {
            $anAlbum->delete_album($albumID);
        }
        else
        {
            header("Location: ../pages/error.php?ErrorMSG=This aint ya album compadre");
            die();
        }
    }
    header("Location: ../pages/albums.php");
    die();
?>