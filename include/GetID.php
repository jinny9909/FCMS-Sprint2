<?php
    // accepts parameters; food, clients, orders, operationteam, members
    // returns string of latest ID
    function getID($aID) {
        
        $SERVERNAME = "localhost";
        $USERNAME = "root";
        $PASSWORD = "";
        $DATABASE = "fcms";

        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

        $inputType = array("food"=>"FoodID", "clients"=>"ClientID", "orders"=>"OrderID", "operationteam"=>"OperationID", "members"=>"MemberID", "catering_package"=>"PackageID");

        if (array_key_exists($aID, $inputType)) {
            $lID = $inputType[$aID];
            $sql = 'SELECT * FROM '.$aID;
            $result = $db->query($sql);

            if ($result->num_rows > 0) {

                $lastID = ""; // stores the current ID the $row is pointing to

                while ($row = $result->fetch_assoc()) {
                    $lastID = $row[$lID];
                };
                $charAlpha = substr($lastID, 0, 2); // split front alpha characters
                $charNumeric = substr($lastID, 2, 10); // split back numeric characters (string)
                $charNumeric = intval($charNumeric); // convert string to numeric character
                $charNumeric += 1; // add ID to the numeric character
                $charNumeric = sprintf('%08d', $charNumeric); // convert the int back to 0..0N format
                $charID = $charAlpha.$charNumeric; // concatenate the strings
            }
            
            return $charID;
        }
        return "Invalid Key";
    }
?>
