<?php 

if ( isset( $_POST['submit-form'] ) ) {
	$usernam = $_POST['username'];
	$number = $_POST['number'];
	$account = $_POST['account'];
	$date = $_POST['date'];
	$address = $_POST['address'];
// database connection....
	$db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
       
        $sql_query = mysqli_query( $db_connection, "INSERT INTO user_buy_form( user_name, phone_no, account_no, expire_date_of_card, address) VALUES ( '$usernam', $number, $account, '$date', '$address')" );
        if ( $sql_query ) {
            echo '<script>alert("form submit successfully");</script>';
        } else {
            echo '<script>alert("somthing is wrong");</script>';
        }
         
    }

    if ( isset( $_POST['submit-email'] ) ) {
	$email = $_POST['email'];
	
// database connection....
	$db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        
        $sql_query = mysqli_query( $db_connection, "INSERT INTO subscribe( user_email ) VALUES ( '$email')" );
         if ( $sql_query ) {
            echo '<script>alert("subscribe successfully");</script>';
            header("Location: http://phonestore.local/");

        } else {
            echo '<script>alert("subscribe unsuccessful");</script>';
        }
    }

// FOR ADD USER IN ADMIN SIDE.

    // database connection....
        $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

    if ( isset( $_POST['save-user'] ) ) {
    $first_name =mysqli_real_escape_string($db_connection, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($db_connection, $_POST['last-name']);
    $user_name = mysqli_real_escape_string($db_connection, $_POST['user-name']);
    $user_email = mysqli_real_escape_string($db_connection, $_POST['user-email']);
    $password = mysqli_real_escape_string($db_connection, md5($_POST['password']));
    $role = mysqli_real_escape_string($db_connection, $_POST['role']);
    

        $sql = "SELECT user_name FROM admin_user WHERE user_name = '{$user_name}'";

        $result = mysqli_query($db_connection, $sql) or die("quey faild");

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("username already exists");</script>';
        }else{
                $sql_query = mysqli_query( $db_connection, "INSERT INTO admin_user( user_first_name, user_last_name, user_name, password, role, user_email ) VALUES ( '$first_name', '$last_name', '$user_name', '$password', '$role', '$user_email')");
            if ( $sql_query ) {
            header("Location: http://phonestore.local/admin/admin-users.php");
            } else {
            echo '<script>alert("user add unsuccessful");</script>';
            }
        }
        
    }
    // 

     


 ?>