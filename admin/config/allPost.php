<?php
require 'connection.php';
	$selectQuery = "SELECT * FROM `posts` ";

    //Execute Query
    $query = mysqli_query($con, $selectQuery);

?>