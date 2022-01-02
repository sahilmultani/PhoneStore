<?php include('admin-dashboard.php'); 

?>
<div class="main-admin-cont">
	<div class="contanier">
		<div class="add-user">
			<h1>All Brands</h1>
		</div>
		<span class="for-btn"><a href="admin-add-new-brands.php" class="btn">Add Brands</a>
			<form action="search-brands.php" action="post">
				<input type="search" name="search"><input type="submit" name="submit" value="search">

			</form>
		</span>
		<?php
				$db_host_name = 'localhost';
        		$db_user_name = 'root';
        		$db_password = 'root';
        		$db_name = 'local';
        		$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
        		$limit = 10;
        		if(isset($_GET['search'])){
        			$search_term = $_GET['search'];
        		}
        		if(isset($_GET['page'])){
        			$page = $_GET['page'];
        		}else{
        			$page = 1;
        		}
        		$offset = ($page - 1) * $limit;
        		$sql = "SELECT * FROM brands WHERE brands.brands_name LIKE '%{$search_term}%' ORDER BY id ASC LIMIT {$offset}, {$limit}";
        		$result = mysqli_query($db_connection, $sql) or die("query Faild");
        		if (mysqli_num_rows($result) > 0) {
        		
		 ?>
		<table class="user-table" id="example">
			<thead>
				<tr>
					<th>S.No</th>
					<th>BRANDS NAME</th>
					<th>BRANDS logos</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while ($row = mysqli_fetch_assoc($result)) {
					
					

				?>
				<tr id="<?php echo $row['id'] ?>">
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['brands_name'] ?></td>
					<td><img src="<?php echo $row['brands_logos'] ?>" height="150px" width="150px"></td>	
					<td><a href="admin-edit-brands.php?id=<?php echo $row['id'] ?>" class="btn">Edit</a></td>
					<td><a href="admin-delete-brands.php?id=<?php echo $row['id'] ?>" class="btn delete">Delete</a></td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
		<?php
				}
				$sql1 = "SELECT * FROM brands WHERE brands.brands_name LIKE '%{$search_term}%' ";
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
						echo '<li class="'.$active.'"><a href="search-brands.php?search='.$search_term.' &page='.$i.'" class="btn">'.$i.'</a></li>';
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
               url: 'admin-delete-brands.php',
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