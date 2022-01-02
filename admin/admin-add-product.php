<?php include('admin-dashboard.php');


 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Add Product</h1>
		</div>
		<div class="add-user-form">
			<form action="save-product.php" method="post" enctype="multipart/form-data" name="registration">
				<p>
					<label>Product Name</label>
					<input type="text" name="productname">
				</p>
				<p>
					<label>Product Image</label>				
					<input type="file" name="imgfile" id="upload-file" value="Edit" />					
				</p>
				<p>
					<label>Product desc</label>				
					<input type="text" name="productdesc">					
				</p>
				<p>
					<label>Product prize</label>				
					<input type="number" name="productprize">					
				</p>
				<p>
					<label>Select brand</label>				
					<select name="brand" id="role">
	    				<option >Select brand</option>
	    				<?php
	    				$db_host_name = 'localhost';
						$db_user_name = 'root';
						$db_password = 'root';
						$db_name = 'local';
						$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

						$sql = "SELECT * FROM brands";
    					$result = mysqli_query($db_connection, $sql) or die("query unsuccessfull.");

    					if (mysqli_num_rows($result) > 0) {
    						while ( $row = mysqli_fetch_assoc($result)) {
    							echo "<option value='{$row['id']}'>{$row['brands_name']}</option>";
    						}

    					}
	    				?>
	  				</select>					
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
      productname: "required",
      imgfile: "required",
      productdesc: "required",
      productprize: "required",
      brand: "required",
      
    },
    // Specify validation error messages
    messages: {
      productname: "Please enter your produc tname",
      imgfile: "Please enter any image file",
      productdesc: "Please enter your productdesc",
      productprize: "Please enter your product prize",
       brand: "Please enter your brand",

      
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

		// for the product name validation. 

		var pname = document.forms["myform"]["product-name"].value;
		
		if (pname === "") {
			alert("please enter your product name");
			return false;	
		}
		// for the last name validation. 

		var imagefile = document.forms["myform"]["img-file"].value;
		
		if (imagefile === "") {
			alert("please enter your img file");
			return false;	
		}
		// for the User name validation. 

		var uname = document.forms["myform"]["product-desc"].value;
		
		if (uname === "") {
			alert("please enter your product description");
			return false;	
		}
		
	}


</script>
 -->