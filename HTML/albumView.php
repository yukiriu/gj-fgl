
<?php
    include "../classes/image/image.php";
    include "../classes/album/album.php";

    $anAlbum = new Album();
    
    $res = $anAlbum->get_by_albumID($_GET['albumID']);
    $anAlbum -> load_album($_GET['albumID']);
    $anImages = new Image();

    $resImage = $anImages->get_images_by_albumId($_GET['albumID']);
    
    /*foreach ($resImage as $images) {    
        $anImages->load_image($images["imageId"]);
        $anImages->display_images();
    }*/
?>
<div class="container mx-auto w-auto xl:max-w-xl h-full bg-white rounded-lg shadow overflow-hidden">
<div class="text-gray-700 text-sm font-semibold ml-4 mt-4"><?php print $anAlbum->get_title() ?></div>
        <div class="text-gray-700 text-sm font-semibold ml-4"></div>
        <?php foreach ($resImage as $images) {    
                $anImages->load_image($images["imageId"]);
                $anImages->display_images();
            }
        ?>
        <button class="w-32 bg-gray-800 hover:bg-gray-400 hover:text-gray-800 text-white text-sm py-2 px-4 ml-4 mb-4 rounded h-10">
          <a href = '../pages/uploadimage.php?albumID=<?php echo $_GET["albumID"]?>'> Upload Images</a>
</butoon>
</div>