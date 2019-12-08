<?php
include_once("../header.php");



?>
<!-- 
Body Section 
-->
	<div class="row">
	<?php
include_once("../sidebar.php");
?>
<div class="span9">
	<!--
New Products
-->
	<div class="well well-small">
	<h3>Our Products </h3>

	<?php


$Products_OBJ = new ProductsModel();
$_cat_id = $_GET["cat"];
$_subcat_id = $_GET["subcat"];

	$productResult = $Products_OBJ->GetProducts($_cat_id,$_subcat_id,5);
	$itemCounter = 0;
	$picFolder = $site_OBJ->siteURL."/public/products/images/";
	?>
	<ul class="thumbnails">
		<?php
	foreach ($productResult as $key => $value) {
		?>
<li class="span4">
			  <div class="thumbnail">
				<a href="product_details.html" class="overlay"></a>
				<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.html"><img src="<?php echo $picFolder.$value["mainpic"];?>" alt=""></a>
				<div class="caption cntr">
					<h5><?php echo $value["PRODUCT_TITLE"];?></h5>
					<p><strong> <?php echo $value["price"];?></strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
		<?php
	}
	?>	
			
		  </ul>
	
	
	</div>
	</div>
<!-- 
Clients 
-->
<?php
include_once("../footer.php");
?>