<?php include('admin-dashboard.php'); ?>

<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>All Products</h1>
		</div>
		<span class="for-btn"><a href="admin-add-product.php" class="btn">Add Product</a>
			<form action="search.php" action="post">
				<input type="search" name="search"><input type="submit" name="submit" value="search">

			</form>
		</span>
		<?php
				$db_host_name = 'localhost';
        		$db_user_name = 'root';
        		$db_password = 'root';
        		$db_name = 'local';
        		$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        		$limit = 5;
        		if(isset($_GET['search'])){
        			$search_term = $_GET['search'];
        		}
        		if(isset($_GET['page'])){
        			$page = $_GET['page'];
        		}else{
        			$page = 1;
        		}
        		$offset = ($page - 1) * $limit;
        		$sql = "SELECT * FROM product LEFT JOIN brands ON product.product_brand = brands.id WHERE product.product_name LIKE '%{$search_term}%' ORDER BY product.product_id ASC LIMIT {$offset}, {$limit}";
        		$result = mysqli_query($db_connection, $sql) or die("query Faild");
        		if (mysqli_num_rows($result) > 0) {
        		
		 ?>
		<table class="user-table product" id="example">
			<thead>
				<tr>
					<th>S.No</th>
					<th>PRODUCT NAME</th>
					<th>PRODUCT IMG</th>
					<th>PRODUCT DESCRIPTION</th>
					<th>PRODUCT BRAND</th>
					<th>PRODUCT PRIZE</th>
					<th>DATE</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while ($row = mysqli_fetch_assoc($result)) {
					
					

				?>
				<tr id="<?php echo $row['product_id'] ?>">
					<td><?php echo $row['product_id'] ?></td>
					<td><?php echo $row['product_name'] ?></td>
					<td><img src="<?php echo $row['product_img'] ?>" height="200px" width="200px"></td>
					<td><?php echo $row['description'] ?></td>
					<td><?php echo $row['brands_name'] ?></td>
					<td><?php echo $row['product_prize'] ?></td>		
					<td><?php echo $row['product_date'] ?></td>	
					<td><a href="admin-edit-product.php?id=<?php echo $row['product_id'] ?>" class="btn">Edit</a></td>
					<td><a href="admin-delete-product.php?id=<?php echo $row['product_id'] ?>" class="btn delete">Delete</a></td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
		<?php
				}
				$sql1 = "SELECT * FROM product WHERE product.product_name LIKE '%{$search_term}%' ";
				$result1 = mysqli_query($db_connection, $sql1) or die("query Faild");

				if (mysqli_num_rows($result1) > 0) {

					$total_records = mysqli_num_rows($result1);
					
					$total_pages = ceil($total_records / $limit);
					echo '<ul class="pagination">';

					for ($i=1; $i <= $total_pages; $i++) {
						if ($i == $page) {
						 	$active = "active-color";
						 } else {
						 	$active = "";
						 }
						echo '<li class="'.$active.'"><a href="search.php?search='.$search_term.' &page='.$i.'" class="btn">'.$i.'</a></li>';
					}
					echo '</ul>';
				}
		 ?>
				
	</div>
</div>
	<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );



    $(".delete").click(function(e){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'admin-delete-product.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        } else{
        	e.preventDefault();
            return false;
        }
    });



</script>
</html>