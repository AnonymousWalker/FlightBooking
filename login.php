<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/login.css"/>
        <link rel="stylesheet" href="CSS/home.css"/>
    </head>
    <body>
        <?php require_once '_navigationBar.php';?>
        <div class="log-form">
            <h2>Login to your account</h2>
            <form method="POST" action="login.php">
                <div class="flex-column">
                    <input type="text" name="username" title="username" placeholder="Username" />
                    <input type="password" name="password" title="username" placeholder="Password" />
                    <button type="submit" name="submit" class="btn" style="background: #68f57e">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != '' && $password != '') {
        // authenticate user in db
        $servername = "localhost";
        $dbUsername = "atran";
        $dbPassword = "1214730";
        $dbName = "mydb";
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        $query = "SELECT * FROM UserAccount "
                . "WHERE Username = '" . $username . "' AND Password = '" . $password . "' ;";
        
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (session_status() != PHP_SESSION_ACTIVE) session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['logged'] = true;
            header("Location: index.php");
             
        } else {
            echo "Incorrect username or password! Please try again.";
        }
    }
}