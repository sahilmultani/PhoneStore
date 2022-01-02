<?php


include('header.php');
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="site-banner">
				<div class="contanier">
          <?php

                 $sql1 = "SELECT * FROM brands WHERE id = {$brands_id} ";
                        $result1 = mysqli_query($db_connection, $sql1) or die("query Faild");
                        $row1 = mysqli_fetch_assoc($result1);
           ?>
					<div class="head-ing">
						<h1><?php echo $row1['brands_name']; ?></h1>
					</div>


				</div>
			</section>
			<section class="product-pag">
				<div class="contanier">
					<div class="main-product">
						<div class="product-col-1">
							<div class="pro-cate">
							<h2>PRODUCT CATEGORIES</h2>
							
								 <ul>
                    <li><span> &gt; </span><a href="#">5 </a></li>
                    <li><span> &gt; </span><a href="#">6 inches</a></li>
                    <li><span> &gt; </span><a href="#">7 inches</a></li>
                    <li><span> &gt; </span><a href="#">7'5 inches</a></li>
                    <li><span> &gt; </span><a href="#">8 inches</a></li>
                    <li><span> &gt; </span><a href="#">8'5 inches</a></li>
                                    
              </ul>
								
							
						</div>
						<div class="lasted-prd">
							<h2>TOP RATED PRODUCTS</h2>
              <?php
                $db_host_name = 'localhost';
                    $db_user_name = 'root';
                    $db_password = 'root';
                    $db_name = 'local';
                    $db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
                      if (isset($_GET['bid'])) {
                      $brands_id = $_GET['bid'];
                    }
                    $sql1 = "SELECT * FROM brands ORDER BY id ASC";
                    $result1 = mysqli_query($db_connection, $sql1) or die("query Faild");
                    if (mysqli_num_rows($result1) > 0) {

            ?>
							<ul>
                <?php 
                  while ($row1 = mysqli_fetch_assoc($result1)) {
            
                  ?>
                                      <li><span> <img src="admin/<?php echo $row1['brands_logos'] ?>" width="100px" height="100px"> </span><a href="sony.php?bid=<?php echo $row1['id'] ?>"><?php echo $row1['brands_name'] ?></a></li>
                                      <?php 
                  }
                  
                  ?>
                                       
                                    
              </ul>
              <?php
          }
            ?>
							
						</div>
						</div>
						<div class="product-col-2">
							<div class="show-result">
								<div class="showing">
									 <p>Showing 1–12 of 26 results</p>
								</div>
								<div class="search-relat">
									<input type="text" placeholder="Default sorting">
								</div>
								
							</div>
							<div class="your-sele-prd">
                <?php 

                      
                      if (isset($_GET['bid'])) {
                      $brands_id = $_GET['bid'];
                    }
                      
                      $sql = "SELECT * FROM product LEFT JOIN brands ON product.product_brand = brands.id WHERE product.product_brand = {$brands_id} ORDER BY product.product_id ASC ";
                      $result = mysqli_query($db_connection, $sql) or die("query Faild");
                      if (mysqli_num_rows($result) > 0) {
                    ?>
  								<div class="blog-pro">
                    <?php 
                      while ($row = mysqli_fetch_assoc($result)) {
          
                   ?>
                      <div class="blogs">
                          <figure><img src="admin/<?php echo $row['product_img'] ?>" width="400px" height="400px"></figure>
                          <p><a href="#"><?php echo $row['product_name'] ?></a></p>
                          <span>price:- $<?php echo $row['product_prize'] ?></span>
                          <a href="buy-form.php" class="btn">Buy Now</a>
                      </div>
                     <?php 
                        }
                      ?>
                              
                  </div>
                  <?php
                        }else {
                          echo "<h2>No Record Found</h2>";
                        }
                       
                  ?>
              </div>
            </div>
          </div>
        </div>
				          
								
				
			</section>

			</main>
		</div>

		

<?php
include('footer.php');
