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
            <h2 style="margin-left: 20px">All available flights here!</h2>
            <?php
                $controller = new Controller();
                $controller->getFlights();
            ?>
        </div>

        <div id="modal-popup" class="modal" style="visibility: hidden;">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Booking confirmation</h2>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ticketId"/>
                    <h3>You are booking this flight?</h3>
                    <button id="confirm-booking">Book now</button>
                    <button class="close-modal">Maybe not</button>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
if (isset($_GET['logout']) && session_status() == PHP_SESSION_ACTIVE) {
        $_SESSION['logged'] = 0;
        $_SESSION['userid'] = '';
        $_SESSION['username'] = '';
        $_SESSION['firstname'] = '';
        header('Location: index.php');
}

