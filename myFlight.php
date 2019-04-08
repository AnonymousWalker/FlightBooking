<?php
//ob_start();
include_once "_navigationBar.php";
require_once "controller.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Flights</title>
        <link rel="stylesheet" href="CSS/home.css"/>
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
        <script src="JS/home.js"></script>
    </head>
    <body>
        <h2 style="margin-left: 20px">My booked flights</h2>
        <?php
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        echo "isset".isset($_SESSION['logged'])."logged".$_SESSION['logged']."status". session_status();
        $userId = $_SESSION['userid'];
        if (isset($userID)) {
            $controller = new Controller();
            $controller->getFlights($userID);
        }
        ?>
    </body>
</html>


<?php 
//AJAX booking
if (isset($_GET['ticketId'])) {
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        //book flight
        $userId = $_SESSION['userid'];
        $ticketId = $_GET['ticketId'];
        
        $controller = new Controller();
        $result = $controller->bookFlight($userId,$ticketId);
        
        ob_end_clean(); //clear the all html string above this 
        header('Content-Type: application/json');
        echo json_encode(array('message' => $result));
    } else {
        header("Location: login.php");
    }
}