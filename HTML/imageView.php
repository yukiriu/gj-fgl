<?php
include "../classes/album/album.php";
include "../classes/comment/comment.php";

$aUser = new User();
$anImages = new Image();

$anImages->load_image($_GET['imageID']);
$anImages->add_view($_GET['imageID']);
$aUser->load_user_by_id($anImages->get_userId());
$resImage = $anImages->get_URL();

?>
<div class="bg-gray-300 h-auto p-4 w-3/5 m-auto rounded-lg">
    <div class="mt-4">
        <img class="mx-auto w-2/3 rounded-t-lg" src="../<?php echo  $anImages->get_URL(); ?>">
    </div>

    <div class="bg-gray-900 text-gray-300 text-3xl w-2/3 mx-auto pl-4">
        <span class="font-extrabold">🖒</span>
        <span class="ml-2 "><?php echo $anImages->get_nbLike() ?></span>
        <span class="ml-4 font-extrabold">👁</span>
        <span class="ml-2"><?php echo $anImages->get_nbView() ?></span>
    </div>
    <div class="bg-gray-200 rounded-b-lg text-gray-800 w-2/3 mx-auto pl-4 pr-4 pt-2">
        <span><?php echo $anImages->get_description() ?></span><br>
        <div class="font-base text-gray-400 border-t-2 pb-2">Posted by <u class="text-gray-500"><a href="user.php?userID=<?php echo $aUser->get_id() ?>"><?php echo $aUser->get_username() ?><a></u> on <?php echo gmdate("Y-m-d H:i", $anImages->get_tempsCreation()) ?></div>
    </div>
    <?php
    if (isset($_SESSION["userID"]) && $_SESSION["userID"] == $anImages->get_userId()) {
        echo '
         <div class="mt-4 max-w-md mx-auto xl:max-w-3xl h-full flex">
            <div class="rounded bg-red-700 text-gray-200 mt-0 mx-auto p-2 my-2 hover:bg-gray-200 hover:text-gray-700 hover:shadow-outline"> 
            <a href="../logic/deleteimage.dom.php?imageID=' . $_GET['imageID'] . '"> Delete Image - </a> </div>
    </div>
        ';
    }

    ?>
    <div class="text-gray-900 text-2xl w-2/3 mx-auto">Comments</div>
    <?php
    $aComment = new Comment();
    $allComments = $aComment->get_all_comments_by_post($_GET['imageID'], "image");
    foreach ($allComments as $comment) {
        $aComment->load_commentaire($comment["idCommentaire"]);
        $aComment->display_comment();
    }
    if (isset($_SESSION["userID"])) {
        echo '
    <div class="mx-auto mt-4 h-auto w-2/3 bg-gray-200 text-gray-800 rounded-lg pl-4 pr-4 py-2">
        <form action="../logic/addComment.dom.php" method="post">
            <input hidden name="userID" value="' . $_SESSION["userID"] . '">
            <input hidden name="postID" value="' . $_GET["imageID"] . '">
            <input hidden name="objet" value="image">
            <textarea class="w-full my-2 p-2" name="commentContent" placeholder="Comment something homie" required></textarea>
            <button type="submit" class="rounded-lg bg-gray-800 text-sm text-gray-200 p-2 px-2 hover:bg-gray-200 hover:text-gray-700">Post comment</button>
        </form>
    </div>
    <div>
    </div>';
    }
    ?>