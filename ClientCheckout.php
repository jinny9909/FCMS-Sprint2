<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Checkout Page"/>
    <!--link rel='stylesheet' href='styles/ClientCheckout_Style.css'-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-datetimepicker.min.css">

    <title>Checkout Order</title>
    <style>
        body {
            background: #a9927d !important;
            font-family: 'Quebec Serial Bold', sans-serif;
        }

        #chkOutBtn {
            margin-bottom: 10px;
            margin-bottom: 30px;
            font-size: 18px !important;
            color: white !important;
            background-color: #49111C !important;
        }

        #cardHeader {
            background-color: #5E503F !important;
            color: white !important;
        }
    </style>
    
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>

</head>

<body>
    <?php
        session_start();
        include 'include/ClientsNavBar.php';
        include 'include/NewID.php';

       //$clientID = $_SESSION['clientID'];
        $packageID = $_SESSION['packageID'];
        $packagePrice = $_SESSION['packagePrice'];
        //$clientID = $_SESSION['clientID'];
        $clientID = "CL00000002";
        //$packageID = "CP00000001";
        //$packagePrice = "20";
		// Create database connection
		$db = mysqli_connect("localhost", "root", "", "fcms");
		$displayString = "";
        $noError = 0;
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
            $date = mysqli_real_escape_string($db, sanitise_input($_POST['datePicker']));
            $time = mysqli_real_escape_string($db, sanitise_input($_POST['timePicker']));
            $numPeople = mysqli_real_escape_string($db, sanitise_input($_POST['pax']));
            $floor = mysqli_real_escape_string($db, sanitise_input($_POST['floor_unit']));
            $addrs = mysqli_real_escape_string($db, sanitise_input($_POST['street_address']));
            $state = mysqli_real_escape_string($db, sanitise_input($_POST['state']));
            $city = mysqli_real_escape_string($db, sanitise_input($_POST['city']));
            $pCode = mysqli_real_escape_string($db,sanitise_input($_POST['postCode']));
            $sumAddress = $floor.$addrs.$pCode.$state.$city;

			$sql = "SELECT * FROM orders";
			$result = mysqli_query($db, $sql);
			$numRows = mysqli_num_rows($result);

			if($numRows > 0){
				echo "</br><b>".$numRows." Result Found!"."</b></br>";
				while($row = mysqli_fetch_assoc($result)){
                    if($date == $row['OrderDate'] && $time == date("H:i",strtotime($row['OrderTime']))){
                       echo "<script> alert('Time clashed on the same day please reselect!'); </script>";
					    $noError=1;
                    }
				}
			}

            $newOrderID = newID('orders');
		    $createOrderSql = "INSERT INTO orders (OrderID, ClientID, PackageID, NumPeople, DeliveryAddress, TrackingID, OrderDate, OrderTime) VALUES ('$newOrderID', '$clientID', '$packageID', '$numPeople', '$sumAddress', 0, '$date' , '$time')";
			// execute query
			if (mysqli_query($db, $createOrderSql)){
                $displayString."Successfully insert<br/>";
                $_SESSION['orderPrice'] = $packagePrice*$numPeople; 
                $_SESSION['gainedPoints'] = $packagePrice*$numPeople/10;
                $_SESSION['orderID'] = $newOrderID;
                header('Location:ClientInvoice.php');
                //echo "<script> alert($displayString); </script>";
			}else{
                $displayString."Failed to insert</br>";
                //echo "<script> alert($displayString); </script>";
			}
		}
		$db->close();
    ?>

   <div class="container mt-5 pt-5">
   <div class="jumbotron pb-3 mb-3">
        <form method="post" action="ClientCheckout.php">
            <div class="card">
                <div class="card-header text-center" id="cardHeader">
                    <h2><b>Checkout Catering Order</b></h2>   
                </div>
                <div class="card-body mb-0 pb-0 ">
                    <h3 class="text-center"><b>Catering Order Basic Details</b></h3>    
                    <!--div class="form-group">
                        <label>Phone number: </label>
                        <input type="tel" class="form-control mx-auto" name="phone_number" placeholder="Phone number" required="required">
                    </div-->

                    <div class="form-group">
                        <label>Catering event number of people: </label>
                        <select id="inputPax"  onchange=" getPaxValue()" name="pax" class="form-control mx-auto">
                            <option disabled selected value="">Choose Serving Pax</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                        </select>
                        <small id="paxHelp" class="form-text text-muted">Select the number of people which is within your range</small>
                    </div>

                    
                    <div class="form-group">
                        <label for="datePicker">Catering event date: </label>
                        <!--input type="text" class="form-control mx-auto" id="datetimepicker" name="date" required="required"-->
                        <div class="input-group date" id="datePicker">
                            <input type="text" class="form-control"  name="datePicker" required="required">
                            <div class="input-group-addon input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <!--label>Catering event time: </label>
                        <input type="time" class="form-control mx-auto" name="time" required="required"-->
                        <label for="timePicker">Catering event time: </label>
                        <div class="input-group date" id="timePicker">
                            <input type="text" class="form-control" name="timePicker" required="required" >
                            <div class="input-group-addon input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Catering order delivery address-->
            <div class="card mt-3" >
                <div class="card-body">
                    <h3 class="text-center"><b>Catering Event Venue</b></h3>
                    <div class="form-group">
                        <label>Floor/Unit#</label>
                        <input type="text" class="form-control mx-auto" name="floor_unit" placeholder="eg: No. 26 / Block A 11-13" required="required">
                    </div>

                    <div class="form-group">
                        <label>Street address</label>
                        <input type="text" class="form-control mx-auto" name="street_address" placeholder="eg: Jalan Song, Taman Ceria" required="required">
                    </div>

                    <div class="form-group">
                        <label>Post Code: </label>
                        <input type="text" class="form-control mx-auto" name="postCode" placeholder="eg: 90300" required="required">
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <select id="inputState" name="state" class="form-control mx-auto" onclick="inputPax()">
                            <option disabled selected value="">Choose a state</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Sabah">Sabah</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <select id="inputState" name="city" class="form-control mx-auto">
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

            <div>
                <?php  if(isset($_SESSION['packageName']) && !empty($_SESSION['packageName'])){?>
                <p>The selected catering package is: <b></br><?php echo $_SESSION['packageName'];}?></b></p>

                <?php  if(isset($_SESSION['packagePrice']) && !empty($_SESSION['packagePrice'])){?>
                <p>Price per pax: <b>RM <?php echo $_SESSION['packagePrice'];}?>.00</b></p>

                <p id="totalAmt" onchange=" getPaxValue()">Total price for catering order: </p>
            </div>

            <div class="form-group mt-5">
                <button id="chkOutBtn" type="submit" name="submit_ordrCheckout" class="btn btn-block btn-lg"><b>Proceed to payment</b></button>
            </div>
        </form>
    </div>
    </div>
    
    <!--datetimepicker-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                }
            });
        });

        function getPaxValue(){
            var value = document.getElementById("inputPax").value;
            price = <?php echo $packagePrice; ?>;
            totalAmount = value*price;
            document.getElementById("totalAmt").innerHTML = "Total price for catering order: <b>RM "+totalAmount+".00</b>";
		}
    </script>

    <!--set the time format to 24 hour-->
    <script type="text/javascript">
        $(function () {
            $('#datePicker').datetimepicker({
				format: 'YYYY-MM-DD',
				ignoreReadonly: true
            });
        });
        $(function () {
            $('#timePicker').datetimepicker({
				format: 'HH:mm',
				ignoreReadonly: true
            });
        });
    </script>
</body>
</html>
