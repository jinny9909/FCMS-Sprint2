<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" type="text/css" href="styles/MT_listofAcc.css">
    <?php
        include 'include/NavBarStyle.php';
    ?>
</head>
<body>
    <?php
        include 'include/OTNavBar.php';
    ?>

    <div class="container">
    <div class="jumbotron" style="margin-top: 50px;">
        <div class="card">
            <h5 class="card-header">List Of Clients' Transactions</h5>
            <div class="card-body">
                <form class="input-group md-form form-sm form-1 pl-0">
                    <input class="form-control my-0 py-1" type="text" placeholder="Enter date... YYYY-MM-DD" aria-label="Search">
                    <div class="input-group-prepend">
                        <button id="submit"><i class="fas fa-search text-white" aria-hidden="true"></i></button>
                    </div>
                </form>
                <br />
                <table class="table table-striped">
                    <thead>
                        <tr class="t_header textWhite">
                            <th class="col-sm-2 elementCenter" scope="col">Order ID</th>
                            <th class="col-sm-2 elementCenter" scope="col">Order Date</th>
                            <th class="col-sm-2 elementCenter" scope="col">Price</th>
                            <th class="col-sm-2 elementCenter" scope="col">Client ID</th>
                            <th class="col-sm-2 elementCenter" scope="col">Package ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'backend/DatabaseConnect.php'; // global variables for connection
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

                            // fetches all data from the tables
                            $sql = 'SELECT * FROM orders INNER JOIN catering_package ON orders.PackageID=catering_package.PackageID';
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $price = $row["NumPeople"] * $row["PricePerPax"];
                                    echo '
                                    <tr>
                                        <th class="col-sm-2 elementCenter" scope="row">'.$row["OrderID"].'</th>
                                        <td class="col-sm-2 elementCenter">'.$row["OrderDate"].'</td>
                                        <td class="col-sm-2 elementCenter">'.$price.'</td>
                                        <td class="col-sm-2 elementCenter">'.$row["ClientID"].'</td>
                                        <td class="col-sm-2 elementCenter">'.$row["PackageID"].'</td>
                                    </tr>
                                    ';
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <tbody>
                    <?php
                        // connecting to database
                        include 'backend/DatabaseConnect.php';
                        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
                        $sql = 'SELECT * FROM orders';
                    ?>
                </tbody>
            </div>
        </div>
    </div>
    </div>
    <?php include 'include/OTfooter.php'; ?>
</body>
</html>