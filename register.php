<?php 
require_once("./header.php");


if(isset($_POST["RegisterBtn"]))
{
	if (isset($_POST["inputEmail"])  && !empty($_POST["inputEmail"]))
	{
		if (isset($_POST["inputPassword"]) && !empty($_POST["inputPassword"]))
		{
			$_username = trim($_POST["inputEmail"]);
			$_password = md5($_POST["inputPassword"]);


		
			$Users_OBJ = new UsersModel();
			$RegisterResult = $Users_OBJ->UserRegister($_username,$_password);
			if ($RegisterResult)
			{
				ob_start();
				header ("Location: ./login.php");
				ob_end_flush();
				die();
			}
			else
			{
				$_SESSION["RegisterError"] = "Username is already exist!";

			}


		}
	}
}



?>
<!-- 
Body Section 
-->
	<div class="row">


<!-- 
	SideBar
 -->

<?php 

include_once("./sidebar.php");

?>


	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" action="" method="POST">
		<h3>Your Personal Details</h3>

		<?php
		if (isset($_SESSION["RegisterError"]))
		{
			echo "<span style='color: red;'><b>".$_SESSION["RegisterError"]."</b></span>";
			unset($_SESSION["RegisterError"]);
		}

		?>

		<!-- <div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="days">
			<option value="">-</option>
			<option value="1">Mr.</option>
			<option value="2">Mrs</option>
			<option value="3">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname" placeholder="First Name">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLname" placeholder="Last Name">
			</div>
		 </div> -->
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="inputEmail" id="inputEmail" placeholder="Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password"name="inputPassword" id="inputPassword"  placeholder="Password">
		</div>
	  </div>
		<!-- <div class="control-group">
		<label class="control-label">Date of Birth <sup>*</sup></label>
		<div class="controls">
		  <select class="span1" name="days">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
			<select class="span1" name="days">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
			<select class="span1" name="days">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
		</div>
	  </div> -->
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="RegisterBtn" id="RegisterBtn" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>

<div class="well">
	<form class="form-horizontal" >
		<h3>Your Billing Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <textarea></textarea>
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="shopBtn exclusive">
		</div>
	</div>
	</form>
</div>


<div class="well">
	<form class="form-horizontal" >
		<h3>Your Account Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>


</div>
</div>
<!-- 
Clients 
-->

<!-- 
	Footer
 -->


 <?php

require_once("./footer.php");
 ?>