<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
    <?php
        include 'include/NavBarStyle.php';
    ?>
    <link rel="stylesheet" type="text/css" href="styles/AllLogin.css">
</head>

<?php
   
?>

<?php
$error=false;

include 'backend/DatabaseConnect.php'; // global variables for connection
$conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

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

            $checkUser = mysqli_query($conn, "SELECT Username FROM `operationteam` WHERE Username = '$username' AND password = '$password' ") or exit(mysqli_error($conn));
            
            if(mysqli_num_rows($checkUser) >= 1)
            {
                header("Location: http://foodedge-asia.rf.gd/OThomePage.php");
            }
            else 
            {
                $error=true;
            
            }
		}
	}
}
?>

<body>
	<div class="signup-form" id="login" style="margin-top: 110px;">
        <form method="post" action="OT_login.php">
            <div class="card" style="width: 330px">
                <div class="card-body">
                    <h3 style="margin-bottom:20px;">Operation Team Login</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">Login</button>
            </div>
            <div class="text-center"> <a href="OTforgotPass.php">Forgotten password ? </a></div>
        </form>
        <?php
            if ($error) {
                echo "<div class='alert alert-danger'>You have entered an incorrect password, or your account might have been suspended!</div>";
            }  
        ?>
	</div>
</body>

</html>