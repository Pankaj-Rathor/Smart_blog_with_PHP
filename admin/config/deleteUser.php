<?php
	include 'connection.php';
	$uid = $_GET['uid'];
	$deleteQuery = "delete from user where uid=$uid ";

	//Execute Query
	$query = mysqli_query($con, $deleteQuery);

	if($query){
		function goback()
		{
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}
		goback();
	}else{
?>
	<script type="text/javascript">
		alert("Not Deleted");
	</script>
<?php
		header('Location : ../adminPanel.php');
}
?>