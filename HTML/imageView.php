<?php
    include "../classes/album/album.php";
    include "../classes/image/image.php";

    /*$anAlbum = new Album();

    $res = $anAlbum->get_by_creator($_GET['creator']);*/

    $anImages = new Image();

    $anImages->load_image($_GET['imageID']);

    $resImage = $anImages->get_URL();

?>
<div>
    <img src="../<?php echo  $anImages->get_URL(); ?>" alt="">
</div>