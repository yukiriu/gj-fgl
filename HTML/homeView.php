<?php 
include "../classes/album/album.php";

    $anAlbum = new Album();
    //$anImage = new Image();
    //$allImages = $anImage->get_all_images();
    $allAlbums = $anAlbum->get_all_albums();
    //$allContent = array_merge($allAlbums, $allImages);

    foreach($allAlbums as $album){
        $anAlbum->load_album($album["albumID"]);
        $anAlbum->display_preview_home();
    }
?>