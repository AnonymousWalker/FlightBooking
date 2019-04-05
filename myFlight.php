<?php
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

        $userId = $_SESSION['userid'];
        if (isset($userID)) {
            $controller = new Controller();
            $controller->getFlights($userID);
        }
        ?>
    </body>
</html>