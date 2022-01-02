<?php

$db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

 	$id = $_POST['id'];
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
                $sql_query = mysqli_query( $db_connection, "UPDATE admin_user SET user_first_name = '{$first_name}', user_last_name = '{$last_name}', user_name = '{$user_name}', user_email = '{$user_email}', password = '{$password}', confirm_password = '{$con_password}', role = '{$role}' WHERE id = {$id} ");
            if ( $sql_query ) {
            header("Location: http://phonestore.local/admin/admin-users.php");
            } else {
            echo '<script>alert("user add unsuccessful");</script>';
            }
        }


     
        
        mysqli_close($db_connection);

?>