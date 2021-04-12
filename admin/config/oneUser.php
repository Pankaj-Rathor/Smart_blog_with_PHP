<?php
include 'connection.php';
	$selectQuery = "SELECT `uid` FROM `user` where '$uid' ";

    //Execute Query
    $query = mysqli_query($con, $selectQuery);

?>