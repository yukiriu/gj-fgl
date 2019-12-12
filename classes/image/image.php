<?php

include_once __DIR__ . "/imagesTDG.PHP";

class Images{

    private $userId;
    private $imagesId;
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

        $this->imagesId = $res['imagesId'];
        $this->userId = $res['userId'];
        $this->URL = $res['URL'];
        $this->description = $res['description'];
        $this->nbView = $res['nbView'];
        $this->nbLike = $res['nbLike'];
        $this->tempsCreation = $res['tempsCreation'];
        
        $TDG = null;
        return true;
    }
}


