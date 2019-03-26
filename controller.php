<?php

class Controller {

    var $servername = "localhost";
    var $username = "atran";
    var $password = "1214730";
    var $dbName = "mydb";
    var $conn;

    function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);

        // Check connection
        if ($this->conn->connect_error) {
            die("Database Connection failed: " . $this->conn->connect_error);
        }
        //"Database Connected"
    }

    function getBookedFlights() {
        $query = "SELECT * FROM Booking";
        $result = $this->conn->query($query);     //result has a collection of 'rows' returned from query

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["DepartureDate"] . $row["DepartureCity"] . $row["Destination"];
            }
        } else {
            echo "0 results";
        }
    }

}
