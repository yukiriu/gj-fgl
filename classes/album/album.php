<?php

include_once __DIR__ . "/albumTDG.PHP";
include "../classes/image/image.php";


class Album
{

    private $id;
    private $creator;
    private $title;
    private $description;
    private $time;

    /*
        utile si on utilise un factory pattern
    */
    public function __construct()
    {
        //$this->id = $id;
        //$this->email = $email;
        //$this->username = $username;
        //$this->password = $password;
        //$this->TDG = new UserTDG;
    }

    //getters
    public function get_id()
    {
        return $this->id;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_creator()
    {
        return $this->creator;
    }

    public function get_description()
    {
        return $this->description;
    }
    public function get_time()
    {
        return $this->time;
    }

    public function get_by_creator($id)
    {
        $TDG = new AlbumTDG();
        return $TDG->get_by_creator($id);
    }

    public function add_album($creatorID, $title, $time, $description)
    {
        $TDG = new AlbumTDG();
        $TDG->add_album($creatorID, $title, $time, $description);
    }
    public function load_album($id)
    {
        $TDG = new AlbumTDG();
        $res = $TDG->get_by_id($id);

        if (!$res) {
            $TDG = null;
            return false;
        }

        $this->id = $res['albumID'];
        $this->creator = $res['userID'];
        $this->title = $res['title'];
        $this->description = $res['description'];
        $this->time = $res['time'];

        $TDG = null;
        return true;
    }
    public function get_all_albums(){
        $TDG = new AlbumTDG();
        return $TDG->get_all_albums();
    }
    public function get_by_albumID($id)
    {
        $TDG = new AlbumTDG();
        return $TDG->get_by_id($id);
    }

    public function delete_album($id)
    {
        $TDG = new AlbumTDG();
        return $TDG->delete_album($id);
    }

    public function get_by_title($title)
    {
        $TDG = new AlbumTDG();
        return $TDG->get_all_albums_by_title($title);
    }
    public function display_preview_home()
    {
        $anImage = new Image();
        $images = $anImage->get_images_by_albumId($this->id);
        $image1 = $images[0]["URL"]?? null;
        $image2 = $images[1]["URL"]?? null;
        $image3 = $images[2]["URL"]?? null;
        if(!is_null($image1)){
            $image1 = "../" . $image1;
        }
        if(!is_null($image2)){
            $image2 = "../" . $image2;
        }
        if(!is_null($image3)){
            $image3 = "../" . $image3;
        }
        
        $aUser = new User();
        $aUser->load_user_by_id($this->creator);
        echo '
            <div class="bg-gray-300 h-40 w-1/3 m-auto rounded overflow-hidden mb-5">
                <div class="text-gray-100 bg-gray-700 p-3 rounded-t text-xl mx-auto hover:text-gray-700 hover:bg-gray-300"> <a href="album.php?albumID=' . $this->id . '">' . $this->title .' by '.$aUser->get_username() .' </a></div> 
                <div class="flex">
                <img class="w-1/3 max-h-32" src='.$image1.'>
                <img class="w-1/3 max-h-32" src='.$image2.'>
                <img class="w-1/3 max-h-32" src='.$image3.'>
                </div>
            </div>';
    }
    public function display_preview_search()
    {
        $anImage = new Image();
        $images = $anImage->get_images_by_albumId($this->id);
        $image1 = $images[0]["URL"]?? null;
        $image2 = $images[1]["URL"]?? null;
        $image3 = $images[2]["URL"]?? null;
        if(!is_null($image1)){
            $image1 = "../" . $image1;
        }
        if(!is_null($image2)){
            $image2 = "../" . $image2;
        }
        if(!is_null($image3)){
            $image3 = "../" . $image3;
        }
        $aUser = new User();
        $aUser->load_user_by_id($this->creator);
        echo '
            <div class="bg-gray-400 h-40 w-2/3 m-auto rounded overflow-hidden mt-5">
                <div class="text-gray-100 bg-gray-700 p-3 rounded-t text-xl mx-auto hover:text-gray-700 hover:bg-gray-300"> <a href="album.php?albumID=' . $this->id . '">' . $this->title .' by '.$aUser->get_username() .' </a></div> 
                <div class="flex">
                <img class="w-1/3 max-h-32" src='.$image1.'>
                <img class="w-1/3 max-h-32" src='.$image2.'>
                <img class="w-1/3 max-h-32" src='.$image3.'>
                </div>
            </div>';
    }
    public function display_preview()
    {
        $this->display_preview_home();

        if (isset($_SESSION["userID"]) && $_SESSION["userID"] == $this->creator) {
            echo '
            <div class="container max-w-md mx-auto xl:max-w-3xl h-full flex mb-4">
            <div class="rounded bg-red-700 text-gray-200 mt-0 mx-auto p-2  hover:bg-gray-200 hover:text-gray-700 hover:shadow-outline"> 
            <a href="../logic/deletealbum.dom.php?albumID=' . $this->id . '"> Delete Album - </a> </div>
            </div>
            ';
        }
    }
}
