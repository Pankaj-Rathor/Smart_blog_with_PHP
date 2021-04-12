<?php
require 'connection.php';
	$selectQuery = "SELECT * FROM `categories` ";

    //Execute Query
    $query = mysqli_query($con, $selectQuery);

?>