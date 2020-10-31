<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>

<body>
	<?php
	include 'include/StringPath.php'
	
	?>
	
	<div class="container">

		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Client</h3>
					<h3>Sign in </h3>

				</div>


				<div class="card-body">
					

					<form method="post" action="ClientHome.php">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="username">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="password">
						</div>
						
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn" name="login">
						</div>
					</form>
				</div>
				<div class="card-footer">
					
				</div>
			</div>
		</div>
	</div>
	<?php
	
	include 'backend/DatabaseConnect.php'; // global variables for connection
	$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
	
	if(isset($_POST['login'])){
		$username =$_POST['username'];
		$password = $_POST['password'];
		$sql = " SELECT * FROM `clients` WHERE Username = '$username' AND Password ='$password' LIMIT 1";
		$result=$db->query($sql);
		
		if(($result)-> fetch_assoc()==0){
			echo " You Have Successfully Logged in";
			return 'ClientHome.php';
		}
		else{
			echo " You Have Entered Incorrect Password";
			
			
		}
	}
	$db->close();
	
	?>
</body>

</html>