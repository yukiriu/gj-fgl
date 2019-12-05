<?php

    $aUser = new User();
    $tdg = new UserTDG();

    $res = $tdg->get_by_id($_GET["userID"]);
    $image =  $res["image"];
    $username = $res["username"];
?>

<div class="container ">
    <div class="relative m-auto mt-32 w-32 h-32 rounded-full bg-gray-100 overflow-hidden" style="display: flex; justify-content: center; align-items: center">
      <img src="<?php echo "../" . $image ?>" class="bg-cover object-contain" style="flex-shrink: 0; min-width: 100%; min-height: 100%">
    </div>
    <div>
        <?php echo $username ?>
    </div>
</div>