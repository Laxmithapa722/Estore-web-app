<?php

/**
 * Description of EstoreDB
 * 
 * 
 */
class EstoreDB {

    // PDO object
    var $conn = null;
    var $dbname = 'estoredb';
    var $username = 'root';
    var $password = '';
    var $message = '';

    function __construct() {

        try {
            $this->conn = new PDO("mysql:host=localhost;dbname={$this->dbname};charset=utf8", $this->username, $this->password);
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }
    }

    function addProduct($values) {

        $success = false;

        try {
            $statement = $this->conn->prepare("insert into PRODUCTS (Description,
                                                 Category, Quantity, CostPrice, 
                                                 SellingPrice) 
                                                 values (?,?,?,?,?)");

            $success = $statement->execute($values);
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $success;
    }

    function authenticateUser($username, $password) {
        $userID = 0;

        try {
            // query Users table for UserID and Password for $username provided
            $stat = $this->conn->query("select userID, password from users where username = '$username' ");
            // fetch the UserID and Password
            if ($row = $stat->fetch()) {
                $UserID = $row["userID"];
                $Password = $row["password"]; //$password
                // compare the two passwords $password == $Password
                if ($password == $Password) {
                    $userID = $UserID;
                }
            }
            // if they match functions returns the UserID
            // no match function returns 0 which is false
        } catch (PDOException $ex) {
            echo "Error $ex";
        }
        return $userID;
    }

    function deleteBooking($id) {
        $success = false;
        try {



            $statement = $this->conn->prepare("delete from bookings where id  =  $id");

            $success = $statement->execute();

            // we should check if success
            // close the connection
            $conn = null;
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $success;
    }

    function editBooking($values, $id) {

        $success = false;
        try {
            $statement = $this->conn->prepare("Update Bookings set firstname = ?, 
                                                          lastname = ?, email = ?, bookingDate = ?,
                                                          bookingTime = ?, numPeople = ?
                                                          where id = $id");

            $success = $statement->execute($values);
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $success;
    }

    function getProduct($ProductID) {
        $record = [];
        // get record for ProductID
        try {

            $statement = $this->conn->query("SELECT * from PRODUCTS where ProductID = $ProductID");

            // we want to fetch an associative array  ie key => value
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            // Each row is an associative array of data - add rows to records array
            if ($row = $statement->fetch()) {

                $record = $row;
            }
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $record;
    }

    function getProducts() {

        // declare array
        $records = [];

        try {

            // create prepared statement
            $statement = $this->conn->query("SELECT * from PRODUCTS order by ProductID");

            // we want to fetch an associative array  ie key => value
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            // Each row is an associative array of data - add rows to records array
            while ($row = $statement->fetch()) {

                $records[] = $row;
            }
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $records;
    }

// end getProducts

    function searchBookings($keyword) {

        // declare array
        $records = [];

        try {

            $statement = $this->conn->query("SELECT * from BOOKINGS 
                                           where 
                                           firstname like '%$keyword%' or
                                           lastname like '%$keyword%' or
                                           email like '%$keyword%' or
                                           bookingDate like '%$keyword%' or
                                           bookingTime like '%$keyword%' or
                                           numPeople like '%$keyword%' 
                                           order by id");

            // we want to fetch an associative array  ie key => value
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            // Each row is an associative array of data - add rows to records array
            while ($row = $statement->fetch()) {

                $records[] = $row;
            }

            // close the connection
            $conn = null;
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }
        return $records;
    }

    function showMessage($message) {
        include_once('view/message.php');
        exit();
    }

    function close() {
        $this->conn = null;
    }

    function getPhotos($ProductID) {

        // declare array
        $records = [];

        try {

            // create prepared statement
            $statement = $this->conn->query("SELECT * from PHOTOS where ProductID = $ProductID");

            // we want to fetch an associative array  ie key => value
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            // Each row is an associative array of data - add rows to records array
            while ($row = $statement->fetch()) {

                $records[] = $row;
            }
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $records;
    }

    function addPhoto($values) {

        $success = false;

        try {
            $statement = $this->conn->prepare("insert into PHOTOS (Filename,
                                                 PhotoDescription, ProductID ) 
                                                 values (?,?,?)");

            $success = $statement->execute($values);
        } catch (PDOException $ex) {
            $message = $ex->getMessage();
            $this->showMessage($message);
        }

        return $success;
    }

}

// end class
