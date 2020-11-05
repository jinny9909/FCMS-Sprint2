<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Account Creation Page"/>
    
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Client Create Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
        echo "<link rel='stylesheet' href='styles/ClientCheckout_Style.css'>";
    ?>
</head>

<body>
    <?php
        include 'include/ClientsNavBar.php';
    ?>
    
    <div class="signup-form">
        <form method="post">
            <div class="card text-white" style="width: 330px">   
                <div class="card-body">
                    <h2>Checkout Catering Order</h2>
                    <div class="form-group">
                        <div class="input-group">
                            <p>Phone number: </p>
                            <input type="tel" class="form-control" name="phone_number" placeholder="Phone number" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group text-right">
                            <p>Catering event number of people: </p>
                            <select id="inputPax" name="pax" class="form-control">
                                <option disabled selected value="">Choose a number of people</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <p>Catering event date and time: </p>
                            <input type="date" class="form-control" name="dateTime" required="required">
                        </div>
                    </div>
                </div>
            </div>

        <!--Catering order delivery address-->
        <div class="card text-white" style="width: 330px">
          <div class="card-header"><h3>Catering Event Venue</h3></div>
          <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="floor_unit" placeholder="Floor/Unit #" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="street_address" placeholder="Street address" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <select id="inputState" name="state" class="form-control" onclick="inputPax()">
                        <option disabled selected value="">Choose a state</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Sabah">Sabah</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <select id="inputState" name="city" class="form-control">
                        <option disabled selected value="">Choose a city</option>
                        <optgroup label = "Sarawak">
                            <option value="Kuching">Kuching</option>
                            <option value="Bintulu">Bintulu</option>
                            <option value="Kapit">Kapit</option>
                            <option value="Limbang">Limbang</option>
                            <option value="Miri">Miri</option>
                            <option value="Sarikei">Sarikei</option>
                            <option value="Sibu">Sibu</option>
                            <option value="Simanggang">Simanggang</option>
                            <option value="Sri Aman">Sri Aman</option>
                        </optgroup>

                        <optgroup label = "Sabah">
                            <option value="Kota Kinabalu">Kota Kinabalu</option>
                            <option value="Kudat">Kudat</option>
                            <option value="Lahad Datu">Lahad Datu</option>
                            <option value="Papar">Papar</option>
                            <option value="Putatan">Putatan</option>
                            <option value="Ranau">Ranau</option>
                            <option value="Sandakan">Sandakan</option>
                            <option value="Tawau">Tawau</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            </div>
        </div> 

        <div id="sessionDisplay">
            <?php  if(isset($_SESSION['cName']) && !empty($_SESSION['cName'])){?>
            <p>The selected catering package is: </br><?php echo $_SESSION['cName'];}?></p>

            <?php  if(isset($_SESSION['price']) && !empty($_SESSION['price'])){?>
            <p>Catering order total amount: <?php echo $_SESSION['price'];}?></p>
        </div>

        <div class="form-group">
            <button type="submit" name="submit_ordrCheckout" class="btn btn-primary btn-block btn-lg">Proceed to payment</button>
        </div>
        </form>
    </div>

    <!--Connect to order table-->
	<?php
		// Create database connection
		$db = mysqli_connect("localhost", "root", "", "fcms");
				
		//Uncomment this section to check database connection
		if($db){
			echo"Successful Connect to DB<br/>";
		}else{
			die("fail");
		}

		//Sanitise the input
		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		//Make sure user clicked the submit button
		if(isset($_POST['submit_ordrCheckout'])){

            $date = mysqli_real_escape_string($db, $_POST['dateTime']);

			$sql = "SELECT * FROM orders";
			$result = mysqli_query($db, $sql);
			$numRows = mysqli_num_rows($result);

			if($numRows > 0){
				echo "</br><b>".$numRows." Result Found!"."</b></br>";
				while($row = mysqli_fetch_assoc($result)){
					if($date == $row['OrderDate']){
						echo "Date clashed!";
					}
					else{
						echo "Date is available!";
					}
				}
			}else{
				echo "Table is empty";
			}
            

			/*$packageID = mysqli_real_escape_string($db, sanitise_input($_POST['OT_username']));
			$date = mysqli_real_escape_string($db, sanitise_input($_POST['OT_FacebookLink']));
			//$password = mysqli_real_escape_string($db, sanitise_input($_POST['OT_password']));

			$sql = "INSERT INTO orders (PackageID, TrackingStatus, OrderDate) VALUES ('$packageID', 0 , '$date')";*/
			// execute query
			if (mysqli_query($db, $sql)){
				echo"Successfully insert<br/>";	
			}else{
				echo"Failed to insert</br>";
			}
		}
		$db->close();
        session_destroy();
    ?>
</body>
</html>
