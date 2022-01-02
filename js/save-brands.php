<?php

$db_host_name = 'localhost';
$db_user_name = 'root';
$db_password = 'root';
$db_name = 'local';
$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

if (isset($_FILES['imgfile'])) {
	$errors = array();
	$file_name = $_FILES['imgfile']['name'];
	$file_size = $_FILES['imgfile']['size'];
	$file_tmp = $_FILES['imgfile']['tmp_name'];
	$file_type = $_FILES['imgfile']['type'];		

	$file_ext = end(explode('.', $file_name));
	$extensions = array("jpeg", "jpg", "png", "PNG");

	if (in_array($file_ext, $extensions) === false) {
		
		$errors[] = "This extension file not allowed, please choose a JPG and PNG file.";
	}
		if (empty($errors) == true) {
			
			$destination = "upload/".$file_name;
			move_uploaded_file($file_tmp,$destination);

		}else{
			print_r($errors);
		}
	
}


$brands_name = mysqli_real_escape_string($db_connection, $_POST['brandsname']);


$sql = "INSERT INTO brands(brands_name, brands_logos) VALUES('{$brands_name}','{$destination}');";

if(mysqli_multi_query($db_connection, $sql)) {
	header("location: http://phonestore.local/admin/admin-brand-list.php");
}else{
	echo "<div>Query Failed.</div>";
}

?>