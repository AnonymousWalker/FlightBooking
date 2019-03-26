<!DOCTYPE html>
<?php require_once('controller.php'); ?>

<html style="height: 100%;">
    <head>
        <meta charset="UTF-8">
        <title>Flight Booking</title>
        <link rel="stylesheet" href="CSS/home.css"/>
    </head>
    <body>
        <?php include 'navigationBar.php'; ?>
        <div class="main">
            <?php
            $controller = new Controller();
            $controller->getBookedFlights();
            ?>
        </div>
    </body>
</html>
