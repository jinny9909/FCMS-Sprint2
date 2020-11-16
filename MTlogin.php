<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <title>MT Login</title>
    <?php
    include 'include/NavBarStyle.php';
    ?>
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles/AllLogin.css">
</head>

<body>
    <?php
    include 'include/MTNavBar.php';
    ?>
    <?php
    $error=false;
 
    $sname ="sql103.epizy.com";
    $unmae = "epiz_26969817";
    $password = "8tcX2yGy4HPkCx";
    $db_name = "epiz_26969817_FCMS";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    session_start();

    if (!$conn) {
        echo "Failed to connect MT table";
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['username']);
        $pass = validate($_POST['password']);
        $error = false;

        if (empty($uname)) {
            header("Location: MTlogin.php?error=User Name is required");
            exit();
        } else if (empty($pass)) {
            header("Location: MTlogin.php?error=Password is required");
            exit();
        } else {
            $sql = "SELECT * FROM `mtaccount` WHERE user_name='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['user_name'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: MThomePage.php");
                    exit();
                } else {

                    $error = true;
                }
            } else {
                $error = true;
            }
        }
    } ?>


    <div class="signup-form" style="margin-top: 110px;">
        <form method="post" action="MTlogin.php">
            <div class="card" style="width: 330px">
                <div class="card-body">
                    <h3 style="margin-bottom:20px;">Management Team Login</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">Login</button>
                <div class="text-center"> <a href="MTForgotPass.php">Forgotten password ? </a></div>
            </div>
        </form>
        <?php
            if ($error) {
                echo "<div class='alert alert-danger'>You have entered an incorrect username or password, Please try again!</div>";
            }  
        ?>
    </div>
</body>



</html>