<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="../js/custom.js"></script>

</head>



<div class="admin-login">
		<div class="wapper">
				
			<div class="admin-login-form">
				<div class="logo">
						<img src="../img/phone.png">
					</div>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name='registration'>
					<p>
						<label>Username or Email Address</label>
						<input type="text" name="username">
					</p>
					<p>
						<label>Password</label>
						<input type="Password" name="password">
					</p>
					<p>
						<input type="submit" name="login" value="Login">
						
					</p>
					<p>
						<a href="Register-form.php">Registration</a>
						
					</p>
				</form>
				<?php 
					if (isset($_POST['login'])) {
						$db_host_name = 'localhost';
	        			$db_user_name = 'root';
	        			$db_password = 'root';
	        			$db_name = 'local';
	        			$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

	        			$username = mysqli_real_escape_string($db_connection, $_POST['username']);
	        			$password = md5($_POST['password']);
						
						 $sql = "SELECT id, user_name, role FROM admin_user WHERE user_name = '{$username}' OR user_email = '{$username}' AND password = '{$password}'";
							
						$result = mysqli_query($db_connection, $sql) or die("query failed.");


						if(mysqli_num_rows($result) > 0) {

							while ($row = mysqli_fetch_assoc($result)) {
								session_start();
								$_SESSTION["user_name"] = $row['user_name'];
								$_SESSTION["user_email"] = $row['user_email'];
								$_SESSTION["user_id"] = $row['id'];
								$_SESSTION["user_role"] = $row['role'];
								
								header("Location: http://phonestore.local/admin/admin-users.php");
							}

						}else{
							echo "<script>alert('username and password are not matched.');</script>";
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
      username: "required",
      password: "required",
      
      
    },
    // Specify validation error messages
    messages: {
      username: "Please enter your Username or Email",
      password: "Please enter your password",
    
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
