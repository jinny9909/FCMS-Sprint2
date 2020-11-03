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
  <link href="styles/OT_homePage.css" rel="stylesheet">

  <?php
        include 'include/NavBarStyle.php';
  ?>

  <style>
      html{
        min-width: 100%;
      }

      body{
        background-image: url(images/3.jpg);
        background-position: center;
        padding-top: 50px; 
        background-repeat:no-repeat;
        background-size: cover;
      }
  </style>

</head>

<body>

    <?php
        include 'include/OTNavBar.php';
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
            </div>
        </div>
    </section>

</body>

</html>
