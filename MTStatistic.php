<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>MT Homepage</title>

  <!-- Custom styles for this template -->
  <link href="styles/MT_homePage.css" rel="stylesheet">
  <link href="styles/all.min.css" rel="stylesheet">

  <?php
        include 'include/NavBarStyle.php';
  ?>

<style>
html{
    min-height:100%;
}
</style>
</head>

<body style="background-image: url(images/2.jpg);background-position: center;padding-top: 50px;">

    <?php
        include 'include/MTNavBar.php';
        include 'include/StringPath.php';
    ?>

    <section id="function">
        <div class="container">
            <div class="row center justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="MT_OTAccCreation.php">
                            <div class="upper">
                                <i class="fas fa-user-circle icon"></i>
                            </div>
                            <div class="lower">
                                <span>Create OT Account</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="MT_listofAccPage.php">
                            <div class="upper">
                                <i class="fas fa-list icon"></i>
                            </div>
                            <div class="lower">
                                <span>Edit OT and Client Account</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="outer">
                        <a href="MTsales.php">
                            <div class="upper">
                                <i class="fas fa-chart-bar icon"></i>
                            </div>
                            <div class="lower">
                                <span>Sales Statistic</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
