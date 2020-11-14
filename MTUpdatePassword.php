<?php
require_once 'MTdb.php';
$codes = $_GET['code'];
$username = $_GET['username'];

//check link
if (isset($codes) && isset($username)) {
  $db_user = user($username);
  $row = mysqli_fetch_assoc($db_user);
  $token = $row['token'];
  $db_username = $row['user_name'];

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
        header('location:MTlogin.php');
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
  <title>Send Email</title>
</head>

<body>
  <h3>Change your password</h3>
  <form action="" method="post">
    <label>password</label><br>
    <input type="text" name="password" placeholder="password"><br>
    <label>new password</label><br>
    <input type="text" name="confirmPassword" placeholder="new password"><br>
    <input type="submit" name="submit">
  </form>
</body>

</html>