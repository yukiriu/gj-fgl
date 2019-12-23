<?php 
    include "../classes/comment/comment.php";

    $aComment = new Comment();
    $aComment->delete_comment($_GET["commentID"]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
?>