<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodEdge | MT</title>
    <link rel ="stylesheet" type="text/css" href="styles/MT_listofAcc.css">
    <?php
        include 'include/NavBarStyle.php';
    ?>
</head>

<body>
    <?php
        include 'include/MTNavBar.php';
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

        if(isset($_POST["submit"])) {
            if(!empty($_POST["clients"])) {

                // for each client in the table
                foreach($_POST["clients"] as $client) {
                    
                    // fetch data from the row
                    $sql = 'SELECT Status FROM clients WHERE ClientID ="'.$client.'";';
                    $result = $db->query($sql);
                    $row = $result->fetch_assoc();
                    
                    // check client account status
                    echo "<p>".$row["Status"]."</p>";
                    if ($row["Status"] == 1) {
                        $sql = 'UPDATE clients SET Status = 0 WHERE ClientID ="'.$client.'";';
                    }
                    else {
                        $sql = 'UPDATE clients SET Status = 1 WHERE ClientID ="'.$client.'";';
                    }

                    $db->query($sql);
                }
            }

            if(!empty($_POST["operationTeam"])) {
                if(!empty($_POST["operationTeam"])) {

                    // for each operation team in the table
                    foreach($_POST["operationTeam"] as $operationTeam) {

                        // fetch data from the row
                        $sql = 'SELECT Status FROM operationteam WHERE OperationID ="'.$operationTeam.'";';
                        $result = $db->query($sql);
                        $row = $result->fetch_assoc();
                        
                        // check operation team account status
                        echo "<p>".$row["Status"]."</p>";
                        if ($row["Status"] == 1) {
                            $sql = 'UPDATE operationteam SET Status = 0 WHERE OperationID ="'.$operationTeam.'";';
                        }
                        else {
                            $sql = 'UPDATE operationteam SET Status = 1 WHERE OperationID ="'.$operationTeam.'";';
                        }
    
                        $db->query($sql);
                    }

                }
            }
        }

        // close connection
        $db->close();
    ?>
    <form action="MT_listofAccPage.php" method="post" class="container">
        <div class="jumbotron" style="margin-top: 50px;">
            <div class="card">
                <h5 class="card-header">List Of Client's Account</h5>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="t_header textWhite">
                                <th class="col-sm-2" scope="col">Client ID</th>
                                <th class="col-sm-2" scope="col">Name</th>
                                <th class="col-sm-2" scope="col">Login Email</th>
                                <th class="col-sm-2 elementCenter" scope="col">Account Status</th>
                                <th class="col-sm-2 elementCenter" scope="col">Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

                            // fetches all data from the tables
                            $sql = 'SELECT * FROM clients';
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // convert bool to string
                                    $status = "";
                                    if (!$row["Status"]) {
                                        $status = "INACTIVE";
                                    }
                                    else {
                                        $status = "ACTIVE";
                                    }

                                    echo '
                                    <tr>
                                        <th scope="row">'.$row["ClientID"].'</th>
                                        <td>'.$row["Username"].'</td>
                                        <td>'.$row["Email"].'</td>
                                        <td class="elementCenter">'.$status.'</td>
                                        <td class="elementCenter">
                                            <input type="checkbox" name="clients[]" value="'.$row["ClientID"].'"  class="form-check-input">
                                        </td>
                                    </tr>
                                    ';
                                }
                            }
                            // close connection
                            $db->close();
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">List Of Operation Team's Account</h5>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="t_header textWhite">
                                <th class="col-sm-2" scope="col">Client ID</th>
                                <th class="col-sm-2" scope="col">Name</th>
                                <th class="col-sm-2" scope="col">Login Email</th>
                                <th class="col-sm-2 elementCenter" scope="col">Account Status</th>
                                <th class="col-sm-2 elementCenter" scope="col">Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "backend/DatabaseConnect.php";
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
                            $sql = 'SELECT * FROM operationteam;';
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // convert bool to string value
                                    $status = "";
                                    if (!$row["Status"]) {
                                        $status = "INACTIVE";
                                    }
                                    else {
                                        $status = "ACTIVE";
                                    }

                                    echo '
                                    <tr>
                                        <th scope="row">'.$row["OperationID"].'</th>
                                        <td>'.$row["Username"].'</td>
                                        <td>'.$row["Email"].'</td>
                                        <td class="elementCenter">'.$status.'</td>
                                        <td class="elementCenter">
                                            <input type="checkbox" name="operationTeam[]" id="checkboxstyle" value="'.$row["OperationID"].'"  class="form-check-input">
                                        </td>
                                    </tr>
                                    ';
                                }
                            }
                            // close connection
                            $db->close();
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn-center" id="submit">
    </form>
                        </br>
                        </br>
    <?php
        include 'include/MTfooter.php'; 
    ?>

</body>

</html>