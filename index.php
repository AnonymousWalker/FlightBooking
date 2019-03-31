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
        <script src="JS/home.js"></script>
    </head>
    <body>
        <div class="main">
            <h2 style="margin-left: 20px">All Flights</h2>
            <?php
            $controller = new Controller();
            $controller->getFlights();
            ?>
        </div>
    </body>
</html>

<?php
if (session_status() == PHP_SESSION_ACTIVE && isset($_GET['logout'])) {
    $_SESSION['logged'] = false;
    $_SESSION['userid'] = '';
    $_SESSION['username'] = '';
    $_SESSION['firstname'] = '';
    header('Location: index.php');
}
