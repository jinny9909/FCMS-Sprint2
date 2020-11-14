<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Statistics</title>

  <!-- Custom styles for this template -->
  <link href="styles/all.min.css" rel="stylesheet">

  <!--Chart Java-->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

<link href="styles/navbar.css" rel="stylesheet">

<!--Font Awesome-->
<link rel="stylesheet" href="styles/all.min.css">

</head>

<body style="background-color: #a9927d;">

    <?php
        include 'include/MTNavBar.php';
        include 'include/StringPath.php';
    ?>
    <!--<div class="container">
    <div class="jumbotron" style="margin-top: 100px; padding:30px;">
        <div class="card">
            <h5 class="card-header">Statistic</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="t_header textWhite">
                            <th class="col-sm-2 elementCenter" scope="col">Order ID</th>
                            <th class="col-sm-2 elementCenter" scope="col">Order Date</th>
                            <th class="col-sm-2 elementCenter" scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            /*include 'backend/DatabaseConnect.php'; // global variables for connection
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

                            // fetches all data from the tables
                            $sql = 'SELECT orders.OrderID,orders.NumPeople*catering_package.PricePerPax as Price, orders.OrderDate FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID';
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <tr>
                                        <th class="col-sm-2 elementCenter" scope="row">'.$row["OrderID"].'</th>
                                        <td class="col-sm-2 elementCenter">'.$row["OrderDate"].'</td>
                                        <td class="col-sm-2 elementCenter">'.$row["Price"].'</td>
                                    </tr>
                                    ';
                                }
                            }*/
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    -->

    <div class="card card-success mx-auto" style="max-width: 500px; margin-top: 100px;">
        <div class="card-header">
            <h3 class="card-title">Bar Chart</h3>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <div class="chart">
                <canvas id="graphCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        
    </div>

    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("include/data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].OrderDate);
                        marks.push(data[i].Price);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Sales',
                                backgroundColor: '#5e503f',
                                borderColor: '#5e503f',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
</body>

</html>
