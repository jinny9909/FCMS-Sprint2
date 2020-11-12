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
    /*// error message
    $error = false;

    // database connection
    include 'backend/DatabaseConnect.php'; // global variables for connection
    $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE); // initialize database connection object
    
    // if the login button is pushed, execute the following
    if(isset($_POST['login'])){
        $username = $_POST['username']; // get username from field
        $password = $_POST['password'];  // get password from field
        $sql = 'SELECT * FROM OperationTeam WHERE username = "'.$username.'" AND clientpassword = "'.$password.'" AND status = 1';
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            echo $row["Username"];
            echo $row["Email"];
            session_start();
            $_SESSION['username'] = $row["Username"];
            header('Location:OThomePage.php');
        }
        else{
            $error = true;
        }
    }
    $db->close();*/
?>

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

            $checkUser = mysqli_query($conn, "SELECT username FROM `ot` WHERE username = '$username' AND pass = '$password' ") or exit(mysqli_error($conn));
            
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

<body>
	<?php
        include 'include/ClientsNavBar.php';
	?>
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
        </form>
	</div>
</body>

</html>