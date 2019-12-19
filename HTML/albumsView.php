<?php
    include "../classes/album/album.php";

    $anAlbum = new Album();
    $res = $anAlbum->get_by_creator($_SESSION["userID"]);

    foreach ($res as $album) {
        $anAlbum->load_album($album["albumID"]);
        $anAlbum->display_preview();
    }
?>

<div class="container max-w-md mx-auto xl:max-w-3xl h-full flex">
<div class="rounded bg-gray-700 text-gray-200 mx-auto p-4 hover:bg-gray-200 hover:text-gray-700 hover:shadow-outline"> <a href="createalbum.php"> Create album + </a> </div>
</div>

<div class="bg-image">
</div>