<?php

include_once __DIR__ . "/imageTDG.PHP";

class Image{

    private $userId;
    private $imagesId;
    private $URL;
    private $description;
    private $tempsCreation;
    private $nbView;
    private $nbLike;
    private $albumID;

    /*
        utile si on utilise un factory pattern
    */
    public function __construct(){
        //$this->id = $id;
        //$this->email = $email;
        //$this->username = $username;
        //$this->password = $password;
        //$this->TDG = new UserTDG;
    }


    //getters
    public function get_userId(){
        return $this->userId;
    }

    public function get_imagesId(){
        return $this->imagesId;
    }

    public function get_URL(){
        return $this->URL;
    }

    public function get_description(){
        return $this->description;
    }
    public function get_tempsCreation(){
        return $this->tempsCreation;
    }
    public function get_nbLike(){
        return $this->nbLike;
    }
    public function get_nbView(){
        return $this->nbView;
    }
    public function get_albumID(){
        return $this->albumID;
    }

    //setters
    public function set_imagesId($id){
        $this->imagesId = $id;
    }

    public function set_URL($URL){
        $this->URL = $URL;
    }

    public function set_description($description){
        $this->description = $description;
    }

    public function set_tempsCreation($temps){
        $this->tempsCreation = $temps;
    }

    public function set_nbLike($n){
        $this->nbLike = $n;
    }

    public function set_nbView($n){
        $this->nbView = $n;
    }

    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function upload_image($albumID,$URL, $description, $nbView, $nbLike, $tempsCreation, $userId){
        $TDG = new imagesTDG();
        $res = $TDG -> add_images($albumID,$URL, $description, $nbView, $nbLike, $tempsCreation, $userId);

        $TDG = null;
        return $res;
    
    }

    public function get_images_by_albumId($id)
    {
        $TDG = new imagesTDG();
        return $TDG->get_all_by_AlbumId($id);
    }

    public function get_by_description($description)
    {
        $TDG = new imagesTDG();
        return $TDG->get_by_description($description);
    }

    public function delete_image($id)
    {
        $TDG = new imagesTDG();
        return $TDG->delete_image($id);
    }

    public function load_image($imageId){
        $TDG = new imagesTDG();
        $res = $TDG->get_by_imagesId($imageId);

        if(!$res)
        {
            $TDG = null;
            return false;
        }

        $this->imagesId = $res['imageId'];
        $this->userId = $res['userId'];
        $this->URL = $res['URL'];
        $this->description = $res['description'];
        $this->nbView = $res['nbView'];
        $this->nbLike = $res['nbLike'];
        $this->tempsCreation = $res['tempsCreation'];
        $this->albumID = $res["albumID"];
        
        $TDG = null;
        return true;
    }

    public function get_all_images(){
        $TDG = new imagesTDG();
        return $TDG->get_all_images();
    }
    
    public function add_view($imageId){
        $TDG = new imagesTDG();
        return $TDG->add_view($imageId);
    }

    public function display_images(){
        echo '
            <div>
                <a href="image.php?imageID='.$this->imagesId.'"><img src="../'.$this->URL.'" style="min-width: 60%" class="max-w-50 min-w-50 m-auto my-4"> </a>
            </div>
        ';
    }

    public function display_image_search(){
        $aUser = new User();
        $aUser->load_user_by_id($this->userId);
        $username = $aUser->get_username();
        echo '
        <div class="mt-4">
        <a href="image.php?imageID='.$this->imagesId.'">
        <img class="mx-auto w-2/3 rounded-t-lg" src="../'.$this->URL.'">
        </a>
        </div>
    
        <div class="bg-gray-900 text-gray-300 text-3xl w-2/3 mx-auto pl-4">
            <span class="font-extrabold">🖒</span>
            <span class="ml-2 ">'.$this->nbLike.'</span>
            <span class="ml-4 font-extrabold">👁</span>
            <span class="ml-2">'.$this->nbView.'</span>
        </div>
        <div class="bg-gray-200 rounded-b-lg text-gray-800 w-2/3 mx-auto pl-4 pr-4 pt-2">
            <span>'.$this->description.'</span><br>
            <div class="font-base text-gray-400 border-t-2 pb-2">Posted by <u class="text-gray-500"><a href="user.php?userID='.$this->userId.'">'.$username.'<a></u> on '.gmdate("Y-m-d H:i", $this->tempsCreation).'</div>
        </div>
        ';
    }
}


