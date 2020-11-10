<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles/otlogin.css">
</head>
<body>
<div class="container">

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
                <h3>Operation Team</h3>
                <h3>Sign in </h3>
				
			</div>
			<div class="card-body">
                
				<form methog="POST" action="OT_login.php">
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
		</div>
	</div>
</div>

<?php

$hostname_dbconnection = "localhost"; 
$database_dbconnection = "fcms";
$username_dbconnection = "root";
$password_dbconnection = "";

$conn = mysqli_connect($hostname_dbconnection, $username_dbconnection, $password_dbconnection, $database_dbconnection);

mysqli_select_db($conn, $database_dbconnection) or die (mysqli_error($conn)); 

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	if (isset($_POST['login'])) 
	{
		if(isset($_POST['username']) && isset($_POST['password'])) 
		{
			$username = strip_tags($_POST['username']);
			$password = strip_tags($_POST['password']);

			$username = mysqli_real_escape_string($conn, $username);
			$password = mysqli_real_escape_string($conn, $password);

            $checkUser = mysqli_query($conn, "SELECT user FROM `OT` WHERE user = '$username' AND pass = '$password' ") or exit(mysqli_error($conn));
            
            if(mysqli_num_rows($checkUser) >= 1)
            {
                header("Location: OThomePage.php");
            }
            else 
            {
            ?>
                <script>alert('Wrong Password. Please Try Again.');</script>
            <?php
            }
		}
	}
}
?>


</body>
</html>