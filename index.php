<?php
session_start();
	$_SESSION['author'] = "PANKAJ RATHOR";
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<?php include 'links.php';?>
	<script type="text/javascript" src="js/login.js"></script>
	<style type="text/css">
		#form{
			background: #01579b;
			width: 68%; 
			margin-left: 15%;
			margin-top: 80px;
			height: 300px;
			/*height: 539px;*/
			/*padding: 15px 0px;*/
			overflow: auto;
			color: white;
		}
	</style>
</head>
<body>
	<!-- header -->
	<?php include 'header.php'; ?>
	<!-- end header -->

	<!-- login form -->
	<main id="form">
		<div class="center" style="border-right: 5px solid #90caf9; width: auto; height: 200px; padding-left:15px; ">
			<button class="btn btn-lg btn-d" onclick="location.replace('register.php')">Register</button>
			<button class="btn btn-lg btn-g">Login</button>
		</div>

		<div style="margin-left: 10px;">
			<form action="" method="post">
				<label for="email">Email</label><i id="emailReq">*</i>
				<input type="email" name="email" id="email" placeholder="Enter Email" autocomplete="on">
				<label for="password">Password</label><i id="passwordReq">*</i>
				<input type="password" name="password" id="password" placeholder="Enter password">
				<!-- <input type="checkbox" name="remember" id="remember" value="remember"><span>Remember Me</span> -->
				<div class="center">
					<div id="loader" style="display: none; margin-top: 5px; left: 36%; top: 68%">
						<img src="img/loader.gif" style="width: 55px; height: 55px">
					</div>	
					<p class="msg" id= "msg" style="display: none; left: 39%; width: 40%;"></p>
				</div>
				
				<div id="btn">
					<input type="submit" name="submit" id="submitbtn" value="Login">
				</div>
			</form>
		</div>
	</main>
	<div style="height: 136px;"></div>>
	<!-- footer -->
	<?php include 'footer.php';?>
</body>
</html>
