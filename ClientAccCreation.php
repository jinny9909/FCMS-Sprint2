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
        //include 'include/NavBarStyle.php';
    ?>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Client Create Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
        echo "<link rel='stylesheet' href='styles/ClientAccCreation_Style.css'>";
    ?>
</head>

<body>
    <?php
        //include 'include/ClientsNavBar.php';
    ?>
    
    <div class="signup-form">
        <form method="post">
            <div class="card text-white" style="width: 330px">
                <div class="card-body">
                    <h2>Create Client Account</h2>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                                <i class="fa fa-check"></i>
                            </span>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control" name="phone_number" placeholder="Phone number" required="required">
                    </div>
                </div>
            </div>

        <!--Personal details card->
        <div class="card text-white" style="width: 330px">
          <div class="card-header"><h3>Personal Details</h3></div>
          <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="tel" class="form-control" name="phone_number" placeholder="Phone number" required="required">
                </div>
            </div->


            <!--Address-->
            <!--div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </span>
                    <input type="text" class="form-control" name="floor_unit" placeholder="Floor/Unit #" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-home"></i>
                    </span>
                    <input type="text" class="form-control" name="street_address" placeholder="Street address" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-building"></i>
                    </span>
                    <input type="text" class="form-control" name="city" placeholder="City" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-building"></i>
                    </span>
                    <select id="inputState" name="state" class="form-control">
                        <option selected value="">Choose a state</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Petaling Jaya">Petaling Jaya</option>
                        <option value="Kuala Terengganu">Kuala Terengganu</option>
                        <option value="Seremban">Seremban</option>
                        <option value="Subang Jaya">Subang Jaya</option>
                        <option value="Shah alam">Shah alam</option>
                        <option value="George Town">George Town</option>
                        <option value="Alor Setar">Alor Setar</option>
                        <option value="Ipoh">Ipoh</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Johor Bahru">Johor Bahru</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-building"></i>
                    </span>
                    <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" required="required">
                </div>
            </div>
          </div>
        </div-->

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="membershipCheckBox" name="createMembership">
                <label class="custom-control-label" for="membershipCheckBox">Apply a membership account for RM 10.00</label>
            </div>

            <div class="form-group">
                <button type="submit" name="signUp" class="btn btn-primary btn-block btn-lg">Sign Up</button>
            </div>

            <div class="text-center">Already have an account? <a href="#">Login here</a>.</div>

            <p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp; Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
        </form>
    </div>

    <!--Insert a new client account-->
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
		if(isset($_POST['signUp'])){
            $memberID = rand(1,200);
            if(isset($_POST['createMembership'])){
                $point = 0;
                $sql1 = "INSERT INTO member (member_ID,member_point) VALUES ('$memberID','$point')";
                // execute query
			    if (mysqli_query($db, $sql1)){
				    echo"<br/>Successfully insert member<br/>";	
			    }else{
				    echo"<br/>Failed to insert member</br>";
			    }
            }

            //Escape special characters for $db connection
			$username = mysqli_real_escape_string($db, sanitise_input($_POST['username']));
            $email = mysqli_real_escape_string($db, sanitise_input($_POST['email']));
            $password = mysqli_real_escape_string($db, sanitise_input($_POST['password']));
            $phoneNum = mysqli_real_escape_string($db, sanitise_input($_POST['phone_number']));
            //$address = mysqli_real_escape_string($db, sanitise_input($_POST['floor_unit'].$_POST['street_address'].$_POST['city'].$_POST['state'].$_POST['zip_code']));

            $sql2 = "INSERT INTO client (ClientID, Username, Email, Password, PhoneNumber) VALUES ('$clientID','$username', '$email','$password', '$phoneNum')";
			// execute query
			if (mysqli_query($db, $sql2)){
				echo"<br/>Successfully insert<br/>";	
			}else{
				echo"<br/>Failed to insert</br>";
			}
		}
		$db->close();
    ?>
</body>
</html>
