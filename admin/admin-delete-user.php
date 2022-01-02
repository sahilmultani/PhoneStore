<?php 

if(isset($_GET['id'])) {

  $db_host_name = 'localhost';
        $db_user_name = 'root';
        $db_password = 'root';
        $db_name = 'local';
        $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

         $sql_query = "DELETE FROM admin_user WHERE id =".$_GET['id'];
        $result = mysqli_query($db_connection, $sql_query) or die("query unsuccessfull.");

        header("Location: http://phonestore.local/admin/admin-users.php");

        mysqli_close($db_connection);
    }
?>