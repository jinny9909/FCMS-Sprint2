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
    <link rel="stylesheet" type="text/css" href="styles/All_Login.css">
</head>

<body>
    <?php
        include 'include/MTNavBar.php';
	?>
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
            </div>
        </form>
	</div>

    <div class="container">

        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Management Team</h3>
                    <h3>Sign in </h3>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                </div>
                <div class="card-body">

                    <form action="MTloginbackend.php" method="post">
                        <div class="form-group ">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="User Name" name="uname">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password" class="form-control" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn float-right login_btn">Login</button>
                            </div>
                    </form>
                </div>
                <div class="card-footer">

                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>