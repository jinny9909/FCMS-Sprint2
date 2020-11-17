<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet"type="text/css" href="styles/OTCateringPackage1.css">
  
  <title>OT | Catering Menu</title>
  <?php
    include 'include/NavBarStyle.php';
    include 'include/StringPath.php';
  ?>
</head>

<body>
  <?php
    include 'include/OTNavBar.php';
  ?>
  <div >
  <div class="container" style="margin-top: 90px;">
    <h1 class="text-center">Catering Menu</h1>
  </div>
  <?php
		// Create database connection
		$db = mysqli_connect("localhost", "root", "", "fcms");
		//Uncomment this section to check database connection
		if ($db) {
			//echo "Successful Connect to DB<br/>";
		} else {
			die("fail");
		}
		$sql = "SELECT PackageID, PackageName, PackageDescription, PricePerPax, ImagePath from catering_package";
		$result=$db-> query($sql);
		if ($result-> num_rows >0){
			while ($row = $result-> fetch_assoc()){
	?>
  <div class="container" >
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="product-grid2">
          <div class="product-image2">
            <a href="OTCateringPackage2.php"> <img class="pic-1" src=<?php echo $row["ImagePath"]; ?>> </a>
          </div>
          <div class="product-content">
            <button type="button" class="btn btn-secondary badge-pill " id="btn_edit"><a href="OTCateringPackage2.php?eid=<?php echo $row["PackageID"] ?>">Edit <?php echo $row["PackageID"]; ?></a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
			}						
		}
		else{
			echo "0 result";
		}
		$db-> close();
	?>
</body>

</html>