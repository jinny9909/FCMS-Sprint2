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
// error message
$error = false;

// database connection
include 'backend/DatabaseConnect.php'; // global variables for connection
$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE); // initialize database connection object

// if the login button is pushed, execute the following
if (isset($_POST['login'])) {
    $username = $_POST['username']; // get username from field
    $password = $_POST['password'];  // get password from field
    $sql = 'SELECT * FROM clients WHERE username = "' . $username . '" AND password = "' . $password . '" AND status = 1';
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo $row["ClientID"];
        echo $row["ClientPassword"];
        session_start();
        $_SESSION['clientID'] = $row["ClientID"];
        header('Location:http://foodedge-asia.rf.gd/ClientHome.php');
    } else {
        $error = true;
    }
}
$db->close();
?>

<body>
    <?php
    include 'include/ClientsNavBar.php';
    ?>
    <div class="signup-form" id="login" style="margin-top: 110px;">
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
            <div class="text-center"> <a href="http://foodedge-asia.rf.gd/ClientForgetPass.php">Forgotten password ? </a></div>
            <hr />
            <div class="col-block text-center">
                <a href='ClientAccCreation.php'>
                    <button class="btn btn-secondary btn-lg">Create New Account</button>
                </a>
            </div>
        </form>
        <?php
        if ($error) {
            echo "<div class='alert alert-danger'>You have entered an incorrect password, or your account might have been suspended!</div>";
            $error = false;
        }
        ?>
    </div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>