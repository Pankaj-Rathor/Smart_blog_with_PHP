<?php
	include 'connection.php';
	$uid = $_POST['uid'];
	$name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];

	$updateQuery = "UPDATE `user` SET `name`= '$name',`email`='$email',`password`='$password',`gender`='$gender',`about`='$about' WHERE uid='$uid' ";

	$res = mysqli_query($con, $updateQuery);

	if($res){
		echo true;
	}else{
		echo false;
	}
?>