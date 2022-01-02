<?php  

if ($_FILES['img-file']['name']!= '') {
	$filename = $_FILES['img-file']['name'];
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	$valid_extension = array("jpeg","png","jpg");
	if(in_array($extension, $valid_extension)) {
		$new_name = rand() . "." . $extension;
		$path = "./img/" . $new_name;

		if (move_uploaded_file($_FILES['img-file']['tmp_name'], $path)) {
			echo '<img src="'.$path.'"/><br><br>
			<button data-path="'.$path.'" class="delete_btn btn">Delete</button>';
		}
	}else {
		echo "<script>alert('Invaild file format.')</script>";
	}
}else {
	echo "<script>alert('please Select a Image')</script>";
}

?>