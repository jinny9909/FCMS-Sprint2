<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Profile Page"/>
    <title>My Profile</title>
   <!--link rel="stylesheet" href="ClientProfile_Style.css"-->

    <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
    <!-- Google Fonts -->
    <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"-->
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"-->
    <link rel='stylesheet' href='styles/ClientProfile_Style.css'>
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>
    <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script-->
</head>


<body>
    <?php
      include 'include/ClientsNavBar.php';

      $username = "";
      $phoneNumber = "";
      $email = "";
      $password = "";

      $clientID = "CL00000003";
      // connect to the database
      include 'backend/DatabaseConnect.php'; // global variables for connection
      $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
      $selectSQL = "SELECT MemberID, Username, PhoneNumber, Email, Password FROM clients WHERE ClientID='$clientID'";
      $result = $db->query($selectSQL);

      if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $username = $row['Username'];
        $memberID = $row['MemberID'];
        $phoneNumber = $row['PhoneNumber'];
        $email = $row['Email'];
        $password = $row['Password'];
      }

      // Sanitise the input
      function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // Make sure user clicked the submit button
      if(isset($_POST['updateProfile'])){
        $username = mysqli_real_escape_string($db, sanitise_input($_POST['userName']));
        $phoneNum = mysqli_real_escape_string($db, sanitise_input($_POST['phoneNum']));
        $emailAddrs = mysqli_real_escape_string($db, sanitise_input($_POST['email']));
        $password = mysqli_real_escape_string($db, sanitise_input($_POST['password']));

        $sql = "Update clients SET Username='$username', PhoneNumber='$phoneNum', Email='$emailAddrs', Password='$password' WHERE ClientID='CL00000003'";

            // execute query
        if (mysqli_query($db, $sql)){
          //echo"Successfully insert<br/>";
        }
        else{
          //echo"Failed to insert</br>";
        }
      }

      $db->close();
    ?>

    <!-- Edit Profile Information Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="editProfileModal">Edit and Update Profile Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="ClientProfile.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" name="phoneNum" id="phoneNum" value="<?php echo $phoneNumber; ?>">
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" id="password" value="<?php echo $password; ?>">
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="updateProfile" class="btn">Update and save changes</button>
             </div>
        </form>
        </div>
      </div>
    </div>
	  <div class="container-fluid d-flex justify-content-center">
        <div class=" col-md-10 mt-5 pt-5">
            <div class="row d-flex justify-content-center depth-3"><!--Center the content and put shadow-->
            	<div class="col-sm-8 " id="pInfo">
                 	<div class="col mx-auto">
        		        <div class="card-block text-center ">
                    		<h2 class="font-weight-bold mt-4"><?php echo $username; ?></h2>
                    		<p>Membership ID: <?php echo $memberID; ?></p>
                		</div>
            		</div>
                    <div class="col">
        		        <div class="card">
                    	    <h3 class="title2">Profile Information</h3>
                        	    <div>
                            	    <p class="font-weight-bold mt-3 mb-1">Phone Number:</p>
                           		    <h6 class="text-muted">+<?php echo $phoneNumber; ?></h6>
                        	    </div>
                        	    <div >
                            	    <p class="font-weight-bold mt-3 mb-1">Email Address:</p>
                           		    <h6 class="text-muted mb-3"><?php echo $email; ?></h6>
                        	    </div>
                        </div>
                        <div class="d-flex justify-content-center" id="editButton">
                            <button type="button" class="btn" id="editBtn" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
                        </div>
                    </div>
              	</div>
            </div>
        </div>
	</div>
</body>
</html>
