<?php
    session_start();
    include "../classes/user/userTDG.php";
    $TDG = new UserTDG;
    $res = $TDG->get_by_id($_SESSION["userID"]);

    $id = $res['userId'];
    $email = $res['email'];
    $username = $res['username'];
    $imagepath = $res['image'];
 
    $target_dir = "../images/profileimages/";

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $img_extensions_arr = array("jpg","jpeg","png","gif");

    $TDG = new UserTDG;

    if(!$TDG->update_info($_SESSION['userEmail'],$_SESSION["userName"],$_SESSION["userID"], substr($target_file, 3))) {
        header("Location: ../pages/error.php?ErrorMSG=Failed Request!");
        die();
    }

    header("Location: ../pages/modify.php");
    die();

?>