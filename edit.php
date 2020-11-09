<?php
$db = mysqli_connect("localhost", "root", "", "fcms");
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
<select name = "TrackingStatus">
	<option value = "">Select Any One</option>
	<option value = "Invoice issued">Invoice issued</option>
	<option value = "Order confirmed">Order confirmed</option>
	<option value = "Event preparing">Event preparing</option>
	<option value = "Event dismantled">Event dismantled</option>
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
		$TrackingStatus = mysqli_real_escape_string($db, $_POST['TrackingStatus']);
		$sql = " Update orders SET TrackingStatus = '$TrackingStatus' WHERE OrderID = '$eid'";
		if (mysqli_query($db, $sql)){
            echo"Successfully insert<br/>";
			header('location:OTUpdateOrders.php');
        }else{
            echo"Failed to insert</br>";
         }
	}
?>