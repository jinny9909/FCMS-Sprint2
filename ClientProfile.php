<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Profile Page"/>
    <title>My Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='styles/ClientProfile_Style.css'>
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>
</head>


<body>
    <?php
        include 'include/ClientsNavBar.php';
        // connect to the database
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
        $clientID = "CL00000004";
         //Uncomment this section to check database connection
		/*if($db){
			echo"Successful Connect to DB<br/>";
		}else{
			die("fail");
		}*/

        //Sanitise the input
		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

        //Make sure user clicked the submit button
		if(isset($_POST['updateProfile'])){
			$username = mysqli_real_escape_string($db, sanitise_input($_POST['userName']));
			$phoneNum = mysqli_real_escape_string($db, sanitise_input($_POST['phoneNum']));
			$emailAddrs = mysqli_real_escape_string($db, sanitise_input($_POST['email']));
            $password = mysqli_real_escape_string($db, sanitise_input($_POST['password']));

            $target_dir = "images/ProfilePicture/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if (file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                } else {
                     echo "File is not an image.";
                $uploadOk = 0;
                }
            
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
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
                        //unlink("$profilePic"); //delete the old image
                        $sql = "Update clients SET PicturePath ='$newImage' WHERE ClientID='$clientID'";
                        // execute query
			            if (mysqli_query($db, $sql)){
                            echo "The file "."$newImage". " has been uploaded.";
			            }
                    } else {
                         echo "Sorry, there was an error uploading your file.";
                    }
                }
			}
            
			$sql = "Update clients SET Username='$username', PhoneNumber='$phoneNum', Email='$emailAddrs', Password='$password' WHERE ClientID='$clientID'";

        	// execute query
			if (mysqli_query($db, $sql)){
				echo"Successfully insert<br/>";
			}else{
				//echo"Failed to insert</br>";
			}
		}

        $user_Name = "";
        $phone_Number = "";
        $member_ID = "";
        $email_address = "";
        $passWord = "";
        $profile_Pic = "";
        $selectSQL = "SELECT MemberID, PicturePath, Username, PhoneNumber, Email, Password FROM clients WHERE ClientID='$clientID'";
        $result = $db->query($selectSQL);

         if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $user_Name = $row['Username'];
            $member_ID = $row['MemberID'];
            $phone_Number = $row['PhoneNumber'];
            $email_address = $row['Email'];
            $passWord = $row['Password'];
            $profile_Pic = $row['PicturePath'];
         }
      
        $db->close();
    ?>
    
	<div class="container-fluid d-flex justify-content-center">
        <div class=" col-md-10 my-5 py-5">
            <div class="row d-flex justify-content-center depth-3"><!--Center the content and put shadow-->
            	<div class="col-sm-8 " id="pInfo">
                 	<div class="col mx-auto">
        		        <div class="card-block text-center ">
                            <div class="text-center">
                                <img src="<?php echo $profile_Pic; ?>" width="300" height="300" class="rounded-circle mt-3" alt="Profile Picture">
                            </div>

                    		<h2 class="font-weight-bold mt-4"><?php echo $user_Name; ?></h2>
                    		<p>Membership ID: <?php echo $member_ID; ?></p>
                		</div>
            		</div>
                    <div class="col">
        		        <div class="card">
                    	    <h3 class="title2">Profile Information</h3>
                        	<div>
                            	<p class="font-weight-bold mt-3 mb-1">Phone Number:</p>
                           		<h6 class="text-muted">+<?php echo $phone_Number; ?></h6>
                        	</div>
                        	<div >
                            	<p class="font-weight-bold mt-3 mb-1">Email Address:</p>
                           		<h6 class="text-muted mb-3"><?php echo $email_address; ?></h6>
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

                  <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        
                    <div class="form-group">
                        <p>Update Profile Picture</p>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                        
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $user_Name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" name="phoneNum" id="phoneNum" value="<?php echo $phone_Number; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email_address; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="<?php echo $passWord; ?>">
                    </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="updateProfile" class="btn">Update and save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
