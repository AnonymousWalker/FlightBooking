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

    function getFlights($userID = null) {
        if (isset($userID)) {
            $query = "SELECT * FROM Booking WHERE UserID = '" . $userID . "'";
        } else {
            $query = "SELECT * FROM Booking";
        }
        
        $result = $this->conn->query($query);     //result has a collection of 'rows' returned from query

        if ($result->num_rows > 0) {
            echo '<p style="margin-left: 20px">'.mysqli_num_rows($result).' count(s)</p>';
            while ($row = $result->fetch_assoc()) {
                $bookingid = $row["BookingID"];
                $username = $row["Username"];
                $airline = $row["Airline"];
                $depDate = $row["DepartureDate"];
                $cityDep = $row["DepartureCity"];
                $cityArr = $row["Destination"];
                $price = $row["Price"];
                include '_ticket.php';
            }
        } else {
            echo "<h4>You haven't booked any flight.</h4>";
        }
    }
}
