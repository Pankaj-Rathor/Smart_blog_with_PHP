<?php
session_start();
include 'connection.php';

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $gender = $_SESSION['gender'];
    $about = $_SESSION['about'];
    $authcode = $_POST['authcode'];

    if($_SESSION['otp']==$authcode){

    //Encrypt password
    $enc_pass = password_hash($password, PASSWORD_BCRYPT);
    if($about==""){
        $insertQuery = "INSERT INTO `user` (`name`, `email`, `password`, `gender`) VALUES ('$name', '$email', '$enc_pass', '$gender')"; 
    }
    else{
         $insertQuery = "INSERT INTO `user` (`name`, `email`, `password`, `gender`, `about`) VALUES ('$name', '$email', '$enc_pass', '$gender', '$about')";
    }
   
    //Execute Query
    $res = mysqli_query($con, $insertQuery);

    if ($res) {
        echo true;
    } else {
        echo false;
    }
    }else{
        echo false;
    }

    ?>
