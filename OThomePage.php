<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>OT Homepage</title>

    <!-- Custom styles for this template -->
    <link href="styles/MT_homePage.css" rel="stylesheet">
    <link href="styles/all.min.css" rel="stylesheet">

    <?php
    include 'include/NavBarStyle.php';
    ?>

    <style>
        html {
            min-height: 100%;
        }
    </style>
</head>

<body style="background-image: url(images/3.jpg);background-position: center;padding-top: 50px; background-size:cover;">

    <?php
    include 'include/OTNavBar.php';
    include 'include/StringPath.php';
    ?>

    <section id="function">
        <div class="container">
            <div class="row center justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="http://foodedge-asia.rf.gd/OTCateringPackage1.php">
                            <div class="upper">
                                <i class="fas fa-list icon"></i>
                            </div>
                            <div class="lower">
                                <span>Edit Menu</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="http://foodedge-asia.rf.gd/OTFoodAndBeverages.php">
                            <div class="upper">
                                <i class="far fa-edit icon"></i>
                            </div>
                            <div class="lower">
                                <span>Edit Food and Beverage Name</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="http://foodedge-asia.rf.gd/OTTransactions.php">
                            <div class="upper">
                                <i class="fas fa-file-invoice-dollar icon"></i>
                            </div>
                            <div class="lower">
                                <span>Transaction</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="http://foodedge-asia.rf.gd/OTUpdateOrders.php">
                            <div class="upper">
                                <i class="fas fa-pen-alt icon"></i>
                            </div>
                            <div class="lower">
                                <span>Update Orders</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/OTfooter.php'; ?>
</body>

</html>