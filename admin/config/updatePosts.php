<?php
	include 'connection.php';

	if(isset($_POST['updatePost']))
	{
		$pid = $_POST['pid'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$image = $_FILES['image'];
		$cid = $_POST['cid'];
	
		$img_found = "false";
	//print_r($image);
	

	if($image['error']==0){
		$fileName = $image['name'];
		$filePath = $image['tmp_name'];


		$extension = explode('.', $fileName);
		//print_r($extension);

		$file_ext = strtolower(end($extension));
		//echo $file_ext;

		$valid_ext = array('png','jpg','jpeg');

		if(in_array($file_ext, $valid_ext)){
			echo "extension valid";
			//$destFile = .$fileName;
			$destFile = '../../image/postImg/'.$fileName;
			//echo $destFile;

			#Move file to dest folder
			move_uploaded_file($filePath, $destFile);
			$img_found = "true";
		}else{
			echo "not valid";
			$img_found = "false";
		}
	}

	if($img_found=="true")
	{
		$updateQuery = "UPDATE `posts` SET `title`= '$title',`content`='$content',`cid`='$cid',`image`='$fileName' WHERE id='$pid' ";
	}else{
		$updateQuery = "UPDATE `posts` SET `title`= '$title',`content`='$content',`cid`='$cid' WHERE id='$pid' ";
	}


	$res = mysqli_query($con, $updateQuery);

	if($res){
		echo true;
	?>
		<script type="text/javascript">
			alert("Post Updated");
		</script>
<?php
	}else{
		echo false;
?>
	<script type="text/javascript">
		alert("Post Not Updated");
	</script>
<?php
	}
	
	header("Location:{$_SERVER['HTTP_REFERER']}");

}

?>