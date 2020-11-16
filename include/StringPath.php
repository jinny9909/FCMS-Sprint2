<?php
// connect to the database
include 'backend/DatabaseConnect.php'; // global variables for connection
$db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
$sql = "SELECT * FROM catering_package";
$result = $db->query($sql);

// store data for packageA
$row = $result->fetch_assoc();
$name_packageA = $row["PackageName"];
$descr_packageA = $row["PackageDescription"];
$price_packageA = $row["PricePerPax"];
$image_packageA = $row["ImagePath"];

// store data for packageB
$row = $result->fetch_assoc();
$name_packageB = $row["PackageName"];
$descr_packageB = $row["PackageDescription"];
$price_packageB = $row["PricePerPax"];
$image_packageB = $row["ImagePath"];

// store data for packageC
$row = $result->fetch_assoc();
$name_packageC = $row["PackageName"];
$descr_packageC = $row["PackageDescription"];
$price_packageC = $row["PricePerPax"];
$image_packageC = $row["ImagePath"];

// close db
$db->close();
?>