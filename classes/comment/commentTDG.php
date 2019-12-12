<?php

include_once __DIR__ . "/../../utils/connector.php";

class commentaireTDG extends DBAO{

    private $tableName;
    
    public function __construct(){
        Parent::__construct();
        $this->tableName = "commentaires";
    }

    public function get_by_idCommentaire($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM commentaires WHERE idCommentaire=:idCommentaire";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idCommentaire', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }

    public function add_commentaires($typeObjet, $idObjet, $nbLike, $tempsCreation, $contenu, $userId){
        
        try{
            $conn = $this->connect();
            //$test = $conn->prepare('INSERT INTO users (email, username, password, image) VALUES (":email", ":username", ":password", ":image")');
            //$test->execute();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (typeObjet, idObjet, nbLike, tempsCreation, contenu, userId) VALUES (:typeObjet, :idObjet, :nbLike, :tempsCreation, :contenu, :userId)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':typeObjet', $typeObjet);
            $stmt->bindParam(':idObjet', $idObjet);
            $stmt->bindParam(':nbLike', $nbLike);
            $stmt->bindParam(':tempsCreation', $tempsCreation);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            $resp =  true;
        }
        
        catch(PDOException $e)
        {
            $resp =  false;
        }
        $conn = null;
        return $resp;
    }

    public function update_commentaire($contenu, $idCommentaire){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET contenu=:contenu WHERE idCommentaire=:idCommentaire";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':idCommentaire', $idCommentaire);
            $stmt->execute();
            $resp = true;
        }
        
        catch(PDOException $e)
        {
            $resp = false;
        }
        $conn = null;
        return $resp;
    }

    public function update_nbLike($nb, $idCommentaire){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET nbLike = nbLike + $nb WHERE idCommentaire=:idCommentaire";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idCommentaire', $idCommentaire);
            $stmt->execute();
            $resp = true;
        }
        
        catch(PDOException $e)
        {
            $resp = false;
        }
        $conn = null;
        return $resp;
    }
    
    public function delete_commentaire($idCommentaire){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "delete from $tableName where idCommentaire=:idCommentaire";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idCommentaire', $idCommentaire);
            $stmt->execute();
            $resp = true;
        }
        
        catch(PDOException $e)
        {
            $resp = false;
        }
        $conn = null;
        return $resp;
    }
    public function get_all_commentaire_ByIdObjet($idObjet, $typeObjet){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName where idObjet=:idObjet and where typeObjet=:typeObjet";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':idObjet', $idObjet);
            $stmt->bindParam(':typeObjet', $typeObjet);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

}