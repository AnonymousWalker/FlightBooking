
<div class="log-form">
  <h2>Login to your account</h2>
  <form method="POST" action="login.php">
    <input type="text" name="username" title="username" placeholder="username" />
    <input type="password" name="password" title="username" placeholder="password" />
    <button type="submit" class="btn">Login</button>
  </form>
</div>

<?php 

if(isset($_POST['submit'])){
    $username = $_POST('username');
    $password = $_POST('password');
    
    if ($username != '' && $password != ''){
        // authenticate user in db
        $servername = "localhost";
        $dbUsername = "atran";
        $dbPassword = "1214730";
        $dbName = "mydb";
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
        
        $query = "SELECT * FROM UserAcount "
                . "WHERE Username = '".$username."' AND Password = '".$password."' ;";
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc(); 
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['logged'] = true; 
            header("Location: index.php");
        } else {
            echo "User doesn't exist! Please try again.";
        }
                    
    }
}