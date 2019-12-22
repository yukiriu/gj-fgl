<?php

include_once __DIR__ . "/albumTDG.PHP";

class Album{

    private $id;
    private $creator;
    private $title;
    private $description;
    private $time;

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
    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return $this->title;
    }

    public function get_creator(){
        return $this->creator;
    }

    public function get_description(){
        return $this->description;
    }
    public function get_time(){
        return $this->time;
    }

    public function get_by_creator($id){
        $TDG = new AlbumTDG();
        return $TDG->get_by_creator($id);
    }

    public function add_album($creatorID,$title, $time, $description){
        $TDG = new AlbumTDG();
        $TDG->add_album($creatorID,$title, $time, $description);
    }
    public function load_album($id){
        $TDG = new AlbumTDG();
        $res = $TDG->get_by_id($id);

        if(!$res)
        {
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
        return $TDG->get_title_by_title($title);
    }
    public function display_preview(){
        echo '
            <div class="bg-gray-300 h-32 w-1/2 m-auto rounded">
                <div class="text-gray-100 bg-gray-700 p-3 my-4 rounded text-xl mx-auto"> <a href="album.php?albumID='.$this->id.'">'.$this->title.' </a></div>  
            </div>

            <div class="container max-w-md mx-auto xl:max-w-3xl h-full flex">
            <div href="createalbum.php" class="rounded bg-red-700 text-gray-200 mt-0 mx-auto p-4 hover:bg-gray-200 hover:text-gray-700 hover:shadow-outline"> 
            <a href="../logic/deletealbum.dom.php?albumID='. $this->id . '"> Delete Album - </a> </div>
            </div>
        ';
    }
}


