<?php
include 'connection.php';
    session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];

    
	$selectQuery = "SELECT * FROM `user` WHERE email='$email' ";
    
    $query = mysqli_query($con, $selectQuery);
   
    while($d = mysqli_fetch_array($query)){
        $db_pass = $d['password'];
        $_SESSION['userName'] = $d['name'];
    }
       
    $check = password_verify($password, $db_pass); 
    if ($query && $check) {
        echo true;
    } else {
        echo false;
    }
?>