<?php
    session_start();
    include "../classes/album/album.php";
    $anImage = new Image;
    $anAlbum = new Album; 
    $anAlbum -> load_album($_POST["albumID"]);

    if($_SESSION["userID"] != $anAlbum->get_creator()){
        header("Location: ../pages/error.php?ErrorMSG=This aint ya album compadre");
        die();
    }
    $media_file_type = pathinfo($_FILES['image']['name'] ,PATHINFO_EXTENSION);
    $img_extensions_arr = array("jpg","jpeg","png","gif");
    
    if(!in_array($media_file_type, $img_extensions_arr)){
        header("Location: ../pages/error.php?ErrorMSG=Invalid file type! >:(");
        die();
    }

    $target_dir = "../images/uploadedImages/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    

    if(!$anImage->upload_image($_POST["albumID"],substr($target_file, 3),$_POST["desc"],0,0,time(),$_SESSION["userID"])){
        header("Location: ../pages/error.php?ErrorMSG=Failed Request!");
        die();
    }

    header("Location: ../pages/album.php?albumID=".$_POST["albumID"]);
    die();

?>