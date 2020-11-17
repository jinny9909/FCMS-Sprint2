<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Reward Page"/>
    <title>Reward Item</title>
    <!-- navbar css -->
    <?php
        include 'include/NavBarStyle.php';
    ?>
    <link rel='stylesheet' href='styles/ClientReward_Style.css'>
</head>

<body>
    <?php
        session_start();

        include 'include/ClientsNavBar.php';

        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

        //echo $_SESSION['clientID'];
        $clientID = $_SESSION['clientID'];
        //$clientID = "CL00000004";
        
        //Fetch data from the tables
        $clientSql = "SELECT m.MemberID, m.MemberPoint, c.Username FROM members m INNER JOIN clients c ON m.ClientID=c.ClientID WHERE c.ClientID = '$clientID'";
        $clientResult = $db->query($clientSql);

        $clientName = "";
        $memberID = "";
        $memberPoints = "";
        if($clientResult->num_rows>0){
            $row = $clientResult->fetch_assoc();
            $clientName = $row['Username'];
            $memberID = $row['MemberID'];
            $memberPoints = $row['MemberPoint'];
        }

        //Fetch data from the tables
        $rewardSql = "SELECT ItemName, ItemPoints, ItemImgPath, ItemID FROM reward_item WHERE ItemID='0'";
        $rewardResult = $db->query($rewardSql);
        
        $itemPoints = "";
        $itemname = "";
        $itemID = "";
        if($rewardResult->num_rows>0){
            $row = $rewardResult->fetch_assoc();
            $itemPoints = $row['ItemPoints'];
            $itemName = $row['ItemName'];
            $itemID = $row['ItemID'];
        }

        if($memberPoints > $itemPoints){
            $_SESSION['itemName'] = $itemName;
            $_SESSION['membershipID'] = $memberID;
            $_SESSION['itemID'] = $itemID;
		}
    ?>

	<div class="container mt-5 pt-5">
    <div class="jumbotron pb-0 mb-0">
        <div class="card">
            <div class="card-header" id="cardTitle">
                <h5 class=" font-weight-bold d-flex justify-content-center">This Month Rewards</h5>
                <p class="text-center mb-0">Reward Item Name: <b><?php echo $itemName; ?></b></p>
            </div>
            <div class="card-body d-flex justify-content-center">
                <img src="<?php echo $row['ItemImgPath']; ?>" alt="Item Image">
            </div>

            <div class="card-body mb-0 pb-0">
                <p class="d-flex justify-content-center font-weight-bold mb-1">Redeeemed this item for: </p>
                <h6 class="d-flex justify-content-center"><?php echo $itemPoints; ?> points</h6>
            </div>

            <div class="card-body d-flex justify-content-center">
                <div class="border w-75" id="clientDetails">
                    <p class="font-weight-bold d-flex justify-content-center mb-1 mt-1"><?php echo $clientName; ?></p>
                    <h6 class="text-center"><b>MembershipID:</b> <?php echo $memberID; ?></h6>

                    <p class="font-weight-bold d-flex justify-content-center mb-1">Current Reward Points</p>
                    <h6 class="d-flex justify-content-center mb-3"><?php echo $memberPoints; ?> points</h6>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="button" id="redeemButton" class="btn">Redeem Reward</button>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        document.getElementById("redeemButton").onclick = function () {
            memberPoint = <?php echo $memberPoints;?>;
            itemPoint = <?php echo $itemPoints;?>;

            if(memberPoint > itemPoint){
             //location.href = "http://foodedge-asia.rf.gd/ClientRewardRedeem.php";
                location.href = "ClientRewardRedeem.php";
		    }else{
               alert('Insufficient point to redeem item !');      
			}
    };
</script>
</body>
</html>
