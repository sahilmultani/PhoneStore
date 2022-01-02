<?php include('admin-dashboard.php');



 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Edit brands</h1>
		</div>
		<div class="add-user-form">
			<?php 


// database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        $brands_id = $_GET['id'];
    	$sql = "SELECT * FROM brands WHERE id = {$brands_id}";
    	$result = mysqli_query($db_connection, $sql) or die("query unsuccessfull.");

    	if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)){

			 ?>
			<form action="brands-update.php" method="post" enctype="multipart/form-data" name='registration'>
				<p>
					<label>First Name</label>
					<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
					<input type="text" name="brandsname" value="<?php echo $row['brands_name']?>" required>
				</p>
        <p>
          <label>Brand logo</label>        
          <input type="file" name="new-file" id="upload-file">
          <img src="<?php echo $row['brands_logos'] ?>" height="200px" width="200px">
          <input type="hidden" name="old-image" value="<?php echo $row['brands_logos'] ?>">          
        </p>
				<p>
					<input type="submit" name="submit" class="btn" value="Update">
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