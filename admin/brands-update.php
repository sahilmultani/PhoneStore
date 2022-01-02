<?php
 	$id = $_POST['id'];
 	$brands_name = $_POST['brandsname'];

 	 if (empty($_FILES['new-file']['name'])) {
        	
        	$destination = $_POST['old-image'];
        	
        }else{

		        	$errors = array();
					$file_name = $_FILES['new-file']['name'];
					$file_size = $_FILES['new-file']['size'];
					$file_tmp = $_FILES['new-file']['tmp_name'];
					$file_type = $_FILES['new-file']['type'];		
					$file_ext = end(explode('.', $file_name));
					$extensions = array("jpeg", "jpg", "png", "PNG");

					if (in_array($file_ext, $extensions) === false) {
						
						$errors = "This extension file not allowed, please choose a JPG or PNG file.";
					}
						if (empty($errors) == true) {
							
							$destination = "upload/".$file_name;
							move_uploaded_file($file_tmp,$destination);

						}else{
							print_r($errors);
						}
					
				}
   

     $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        $sql_query = "UPDATE brands SET brands_name = '{$brands_name}', brands_logos = '{$destination}' WHERE id = {$id} ";
        $result = mysqli_query($db_connection, $sql_query) or die("query unsuccessfull.");

        header("Location: http://phonestore.local/admin/admin-brand-list.php");
        mysqli_close($db_connection);

?>