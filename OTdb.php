<?php
$host = 'sql103.epizy.com';
$user = 'epiz_26969817';
$pass = '8tcX2yGy4HPkCx';
$db = 'epiz_26969817_FCMS';
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
  $query = "SELECT * FROM operationteam WHERE Username='$username'";
  return result ($query);
}

function update_token($token,$username) {
$query = "UPDATE operationteam SET token='$token' WHERE Username='$username'";
return run ($query);
}

function update_pass($confirmPassword,$username) {
$query = "UPDATE operationteam SET password='$confirmPassword' WHERE Username='$username'";
return run ($query);
}
 ?>
