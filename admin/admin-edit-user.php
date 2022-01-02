<?php include('admin-dashboard.php');



 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Edit user</h1>
		</div>
		<div class="add-user-form">
			<?php 


// database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        $user_id = $_GET['id'];
    	$sql = "SELECT * FROM admin_user WHERE id = {$user_id}";
    	$result = mysqli_query($db_connection, $sql) or die("query unsuccessfull.");

    	if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)){


    	
			 ?>
			<form action="user-update.php" method="post" name='registration'>
				<p>
					<label>First Name</label>
					<input type="hidden" name="id" value="<?php echo $row['id']?>"/>
					<input type="text" name="firstname" value="<?php echo $row['user_first_name']?>">
				</p>
				<p>
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $row['user_last_name']?>" required>
				</p>
				<p>
					<label>User Name</label>
					<input type="text" name="username" value="<?php echo $row['user_name']?>" required>
				</p>
				<p>
					<label>User Email</label>
					<input type="email" name="useremail" value="<?php echo $row['user_email']?>" required>
				</p>
				<p>
					<label>Password</label>
					<input type="password" name="password" value="<?php echo $row['password']?>" required>
				</p>
				<p class="form-control"> 
					<label for="password">confirm password</label>
					<input type="password" name="confirmpassword" id="confpassword" value="<?php echo $row['password']?>">
					<span id="error4-msg"></span>
				</p>
				<p>
					<label>User Role</label>
					<select name="role" value="<?php echo $row['role']?>">
						<?php
	    				if ($row['role'] == 1) {
								echo "<option value='0'>Normal User</option>
	    							  <option value='1' selected>Admin</option>";
							}else{
								echo "<option value='0' selected>Normal User</option>
	    							  <option value='1'>Admin</option>";
							}
							?>
	  				</select>
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
      firstname: "required",
      lastname: "required",
      username: "required",
      useremail: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      username: "Please enter your username",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$('#confpassword').keyup(function(){
	var password = $('#password').val();
	var confpassword = $('#confpassword').val();
	if (confpassword != password) {
		$('#error4-msg').html("Your password is not match");
		return false;
	}else{
		$('#error4-msg').html("");
		return true;
	}
});
</script>