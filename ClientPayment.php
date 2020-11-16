<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="FCMS">
    <meta name="author" content="Ooi Kuan Hao"/>
    <meta name="description" content="Client Reward Page"/>
    <title>Order Payment</title>
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

        //Make it to two decimal
        $totalAmount = number_format(100, 2, '.', '');
        $points = "500";
    ?>

	<div class="container mt-5 pt-5">
    <div class="jumbotron pb-4">
        <div class="card">
            <div class="card-header" id="cardTitle">
                <h5 class=" font-weight-bold d-flex justify-content-center">Catering Order Payment</h5>
            </div>

            <div class="card-body mb-0 pb-0">
                <p class="d-flex justify-content-center font-weight-bold mb-1">Total Amount for your order: <?php echo 'RM '.$totalAmount;?></p>
            </div>

            <div class="card-body d-flex justify-content-center">
                <div class="border w-75" id="clientDetails">
                    <p class="font-weight-bold d-flex justify-content-center mb-1 mt-1">Rewards point to be earned:</p>
                    <h6 class=" text-center"><?php echo $points;?> <b>points</b> </h6>
                </div>
            </div>
        </div>

        <!-- Set up a container element for the button -->
        <div id="paypal-button-container" class="d-flex justify-content-center mt-4"></div>


        <!-- Include the PayPal JavaScript SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=Ad8U6y1dFmsqA7y-4hSRBOCDYWrPDo8FBv4_ohKxwy_2j-O4F1JmT_E-RU0N-BcdesswqF7FdYAE102B&currency=MYR&disable-funding=credit,card"></script>

    </div>
    </div>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
              size: 'small',
              color: 'gold',
              label: 'pay',
            },
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $totalAmount; ?>
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    window.location.replace("ClientHome.php");
                });
            },
            onCancel: function (data) {
            // Show a cancel page, or return to cart
                 alert('Payment canceled !');
                window.location.replace("ClientPayment.php");
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
