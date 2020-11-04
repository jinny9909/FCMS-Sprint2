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
			$username =  strip_tags($_POST['username']);
			$password = strip_tags($_POST['password']);

			$username = mysqli_real_escape_string($conn, $username);
			$password = mysqli_real_escape_string($conn, $password);

            $checkUser = mysqli_query($conn, "SELECT username FROM `OT` WHERE username = '$username' AND pass = '$password' ") or exit(mysqli_error($conn));
            
            if(mysqli_num_rows($checkUser) >= 1)
            {
                header("Location: ../OThomePage.php");
            }
            else 
            {
            ?>
                <script>alert('Wrong Password. Please Try Again.');</script>
            <?php
            header("Location: ../OT_login.php");
            }

			/*if(mysqli_num_rows($checkUser) >= 1) 
			{
				$checkRole = mysqli_query($conn, "SELECT * FROM `OT` WHERE  username = '".$_POST['username']."' AND pass='".$_POST['password']."' ") or exit(mysqli_error($conn));

				if(mysqli_num_rows($checkRole) >= 1) 
				{
					while($row = mysqli_fetch_array($checkRole)) 
						{ 
							header("Location: OThomePage.php");
						} 
				}
				else 
				{
				?>
					<script>alert('Wrong Password. Please Try Again.');</script>
				<?php
				}

			}else 
			{
				?>
					<script> alert('Account Does Not Exist. Please Try Again.'); </script>
				<?php
			}*/
		}
	}
}
?>

