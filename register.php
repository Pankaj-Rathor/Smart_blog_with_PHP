<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<?php include 'links.php';?>
	<style type="text/css">
		#form{
			background: #455a64;
			width: 70%; 
			margin-left: 15%;
			color: white;
		}
	</style>
	<script type="text/javascript" src="js/register.js"></script>
	
	<body>
		<?php include 'header.php';?>

		<div id="userbtn">
			<button class="btn btn-lg btn-g">Register Here</button>
		</div>
		<main id="form">

			<form action="" method="post">
				<label for="name">Enter name</label><i id="nameReq">*</i>
				<input type="text" name="name" id="name" placeholder="Enter Name" maxlength="20" autocomplete="on" autofocus>
				<label for="email">Enter Email</label><i id="emailReq">*</i>
				<input type="email" name="email" id="email" placeholder="Enter Email" autocomplete="on">
				<label for="age">Age</label>
				<input type="number" name="age" id="age" min="18" max="100" placeholder="Enter Age" autocomplete="off">
				<label for="phone">Phone Number</label><i id="phoneReq">*</i>
				<input type="text" name="phone" id="phone" maxlength="13" placeholder="Enter Phone Number">
				<label for="gender" style="margin-right: 10px;">Gender</label>
				<div id="gen" style="margin:5px 0 5px 50px;">
					<label for="male">Male</label>
					<input type="radio" id="male" name="gender" value="male">
					<label for="female">Female</label>
					<input type="radio" id="female" name="gender" value="female">
				</div>
				<label for="password">Enter password</label><i id="passwordReq">*</i>
				<input type="password" name="password" id="password" placeholder="Enter password" autocomplete="on">
				<input type="checkbox" name="agree" id="agree" value="iAgree"><span title="agree">Agree Terms and Conditions</span>
				<div class="center">
					<div id="loader" style="display: none; margin-top: 5px; left: 35%;">
						<img src="img/loader.gif" style="width: 55px; height: 55px">
					</div>	
					<p class="msg" id= "msg" style="display: none; left: 35%;">Register successfully</p>
				</div>
				
				<div id="actionbtn">
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="submit" id="submitbtn" value="submit" disabled> 
				</div>
			</form>
		</main>

		<?php include 'footer.php';?>
	</body>
	</html>