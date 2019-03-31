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
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
        <script src="JS/home.js"></script>
    </head>
    <body>
        <div class="main">
            <?php
            ?>
            
            <?php
            $controller = new Controller();
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                echo '<h2 style="margin-left: 20px">Hello, '. $_SESSION['firstname'].
                        '! Your booked flights are listed below.'.'</h2>';
                $userID = $_SESSION['userid'];
                $controller->getFlights($userID);
            } else {
                echo '<h2 style="margin-left: 20px">All booked flights</h2>';
                $controller->getFlights();
            }
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

