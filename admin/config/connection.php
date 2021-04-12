<?php
	$server = 'localhost';
	$uName = "root";
	$uPass = "";
	$db = 'blog';

	$con = mysqli_connect($server,$uName,$uPass,$db);

	if($con){
	}
	else{
		die("Connection Faild".mysqli_connect_error());
	}

?>