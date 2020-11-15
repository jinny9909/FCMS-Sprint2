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

    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">-->
    <title>Client Create Account</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link rel='stylesheet' href='styles/ClientRewardCheckout.css'>"


</head>

<body>
    <?php
    include 'include/ClientsNavBar.php';
    ?>

    <div class="signup-form" style="margin-top: 110px;">
        <form method="post">
            <div class="card" style="width: 330px">
                <div class="card-body">
                    <h3 style="margin-bottom:20px;">Redeem Reward Address Details</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address1" placeholder="Address1" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address2" placeholder="Address2" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="address3" placeholder="Address3" required="required">
                        </div>
                    </div>
                </div>
                <footer class="bg-secondary text-white fixed-bottom" id="footermain">
                    <div id="footerimage">
                        <div class="container py-12">
                            <div class="row text-center">
                                <div class="col-lg-12 text-white">
                                    <h4 class="text-white">About Us</h4>
                                    <p class="text-white"> 082-8865234</p>
                                    <p class="text-white">enquiry@foodedge.com</p>
                                    <p class="text-white">Jalan Song</p>
                                    <p class="text-white">Kuching, Sarawak, Malaysia</p>
                                </div>
                            </div>
                            <div class="container-fluid text-center bg-secondary fixed-bottom">
                                <h4 class="copyright text-white">&copy; 2020. All right are Reserved by FoodEdge Gourmate</h4>
                            </div>
                        </div>

                    </div>



                </footer>

</body>

</html>