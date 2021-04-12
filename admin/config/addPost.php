<?php
	include 'connection.php';
	session_start();

	if(isset($_POST['addPost']))
	{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$image = $_FILES['image'];
		$cid = $_POST['cid'];
		$adminId = $_SESSION['adminId'];
	
	//print_r($image);
	$fileName = $image['name'];
	$filePath = $image['tmp_name'];



	if($image['error']==0){

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
		}else{
			//header("Location:{$_SERVER['HTTP_REFERER']}");
			echo "not valid";
			exit;
		}

	}

	
    $insertQuery = "INSERT INTO `posts` (`id`, `title`, `content`, `image`, `cid`, `userId`, `pDate`) VALUES (NULL, '$title', '$content', '$fileName', '$adminId', '23', current_timestamp())";

    //Execute Query
    $res = mysqli_query($con, $insertQuery);
    
	if($res){
		echo "true";
	}else{
		echo "error";
	}
	header("Location:{$_SERVER['HTTP_REFERER']}");
}
?>