<!DOCTYPE html>
<html>
	<head>
	
		<title>[OT] Update Order Page</title> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="styles/OTUpdateOrder.css">
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<?php
			include 'include/NavBarStyle.php';
		?>
		<style>
			
		</style>
	</head>

	<body>
		<?php
			include 'include/OTNavBar.php';
		?>
		<div class="container">
			<div class="col">
			<?php
				// Create database connection
				$db = mysqli_connect("localhost", "root", "", "fcms");
				//Uncomment this section to check database connection
				if ($db) {
					echo "Successful Connect to DB<br/>";
				} else {
					die("fail");
				}
				$sql = "SELECT order_ID, order_date, package_ID, total_price from client_history";
				$result=$db-> query($sql);
							
				if ($result-> num_rows >0){
					while ($row = $result-> fetch_assoc()){
						echo 
						"<div>
							<p>Order ID: ".$row["order_ID"]."</p>
							<p>Order Date: ".$row["order_date"]."</p>
							<p>Package ID: ".$row["package_ID"]."</p>
							<p>Total Price: ".$row["total_price"]."</p>
						</div>";
						}
					}
					else{
						echo "0 result";
					}
					$db-> close();
			?>
			</div>
		</div>
	</body>
</html>
	
