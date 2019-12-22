<?php
    $aUser = new User();
    $users = $aUser->get_all_users();

    foreach($users as $user){
        $aUser->load_user_by_id($user["userId"]);
        $aUser->display_user();
    }

?>