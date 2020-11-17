<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Invoice</title>
    <?php
      include 'include/NavBarStyle.php';
    ?>
</head>
<body>
    <?php
        include 'include/ClientsNavBar.php';

        // have to install the libraries first
        // using mpdf library
        require_once __DIR__ . '/vendor/autoload.php';

        // connect to database
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

        // enter order ID, change to session
        $orderID = 'OR00000004';

        // extract data using clientID
        $sql = 'SELECT * FROM orders INNER JOIN catering_package ON orders.PackageID = catering_package.PackageID WHERE OrderID="OR00000004";'; // sql script
        $result = $db->query($sql); // run sql script

        // print 
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cilentID = $row["ClientID"];
            $orderDate = $row["OrderDate"];
            $packageName = $row["PackageName"];
            $numOfPeople = $row["NumPeople"];
            $price = $row["PricePerPax"] * $row["NumPeople"];
        }

        // close database connection
        $db->close();

        // create new PDF instance
        $mpdf = new \Mpdf\Mpdf();

        // Create the PDF
        $data = '';
        $data = '<h1 style="text-align:center;">Food Edge Gourment</h1><hr />';
        $data .= '<h2>Invoice</h2>';

        // Add data
        $data .= '<strong>Order number:</strong>'.'<br />';
        $data .= $orderID.'<br />'.'<br />';
        $data .= '<strong>Order date:</strong>'.'<br />';
        $data .= $orderDate.'<br />'.'<br />';
        $data .= '<strong>Package name:</strong>'.'<br />';
        $data .= $packageName.'<br />'.'<br />';
        $data .= '<strong>Number of people:</strong>'.'<br />';
        $data .= $numOfPeople.'<br /><br /><hr />';
        $data .= '<p style="text-align:right;"><strong>Total price:</strong></p>';
        $data .= '<p style="text-align:right;">RM '.$price.'</p><br />';

        // writes to pdf
        $mpdf->WriteHTML($data);

        // writes to file folder
        $filename = $orderID . '-' . 'invoice.pdf'; // generate unique filename

        $mpdf->Output('invoice/'.$filename, \Mpdf\Output\Destination::FILE);

        // write path to orders database
        // connect to database
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
        
    ?>
    <div style="margin-top:80px" class="container">
        <iframe class="row" width="100%" height="800px" src="invoice/OR00000004-invoice.pdf" type="application/pdf"></iframe>
        <form action="#" method="post">
            <button type="button" class="btn-sm btn-primary d-flex justify-content-center mt-1 mx-auto">Continue</button> 
        </form>
    </div>
</body>
</html>