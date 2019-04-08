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
        <div class="main">
            <h2 style="margin-left: 20px">My booked flights</h2>
            <?php
            if (session_status() != PHP_SESSION_ACTIVE)
                session_start();
            $userId = $_SESSION['userid'];
            if (isset($userId)) {
                $controller = new Controller();
                $controller->getFlights($userId);
            }
            ?>
        </div>
    </body>
</html>


<?php
//AJAX booking
if (isset($_GET['ticketId'])) {
    ob_end_clean(); //clear the all html string above this 
    header('Content-Type: application/json');

    if (!$_SESSION['logged']) {
        echo json_encode(array('error' => '1', 'message' => 'Login is required to process!', 'url' => "login.php"));
        exit;
    }
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
        //book flight
        $userId = $_SESSION['userid'];
        $ticketId = $_GET['ticketId'];

        $controller = new Controller();
        $result = $controller->bookFlight($userId, $ticketId);

        if ($result) {
            echo json_encode(array('error' => '0', 'message' => "Successfully booked!",
                'url' => basename($_SERVER['PHP_SELF'])));
        } else {
            echo json_encode(array('error' => '2', 'message' => 'You have already booked this flight!', 'url' => ''));
        }
    }
}    