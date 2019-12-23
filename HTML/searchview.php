<?php
  include_once __DIR__ . "/../CLASSES/album/album.php";
  include_once __DIR__ . "/../CLASSES/user/user.php";
  include_once __DIR__ . "/../CLASSES/image/image.php";

  $anAlbum = new Album();
  $albums = $anAlbum->get_by_title($_GET["search"]);

  $aUser = new User();
  $users = $aUser->get_all_users_by_username($_GET["search"]);

  $anImage = new Image();
  $images = $anImage->get_by_description($_GET["search"]);
  ?>


<div class="w-32 mx-auto text-3xl text-center mb-4">
  <H1>Results</H1>
</div>
<div class="bg-gray-300 h-auto p-4 w-3/5 m-auto rounded-lg">
  <?php 

  foreach($users as $user) {
    $aUser->load_user_by_id($user["userId"]);
    $aUser->display_user();
    }

  foreach($images as $image) {
    $anImage->load_image($image["imageId"]);
    $anImage->display_image_search();
  }

   foreach($albums as $album) {
    $anAlbum->load_album($album["albumID"]);
    $anAlbum->display_preview_search();
  }
  ?>
</div>
