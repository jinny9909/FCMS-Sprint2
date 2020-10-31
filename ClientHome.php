<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Homepage</title>
  <link rel="stylesheet" href="styles/client_catering.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="styles/client_homepage.css">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="stylesheet/footer.css">
  <?php
  include 'include/NavBarStyle.php';
  ?>
</head>

<body id="page-top">

  <!-- Navigation -->
  <?php
  include 'include/ClientsNavBar.php';
  include 'include/StringPath.php';
  ?>
  <div id="fb-root"></div>
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

  <!-- Your Chat Plugin code -->
  <div class="fb-customerchat" attribution=setup_tool page_id="101015995130353" theme_color="#d4a88c" logged_in_greeting="Hi there!!! How can we help you?" logged_out_greeting="Hi there!!! How can we help you?">
  </div>

  <!--End of nav bar-->
  <!--Slide Show-->
  <div id="theCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#theCarousel" data-slide-to="0" class="active"> </li>
      <li data-target="#theCarousel" data-slide-to="1"> </li>
      <li data-target="#theCarousel" data-slide-to="2"> </li>
    </ol>

    <!-- Define the text to place over the image -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="slide1"></div>
        <div class="carousel-caption">
          <h1>Welcome To Foodedge Gourmate</h1>
          <p>Best Catering services in Kuching Sarawak</p>

        </div>
      </div>
      <div class="item">
        <div class="slide2"></div>
        <div class="carousel-caption">
          <h1>Welcome To Foodedge Gourmate</h1>
          <p>Best Catering services in Kuching Sarawak</p>
        </div>
      </div>
      <div class="item">
        <div class="slide3"></div>
        <div class="carousel-caption">
          <h1>Welcome To Foodedge Gourmate</h1>
          <p>Best Catering services in Kuching Sarawak</p>
        </div>
      </div>
    </div>


    <a class="left carousel-control" href="#theCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"> </span>
    </a>
    <a class="right carousel-control" href="#theCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  <!-- Endof slide show-->



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
                <img src=<?php echo $image_packageA ?> class="img-rounded" alt="chinese food">
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
                <img src=<?php echo $image_packageB ?> alt="western food">
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
                <img src=<?php echo $image_packageC ?> alt="mix package">
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

  <footer id="footercolor">
    <div id="footerimage">
      <div class="container py-12">
        <div class="row text-center">
          <div class="col-lg-12 " id="footertext">

            <div class="footertext">
              <h4>About Us</h4>
              <h4> 082-8865234<h4>
                  <h4>enquiry@foodedge.com</h4>
                  <h4>Jalan Song</h4>
                  <h4>Kuching, Sarawak, Malaysia</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid text-center bg-secondary">
      <h4 class="copyright">&copy; 2020. All right are Reserved by FoodEdge Gourmate</h4>
    </div>
    <!-- Load Facebook SDK for JavaScript -->


  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>