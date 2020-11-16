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
            echo "in";
            $row = $result->fetch_assoc();
            $cilentID = $row["ClientID"];
            $orderDate = $row["OrderDate"];
            $packageName = $row["PackageName"];
            $numOfPeople = $row["NumPeople"];
            $price = $row["PricePerPax"] * $row["NumPeople"];
        }

        // create new PDF instance
        $mpdf = new \Mpdf\Mpdf();

        // Create the PDF
        $data = '';
        $data .= '<h1>Invoice details</h1>';

        // Add data
        $data .= '<strong>Order number:</strong>'.'<br />';
        $data .= $orderID.'<br />'.'<br />';
        $data .= '<strong>Order date:</strong>'.'<br />';
        $data .= $orderDate.'<br />'.'<br />';
        $data .= '<strong>Package name:</strong>'.'<br />';
        $data .= $packageName.'<br />'.'<br />';
        $data .= '<strong>Number of people:</strong>'.'<br />';
        $data .= $numOfPeople.'<br />'.'<br />';
        $data .= '<strong>Total price:</strong>'.'<br />';
        $data .= 'RM '.$price.'<br />'.'<br />';

        // writes to pdf
        $mpdf->WriteHTML($data);

        // writes to file folder
        $filename = $orderID . '-' . 'invoice.pdf'; // generate unique filename

        $mpdf->Output('invoice/'.$filename, \Mpdf\Output\Destination::FILE);

        // output to browser
        // $mpdf->Output($filename, 'D');

        // close database connection
        $db->close();
    ?>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="invoice/OR00000004-invoice.pdf" type="application/pdf"></iframe>
    </div>
</body>
</html>