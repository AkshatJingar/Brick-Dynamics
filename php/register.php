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
    <title>Register</title>
    <link rel="stylesheet" href="/Website3/css/register.css">
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
                    <a class="anchor" href="/Website3/php/login.php">Login</a>
                </li>
    </div>
    <!-- Nav Bar End -->

    <!-- Form Start -->
    <div class="form">
        <form method="post" action="register_submit.php">
            <h1> Registration </h1>

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
                <label for="fname" class="lbl">First Name :</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
            </div>

            <div>
                <label for="lname" class="lbl">Last Name :</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
            </div>

            <div>
                <label for="email" class="lbl">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <div>
                <label for="contact" class="lbl">Contact No :</label>
                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" required>
            </div>

            <div>
                <label for="pass" class="lbl">Password :</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Create Password" required>
            </div>

            <div>
                <label for="pass" class="lbl">Re-Enter Password :</label>
                <input type="password" class="form-control" id="pass" name="repass" placeholder="Re-enter Password" required>
            </div>

            <div id="submit">
                <input type="submit" class="btn" name="submit" value="Register">
            </div>

            <div id="links" class="down-links">
                <label for="register" id="register" class="register">Already have an account?<a class="link" href="/Website3/php/login.php"> Login </a></label>
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

    <script>
        function togglePopup(){
            // document.getElementById("blur").classList.toggle("active");
            document.getElementById("popup").classList.toggle("active");
        }
    </script>
</body>

</html>