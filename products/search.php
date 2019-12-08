<?php

require_once("../header.php");



?>


<!-- 
Body Section 
-->
<div class="row">
<?php
require_once("../sidebar.php");

?>
<div class="span9">
<div class="well well-small">

	<?php 
// 	if (isset($_SESSION))
// if ($_SESSION["isUserLogin"]){




if (isset($_GET["q"])){
	if (!empty($_GET["q"]) && strlen($_GET["q"]) > 3)
	{
	$_temp = trim($_GET["q"]);


	include_once("../models/ProductsModel.php");
	$Product_OBJ = new ProductsModel();
	$searchResult = $Product_OBJ->Search($_temp , 10);

	$picFolder = $site_OBJ->siteURL."/public/products/images/";

	if(count($searchResult)==0 || $searchResult == null )
	{
		?>
		<span style="color: RED"><b>OoOpppss!<br>Nothing Found...!</b></span>
		<?php
	}
	else
		foreach ($searchResult as $key => $searchItem) {

		?>

<div class="row-fluid">	  
		<div class="span2">
			<img src="<?php echo $picFolder.$searchItem["mainpic"];?>" alt="">
		</div>
		<div class="span6">
			<h5><?php echo $searchItem["PRODUCT_TITLE"]; ?></h5>
			<p>
			<?php 
			echo substr($searchItem["description"],0,250)." ... [Read More]";
			?>
			</p>
		</div>
		<div class="span4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3>
		<?php
		echo number_format($searchItem["price"]);

	
		?>

		</h3>

			<?php

			echo "<b>".$searchItem["CAT_TITLE"]." / ".$searchItem["SUBCAT_TITLE"]."</b>";
			?>

		<label class="checkbox">
			<input type="checkbox">  Adds product to compair
		</label><br>
		<div class="btn-group">
		  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  <a href="product_details.html" class="shopBtn">VIEW</a>
		 </div>
			</form>
		</div>
	</div>
	<hr class="soften">

<?php


		
	}
}
else
{
	?>
	<span style="color: RED"><b>OoOpppss!<br>EMPTYYYYY NOT ALLOWED...!</b></span>
<?php
}
}
// }
// else
// {
// 	?>

 <!-- <span style="color: RED"><b>LOGIN FIRST....!</b></span> -->
 	<?php
// }
?>


	
	

</div>
</div>
</div>
<!-- 
Clients 
-->


<?php

require_once("../footer.php");

?>