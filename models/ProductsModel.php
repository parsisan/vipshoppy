<?php

require_once("DB.php");

class ProductsModel{

    private $db_conn;

 

    

    function __construct(){

        $db_OBJ = new DB();

        $this->db_conn = $db_OBJ->conn;


    }


    public function Search($_search,$count)
    {
        $var = $this->db_conn->query("SELECT
tbl_product_categories.title AS 'CAT_TITLE',
tbl_product_subcategories.title AS 'SUBCAT_TITLE',
tbl_products.title AS 'PRODUCT_TITLE',
tbl_products.price,
tbl_products.qntty,
tbl_products.description,
tbl_products.mainpic
FROM
tbl_product_categories
RIGHT JOIN tbl_product_subcategories ON tbl_product_categories.id = tbl_product_subcategories.cat_id
RIGHT JOIN tbl_products ON tbl_product_subcategories.id = tbl_products.subcat_id

WHERE (tbl_products.title LIKE '%$_search%'
OR
tbl_products.description LIKE '%$_search%'
OR
tbl_product_categories.title LIKE '%$_search%'
OR
tbl_product_subcategories.title LIKE '%$_search%')
AND
(
    (tbl_products.status > 0 AND tbl_products.status IS NOT NULL )
    AND
    (tbl_product_categories.status > 0 AND tbl_product_categories.status IS NOT NULL)
    AND
    (tbl_product_subcategories.status > 0 AND tbl_product_subcategories.status IS NOT NULL)

)

LIMIT $count
        ");

        $result = $var->fetchAll();
        return $result;
        
    }

    public function GetCategories($count)
    {
        $var = $this->db_conn->query("
        SELECT
tbl_product_categories.title AS 'CAT_TITLE',
tbl_product_categories.id AS 'CAT_ID'
FROM
tbl_product_categories
WHERE (tbl_product_categories.status > 0 AND tbl_product_categories.status IS NOT NULL)
LIMIT $count
        ");

        $result = $var->fetchAll();
        return $result;
        
    }

    public function GetSubCategories($cat_id,$count)
    {
        $var = $this->db_conn->query("
        SELECT
tbl_product_subcategories.title AS 'SUBCAT_TITLE',
tbl_product_subcategories.id AS 'SUBCAT_ID'
FROM
tbl_product_subcategories
WHERE (tbl_product_subcategories.status > 0 AND tbl_product_subcategories.status IS NOT NULL)
AND
tbl_product_subcategories.cat_id = $cat_id
LIMIT $count
        ");

        $result = $var->fetchAll();
        return $result;
        
    }


    
    public function GetProducts($cat_id,$subcat_id,$count)
    {
        $_WHERE_SUBCAT = "";
        if ($subcat_id != 0)
        {
            $_WHERE_SUBCAT = "AND
            tbl_product_subcategories.id = $subcat_id";
        }


        $var = $this->db_conn->query("
        SELECT
tbl_product_categories.title AS 'CAT_TITLE',
tbl_product_subcategories.title AS 'SUBCAT_TITLE',
tbl_products.title AS 'PRODUCT_TITLE',
tbl_products.price,
tbl_products.mainpic,
tbl_products.id
FROM
tbl_products
INNER JOIN tbl_product_subcategories ON tbl_product_subcategories.id = tbl_products.subcat_id
INNER JOIN tbl_product_categories ON tbl_product_categories.id = tbl_product_subcategories.cat_id
WHERE 
tbl_product_categories.id = $cat_id
$_WHERE_SUBCAT
LIMIT $count
        ");

        $result = $var->fetchAll();
        return $result;
        
    }

    public function GetProductsSlider($sliderID)
    {

        $var = $this->db_conn->query("
        SELECT
        tbl_product_sliders.sliderTitle, 
        tbl_product_slider_slides.picURL, 
        tbl_product_slider_slides.title, 
        tbl_product_slider_slides.description, 
        tbl_product_slider_slides.placement
    FROM
        tbl_product_sliders
        INNER JOIN
        tbl_product_slider_slides
        ON 
            tbl_product_sliders.id = tbl_product_slider_slides.slider_ID
            WHERE tbl_product_sliders.`status` > 0 AND tbl_product_sliders.`status` IS NOT NULL
            AND tbl_product_sliders.id = $sliderID
            ORDER BY tbl_product_slider_slides.placement
            ");

        $result = $var->fetchAll();
        return $result;
        
    }




}






?>



