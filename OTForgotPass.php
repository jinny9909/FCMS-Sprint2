<?php
include 'OTdb.php';
$error = false;
$string = "";
//check submit
if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $db = user($username);
    $rows = mysqli_num_rows($db);

    //check is there username in database
    if ($rows != 0) {
        while ($row = mysqli_fetch_assoc($db)) {
            $db_email = $row['Email'];
        }

        //check input email similiar with email in database
        if ($email == $db_email) {
            // make random code
            $code = '13372387foodedgeGourMatesAREthebestCateringManagementSystem1234567890';
            $code = str_shuffle($code);
            $code = substr($code, 0, 10);

            // for send token
            $linktoreset = "http://foodedge-asia.rf.gd/OTUpdatePassword.php?code=$code&username=$username";
            $to = $db_email;
            $title = "passwrod reset";
            $emailcontent = "this is automatic email, dont repply. For reset your password please click this link " . $linktoreset;
            $headers = "From: FoodEdge Gourmate" . "\r\n";
            mail($to, $title, $emailcontent, $headers);

            //echo $linktoreset;
            
            if (update_token($code, $username)) {
                $error = true;
                echo $string = "Your password have reset! Please check your mail";
            } else {
                $error = true;
                echo $string = "Please try again";
            }
        } else {
            $error = true;
            echo $string = "Your email didn't register in our system";
        }
    } else {
        $error = true;
        echo $string = "Your username didn't register in our system";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>OT Forget Password</title>
</head>
<link rel="stylesheet" type="text/css" href="styles/AllLogin.css">
<?php
include 'include/NavBarStyle.php';
?>
</head>

<body>
    <div class="signup-form" id="login" style="margin-top: 110px;">
        <div class="card" style="width: 330px">
            <div class="card-body">
                <h3 style="margin-bottom:20px;">Operation Team Forget Password</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="Username" placeholder="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="Email" placeholder="email" class="form-control">
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg">

                </form>
                <?php
                if ($error) {
                    echo "<div class='alert alert-danger'>$string";
                    $error = false;
                }  ?>
            </div>
        </div>
    </div>
    <?php include 'include/OTfooter.php'; ?>
</body>



</html>