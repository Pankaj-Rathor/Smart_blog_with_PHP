<?php
	session_start();
    $_SESSION['start'] = "on";

	$_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['about'] = $_POST['about'];

    $otp = rand(1000,9999);
    $_SESSION['otp']=$otp;
    
    $to = $_SESSION['email'];
    $subject = "Verify Your Email.";
    $msg = "Verify with OTP : $otp";
    $from = "From:pankajrathore9424@gmail.com";

    if(mail($to,$subject,$msg,$from)){
    	echo true ;
    }else{
    	echo false ;
    }
?>