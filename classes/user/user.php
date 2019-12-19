<?php

include_once __DIR__ . "/userTDG.PHP";

class User{

    private $id;
    private $email;
    private $username;
    private $password;
    private $image;

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

    public function get_email(){
        return $this->email;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }
    public function get_image(){
        return $this->image;
    }


    //setters
    public function set_email($email){
        $this->email = $email;
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_image($image){
        $this->image = $image;
    }


    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function load_user($email){
        $TDG = new UserTDG();
        $res = $TDG->get_by_email($email);

        if(!$res)
        {
            $TDG = null;
            return false;
        }

        $this->id = $res['userId'];
        $this->email = $res['email'];
        $this->username = $res['username'];
        $this->password = $res['password'];
        $this->image = $res['image'];
        
        $TDG = null;
        return true;
    }

    public function load_user_by_id($id){
        $TDG = new UserTDG();
        $res = $TDG->get_by_id($id);

        if(!$res)
        {
            $TDG = null;
            return false;
        }

        $this->id = $res['userId'];
        $this->email = $res['email'];
        $this->username = $res['username'];
        $this->password = $res['password'];
        $this->image = $res['image'];
        
        $TDG = null;
        return true;
    }

    public function update_image($id, $image){
        $TDG = new UserTDG();
        return $TDG->update_image($id, $image);
    }


    //Login Validation
    public function Login($email, $pw){
        if(!$this->load_user($email))
        {
            return false;
        }
        
        if(!password_verify($pw, $this->password))
        {
            return false;
        }

        /*$_SESSION["userID"] = $this->id;
        $_SESSION["userEmail"] = $this->email;
        $_SESSION["userName"] = $this->username;*/

        return true;
    }


    public function validate_register($email){
        $TDG = new UserTDG();
        $res = $TDG->get_by_email($email);
        $TDG = null;
        if($res)
        {
            return false;
        }

        return true;
    }


    public function register($email, $username, $pw, $vpw){
        
        if(!($pw === $vpw) || empty($pw) || empty($vpw))
        {
            return false;
        }

        if(!$this->validate_register($email, $pw))
        {
            return false;
        }

        //add user to DB
        $TDG = new UserTDG();
        print_r ($res = $TDG->add_user($email, $username, password_hash($pw, PASSWORD_DEFAULT), "images\profileImages\default.jpg"));
        $TDG = null;
        return true;
    }
}


