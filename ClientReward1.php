<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao" />
    <meta name="description" content="Client Reward Page" />
    <title>Reward Item</title>
    <!-- navbar css -->
    <?php
    include 'include/NavBarStyle.php';
    ?>
    <link rel='stylesheet' href='styles/ClientReward_Style.css'>
</head>

<body>
    <?php
    include 'include/ClientsNavBar.php';

    include 'backend/DatabaseConnect.php'; // global variables for connection
    $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

    $clientName = "James Bond";
    $memberID = "CM00000004";
    $rewardPoints = "100";

    //Fetch data from the tables
    $sql = "SELECT ItemName, ItemPoints, ItemImgPath FROM reward_item WHERE ItemID='0'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="container mt-5 pt-5">
                <div class="jumbotron">
                    <div class="card">
                        <div class="card-header" id="cardTitle">
                            <h5 class=" font-weight-bold d-flex justify-content-center">This Month Rewards</h5>
                            <p class="d-flex justify-content-center mb-0">Reward Item Name: <?php echo $row['ItemName']; ?></p>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <img src="<?php echo $row['ItemImgPath']; ?>" alt="Item Image">
                        </div>

                        <div class="card-body mb-0 pb-0">
                            <p class="d-flex justify-content-center font-weight-bold mb-1">Redeeemed this item for: </p>
                            <h6 class="d-flex justify-content-center"><?php echo $row['ItemPoints']; ?> points</h6>
                        </div>

                        <div class="card-body d-flex justify-content-center">
                            <div class="border w-75" id="clientDetails">
                                <p class="font-weight-bold d-flex justify-content-center mb-1 mt-1"><?php echo $clientName; ?></p>
                                <h6 class="d-flex justify-content-center"><b>MembershipID:</b> <?php echo $memberID; ?></h6>

                                <p class="font-weight-bold d-flex justify-content-center mb-1">Current Reward Points</p>
                                <h6 class="d-flex justify-content-center mb-3"><?php echo $rewardPoints; ?> points</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" name="redeemButton" class="btn">Redeem Reward</button>
            </div>
    <?php
        }
    }
    ?>
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