<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/login.css"/>
        <link rel="stylesheet" href="CSS/home.css"/>
    </head>
    <body>
        <?php require_once 'navigationBar.php';?>
        <div class="log-form">
            <h2>Login to your account</h2>
            <form method="POST" action="register.php">
                <div class="flex-column">
                    <input type="text" name="username" title="username" placeholder="Username" />
                    <input type="password" name="password" title="username" placeholder="Password" />
                    <input type="text" name="firstname" title="First Name" placeholder="First Name" />
                    <input type="text" name="lastname" title="Last Name" placeholder="Last Name" />
                    <input type="text" name="email" title="Email" placeholder="someone@abc.com" />
                    <input type="text" name="address" title="Billing Address" placeholder="Street, city, state, zip..." />
                    
                    <button type="submit" name="submit" class="btn" style="background: #68f57e">Register</button>
                </div>
            </form>
        </div>
    </body>
</html>
