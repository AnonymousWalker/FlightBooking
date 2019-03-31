<?php require_once '_navigationBar.php'; ?>
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
        <?php
        if (isset($_POST['login'])) {
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
                    if (session_status() != PHP_SESSION_ACTIVE)
                        session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['userid'] = $row['UserID'];
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $row['FirstName'];
                    header("Location: index.php");
                } else {
                    echo '<h3 style="color: red"> Invalid username or password! Please try again.</h3>';
                }
            }
        }
        ?>
        
        <div class="log-form">
            <h2>Login to your account</h2>
            <form id="login-form" method="POST" action="login.php">
                <div class="flex-column">
                    <input type="text" name="username" title="username" placeholder="Username" />
                    <input type="password" name="password" title="username" placeholder="Password" />
                    <button type="submit" name="login" 
                            class="btn" style="background: #68f57e; margin-top: 20px">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>

