<?php
	session_start();

	if(!isset($_SESSION['userName'])){
		header('location:login.php');
		exit;
	}
	session_unset();	
	
	// header('location : login.php');
	if(session_destroy()){
		function goback()
		{
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}
		goback();
	}

?>