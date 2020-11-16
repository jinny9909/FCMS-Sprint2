<?php
    // catering package class
    class CateringPackage {
        private $id;
        private $name;
        private $descr;
        private $price;
        private $imagePath;

        function __construct($aID, $aName, $aDescr, $aPrice, $aImagePath) {
            $this->id = $aID;
            $this->name = $aName;
            $this->descr = $aDescr;
            $this->price = $aPrice;
            $this->imagePath = $aImagePath;
        }

        function get_id() {
            return $this->id;
        }
        
        function get_name() {
            return $this->name;
        }

        function get_descr() {
            return $this->descr;
        }
        
        function get_price() {
            return $this->price;
        }

        function get_imagePath() {
            return $this->imagePath;
        }
    }

    // returns all catering package objects, in a list of arrays
    function get_all_packages() {
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
        $sql = 'SELECT * FROM Catering_package';
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
    
            // create new doubly linked list
            $packages_arr = Array();
            
            // iterate though all rows in db table
            while ($row = $result->fetch_assoc()) {
                // initialize new catering package in heap
                $tempCatering = new CateringPackage($row["PackageID"], $row["PackageName"], $row["PackageDescription"], $row["PricePerPax"], $row["ImagePath"]);
                // append catering package to array
                array_push($packages_arr, $tempCatering);
            }
            $db->close();

            // return array
            return $packages_arr;
        }
        $db->close();
        return false;
    }
    
    // returns all other catering package objects, in a list of arrays
    // accepts current catering ID to be excluded
    function get_other_packages($lCateringID) {
        include 'backend/DatabaseConnect.php'; // global variables for connection
        $db = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DATABASE);
        $sql = 'SELECT * FROM Catering_package WHERE PackageID != "'.$lCateringID.'"';
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
    
            // create new doubly linked list
            $packages_arr = Array();
            
            // iterate though all rows in db table
            while ($row = $result->fetch_assoc()) {
                // initialize new catering package in heap
                $tempCatering = new CateringPackage($row["PackageID"], $row["PackageName"], $row["PackageDescription"], $row["PricePerPax"], $row["ImagePath"]);
                array_push($packages_arr, $tempCatering);
            }
            $db->close();
            return $packages_arr;
        }
        $db->close();
        return false;
    }
