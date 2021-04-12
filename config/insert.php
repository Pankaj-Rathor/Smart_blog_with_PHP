<?php
include 'connection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];

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
    