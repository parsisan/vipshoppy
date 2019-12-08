<?php

require_once("DB.php");

class UsersModel{

    private $db_conn;


    function __construct(){

        $db_OBJ = new DB();

        $this->db_conn = $db_OBJ->conn;


    }


    public function UserLogin($username, $password)
    {
        $var = $this->db_conn->query("SELECT * FROM tbl_users WHERE tbl_users.username = '$username' AND tbl_users.password = '$password' AND tbl_users.status = 1");
        $result = $var->fetch();
        return $result;

    }

    public function UserRegister($username, $password)
    {
        try{
        $result = $this->db_conn->query("INSERT INTO tbl_users (tbl_users.username,tbl_users.password,tbl_users.status) VALUES ('$username','$password',1)");
        
        return $result;
        }
        catch(PDOException $e)
        {
            return false;
        }

    }

    


   



}


?>



