<?php
include_once __DIR__ . "/commentTDG.PHP";
class comment{
    private $idComentaire;
    private $typeObjet;
    private $idObjet;
    private $nbLike;
    private $tempsCreation;
    private $contenu;
    private $userId;
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
    public function get_idCommentaire(){
        return $this->idComentaire;
    }
    public function get_typeObjet(){
        return $this->typeObjet;
    }
    public function get_idObjet(){
        return $this->idObjet;
    }
    function get_tempsCreation(){
        return $this->tempsCreation;
    }
    public function get_nbLike(){
        return $this->nbLike;
    }
    public function get_contenu(){
        return $this->contenu;
    }
    public function get_userId(){
        return $this->userId;
    }
    //setters
    public function set_idCommentaire($id){
        $this->idCommentaire = $id;
    }
    public function set_typeObjet($type){
        $this->typeObjet = $type;
    }
    public function set_idObjet($idObjet){
        $this->idObjet = $idObjet;
    }
    public function set_tempsCreation($temps){
        $this->tempsCreation = $temps;
    }
    public function set_nbLike($n){
        $this->nbLike = $n;
    }
    public function set_contenu($contenu){
        $this->contenu = $contenu;
    }
    public function set_userId($id){
        $this->userId = $id;
    }
    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function load_commentaire($idCommentaire){
        $TDG = new commentTDG();
        $res = $TDG->get_by_idCommentaire($idCommentaire);
        if(!$res)
        {
            $TDG = null;
            return false;
        }
        $this->idComentaire = $res['idCommentaire'];
        $this->userId = $res['userId'];
        $this->typeObjet = $res['typeObjet'];
        $this->idObjet = $res['idObjet'];
        $this->contenu = $res['contenu'];
        $this->nbLike = $res['nbLike'];
        $this->tempsCreation = $res['tempsCreation'];
        
        $TDG = null;
        return true;
    }
}