<?php
include_once __DIR__ . "/commentTDG.PHP";
class Comment{
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
    public function display_comment (){
        $aUser = new User(); 
        $aUser->load_user_by_id($this->userId); 
        if(isset($_SESSION["userID"]) && $_SESSION["userID"] == $aUser->get_id()){
            echo '
        <div class="mx-auto mt-4 h-auto w-2/3 bg-gray-200 text-gray-800 rounded-lg pl-4 pr-4 pt-2">
        <span>'.$this->contenu.'</span><br>
        <div class="font-base text-gray-400 border-t-2 pb-2">Posted by <u class="text-gray-500"><a href="user.php?userID='.$this->userId.'">'. $aUser->get_username() .'<a></u> on ' . gmdate("Y-m-d H:i", $this->tempsCreation).'
        <span class="ml-2 "> <a href="../logic/deletecomment.dom.php?commentID='.$this->idComentaire.'" class="text-gray-600 hover:text-gray-900">Delete comment</a></span>
        </div>
        </div>
        ';
        }
        else {
            echo '
        <div class="mx-auto mt-4 h-auto w-2/3 bg-gray-200 text-gray-800 rounded-lg pl-4 pr-4 pt-2">
        <span>'.$this->contenu.'</span><br>
        <div class="font-base text-gray-400 border-t-2 pb-2">Posted by <u class="text-gray-500"><a href="user.php?userID='.$this->userId.'">'. $aUser->get_username() .'<a></u> on ' . gmdate("Y-m-d H:i", $this->tempsCreation).' </div>
        </div>
        ';
        }
        
    }

    public function add_commentaire($content, $idObjet, $typeObject, $userId){
        $TDG = new CommentTDG();
        $TDG-> add_commentaire($typeObject,$idObjet,0,time(),$content,$userId);
        $TDG = null;
    }

    public function delete_comment ($id){
        $TDG = new CommentTDG();
        $TDG->delete_comment($id);
        $TDG = null;
    }
    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function get_all_comments_by_post($id, $typeObject){
        $TDG = new commentTDG();
        return $TDG->get_all_commentaire_ByIdObjet($id, $typeObject);
    }
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