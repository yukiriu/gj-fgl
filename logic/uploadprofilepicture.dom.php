<?php
    session_start();
    include "../classes/user/user.php";
    $aUser = new User;
    $aUser->load_user_by_id($_SESSION["userID"]);

    $id = $aUser->get_id();
    $email = $aUser->get_email();
    $username = $aUser->get_username();
    $imagepath = $aUser->get_image();
 
    $target_dir = "../images/profileImages/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    //$img_extensions_arr = array("jpg","jpeg","png","gif");

    if(!$aUser->update_image($_SESSION["userID"], substr($target_file, 3))) {
        header("Location: ../pages/error.php?ErrorMSG=Failed Request!");
        die();
    }

    header("Location: ../pages/modify.php");
    die();

?>