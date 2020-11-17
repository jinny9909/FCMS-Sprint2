<?php

$db = mysqli_connect("sql103.epizy.com", "epiz_26969817", "8tcX2yGy4HPkCx", "epiz_26969817_FCMS");
//Uncomment this section to check database connection
if ($db) {
	echo "Successful Connect to DB<br/>";
} else {
	die("fail");
}
if (isset($_REQUEST["eid"])) {
    $eid = $_REQUEST["eid"];
    $query =("SELECT * from orders where OrderID='$eid'");
    $row = ($query);
}

?>


<form method="post">
<table border="1" align="center">

<tr>
<td>Tracking Status:</td>
<td>
<select name = "TrackingID">
	<option value = "0">Select Any One</option>
	<option value = "1">Invoice issued</option>
	<option value = "2">Order confirmed</option>
	<option value = "3">Event preparing</option>
	<option value = "4">Event dismantled</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>
<?php
	if(isset($_POST['submit'] )){
		echo "abc";
		$TrackingID = mysqli_real_escape_string($db, $_POST['TrackingID']);
		$sql = " Update orders SET TrackingID = '$TrackingID' WHERE OrderID = '$eid'";
		if (mysqli_query($db, $sql)){
            echo"Successfully insert<br/>";
			header('location:http://foodedge-asia.rf.gd/OTUpdateOrders.php');
        }else{
            echo"Failed to insert</br>";
         }
	}
?>