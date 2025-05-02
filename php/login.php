<?php      
    include('connection.php');
    session_start();
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Website3/css/login.css">
    <link rel="icon" href="/Website3/img/icon.png">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="header">
        <nav class="navbar">
            <a class="anchor" href="/Website3/index.php"><img src="/Website3/img/logo.png" class="main-logo"></a>
            <ul class="menu">
                <li class="menu-item">
                    <a class="anchor" href="/Website3/index.php">Home</a>
                </li>
                <li class="menu-item">
                    <a class="anchor" href="/Website3/php/register.php">Register</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Nav Bar End -->
    
    <!-- Form Start -->
    <div class="form">
        <form method="post" action="login_submit.php">
            <h1> Login </h1>

            <span class="form_span">     
                <?php
                    if(isset($_SESSION['message']))
                    { 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?> 
            </span>
            
            <div>
                <label for="email" class="lbl">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <div>
                <label for="pass" class="lbl">Password :</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required>
            </div>

            <div>
                <input type="submit" class="btn" name="submit" value="Submit" required>
            </div>

            <div class="down-links">
                <label class="forgot-password"><a class="link" href="/Website3/php/forgot.php">Forgot Password?</a></label>
            </div>

            <div class="down-links">
                <label for="register" id="register" class="register">Don't have an account?<a class="link" href="/Website3/php/register.php"> Register Here</a></label>
            </div>
        </form>
    </div>
    <!-- Form End -->

    <!-- Footer Start -->
    <div class="footer">
        <nav class="navbar1">
            <ul class="menus">
                <li class="menu-items">
                    <a class="anchor" href="php/our_services.php">Our Services</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="php/terms_and_conditions.php">Terms & Conditions</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="php/about_us.php">About Us</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="php/contact_us.php">Contact Us</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="php/feedback.php">Give Feedback</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Footer End -->
    
</body>

</html>