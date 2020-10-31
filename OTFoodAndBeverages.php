<!DOCTYPE html>
<html>
	<head>
	
		<title>[OT] Food and Beverages</title> 
		
		<meta charset="utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scales">

		<link rel="stylesheet" href="styles/OTFoodAndBeverages.css">
	</head>
	
	<?php
        include 'include/NavBarStyle.php';
    ?>
	<body>
	<?php
		include 'include/OTNavBar.php';
		?>
	<div class="container" style="margin-top: 70px;">
		<div class="row col-lg-12 mx-auto">
			<?php
				include "backend/DatabaseConnect.php";

				$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
				
				// check connection
				if($db){
					$pass = true;
				} else {
					die("fail");
				}
				
				$sql = "SELECT * FROM Food";
				$result = $db->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '
						<div class="col-7 text-left each_cont">
							<span>'.$row["FoodName"].'</span>
						</div>
						<div class="col-5 text-right each_cont">
							<form class="row">
								<div class="form" style="margin-right: 15px;">
									<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Edit Name">
								</div>
								<button type="submit" class="btn btn-warning btn-center">Edit</button>
							</form>
						</div>
						';
					}
				}
				
				// close connection
				$db->close();
			?>
		</div>
	</div>
	</body>
</html>
