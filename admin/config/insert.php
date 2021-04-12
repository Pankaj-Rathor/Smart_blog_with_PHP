<?php
    include 'connection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];

    $insertQuery = "INSERT INTO `admin` (`aName`, `aEmail`, `aPassword`, `gender`, `about`) VALUES ('$name', '$email', '$password', '$gender', '$about')";

    //Execute Query
    $res = mysqli_query($con, $insertQuery);

    if ($res) {
        echo true;
    } else {
        echo false;
    }
    