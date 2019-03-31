<?php
include "_navigationBar.php";
include_once "controller.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Flights</title>
        <link rel="stylesheet" href="CSS/home.css"/>
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <h2 style="margin-left: 20px">My booked flights</h2>
        <?php
        include_once "_navigationBar.php";
        include_once "controller.php";

        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        $userID = $_SESSION['userid'];
        if (isset($userID)) {
            $controller = new Controller();
            $controller->getFlights($userID);
        }

        ?>
    </body>
</html>

