<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/ordersClient.css">
    <title>CRUD Catering Packages</title>
    <?php
        include 'include/NavBarStyle.php';
        include 'include/StringPath.php';
    ?>
</head>
<body>
    <?php
        include 'include/OTNavBar.php';
    ?>
	
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
			$query =("SELECT * from catering_package where PackageID='$eid'");
			$row = ($query);
		}

	?>

    <div class="container jumbotron" style="margin-top: 100px;">
		<?php
			$sql = "SELECT PackageName, PackageDescription, PricePerPax, ImagePath from catering_package where PackageID='$eid'";
			$result=$db-> query($sql);
			$row = $result-> fetch_assoc();
			$packageName = $row['PackageName'];
			$packagePrice = $row['PricePerPax'];
			$packageDesc = $row['PackageDescription'];
		?>
        <h1 class="text-center"><?php echo $row['PackageName']; ?></h1>
        <hr class="hr">
		
        <form method="post">
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <input type="image" class="img-fluid rounded img-thumbnail" src=<?php echo $row['ImagePath']; ?> alt="Upload Image" width="200px" height="200px">
                </div>
                <div class="col-md-10 col-sm-8">
                    <div class="form-group">
                        <label for="packageName">Catering Package Name</label>
                        <input name = "package_name" type="text" class="form-control" id="packageName" 
                        value="<?php echo $packageName; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pr">Package Price Per Person</label>
                        <input name = "package_price" type="text" class="form-control" id="packagePrice" 
                        value="<?php echo $packagePrice; ?>">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row-md-12">
                <div class="form-group">
                    <label for="pr">Description</label>
                    <input name = "package_desc" type="text" class="form-control" id="packageDesc" 
                    value="<?php echo $packageDesc; ?>">
                </div>
            </div>
			<p>Food and beverages</p>
			<?php
				// Create database connection
				$db = mysqli_connect("localhost", "root", "", "fcms");
				//Uncomment this section to check database connection
				if ($db) {
					//echo "Successful Connect to DB<br/>";
				} else {
					die("fail");
				}
				$sql = "SELECT FoodName from food";
				$result=$db-> query($sql);
							
				if ($result-> num_rows >0){
					while ($row = $result-> fetch_assoc()){
				?>	
            <div class="row-md-12">
                
                <div class="checkbox">
                    <input type="checkbox" id="food1" value="food1"><label for="food1" style="padding-left: 10px;"><?php echo $row['FoodName']; ?></label>
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
			<input type="submit" value="submit" name="submit">
        </form>
		<?php
		if(isset($_POST['submit'] )){
		echo "abc";
		$packageName = mysqli_real_escape_string($db, $_POST['PackageName']);
		$sql1 = " Update catering_package SET PackageName = '$packageName' WHERE PackageID = '$eid'";
		if (mysqli_query($db, $sql1)){
            echo"Successfully insert<br/>";
        }else{
            echo"Failed to insert</br>";
        }
		
		$packagePrice = mysqli_real_escape_string($db, $_POST['PricePerPax']);
		$sql2 = " Update catering_package SET PricePerPax = '$packagePrice' WHERE PackageID = '$eid'";
		if (mysqli_query($db, $sql2)){
            echo"Successfully insert<br/>";
        }else{
            echo"Failed to insert</br>";
        }
		$packageDesc = mysqli_real_escape_string($db, $_POST['PackageDesc']);
		$sql3 = " Update catering_package SET PackageDesc = '$packageDesc' WHERE PackageID = '$eid'";
		if (mysqli_query($db, $sql3)){
            echo"Successfully insert<br/>";
        }else{
            echo"Failed to insert</br>";
        }
	}
?>
    </div>
</body>
</html>