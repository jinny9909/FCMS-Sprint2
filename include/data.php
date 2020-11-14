<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","fcms");

$sqlQuery = "SELECT orders.NumPeople*catering_package.PricePerPax as Price, orders.OrderDate FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
