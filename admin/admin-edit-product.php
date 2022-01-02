<?php include('admin-dashboard.php');


 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Edit product</h1>
		</div>
		<div class="add-user-form">
			<?php 


// database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        $post_id = $_GET['id'];
        $sql = "SELECT * FROM product LEFT JOIN brands ON product.product_brand = brands.id WHERE product.product_id = {$post_id}";
    	$result = mysqli_query($db_connection, $sql) or die("query unsuccessfull.");

    	if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)){


    	
			 ?>
			<form action="product-update.php" method="post" enctype="multipart/form-data" name='registration'>
				<p>
					<label>Product Name</label>
					<input type="hidden" name="id" value="<?php echo $row['product_id']?>"/>
					<input type="text" name="productname" value= "<?php echo $row['product_name'] ?>" required>
				</p>
				<p>
					<label>Product Image</label>				
					<input type="file" name="new-file" id="upload-file">
					<img src="<?php echo $row['product_img'] ?>" height="200px" width="200px">
					<input type="hidden" name="old-image" value="<?php echo $row['product_img'] ?>">					
				</p>
				<p>
					<label>Product desc</label>
					<input type="text" name="productdesc" value= "<?php echo $row['description'] ?>" required>
				</p>
				<p>
					<label>Product prize</label>				
					<input type="number" name="productprize" value= "<?php echo $row['product_prize'] ?>">					
				</p>
				<p>
					<label>Select brand</label>				
					<select name="brand" id="role">
	    				<option >Select brand</option>
	    				<?php

						$sql1 = "SELECT * FROM brands";
    					$result1 = mysqli_query($db_connection, $sql1) or die("query unsuccessfull.");

    					if (mysqli_num_rows($result1) > 0) {
    						while ( $row1 = mysqli_fetch_assoc($result1)) {
    							if ($row['product_brand'] == $row1['id']) {
    								$selected = "selected";
    							}else{
    								$selected = "";
    							}
    							echo "<option value='{$row1['id']}' {$selected}>{$row1['brands_name']}</option>";
    						}

    					}
	    				?>
	  				</select>					
				</p>
				<p>
					<input type="submit" name="save-user" class="btn" value="Add">
				</p>
			</form>
			<?php 
					}
				}
			?>
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
    
      productdesc: "required",
      productprize: "required",
    
      
    },
    // Specify validation error messages
    messages: {
      productname: "Please enter your product name",
    
      productdesc: "Please enter your productdesc",
      productprize: "Please enter your product prize",
       

      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>