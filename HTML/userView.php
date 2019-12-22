<?php
$aUser = new User();


$aUser->load_user_by_id($_GET["userID"]);
$image =  $aUser->get_image();
$username = $aUser->get_username();

include "../classes/album/album.php";

$anAlbum = new Album();
$res = $anAlbum->get_by_creator($_GET["userID"]);

?>


<div class="-mt-1 bg-grey-lighter w-1/2 mx-auto">
    <div class="container mx-auto">
        <div class="flex justify-between items-center py-4 px-4">
            <div class="flex items-center">
                <img class="w-32 h-32 rounded-full" src="<?php echo "../" . $image ?>">
                <div class="ml-6">
                    <div class="text-2xl font-normal flex items-center">
                        <span class="mr-2"><?php echo $username ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
foreach ($res as $album) {
    $anAlbum->load_album($album["albumID"]);
    $anAlbum->display_preview();
}
?>

