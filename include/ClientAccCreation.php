﻿<!DOCTYPE html>

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
    
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">-->
    <title>Client Create Account</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link rel='stylesheet' href='styles/ClientAccCreation_Style.css'>"


</head>

<body>
    <?php
        include 'include/ClientsNavBar.php';
        include 'include/NewID.php';
        //Insert a new client account	
        // connect to the database
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
				
		//Uncomment this section to check database connection
		if($db){
			//echo"Successful Connect to DB<br/>";
		}else{
			//die("fail");
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
            //Escape special characters for $db connection
			$username = mysqli_real_escape_string($db, sanitise_input($_POST['username']));
            $email = mysqli_real_escape_string($db, sanitise_input($_POST['email']));
            $password = mysqli_real_escape_string($db, sanitise_input($_POST['password']));
            $phoneNum = mysqli_real_escape_string($db, sanitise_input($_POST['phone_number']));   
            $newClientID = newID('clients');
            
            $sql2 = "INSERT INTO clients (ClientID, Status, Username, Email, ImagePath, Password, PhoneNumber) VALUES ('$newClientID', 1 ,'$username', '$email', 'images\ProfilePicture\defaultProfile.png','$password', '$phoneNum')";
            // execute query
			if (mysqli_query($db, $sql2)){
				//echo"<br/>Successfully insert<br/>";	
			}else{
				//echo"<br/>Failed to insert</br>";
			}


            /*$target_dir = "images/ProfilePicture/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $img = "";
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));*/

            //if (file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){

                // Check if image file is a actual image or fake image
                /*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                } else {
                     echo "File is not an image.";
                $uploadOk = 0;
                }
            
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
                    $newImage = 'images/ProfilePicture/'."$username". '.' . end($temp);
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newImage)) {
                        //$img = $newImage;
                         $sql = "Update clients SET ImagePath ='$newImage' WHERE ClientID='$newClientID'";
                        // execute query
			            if (mysqli_query($db, $sql)){
                            echo "The file "."$newImage". " has been uploaded.";
			            }
                    } else {
                         echo "Sorry, there was an error uploading your file.";
                    }
                }*/
			//}

            if(isset($_POST['createMembership'])){
                $point = 0;
                $newMemberID = newID('members');
                $sql1 = "INSERT INTO members (MemberID,ClientID,MemberPoint) VALUES ('$newMemberID','$newClientID','$point')";
                // execute query
			    if (mysqli_query($db, $sql1)){
                    header('Location:ClientMembershipPayment.php');
				    //echo"<br/>Successfully insert member<br/>";	
			    }
            }else{
                header('Location:ClientHome.php');
				//echo"<br/>Failed to insert member</br>";
			}

		}
		$db->close();
    ?>
    
    <div class="signup-form" style="margin-top: 110px;">
        <form method="post" action="ClientAccCreation.php">
            <div class="card" style="width: 330px">
                <div class="card-body">
                    <h3 class="mb-4">Create Client Account</h3>
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

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="tel" class="form-control" name="phone_number" placeholder="Phone number" required="required">
                    </div>

                     <!--div class="card mt-4 mb-0" >
                            <div class="text-secondary bg-white card-header py-0">
                                <h6 >Upload Profile Picture</h6>
                            </div>
                            <div class="card-body py-0 mt-2">
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                            </div>
                    </div-->
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="membershipCheckBox" name="createMembership">
                <label class="custom-control-label" for="membershipCheckBox">Apply a membership account for RM 10.00</label>
            </div>

            <div class="form-group">
                <button type="submit" name="signUp" class="btn btn-primary btn-block btn-lg">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>