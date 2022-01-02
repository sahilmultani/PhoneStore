

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
	<script src="../js/custom.js"></script>



</head>
<body>
	<div class="main-admin-dsg">
		<div class="admin-header">
			<div class="wlc-admin">
				<h1>Welcome Admin</h1>
			</div>
			<div class="log-admin">
				<p><a href="admin-logout.php"> Hello <?php echo $_SESSTION["user_name"]; ?>, Logout</a></p>
			</div>
		</div>
		<div class="side-nav">
				<ul>
					<li><a href="admin-product-list.php">Products</a></li>
					<li><a href="admin-brand-list.php">Brands</a></li>
					<li><a href="admin-users.php">Users</a></li>
					
				</ul>
			</div>
	</div>

