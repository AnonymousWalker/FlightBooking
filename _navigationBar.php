<div class="nav-bar">
    <div class="row-flex">
        <div class="left-group">
            <img width="45" height="45" src="images/ticket.png" alt="ticket-icon" />
            <a href="index.php">
                <img height="40" src="images/cheap-flight.png" alt="Cheap flight title"/>
            </a>
        </div>
        <div class="right-group">
            <button class="account-btn">
                <div>
                    <img class="user-icon" width="30" height="30" src="images/user-account-icon.svg">
                </div>
                <span class="button-text">Account</span>
            </button>
        </div>
        <div class="account-popup flex-column">
            <?php 
            if (session_status() != PHP_SESSION_ACTIVE){ 
                session_start();
            }
                
            if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
                echo '<p>Hello '.$_SESSION['firstname'].'!</p>'
                        .'<div class="login-btn"><a href="myFlight.php"><span>My Flights</span></a></div>'
                        .'<br>'
                        .'<form method="GET" action="index.php">'
                        .'<div class="login-btn">'
                        . '<a id="log-out-btn" href="#">'
                        . '<span>'
                        .'Logout'
                        . '</span></a>'
                        .'</div>'
                        . '</form>';
            } else {
                echo '<div class="login-btn">
                    <a href="login.php"><span>Login</span></a>
                    </div>
                    <br/>
                    <div class="login-btn">
                    <a href="register.php"><span>Sign Up</span></a>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>

