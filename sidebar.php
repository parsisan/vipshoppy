<?php


include_once(__DIR__."/models/ProductsModel.php");
$Category_OBJ = new ProductsModel();

$siteURL = $site_OBJ->siteURL;

?>

<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
	<?php
	$catResult = $Category_OBJ->GetCategories(10);
	foreach ($catResult as $key => $cat_value) {
		?>
<li><a href=<?php echo $siteURL."/products/category.php?cat=".$cat_value["CAT_ID"]."&subcat=0"; ?> ><span class="icon-chevron-right"></span><?php echo $cat_value["CAT_TITLE"]; ?></a>

<ul style="margin-left: 30px;">
<?php
		$subcatResult = $Category_OBJ->GetSubCategories($cat_value["CAT_ID"],5);
		foreach ($subcatResult as $key => $sub_value) {
			?>
	<li>
	<a href=<?php echo $siteURL."/products/category.php?cat=".$cat_value["CAT_ID"]."&subcat=".$sub_value["SUBCAT_ID"]; ?> >
		<?php echo $sub_value["SUBCAT_TITLE"]; ?>
		</a>
	</li>
		
			<?php
		}
?>

</ul>

</li>
		<?php
	}
	?>
		<!-- <li style="border:0"> &nbsp;</li>
		<li> <a class="totalInCart" href="cart.html"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li> -->
	</ul>
</div>

			  <div class="well well-small alert alert-warning cntr">
				  <h2>50% Discount</h2>
				  <p> 
					 only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
				  </p>
			  </div>
			  <div class="well well-small" ><a href="#"><img src="<?php echo $siteURL;?>/assets/img/paypal.jpg" alt="payment method paypal"></a></div>
			
			<a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
			<br>
			<br>
			<ul class="nav nav-list promowrapper">
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="<?php echo $siteURL;?>/assets/img/bootstrap-ecommerce-templates.png" alt="bootstrap ecommerce templates">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="<?php echo $siteURL;?>/assets/img/shopping-cart-template.png" alt="shopping cart template">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="<?php echo $siteURL;?>/assets/img/bootstrap-template.png" alt="bootstrap template">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>

	</div>