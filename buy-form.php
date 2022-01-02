<?php /* Template Name: Form Template */ 

include('header.php');
include('mysql/buy-form-db.php');


?>

<div class="form">
	<form action="mysql/buy-form-db.php" method="post" class="buy-form">
		<p>	
			<label>User name:-</label>
			<input type="text" name="username" required>
		</p>
		<p>
			<label>Phone number:-</label>
			<input type="number" name="number" required>
		</p>
		<p>
			<label>Account No:-</label>
			<input type="number" name="account" required>
		</p>
		<p>
			<label>Expire date of card:-</label>
			<input type="date" name="date" required>
		</p>
			
			<label>Address:-</label>
			<textarea name="address" required>
				
			</textarea>
		
			
			<input type="submit" name="submit-form" class="btn">
		

		
	</form>
</div>


<?php
include('footer.php');