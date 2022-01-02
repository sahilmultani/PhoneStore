<?php include('admin-dashboard.php');
// FOR ADD USER IN ADMIN SIDE.

    // database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

    if ( isset( $_POST['save-user'] ) ) {
    $first_name =mysqli_real_escape_string($db_connection, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db_connection, $_POST['lastname']);
    $user_name = mysqli_real_escape_string($db_connection, $_POST['username']);
    $user_email = mysqli_real_escape_string($db_connection, $_POST['useremail']);
    $password = mysqli_real_escape_string($db_connection, md5($_POST['password']));
    $con_password = mysqli_real_escape_string($db_connection, md5($_POST['confirmpassword']));
    $role = mysqli_real_escape_string($db_connection, $_POST['role']);
    

        $sql = "SELECT user_name FROM admin_user WHERE user_name = '{$user_name}'";
        $sql4 = "SELECT user_email FROM admin_user WHERE user_email= '{$user_email}'";
       

        $result = mysqli_query($db_connection, $sql) or die("quey faild");
        $result4 = mysqli_query($db_connection, $sql4) or die("quey faild");

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("username already exists");</script>';
        }elseif (mysqli_num_rows($result4) > 0) {
        	 echo '<script>alert("Email Id already exists");</script>';
        }
        elseif ($password !== $con_password) {
        	 echo '<script>alert("your password is not match");</script>';
        }else{
                $sql_query = mysqli_query( $db_connection, "INSERT INTO admin_user( user_first_name, user_last_name, user_name, password, confirm_password, role, user_email ) VALUES ( '$first_name', '$last_name', '$user_name', '$password', '$con_password', '$role', '$user_email')");
            if ( $sql_query ) {
            header("Location: http://phonestore.local/admin/admin-users.php");
            } else {
            echo '<script>alert("user add unsuccessful");</script>';
            }
        }
        
    }
    // 

 ?>
	
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>Add users</h1>
		</div>
		<div class="add-user-form">
			<form action="admin-users-add.php" method="post" name="registration">
				<p class="form-control">
					<label for="firstname">First Name</label>
					<input type="text" name="firstname" id="firstname">
					
				</p>
				<p class="form-control">
					<label for="lastname">Last Name</label>
					<input type="text" name="lastname" id="lastname">
				
				</p>
				<p class="form-control">
					<label for="username">User Name</label>
					<input type="text" name="username" id="username">
					
				</p>
				<p class="form-control">
					<label for="useremail">User Email</label>
					<input type="email" name="useremail" id="email">
					
				</p>
				<p class="form-control"> 
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				
					
				</p>
				<p class="form-control"> 
					<label for="password">confirm password</label>
					<input type="password" name="confirmpassword" id="confpassword">
					<span id="error4-msg"></span>
				</p>
				<p class="form-control">
					<label for="role">User Role</label>
	  				<select name="role" id="role">
	    				<option value="0">Normal User</option>
	    				<option value="1">Admin</option>
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
      firstname: "required",
      lastname: "required",
      username: "required",
      confirmpassword: "required",
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
       confirmpassword: {
        required: "Please provide a confirm password",
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
