<?php
	require 'config/connection.php';

	session_start();

	if(!isset($_SESSION['admin']))
	{
		header('Location: adminLogin.php');
	}
	session_unset();

	if(session_destroy()){
		function goback()
		{
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}
		goback();
	}
?>