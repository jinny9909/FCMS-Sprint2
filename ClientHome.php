<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Homepage</title>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="styles/client_homepage.css">
  <link rel="stylesheet" href="styles/client_catering.css">

  <?php
  include 'include/NavBarStyle.php';
  include 'include/ClientsNavBar.php';
  ?>
</head>

<body id="page-top">

  <?php
  
  
  ?>
  <div id="fb-root"></div>


  <!-- Your Chat Plugin code -->
  <div class="fb-customerchat" attribution=setup_tool page_id="101015995130353" theme_color="#d4a88c" logged_in_greeting="Hi there!!! How can we help you?" logged_out_greeting="Hi there!!! How can we help you?">
  </div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" style="height: 750px">
        <img class="d-block w-100" src="images\FoodCarousel\homeslide1.png" style="background-size: cover;" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="txt">Welcome To FoodEdge Gourment</h2>
          <p class="slidetxt">Best Catering services in Kuching Sarawak!</p>
        </div>
      </div>
      <div class="carousel-item" style="height: 750px">
        <img class="d-block w-100" src="images\FoodCarousel\homeslide2.png" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="txt">Welcome To FoodEdge Gourment </h2>
          <p class="slidetxt">Best Catering services in Kuching Sarawak!</p>
        </div>
      </div>
      <div class="carousel-item" style="height: 750px">
        <img class="d-block w-100" src="images\FoodCarousel\homeslide3.png" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="txt">Welcome To FoodEdge Gourment</h2>
          <p class="slidetxt">Best Catering services in Kuching Sarawak!</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!--about start-->

  <div class="container-fluid padding" id="aboutushome">
    <div class="row welcome text-center text-white">
      <div class="col-12">
        <h1 class="display-5"> FoodEdge Gourmate Catering Service for All You Need In Afforadable Price </h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">
        </p>
      </div>
    </div>
  </div>
  <!--blank-->
  <section id="fixedImage">
    <div class="container gap">

    </div>
  </section>
  <!--menu start-->
  <section id="menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Menu Catering</h2>
        </div>
      </div>
      
      <div class="row">
        <div class="col-4">
          <div class="outer">
            <a href="ClientMenu.php">
              <div class="upper">
                <img src="images/packages/packageA.jpg" class="img-rounded" alt="chinese food">
              </div>
              <div class="lower">
                <span> Chinese Catering Package</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-4">
          <div class="outer">
            <a href="ClientMenu.php">
              <div class="upper">
                <img src= "images/packages/PackageB.jpg" alt="western food">
              </div>
              <div class="lower">
                <span>Western Catering Package</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-4">
          <div class="outer">
            <a href="ClientMenu.php">
              <div class="upper">
                <img src="images/packages/PackageC.jpg" alt="mix package">
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
  <section id="fixedImage">
    <div class="container gap">

    </div>
  </section>
  <section id="contact">
    <div class="container">
      <div class="container-fluid padding" id="aboutushome">
        <div class="row welcome text-center text-white">
          <div class="col-12">
            <h1 class="display-5">About FoodEdge Gourmate</h1>
          </div>
          <hr>
          <div class="col-12">
            <p class="lead">
              FoodEdge Gourmate Sdn Bhd established in the year of 1999 which 20+ years of experience
              in exquisite catering and excellent hospitality. We provide quality food in a affordable price.
              From appetizing Asian cuisine to Indian Curine, we are one-stop award winning catering company for all your event needs.

            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Footer -->
  <?php 
  include 'include/ClientFooter.php'
  ?>




  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v8.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</body>


</html>