<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'fcms';
$link = mysqli_connect ($host, $user, $pass, $db);
 ?>

<?php
session_start();
function result ($query) {
  global $link;
  if ($result = mysqli_query($link, $query) or die ('fail to fetch Data')){
  return $result;
  }
}

function run($query) {
  global $link;
  if (mysqli_query ($link, $query)) return true;
  else return false;
  }

function user($username) {
  $query = "SELECT * FROM mtaccount WHERE user_name='$username'";
  return result ($query);
}

function update_token($token,$username) {
$query = "UPDATE mtaccount SET token='$token' WHERE user_name='$username'";
return run ($query);
}

function update_pass($confirmPassword,$username) {
$query = "UPDATE mtaccount SET Password='$confirmPassword' WHERE user_name='$username'";
return run ($query);
}
 ?>
