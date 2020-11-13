<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <title>MT Login</title>
    <?php
        include 'include/NavBarStyle.php';
       include 'MTloginbackend.php';
        
    ?>
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles/AllLogin.css">
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
</body>



</html>