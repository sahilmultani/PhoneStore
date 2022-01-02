<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="media.css">
	<?php 
include('mysql/buy-form-db.php');
 ?>
</head>


<body>

<div id="page" class="site">


		<header id="masthead" class="site-header">

			<div class="site-logo">
				<div class="contanier">
					<div class="logo">
						<a href="index.php"><img src="img/phone.png"></a>
					</div>
				</div>
			</div>
			<div class="site-menu">
				<div class="contanier">
					<div class="main-menu">
						<?php
								$db_host_name = 'localhost';
        						$db_user_name = 'root';
        						$db_password = 'root';
        						$db_name = 'local';
        						$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        						if (isset($_GET['bid'])) {
        							$brands_id = $_GET['bid'];
        						}
        						$sql = "SELECT * FROM brands ORDER BY id ASC";
        						$result = mysqli_query($db_connection, $sql) or die("query Faild");
        						if (mysqli_num_rows($result) > 0) {

						?>
						<nav>
							<ul><span class="close-bnt"><i class="fa fa-times" aria-hidden="true"></i></span>
								<?php 
									while ($row = mysqli_fetch_assoc($result)) {
										if (isset($_GET['bid'])) {

        							if ($row['id'] == $brands_id ) {
											$active1 = "active";
										}else{
											$active1 = "	";
										}
					
        						}
										
					

								?>
								<li><a class = "<?php echo $active1 ?>" href="sony.php?bid=<?php echo $row['id'] ?>"><?php echo $row['brands_name'] ?></a></li>
								<?php 
									}
									
									?>

							</ul>				
						</nav>
						<?php
					}
						?>
						<div class="hidden-menu">
							<span><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a></span>
						</div>
					</div>
					<div class="search-bar">
						<a href="#" class="search-bnt"><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
					<div class="search-box">
						<div class="contanier">
							<input type="text" placeholder="Search...."><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
							<span><i class="fa fa-times" aria-hidden="true"></i></span>
						</div>
						
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
