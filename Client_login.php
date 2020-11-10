<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
    <?php
        include 'include/NavBarStyle.php';
    ?>
    <link rel="stylesheet" type="text/css" href="styles/All_Login.css">
</head>

<?php
    include 'backend/DatabaseConnect.php'; // global variables for connection
    $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
    
    if(isset($_POST['login'])){
        $username =$_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;
        $sql = 'SELECT * FROM clients WHERE username = "'.$username.'" AND clientpassword = "'.$password.'"';
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            echo $row["ClientID"];
            echo $row["ClientPassword"];
            session_start();
            $_SESSION['clientID'] = $row["ClientID"];
            //header('ClientHome.php');
        }
        else{
            echo "<p>You Have Entered Incorrect Password!</p>";
        }
    }
    $db->close();
?>

<body>
	<?php
        include 'include/ClientsNavBar.php';
	?>
	<div class="signup-form" style="margin-top: 110px;">
        <form method="post" action="Client_login.php">
            <div class="card" style="width: 330px">
                <div class="card-body">
                    <h3 style="margin-bottom:20px;">Client Login</h3>
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
            <div class="text-center">Don't have an account? <a href="ClientAccCreation.php">Register here</a>.</div>
        </form>
	</div>
</body>

</html>