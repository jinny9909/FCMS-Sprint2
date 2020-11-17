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
			include 'include/OTNavBar.php';
		?>
		<div class="container">
			<form method="post">
				<div class="row clearfix">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered table-hover table-sortable" id="tab_logic">
							<thead class="table_heading">
								<tr >
									<th class="text-center">
										Order Date
									</th>
									<th class="text-center">
										 Order ID
									</th>
									<th class="text-center">
										Package Option
									</th>
									<th class="text-center" >
										Order Status
									</th>
									<th class="text-center" >
										Edit
									</th>
								</tr>
							</thead>
							<?php
							// Create database connection

							$db = mysqli_connect("sql103.epizy.com", "epiz_26969817", "8tcX2yGy4HPkCx", "epiz_26969817_FCMS");
							//Uncomment this section to check database connection
							if ($db) {
								echo "Successful Connect to DB<br/>";
							} else {
								die("fail");
							}
							$sql = "SELECT OrderDate, OrderID, PackageID, TrackingID from orders";
							$result=$db-> query($sql);
							
							if ($result-> num_rows >0){
								while ($row = $result-> fetch_assoc()){
							?>		
							<tr>
								<td><?php echo $row['OrderDate']; ?></td>
								<td><?php echo $row['OrderID']; ?></td>
								<td><?php echo $row['PackageID']; ?></td>
								<td><?php echo $row['TrackingID']; ?></td>
								<td><a href="http://foodedge-asia.rf.gd/edit.php?eid=<?php echo $row["OrderID"] ?>">Edit</a></td>
							</tr>
							<?php
								
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
			</form>
		</div>
	</body>
	<?php include 'include/OTfooter.php'; ?>
</html>
	
