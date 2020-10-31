<!DOCTYPE html>
<html>
	<head>
	
		<title>[OT] User Creation Page</title> 
		
		<meta charset="utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scales">
		
		<link rel="stylesheet" href="styles/MT_OTAccCreation.css">
		
		<?php
        include 'include/NavBarStyle.php';
  		?>
		
	</head>
	<body>
		<?php
			include 'include/MTNavBar.php';
		?>
		<div class = "container-fluid ">

			<div class = "row box_1">
				<div class = "col-md-4 col-sm-4 col-xs-12"></div>
				<div class = "col-md-4 col-sm-4 col-xs-12">
					<form class="form-container" method="post">
					<h1>Operation Team</h1>
					<h1>User Creation Page</h1>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="InputUsername" name="OT_username" placeholder="Alphabetical characters only" pattern="[A-Za-z]">
						 </div>
						<div class="form-group">
							<label for="InputEmail1">Facebook Link</label>
							<input type="text" class="form-control" id="InputEmail1" aria-describedby="emailHelp" pattern = "(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?" placeholder="Profile page" name="OT_FacebookLink">
						</div>
						<div class="form-group">
							<label for="InputPassword1">New Password</label>
							<input type="password" class="form-control" id="InputPassword1" name="OT_password" pattern="[0-9A-za-z]{8,12}" placeholder="8-12 Characters, Aplhanumeric Only">
						</div>
						<div class="form-group">
							<label for="InputPassword1">Confirm Password</label>
							<input type="password" class="form-control" id="InputPassword1" placeholder="Retype your password">
						</div>
						<button type="submit" class="btn btn-warning btn-block" name="submit">Submit</button>
					</form>
				</div>
				<div class = "col-md-4 col-sm-4 col-xs-12"></div>
			</div>

		</div>

		<!--Insert a new operation team account-->
		<?php	
			// Create database connection
			$db = mysqli_connect("localhost", "root", "", "fcms");
				
			//Uncomment this section to check database connection
			/*if($db){
				echo"Successful Connect to DB<br/>";
			}else{
				die("fail");
			}*/

			//Sanitise the input
			function sanitise_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			//Make sure user clicked the submit button
			if(isset($_POST['submit'])){
				$username = mysqli_real_escape_string($db, sanitise_input($_POST['OT_username']));
				$FB_Link = mysqli_real_escape_string($db, sanitise_input($_POST['OT_FacebookLink']));
				$password = mysqli_real_escape_string($db, sanitise_input($_POST['OT_password']));

				$sql = "INSERT INTO operationteam (Username, Password, FacebookLink) VALUES ('$username','$password','$FB_Link'')";
				// execute query
				/*if (mysqli_query($db, $sql)){
					echo"Successfully insert<br/>";	
				}else{
					echo"Failed to insert</br>";
				}*/
			}
			$db->close();
		?>
	</body>
</html>