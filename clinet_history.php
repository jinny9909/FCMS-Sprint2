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
			table{
				margin-top: 100px;
			}
			td{
				background-color: white;
				text-align: center;
			}
		</style>
	</head>

	<body>
		<?php
			include 'include/ClientsNavBar.php';
		?>
		<div class="container inner-ontainer tab_box">
			<div class="row clearfix">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered table-hover table-sortable" id="tab_logic">
							<thead class="table_heading">
								<tr >
									<th class="text-center">
										Order ID
									</th>
									<th class="text-center">
										 Order Date
									</th>
									<th class="text-center">
										Package ID
									</th>
									<th class="text-center" >
										Total Price
									</th>
									<th class="text-center" >
										Number of Diner
									</th>
								</tr>
							</thead>
							<?php
							// Create database connection
							$db = mysqli_connect("localhost", "root", "", "fcms");
							//Uncomment this section to check database connection
							if ($db) {
								echo "Successful Connect to DB<br/>";
							} else {
								die("fail");
							}
							$sql = "SELECT order_ID, order_date, package_ID, total_price, num_diner from client_history";
							$result=$db-> query($sql);
							
							if ($result-> num_rows >0){
								while ($row = $result-> fetch_assoc()){
									echo 
									"<tr>
										<td>".$row["order_ID"]."</td>
										<td>".$row["order_date"]."</td>
										<td>".$row["package_ID"]."</td>
										<td>".$row["total_price"]."</td>
										<td>".$row["num_diner"]."</td>
									</tr>";
								}
							}
							else{
								echo "0 result";
							}
							$db-> close();
							?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
	