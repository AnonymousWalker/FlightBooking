<!DOCTYPE html>
<?php require_once('controller.php'); ?>

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
        <?php include '_navigationBar.php'; ?>
        <div class="main">
            <?php
            $controller = new Controller();
            $controller->getBookedFlights();
            ?>
        </div>
        <div id="modal-popup" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close-modal">&times;</span>
                    <h2>Booking confirmation</h2>
                </div>
                <div class="modal-body">
                    <h3>You are booking this flight?</h3>
                    <button>Book now</button>
                    <button>Maybe not</button>
                </div>
            </div>

        </div>
    </body>
</html>

<?php
if (session_status() == PHP_SESSION_ACTIVE && isset($_GET['logout'])) {
    $_SESSION['logged'] = false;
    $_SESSION['username'] = '';
    $_SESSION['firstname'] = '';
    header('Location: index.php');
}
