<?php
require_once '_navigationBar.php';
require_once 'controller.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != '' && $password != '') {
        // authenticate user in db
        $controller = new Controller();
        $conn = $controller->getDatabaseConnection();

        $query = "SELECT * FROM UserAccount "
                . "WHERE Username = '" . $username . "' AND Password = '" . $password . "' ;";
        
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (session_status() != PHP_SESSION_ACTIVE) session_start();
            $_SESSION['userid'] = $row['UserID'];
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['logged'] = true;
            header("Location: index.php");
             
        } else {
            echo '<h3 style="color:red; text-align:center;">Incorrect username or password! Please try again.</h3>';
        }
    }
}
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/login.css"/>
        <link rel="stylesheet" href="CSS/home.css"/>
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
        <script src="JS/login.js"></script>
        <script src="JS/home.js"></script>
    </head>
    <body>
        <div class="log-form">
            <h2>Login to your account</h2>
            <form id="login-form" method="POST" action="login.php">
                <div class="flex-column">
                    <input type="text" name="username" title="username" placeholder="Username" />
                    <input type="password" name="password" title="username" placeholder="Password" />
                    <button type="submit" name="submit" class="btn" style="background: #68f57e">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>

