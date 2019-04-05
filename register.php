<html>
    <head>
        <title>Register </title>
        <link rel="stylesheet" href="CSS/login.css"/>
        <link rel="stylesheet" href="CSS/home.css"/>
    </head>
    <body>
        <?php require_once '_navigationBar.php';?>
        <div class="log-form">
            <h2>Create a new account</h2>
            <form method="POST" action="register.php">
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