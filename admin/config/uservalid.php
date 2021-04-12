<?php
include 'connection.php';
    session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$selectQuery = "SELECT * FROM `admin` WHERE aEmail='$email' AND aPassword='$password' ";

    //Execute Query
    $res = mysqli_query($con, $selectQuery);

    while($d = mysqli_fetch_array($res)){
        $_SESSION['admin'] = $d['aName'];
        $_SESSION['adminId'] = $d['aid'];
    }
    if ($res) {
        echo true;
    } else {
        echo false;
    }
?>