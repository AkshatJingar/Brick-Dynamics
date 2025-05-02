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
    <title>Brick Dynamics</title>
    <link rel="stylesheet" href="/Website3/css/update_profile.css">
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
                    <a class="anchor" href="req_post.php">Post Property</a>
                </li>
                
                <!-- If login -->
                <?php
                    if(isset($_SESSION['u_email']))
                    {
                        
                ?>

                <li class="menu-item">
                    <div class="dropdown">
                        <div class="profile-details">
                            <img src="/Website3/img/user-profile.png" class="profile">
                        </div>
                        <div class="dropdown-content">
                            <div class="details">
                                <div class="left">
                                    <div class="left-container">
                                        <img src="/Website3/img/users.png">
                                    </div>
                                </div>
                                <div class="right">
                                    <span class="span1">
                                        <?php
                                            $em = $_SESSION['u_email'];
                                            $sql = "SELECT * FROM user WHERE u_email='$em'";
                                            $result = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['u_fname'] ." ". $row['u_lname'];
                                            $user_id = $row['u_id'];
                                        ?>
                                    </span>
                                    <span class="span2">
                                        <?php
                                            echo $_SESSION['u_email'];
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <a href="/Website3/php/my_property_post.php"><img src="/Website3/img/property_post.png">My Property Post</a>
                            <a href="/Website3/php/my_wishlist.php"><img src="/Website3/img/wishlist.png">My Wishlist</a>
                            <a href="/Website3/php/logout.php"><img src="/Website3/img/logout.png">Log Out</a>
                        </div>
                    </div>
                    </a>
                </li>
      
                <!-- If not login -->
                <?php
                    }
                    else
                    {
                ?>

                <li class="menu-item">
                    <a class="anchor" href="/Website3/php/login.php">Login</a>
                </li>
                <li class="menu-item">
                    <a class="anchor" href="/Website3/php/register.php">Register</a>
                </li>

                <?php 
                    }
                ?>

            </ul>
        </nav>
    </div>
    <!-- Nav Bar End -->

    <!-- Pop Up Login Form Start -->
    <?php
        if(isset($_SESSION['message']))
            { 
    ?>
    <script>
        document.getElementById("popup").classList.toggle("active");
    </script>
    <div class="message" id="popup">
        <form id="form">
            <div class="close-btn" onClick="togglePopup()">&times;</div>
            <h2> 
                <?php
                    if(isset($_SESSION['message']))
                    { 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </h2>
        </form>
    </div>
    <?php
        }
    ?>
    <!-- Pop up Login Form End -->

    <!-- Form Start -->
    <?php 
        if(isset($_SESSION['u_email']))
        {
            $em = $_SESSION['u_email'];
            $sql = "SELECT * FROM user WHERE u_email = '$em'";
            $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
    ?>

    <div class="form">
        <form method="post" action="update_submit.php">
            <h1> Update User Details </h1>
            <input type="hidden" name="id" value="<?php echo $row['u_id'] ?>">

            <div>
                <label for="fname" class="lbl">First Name :</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['u_fname'] ?>" placeholder="Enter First Name">
            </div>

            <div>
                <label for="lname" class="lbl">Last Name :</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['u_lname'] ?>" placeholder="Enter Last Name">
            </div>

            <div>
                <label for="email" class="lbl">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['u_email'] ?>" placeholder="Enter Email">
            </div>

            <div>
                <label for="contact" class="lbl">Contact No :</label>
                <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $row['u_contact_no'] ?>" placeholder="Enter Contact Number">
            </div>

            <div>
                <label for="pass" class="lbl">Password :</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['u_password'] ?>" placeholder="Create Password">
            </div>

            <div>
                <label for="pass" class="lbl">Re-Enter Password :</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['u_password'] ?>" placeholder="Re-enter Password">
            </div>

            <div id="submit">
                <input type="submit" class="btn" name="update" value="Update">
            </div>
        </form>
    </div>
    <?php
                    }
                }
                else
                {
    ?>
    <h4> No Record Found </h4>
    <?php
                }
        }
    ?>
    <!-- Form End -->

   
    <!-- Footer Start -->
    <div class="footer">
        <nav class="navbar1">
            <ul class="menus">
                <li class="menu-items">
                    <a class="anchor" href="our_services.php">Our Services</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="terms_and_conditions.php">Terms & Conditions</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="about_us.php">About Us</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="contact_us.php">Contact Us</a>
                </li>
                <li class="menu-items">
                    <a class="anchor" href="feedback.php">Give Feedback</a>
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