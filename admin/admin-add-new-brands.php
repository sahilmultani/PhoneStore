<?php include('admin-dashboard.php');
// FOR ADD USER IN ADMIN SIDE.
    if ( isset( $_POST['save-user'] ) ) {
    $brands_name = $_POST['brandsname'];
    
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
    
// database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        $sql = "SELECT brands_name AND brands_logos FROM brands WHERE brands_name = '{$brands_name}' AND brands_logos ='{$destination}' ";

        $result = mysqli_query($db_connection, $sql) or die("quey faild");

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("brands name already exists");</script>';
        }else{
                $sql_query = mysqli_query( $db_connection, "INSERT INTO brands( brands_name, brands_logos  ) VALUES ( '$brands_name', '$destination')");
            if ( $sql_query ) {
            header("Location: http://phonestore.local/admin/admin-brand-list.php");
            } else {
            echo '<script>alert("brand add unsuccessful");</script>';
            }
        }
        
    }
    // 

 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Add Brands</h1>
		</div>
		<div class="add-user-form">
			<form action="admin-add-new-brands.php" method="post" name="registration" enctype="multipart/form-data">
				<p>
					<label>Brands Name</label>
					<input type="text" name="brandsname">
				</p>
                <p>
                    <label>Product Image</label>                
                    <input type="file" name="imgfile" id="upload-file" value="Edit" />                  
                </p>
				<p>
					<input type="submit" name="save-user" class="btn" value="Add">
				</p>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
    // Wait for the DOM to be ready
$().ready(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      brandsname: "required",
      
      
    },
    // Specify validation error messages
    messages: {
      brandsname: "Please enter your brand name",
     
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
<!-- <script type="text/javascript">
    function validate() {

        // for the brand name validation. 

        var bname = document.forms["myform"]["brands-name"].value;
        
        if (bname === "") {
            alert("please enter your Brand name");
            return false;   
        }
        
    }


</script> -->