<?php

require_once("models/SiteModel.php");
require_once("models/UsersModel.php");
$site_OBJ = new SiteModel();
$site_OBJ->getSiteInfo();


if(!isset($_SESSION))
{
session_start();

}

if(isset($_POST["loginBtn"]))
{
	if (isset($_POST["inputEmail"])  && !empty($_POST["inputEmail"]))
	{
		if (isset($_POST["inputPassword"]) && !empty($_POST["inputPassword"]))
		{
			$_username = trim($_POST["inputEmail"]);
			$_password = md5($_POST["inputPassword"]);


		
			$Users_OBJ = new UsersModel();
			$loginResult = $Users_OBJ->UserLogin($_username,$_password);
			
			if ($loginResult != null )
			{
				// LOGIN IS CURRECT

			// $_SESSION["User"] = $loginResult;
			// header ("location: ./_login.php");

			$_SESSION["isUserLogin"] = true;
			$_SESSION["Username"] = $loginResult["username"];
		
			}else{
				$_SESSION["LoginError"] = "Username or Password is Not Correct!";
				ob_start();
				header ("Location: ./login.php");
				ob_end_flush();
				die();
			}

		}
	}
}
else if(isset($_POST["logoutBtn"]))
{
	$_SESSION["isUserLogin"] = false;
	$current_url = $_SERVER['REQUEST_URI'];

	ob_start();
	header("location: $current_url");
    ob_end_flush();
    die();



}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $site_OBJ->siteTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="<?php echo $site_OBJ->siteURL; ?>/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="<?php echo $site_OBJ->siteURL; ?>/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="<?php echo $site_OBJ->siteURL; ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo $site_OBJ->siteURL; ?>/assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="index.html"> <span class="icon-home"></span> Home</a> 
				<?php  
				if(isset($_SESSION["isUserLogin"]) && $_SESSION["isUserLogin"])	
				{ ?>
				<a href="#"><span class="icon-user"></span> My Account</a> 
				<?php }
				else {
				 ?>
				<a href="register.php"><span class="icon-edit"></span> Free Register </a> 
				<?php } ?>
				<a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="<?php echo $site_OBJ->siteURL; ?>"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="<?php echo $site_OBJ->siteURL."/assets/images/".$site_OBJ->Logo; ?>" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	Twitter Bootstrap shopping cart HTML template is available @ $14
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  0800 1234 678 </strong><br><br></p>
	<span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span>
	<span class="btn btn-warning btn-mini">$</span>
	<span class="btn btn-mini">&pound;</span>
	<span class="btn btn-mini">&euro;</span>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
				<?php 

					$siteMenus = $site_OBJ->getSiteMenus();
					$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					foreach ($siteMenus as $key => $value) {
						
						if ($site_OBJ->siteURL."/".$value["url"] == $current_link)
						{
							?>
 <li class="active"><a href="<?php echo $site_OBJ->siteURL."/".$value["url"]; ?>"><?php echo $value["title"]; ?></a></li>
							<?php

						}
						else
						{
						?>

					<li class=""><a href="<?php echo $site_OBJ->siteURL."/".$value["url"]; ?>"><?php echo $value["title"]; ?></a></li>

						<?php

					}
				}
				
				?>


			  <!-- <li class=""><a href="grid-view.html">Grid View</a></li>
			  <li class=""><a href="three-col.html">Three Column</a></li>
			  <li class=""><a href="four-col.html">Four Column</a></li>
			  <li class=""><a href="general.html">General Content</a></li> -->
			</ul>
			
			<?php 
			if (!isset($_SESSION["isUserLogin"]))
			{ ?>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm" action="" method="POST">
				  <div class="control-group">
					<input type="text" class="span2" name="inputEmail" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" name="inputPassword" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" name="loginBtn" id="loginBtn" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
			<?php }
			else 
			{
				?>
				<ul class="nav pull-right">
					<li>
					
				<form class="form-horizontal loginFrm" style="margin-top: 4px; margin-bottom: 4px;" action="" method="POST">
				<button type="submit" name="logoutBtn" id="logoutBtn" class="shopBtn btn-block" style="margin-top: 5pxl;">Logout</button>
			
			</form>	
			</li>
				</ul>
				<?php
			}
			?>

<form action="<?php echo $site_OBJ->siteURL; ?>/products/search.php" method="GET" class="navbar-search pull-right">
			  <input type="text" placeholder="Search" class="search-query span2" style="margin-right: 5px;" name="q" id="q">
			</form>
		  </div>
		</div>
	  </div>
	</div>