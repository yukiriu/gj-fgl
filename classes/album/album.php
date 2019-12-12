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

    public function display_preview(){
        echo '
            <div class="bg-gray-300 h-32 mb-10 w-2/3 m-auto rounded">
                <div href="album.php?albumID='.$this->id.'" class="text-gray-100 bg-gray-700 p-3 my-4 rounded text-xl mx-auto">'.$this->title.'</div>  
            </div>
        ';
    }
}


