<?php

include_once __DIR__ . "/imageTDG.PHP";

class Image{

    private $userId;
    private $imagesId;
    private $albumID;
    private $URL;
    private $description;
    private $tempsCreation;
    private $nbView;
    private $nbLike;

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
    
    public function get_albumId(){
        return $this->albumID;
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
        return $res;
    }

    public function get_images_by_albumId($id)
    {
            $TDG = new ImagesTDG();
            return $TDG->get_all_by_AlbumId($id);
        
    }

 
    public function display_images(){
        echo '
            <div style="background-image: url("https://images.unsplash.com/photo-1555527127-5d23f6f8e154?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=975&q=80")">
            </div>
        ';
    }
}


