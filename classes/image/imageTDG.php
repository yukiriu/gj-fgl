<?php

include_once __DIR__ . "/../../utils/connector.php";

class imagesTDG extends DBAO{

    private $tableName;
    
    public function __construct(){
        Parent::__construct();
        $this->tableName = "images";
    }

    public function get_by_userId($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM images WHERE userId=:userid";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userid', $id);
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


    public function get_by_imagesId($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM images WHERE imagesId=:imagesId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':imagesId', $id);
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

    public function add_images($URL, $description, $nbView, $nbLike, $tempsCreation, $userId, $albumID){
        
        try{
            $conn = $this->connect();
            //$test = $conn->prepare('INSERT INTO users (email, username, password, image) VALUES (":email", ":username", ":password", ":image")');
            //$test->execute();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (URL, description, nbView, nbLike, tempsCreation, userId, albumID) VALUES (:URL, :description, :nbView, :nbLike, :tempsCreation, :userId, :albumID)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':URL', $URL);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':nbView', $nbView);
            $stmt->bindParam(':nbLike', $nbLike);
            $stmt->bindParam(':tempsCreation', $tempsCreation);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':albumID', $albumID);
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

    public function update_description($description, $imagesId){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET description=:description WHERE imagesId=:imagesId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':imagesId', $imagesId);
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

    public function update_nbLike($nb, $imageId){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET nbLike = nbLike + $nb WHERE imageId=:imageId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':imageId', $imageId);
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
    
    public function delete_images($imageId){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "delete from $tableName where imageId=:imageId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':imageId', $imageId);
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

}