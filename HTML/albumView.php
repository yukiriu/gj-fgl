<?php
include "../classes/album/album.php";
include "../classes/comment/comment.php";


$anAlbum = new Album();

$res = $anAlbum->get_by_albumID($_GET['albumID']);
$anAlbum->load_album($_GET['albumID']);
$anImages = new Image();

$resImage = $anImages->get_images_by_albumId($_GET['albumID']);

/*foreach ($resImage as $images) {    
        $anImages->load_image($images["imageId"]);
        $anImages->display_images();
    }*/
?>
<div class="bg-gray-300 h-auto p-4 w-3/5 m-auto rounded-lg">

<div class="container mx-auto w-2/3 h-full bg-white rounded-lg shadow overflow-hidden">
    <div class="text-gray-700 text-sm text ml-4 text-3xl p-4"><?php print $anAlbum->get_title() ?></div>
    <div class="text-gray-700 text-sm font-semibold ml-4"></div>
    <?php foreach ($resImage as $images) {
        $anImages->load_image($images["imageId"]);
        $anImages->display_images();
    }

    if (isset($_SESSION["userID"]) && $_SESSION["userID"] == $anAlbum->get_creator()) {
        echo '
                <button class="w-32 bg-gray-800 hover:bg-gray-400 hover:text-gray-800 text-white text-sm py-2 px-4 ml-4 mb-4 mx-auto rounded h-10">
                <a href = "../pages/uploadimage.php?albumID=' . $_GET["albumID"] . '"> Upload Images</a>
                </button>
                ';
    }
    ?>
    </div>
    <?php
    $aComment = new Comment();
    $allComments = $aComment->get_all_comments_by_post($_GET['albumID'], "album");
    foreach ($allComments as $comment) {
        $aComment->load_commentaire($comment["idCommentaire"]);
        $aComment->display_comment();
    }
    
    
    if (isset($_SESSION["userID"])) {
        echo'
    <div class="mx-auto mt-4 h-auto w-2/3 bg-gray-200 text-gray-800 rounded-lg pl-4 pr-4 py-2">
        <form action="../logic/addComment.dom.php" method="post">
            <input hidden name="userID" value="'.$_SESSION["userID"].'">
            <input hidden name="postID" value="'.$_GET["albumID"].'">
            <input hidden name="objet" value="album">
            <textarea class="w-full my-2 p-2" name="commentContent" placeholder="Comment something homie" required></textarea>
            <button type="submit" class="rounded-lg bg-gray-800 text-sm text-gray-200 p-2 px-2 hover:bg-gray-200 hover:text-gray-700">Post comment</button>
        </form>
    </div>
    <div>
    </div>';
    }
        ?>
</div>