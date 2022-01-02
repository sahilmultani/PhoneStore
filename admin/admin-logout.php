<?php
		
		$db_host_name = 'localhost';
        $db_user_name = 'root';
       	$db_password = 'root';
       	$db_name = 'local';
       	$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);

       	session_start();

       	session_unset();

       	session_destroy();

       	header("Location: http://phonestore.local/admin/admin-login.php");





?>