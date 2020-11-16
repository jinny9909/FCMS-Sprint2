<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao" />
    <meta name="description" content="Client Reward 2 Page" />

    <!-- navbar css -->
    <?php
    include 'include/NavBarStyle.php';
    ?>

    <title>Reward Redeem Details</title>
    <link rel='stylesheet' href='styles/ClientRewardRedeem_Style.css'>
</head>

<body>
    <?php
    session_start();
    include 'include/ClientsNavBar.php';

    $itemName = $_SESSION['itemName'];
    $itemID = $_SESSION['itemID'];
    $memberID = $_SESSION['membershipID'];


    // Create database connection
    include 'backend/DatabaseConnect.php'; // global variables for connection
    $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

    //Uncomment this section to check database connection
    /*if($db){
			echo"Successful Connect to DB<br>";
		}else{
			die("fail");
		}*/

    //Sanitise the input
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Make sure user clicked the submit button
    if (isset($_POST['submitRedeem'])) {

        $floor = mysqli_real_escape_string($db, sanitise_input($_POST['floorUnit']));
        $addrs = mysqli_real_escape_string($db, sanitise_input($_POST['streetAddress']));
        $state = mysqli_real_escape_string($db, sanitise_input($_POST['state']));
        $city = mysqli_real_escape_string($db, sanitise_input($_POST['city']));
        $pCode = mysqli_real_escape_string($db, sanitise_input($_POST['postCode']));

        $sumAddress = $floor . $addrs . $pCode . $state . $city;

        $sql = "INSERT INTO client_reward (ItemID, MembershipID, RewardAddress) VALUES ('$itemID', '$memberID' , '$sumAddress')";
        // execute query
        mysqli_query($db, $sql);
        /* echo "<script> alert('Reward successfully redeemed! Tracking ID: GRC105964395MY'); </script>";
			}else{
                echo "<script> alert('Wrong Input'); </script>";
			}*/
    }
    $db->close();
    ?>

    <div class="container mt-5 pt-5">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header" id="cardTitle">
                    <h5 class=" font-weight-bold d-flex justify-content-center">Provide your shipping details to redeem the item</h5>
                    <p class="text-center mb-0">Reward Item Name: <b><?php echo $itemName; ?><b></p>
                </div>

                <div class="card-body mb-0 pb-0">
                    <form method="post" action="ClientHome.php">
                        <div class="form-group">

                            <div class="form-group">
                                <label>Floor/Unit#</label>
                                <input type="text" class="form-control" placeholder="eg: No. 26 / Block A 11-13" name="floorUnit" id="userName" required="required">
                            </div>

                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="tel" class="form-control" placeholder="eg: Jalan Song, Taman Ceria" name="streetAddress" id="phoneNum" required="required">
                            </div>

                            <div class="form-group">
                                <label>Post Code</label>
                                <input type="text" class="form-control mx-auto" name="postCode" placeholder="eg: 90300" required="required">
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <select id="inputState" name="state" class="form-control" required="required">
                                    <option disabled selected value="">Choose a state</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Sabah">Sabah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <select id="inputState" name="city" class="form-control" required="required">
                                    <option disabled selected value="">Choose a city</option>
                                    <optgroup label="Sarawak">
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

                                    <optgroup label="Sabah">
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
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="submitRedeem" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>