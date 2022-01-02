<?php 

$db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

        $id = $_POST['id'];
		$product_name = $_POST['productname'];
		$product_desc = $_POST['productdesc'];
		$product_brand = $_POST['brand'];
		$product_prize = $_POST['productprize'];

        if (empty($_FILES['new-file']['name'])) {
        	
        	$destination = $_POST['old-image'];
        	
        }else{

		        	$errors = array();
					$file_name = $_FILES['new-file']['name'];
					$file_size = $_FILES['new-file']['size'];
					$file_tmp = $_FILES['new-file']['tmp_name'];
					$file_type = $_FILES['new-file']['type'];		
					$file_ext = explode('.', $file_name);
					$file_ext_check = strtolower(end($file_ext));
					$extensions = array("jpeg", "jpg", "png",);

					if (in_array($file_ext_check, $extensions) === false) {
						
						$errors = "<script> alert('This extension file not allowed, please choose a JPG or PNG file.');</script>";
					}
						if (empty($errors) == true) {
							
							$destination = "upload/".$file_name;
							move_uploaded_file($file_tmp,$destination);

						}else{
							print_r($errors);
						}
					
				}


	 $sql_query = "UPDATE product SET product_name = '{$product_name}', product_img = '{$destination}', description = '{$product_desc}', product_brand = '{$product_brand}', product_prize = {$product_prize} WHERE product_id = {$id} ";

        $result = mysqli_query($db_connection, $sql_query) or die("query unsuccessfull.");

        header("Location: http://phonestore.local/admin/admin-product-list.php");
        mysqli_close($db_connection);
        	

?>

