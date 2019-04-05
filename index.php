<!DOCTYPE html>
<?php
require_once 'controller.php';
include_once '_navigationBar.php';
?>

<html style="height: 100%;">
    <head>
        <meta charset="UTF-8">
        <title>Flight Booking</title>
        <link rel="stylesheet" href="CSS/home.css"/>
        <link rel="stylesheet" href="CSS/modal.css"/>
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
        <script src="JS/modal.js"></script>
        <script src="JS/home.js"></script>
    </head>
    <body>
        <div>
            <img src="https://www.time8.in/wp-content/uploads/2018/01/Thailand-Flight.jpg" style="width: 100%;"/>
        </div>
        <div class="main">
            <?php
            ?>

            <?php
            $controller = new Controller();
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                echo '<h2 style="margin-left: 20px">Hello, ' . $_SESSION['firstname'] .
                '! Your booked flights are listed below.' . '</h2>';
                $userID = $_SESSION['userid'];
                $controller->getFlights($userID);
            } else {
                echo '<h2 style="margin-left: 20px">All booked flights. Login to see yours!</h2>';
                $controller->getFlights();
            }
            ?>
        </div>

        <div id="modal-popup" class="modal" style="visibility: hidden;">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close-modal">&times;</span>
                    <h2>Booking confirmation</h2>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="flightId"/>
                    <h3>You are booking this flight?</h3>
                    <button id="confirm-booking">Book now</button>
                    <button>Maybe not</button>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    if (isset($_GET['logout'])) {
        $_SESSION['logged'] = false;
        $_SESSION['userid'] = '';
        $_SESSION['username'] = '';
        $_SESSION['firstname'] = '';
        header('Location: index.php');
    }
}

if (isset($_GET['flightId'])) {
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        //book flight
        
    }
}