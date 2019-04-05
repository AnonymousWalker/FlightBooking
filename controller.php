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

    function getDatabaseConnection() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Database Connection failed: " . $this->conn->connect_error);
            return null;
        }
        return $this->conn;
    }

    function getFlights($userID = null) {
        if (isset($userID)) {
            $query = "SELECT * FROM UserBooking WHERE UserID = '" . $userID . "'";
        } else {
            $query = "SELECT * FROM FlightTicket";
        }

        $result = $this->conn->query($query);     //result has a collection of 'rows' returned from query
        if ($result->num_rows > 0) {
            echo '<p style="margin-left: 20px">' . mysqli_num_rows($result) . ' count(s)</p>';
            while ($row = $result->fetch_assoc()) {
                $ticketid = $row["TicketID"];
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

    function bookFlight($userId, $ticketId) {
        $query = "INSERT INTO UserBooking (UserID, TicketID) VALUES ('%d','%d');";
        $query = sprintf($query, $userId, $ticketId);
        if ($this->conn->query($query)) {
            return true;
        }
        return false;
    }
    
}
    