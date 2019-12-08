<?php

require_once("DB.php");

class SiteModel{

    private $db_conn;

    public $siteTitle;
    public $siteURL;
    Public $Logo;
    Public $status;

    

    function __construct(){

        $db_OBJ = new DB();

        $this->db_conn = $db_OBJ->conn;


    }


    public function getSiteInfo()
    {
        $var = $this->db_conn->query("SELECT * FROM tbl_System");
        $result = $var->fetch();
        
         $this->siteTitle = $result["siteTitle"];
         $this->siteURL = $result["siteUrl"];
         $this->Logo = $result["logo"];
         $this->status = $result["status"];



    }

    


    public function setSiteInfo()
    {



    }


    public function getSiteMenus()
    {
        $var = $this->db_conn->query("SELECT * FROM tbl_System_Menus WHERE status = 1");
        $result = $var->fetchAll();
        
       return $result;



    }





}


?>



