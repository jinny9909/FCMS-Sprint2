<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles/OTCateringPackage1.css">

  <title>OT | Catering Menu</title>
  <?php
  include 'include/NavBarStyle.php';

  ?>
</head>

<body>
  <?php
  include 'include/OTNavBar.php';
  ?>
  <div>
    <div class="container" style="margin-top: 90px;">
      <h1 class="text-center">Catering Menu</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="product-grid2">
            <div class="product-image2">
              <a href="OTCateringPackage2.php"> <img class="pic-1" src="images/packages/packageA.jpg"> </a>
            </div>
            <div class="product-content">
              <button type="button" class="btn btn-secondary badge-pill " id="btn_edit"><a href="OTCateringPackage2.php?eid=<?php echo $row["PackageID"] ?>">Edit <?php echo $name_packageA ?></a></button>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="product-grid2">
            <div class="product-image2">
              <a href="OTCateringPackage2.php?eid=<?php echo $row["PackageID"] ?>"> <img class="pic-1" src="images/packages/PackageB.jpg"> </a>
            </div>
            <div class="product-content">
              <button type="button" class="btn btn-secondary badge-pill " id="btn_edit"><a href="OTCateringPackage2.php">Edit <?php echo $name_packageB ?></a></button>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="product-grid2">
            <div class="product-image2">
              <a href="OTCateringPackage2.php"> <img class="pic-1" src="images/packages/PackageC.jpg"> </a>
            </div>
            <div class="product-content">
              <button type="button" class="btn btn-secondary badge-pill " id="btn_edit"><a href="OTCateringPackage2.php?eid=<?php echo $row["PackageID"] ?>">Edit <?php echo $name_packageC ?></a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'include/OTfooter.php'; ?>
</body>

</html>