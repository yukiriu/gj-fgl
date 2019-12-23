<?php

include_once __DIR__ . "/../../utils/connector.php";

class UserTDG extends DBAO{

    private $tableName;
    
    public function __construct(){
        Parent::__construct();
        $this->tableName = "users";
    }


    public function createTable(){
        
        try{
            $conn = $this->connect();
            $query = "CREATE TABLE IF NOT EXISTS users (id INTEGER(10) AUTO INCREMENT PRIMARY KEY,
            email VARCHAR(25) UNIQUE NOT NULL,
            username VARCHAR(25) NOT NULL,
            password VARCHAR(250) NOT NULL)";
            $stmt = $conn->prepare($query);
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


    //drop table
    public function drop_table(){
        
        try{
            $conn = $this->connect();
            $query = "DROP TABLE users";
            $stmt = $conn->prepare($query);
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


    public function get_by_id($id){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM users WHERE userId=:userid";
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


    public function get_by_email($email){
        
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM users WHERE email=:email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
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


    public function get_by_username($username){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE username=:username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
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


    public function get_all_users(){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT userId, email, username FROM $tableName";
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

    public function get_all_users_by_username($username){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName where username like :username";
            $stmt = $conn->prepare($query);
            $username = "%" . $username. "%";
            $stmt->bindParam(':username', $username);
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
    
    public function add_user($email, $username, $password, $image){
        
        try{
            $conn = $this->connect();
            //$test = $conn->prepare('INSERT INTO users (email, username, password, image) VALUES (":email", ":username", ":password", ":image")');
            //$test->execute();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (email, username, password, image) VALUES (:email, :username, :password, :image)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':image', $image);
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

    public function update_info($email, $username, $id){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET email=:email, username=:username WHERE userid=:userid";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':userid', $id);
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
    public function update_image($id, $image){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET image=:image WHERE userid=:userid";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userid', $id);
            $stmt->bindParam(':image', $image);
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
    
    public function update_password($NHP, $id){
        
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET password=:password WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':password', $NHP);
            $stmt->bindParam(':id', $id);
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