<?php
require_once 'ClientDB.php';
$codes = $_GET['code'];
$username = $_GET['username'];

//check link
if (isset($codes) && isset($username)) {
  $db_user = user($username);
  $row = mysqli_fetch_assoc($db_user);
  $token = $row['token'];
  $db_username = $row['Username'];

  //check between tokens & usernames that are in links and databases
  if ($token == $codes && $db_username == $username) {
    //check submit
    if (isset($_POST['submit'])) {
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];
      //check password
      if ($password == $confirmPassword) {
        echo "password is not the same";
        update_pass($confirmPassword, $username);
        header('location:Client_login.php');
      } else {
        echo "password is different";
      }
    }
  } else {
    echo "token & username is different";
  }
} else {
  echo "link is wrong";
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Client Update New Password</title>
  <link rel="stylesheet" type="text/css" href="styles/AllLogin.css">
  <?php
  include 'include/NavBarStyle.php';
  ?>
</head>

<body>
  <div class="signup-form" id="login" style="margin-top: 110px;">
    <div class="card" style="width: 330px">
      <h3>Change your password</h3>
      <form action="" method="post">
        <p>Welcome back <?php echo $row['Username'] ?>!</p>
        <div class="form-group">
          <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" name="password" placeholder="New Password"><br>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" name="confirmPassword" placeholder="Confirm New Password"><br>
          </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-sm">
      </form>
    </div>
  </div>
</body>

</html>