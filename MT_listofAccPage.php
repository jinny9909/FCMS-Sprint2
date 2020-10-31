<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodEdge | MT</title>
    <link rel ="stylesheet" type="text/css" href="styles/MT_ListOfAcc">
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
                foreach($_POST["clients"] as $client) {
                    
                    // deletes selected rows
                    $sql = "DELETE FROM clients WHERE ClientID ='".$client."'";
                    $db->query($sql);
                }
            }

            if(!empty($_POST["operationTeam"])) {
                foreach($_POST["operationTeam"] as $client) {

                    // deletes selected rows
                    $sql = "DELETE FROM operationteam WHERE OperationID =" + $client.toString();
                    $db->query($sql);
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
                    <table class="table table-striped ">
                        <thead>
                            <tr class="t_header">
                                <th scope="col">Client ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Login Email</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);

                            // fetches all data from the tables
                            $sql = "SELECT * FROM Clients";
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <tr>
                                        <th scope="row">'.$row["ClientID"].'</th>
                                        <td>'.$row["Username"].'</td>
                                        <td>'.$row["Email"].'</td>
                                        <td>
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
                    <table class="table table-striped ">
                        <thead>
                            <tr class="t_header">
                                <th scope="col">Operation Team ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Login Email</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "backend/DatabaseConnect.php";
                            $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
                            $sql = "SELECT * FROM OperationTeam";
                            $result = $db->query($sql);

                            // print data a few times
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <tr>
                                        <th scope="row">'.$row["OperationID"].'</th>
                                        <td>'.$row["Username"].'</td>
                                        <td>'.$row["Email"].'</td>
                                        <td>
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
        <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
    </form>
    <footer>
        <div class="container-fluid text-center  text-white" id="copyright">
            &copy; 2020. All right are Reserved by FoodEdge Gourmate
        </div>
    </footer>

</body>

</html>