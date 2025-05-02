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
    <title>Request For Post</title>
    <link rel="stylesheet" href="/Website3/css/req_adv.css">
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
                            <a href="/Website3/php/update_profile.php"><img src="/Website3/img/update_profile.png">Update Profile</a>
                            <a href="/Website3/php/my_property_post.php"><img src="/Website3/img/property_post.png">My Property Post</a>
                            <a href="/Website3/php/my_wishlist.php"><img src="/Website3/img/wishlist.png">Wishlist</a>
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

    <?php
    if(isset($_SESSION['u_email']))
    {
        if(isset($_POST['advertisement']))
        {
            $p_id = $_POST['advertisement'];
    ?>

    <div class="form"> 
        <form method="post" action="req_adv_submit.php" enctype="multipart/form-data">
            <h1> Request For Advertisement </h1>

            <input type="hidden" name="property_id" value="<?php echo $p_id; ?>">

            <div class="advertisement">
                <label for="duration" class="lbl">Advertisement Duration :</label>
                <select id="duration" name="duration" required>
                    <option disabled selected hidden>Select Advertisement Duration</option>
                    <option value="15">15 Days</option>
                    <option value="30">30 Days</option>
                    <option value="45">45 Days</option>
                    <option value="60">60 Days</option>
                    <option value="90">90 Days</option>
                </select>
            </div>

            <div class="date">
                <label for="BHK" class="lbl">Select Date :</label>
                <input type="date" id="date" name="date" placeholder="Select Starting Date" required>
            </div>

            <div class="image">
                <label for="image" class="lbl">Select Images of Property :</label>
                <button type="button" class="img-btn">
                    <img src="/Website3/img/upload.png">Upload Image
                    <input type="file" class="form-control" id="image" name="image" required>
                </button>
            </div>
            
            <input type="hidden" name="status" value="Pending">

            <div class="submit">
                <input type="submit" class="btn" name="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
            }
        }
        else
        { 
    ?> 

    <div class="pop">
        <div class="content-popup">
            <h1 class="h1-popup">Login is Mandatory</h1>
            <p class="p-popup">You must have to <b>Login</b> for sending the request for Property Post.</p>
            <a class="a-popup" href="/Website3/php/login.php"><button class="btn-popup" type="submit">Click here to Login</button></a>
        </div>
    </div>
    
    <?php
        }
    ?>

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
</body>

</html>