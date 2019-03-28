<div class="nav-bar">
    <div class="row-flex">
        <div class="left-group">
            <img width="45" height="45" src="images/ticket.png" alt="ticket-icon" />
            <a href="index.php">
                <img height="40" src="images/cheap-flight.png" alt="Cheap flight title"/>
            </a>
        </div>
        <div class="right-group">
            <button class="login-btn">
                <div>
                    <img class="user-icon" width="30" height="30" src="images/user-account-icon.svg">
                </div>
                <span>Account</span>
            </button>
        </div>
        <div class="account-popup">
            <?php if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['logged'] == true){
                echo "Hello ".$_SESSION['firstname']."!";
            } else {
                echo '<a href="login.php">Login</a>
                    <a href="#">Sign Up</a>';
            }
            ?>
        </div>
    </div>
</div>

