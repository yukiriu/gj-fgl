<?php 
    include "../classes/comment/comment.php";

    $aComment = new Comment();
    echo $aComment->add_commentaire($_POST["commentContent"], $_POST["postID"], $_POST["objet"], $_POST["userID"]);

    if($_POST["objet"] == "image"){
        header("Location: ../pages/image.php?imageID=".$_POST["postID"]);
        die();
    } else{
        header("Location: ../pages/album.php?albumID=".$_POST["postID"]);
        die();
    }

?>