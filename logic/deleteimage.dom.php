<?php
    include "../classes/image/image.php";

    session_start();

    $imageID = $_GET["imageID"];

    $anImage = new Image();

    $anImage->load_image($imageID);
    echo $imageID;
    
    if(isset($_SESSION["userID"]))
    {
        if($_SESSION["userID"] == $anImage->get_userId())
        {
            $anImage->delete_image($imageID);
        }
        else
        {
            header("Location: ../pages/error.php?ErrorMSG=This aint your imageo compadre");
            die();
        }
    }
    header("Location: ../pages/album.php?albumID=".$anImage->get_albumID());
    die();
?>