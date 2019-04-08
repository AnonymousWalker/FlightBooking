<html>
    <head>
        <title>Register </title>
        <link rel="stylesheet" href="CSS/login.css"/>
        <link rel="stylesheet" href="CSS/home.css"/>
        <script src="JS/lib/jquery-3.3.1.min.js"></script>
        <script src="JS/login.js"></script>
        <script src="JS/home.js"></script>
    </head>
    <body>
        <?php require_once '_navigationBar.php';?>
        <div class="log-form">
            <h2>Create a new account</h2>
            <form id="signup-form" method="POST" action="register.php">
                <div class="flex-column">
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="text" name="firstname" placeholder="First Name" />
                    <input type="text" name="lastname" placeholder="Last Name" />
                    <input type="text" name="email" placeholder="someone@abc.com" />
                    <input type="text" name="address" placeholder="Street, city, state, zip..." />
                    
                    <button type="submit" name="submit" class="btn" 
                            style="background: #68f57e; margin-top: 20px">Register</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
require_once 'controller.php';
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();
if (isset($_POST['signup'])) {
    //collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $controller = new Controller();
    $conn = $controller->getDatabaseConnection();
    
    //check if user existing 
    $query = "SELECT * FROM UserAccount WHERE Username = '" . $username . "'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo '<h3 style="color: red;">Account already existed</h3>';
        return;
    }
    $query = "INSERT INTO UserAccount (Username, Password, FirstName, LastName, Email, Address)"
            . " VALUES ('%s','%s','%s','%s','%s','%s');";
    $query = sprintf($query, $username, $password, $firstname, $lastname, $email, $address);

    echo $query;
    if ($conn->query($query) == true) {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['logged'] = true;
        header("Location: index.php");
    } else {
        echo '<h3 style="color: red">Cannot create account. Please try again!</h3>';
    }
}