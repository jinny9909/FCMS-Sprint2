<?php
mysqli_connect("localhost", "root", "");
mysql_select_db("fcms");
//Uncomment this section to check database connection
if ($db) {
	echo "Successful Connect to DB<br/>";
} else {
	die("fail");
}
if (isset($_REQUEST["eid"])) {
    $eid = $_REQUEST["eid"];
    $query = mysql_query("select * from orders where id='$eid'");
    $row = mysql_fetch_array($query);
}

if (isset($_REQUEST["submit"])) {
    $TrackingStatus = $_REQUEST["TrackingStatus"];
    mysql_query("update TrackingStatus = '$TrackingStatus' where id = '$eid'");
    header('location:OTUpdateOrders.php');
}
?>


<form method="post">
<table border="1" align="center">

<tr>
<td>Tracking Status:</td>
<td>
<select name = "TrackingStatus">
<option value = "">Select Any One</option>
<option value = "Invoice issued"

<?php if ($row["TrackingStatus"] == 'Invoice issued') {
    echo "selected";
} ?>

>Invoice issued</option>
<option value="Order confirmed"

<?php if ($row["TrackingStatus"] == 'Order confirmed') {
    echo "selected";
} ?>

>Order confirmed</option>
<option value="Event preparing"

<?php if ($row["TrackingStatus"] == 'Event preparing') {
    echo "selected";
} ?>

>Event preparing</option>
<option value="Event dismantled"

<?php if ($row["TrackingStatus"] == 'Event dismantled') {
    echo "selected";
} ?>

>Event dismantled</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="submit" name="submit"></td>
</tr>
</table>
</form>