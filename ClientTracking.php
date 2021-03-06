<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/ordersClient.css">
    <link rel="stylesheet" href="styles/ClientTracking.css">
    <title>Order Tracking</title>
    <?php
    include 'include/NavBarStyle.php';
    ?>
</head>

<body>
    <?php
    include 'include/ClientsNavBar.php';
    ?>
    <section class="container order">
        <?php
        $clientID = 'CL00000001'; // change to session value later

        // connect to db
        include "backend/DatabaseConnect.php";
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

        // fetches all data from the tables
        $sql = 'SELECT * FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID WHERE ClientID="' . $clientID . '";';
        $result = $db->query($sql);

        // print data a few times
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $tracking1 = "";
                $tracking2 = "";
                $tracking3 = "";
                $tracking4 = "";
                $tracking5 = "";
                $totalPrice = $row["PricePerPax"] * $row["NumPeople"];

                if ($row["TrackingID"] > 4) {
                    $tracking1 = " selected";
                    $tracking2 = " selected";
                    $tracking3 = " selected";
                    $tracking4 = " selected";
                    $tracking5 = " selected";
                } else if ($row["TrackingID"] > 3) {
                    $tracking1 = " selected";
                    $tracking2 = " selected";
                    $tracking3 = " selected";
                    $tracking4 = " selected";
                } else if ($row["TrackingID"] > 2) {
                    $tracking1 = " selected";
                    $tracking2 = " selected";
                    $tracking3 = " selected";
                } else if ($row["TrackingID"] > 1) {
                    $tracking1 = " selected";
                    $tracking2 = " selected";
                } else if ($row["TrackingID"] > 0) {
                    $tracking1 = " selected";
                }

                echo '
                    <div class="jumbotron">
                        <div class="row" style="cursor: pointer;">
                            <div class="col-md-2 col-sm-4">
                                <img class="img-fluid rounded img-thumbnail" src="' . $row["ImagePath"] . '">
                            </div>
                            <div class="col-md-10 col-sm-8">
                                <h3>' . $row["PackageName"] . '</h3>
                                <h5>ID: ' . $row["OrderID"] . '</h5>
                                <h5>Date Received: ' . $row["OrderDate"] . '</h5>
                                <h5>Price: RM ' . $totalPrice . '</h5>
                            </div>
                        </div>
                        <hr/>
                        <div>
                        <div class="row">
                            <div class="col-sm bold' . $tracking1 . '">
                                Invoice Issued
                            </div>
                            <div class="col-sm bold' . $tracking2 . '">
                                Order Confirmed
                            </div>
                            <div class="col-sm bold' . $tracking3 . '">
                                Event Preparing
                            </div>
                            <div class="col-sm bold' . $tracking4 . '">
                                Event Preparation
                            </div>
                            <div class="col-sm bold' . $tracking5 . '">
                                Event Completed
                            </div>
                        </div>
                        </div>
                    </div>
                    ';
            }
        }
        ?>
    </section>
    
  <?php
        include 'include/ClientFooter.php' 
  ?>


 
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