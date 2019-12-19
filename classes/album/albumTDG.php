<?php

include_once __DIR__ . "/../../utils/connector.php";

class AlbumTDG extends DBAO{

    private $tableName;
    
    public function __construct(){
        Parent::__construct();
        $this->tableName = "albums";
    }


    public function get_by_id($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM albums WHERE albumID=:albumID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':albumID', $id);
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


    public function get_by_creator($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM albums WHERE userID=:creator";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':creator', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchALL();
        }
        
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }

    public function get_all_albums(){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $result;
    }

    public function add_album($creatorID,$title, $time, $description){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (userID, title, time, description) VALUES (:creatorID, :title, :time, :description)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':creatorID', $creatorID);
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

    public function update_title($title, $id){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET title=:title WHERE albumID=:albumID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':albumID', $id);
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

    public function update_description($description, $id){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET description=:description WHERE albumID=:albumID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':albumID', $id);
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
    public function delete_album($id){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query1 = "DELETE from images WHERE albumID =:albumID";
            $query2 = "DELETE from $tableName  WHERE albumID=:albumID";
            $stmt = $conn->prepare($query1);
            $stmt = $conn->prepare($query2);
            $stmt->bindParam(':albumID', $id);
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