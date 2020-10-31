<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Catering Package Details</title>

  <!-- Custom styles for this template -->
  <link href="styles/client_catering.css" rel="stylesheet">

  <?php
        include 'include/NavBarStyle.php';
  ?>

</head>

<body id="page-top">

<?php
    include 'include/ClientsNavBar.php';
    include 'include/StringPath.php';
?>

<section id="detail">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 col-5" id="selected-image">
                <img src="<?php echo $image_packageA ?>" width="250" alt="western food" id="selected">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-5" id="selected-detail">
                <p>Chinese Catering Package</p>
                <p>RM 500</p>
                <p>Menu Details</p>
                <ul class="infomation">
                <li>Chinese Fried Rice</li>
                <li>Breaised Noodles</li>
                <li>Seafood with Chilli Crab Sauce</li>
                <li>Omelette</li>
                <li>Mixed Fresh Fruits</li>
                </ul>
                <?php
                    $_SESSION["price"] = "500";
                    $_SESSION["cName"] = "Chinese cuisines";
                ?>
                <div>
                    <button type="button" onclick="location.href='ClientCheckout.php'" name="checkOut_catering" class="btn btn-primary btn-block btn-lg p-3 mb-2 bg-warning text-dark border-0">Checkout</button>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="other">
  <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <h2>Others</h2>
              </div>
          </div>
          <div class="row  justify-content-center">
              <div class="col-lg-3 col-md-3 col-sm-5 col-5">
                  <div class="outer">
                      <a href="#">
                          <div class="upper">
                              <img src="<?php echo $image_packageB ?>" alt="western food">
                          </div>
                          <div class="lower">
                              <span>Western Catering Package</span>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-5 col-5">
                  <div class="outer">
                      <a href="#">
                          <div class="upper">
                              <img src="<?php echo $image_packageC?>" alt="mix package">
                          </div>
                          <div class="lower">
                              <span>Mix Catering Package</span>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

</body>

</html>
