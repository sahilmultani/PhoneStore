

	</div><!-- #content -->
	

	<footer id="colophon" class="site-footer">
		<div class="footer-row">
				<div class="contanier">
					<div  class="footer-head">

						<div class="pro-deatails">
							<span>PRODUCT NAMES</span>
							<?php
								$db_host_name = 'localhost';
        						$db_user_name = 'root';
        						$db_password = 'root';
        						$db_name = 'local';
        						$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        						$sql = "SELECT * FROM brands ORDER BY id ASC";
        						$result = mysqli_query($db_connection, $sql) or die("query Faild");
        						if (mysqli_num_rows($result) > 0) {

						?>
						
							<ul>
								<?php 
									while ($row = mysqli_fetch_assoc($result)) {
					
					

								?>
								<li><a href="sony.php"><?php echo $row['brands_name'] ?></a></li>
								<?php 
									}
									
									?>

							</ul>				
						
						<?php
					}
						?>
						</div>
						<div class="pro-deatails">
							<span>SUBSCRIBE TO NEWSLETTER</span>
							<p>Get Latest Deals, Offers & Products updates via Email</p>
							<form action="mysql/buy-form-db.php" method="post"><input type="text" placeholder="Your Email Address" name="email" required><button name="submit-email">submit</button></form>
							<ul>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
							</ul>
							
						</div>
				</div>
				
			</div>
			<div class="footer-col">
				<div class="contanier"></div>
			</div>
		</div>
		
		
	</footer><!-- #colophon -->

</div><!-- #page -->
<script type="text/javascript">
		$('.slider').bxSlider({ pager: true,
    captions: true,
    slideWidth: 1560
   });
		$(document).ready(function(){
			$(".search-bnt").click(function(){
				$(".search-box").addClass("open");
			});
			$(".search-box span i").click(function(){
				$(".search-box").removeClass("open");
			});
			
   			$(".hidden-menu span a").click(function(){
				$(".site-menu nav").addClass("menu-open");
			});
			$(".close-bnt").click(function(){
				$(".site-menu nav").removeClass("menu-open");
			});
		});
	</script>

</body>
</html>
