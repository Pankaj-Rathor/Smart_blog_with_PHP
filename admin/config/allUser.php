<?php
include 'connection.php';
	$selectQuery = "SELECT * FROM `user` ";

    //Execute Query
    $query = mysqli_query($con, $selectQuery);

?>