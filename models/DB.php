<?php

class DB{

    
private $servername = "localhost";
private $username = "root";
private $password = "";
private $database = "shoppy_db";
public $conn;

    function __construct()
    {

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
         
            return true;
    
            }
        catch(PDOException $e)
            {
                die("Connection failed: " . $e->getMessage());
                
            }
        
    }



}

?>