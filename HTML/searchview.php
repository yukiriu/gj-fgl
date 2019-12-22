<?php
  include_once __DIR__ . "/../CLASSES/album/album.php";
  include_once __DIR__ . "/../CLASSES/user/user.php";
  include_once __DIR__ . "/../CLASSES/image/image.php";

  $album = new Album();
  $albums = $album->get_by_title($_GET["search"]);

  $user = new User();
  $users = $user->get_username_by_username($_GET["search"]);

  $image = new Image();
  $images = $image->get_desc_by_description($_GET["search"]);
   echo  var_dump($albums);

   foreach($albums as $album) {
    $album->load_album($album["title"]);
    $album->display();
  }?>
?>

<div class="container" style="margin-top:30px">
  <H1>Results:</H1>
  <?php echo "$_SERVER[REQUEST_URI]";

    foreach($users as $user) {
    $user->load_user($user["username"]);
    $user->display();
    }
  foreach($images as $image) {
    $image->load_image($image["description"]);
    $image->display();
  }
  foreach($albums as $album) {
    $album->load_album($album["title"]);
    $album->display();
  }?>
</div>
