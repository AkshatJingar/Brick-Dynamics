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
    <link rel="stylesheet" href="/Website3/css/my_property_post.css">
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
                            <a href="/website3/php/update_profile.php"><img src="/Website3/img/update_profile.png">Update Profile</a>
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

    <!-- Property Listing Start-->
    <div class="post-view">
        
        <div class="h1-center">
            <h1 id="property">Property Listing</h1>
        </div>
            
        <div class="post-grid">

            <?php
            if(isset($_SESSION['u_email']))
            {
                $em = $_SESSION['u_email'];
                $sql1 = "SELECT * FROM user WHERE u_email='$em'";
                $result1 = mysqli_query($conn,$sql1);
                while ($row1 = mysqli_fetch_assoc($result1))
                {
                    $user_id = $row['u_id'];
                    $sql="SELECT * FROM property_details WHERE u_id='$user_id'";
                    $result=mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result))
                        {
                            $p_id = $row['p_id'];
            ?>
        
            <div class="post-container">
                <div class="image-container">
                    <?php 
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['p_image']) . '" width="100%" height="100%">';
                    ?>
                </div>
    
                <div class="text-container"> 
                    <div class="first-container">
                        <span>₹  <?php echo $row["p_price"] ?> </span>
                    </div>

                    <div class="second-container">
                        <span> <?php echo $row["p_category"] ?> </span>
                        in
                        <span> <?php echo $row["p_area"] ?> </span>
                        for
                        <span> <?php echo $row["req_type"] ?> </span>
                    </div>

                    <div class="third-container">
                        <img src="/Website3/img/location.png">
                        <span> <?php echo $row["p_address"] ?> </span>
                    </div>

                    <div class="fourth-container">

                        <div class="flex">
                            <img src="/Website3/img/property_age.png" class="icons">
                            <span> <?php echo $row["p_age"] ?>  Years</span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/furnished.png" class="icons">
                            <span> <?php echo $row["furnished"] ?> </span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/covered_area.png" class="icons">
                            <span> <?php echo $row["covered_area"] ?>  sqft</span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/BHK.png" class="icons">
                            <span> <?php echo $row["BHK"] ?> </span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/bedroom.png" class="icons">
                            <span> <?php echo $row["bedroom"] ?>  Bedrooms</span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/bathroom.png" class="icons">
                            <span> <?php echo $row["bathroom"] ?>  Bathrooms</span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/floor.png" class="icons">
                            <span> <?php echo $row["floor"] ?>  Floors</span>
                        </div>

                        <div class="flex">
                            <img src="/Website3/img/pro_status.png" class="icons">
                            <span> <?php echo $row["pro_status"] ?> </span>
                        </div>
                    </div>

                    <div class="btns">
                        <div class="status"> Post Request <?php echo $row["p_status"] ?> </div>

                        <?php 
                            $sql3 = "SELECT * FROM advertisement_property WHERE p_id = '$p_id'";
                            $result3 = mysqli_query($conn,$sql3);
                            if(mysqli_num_rows($result3) > 0)
                            {
                                while ($row2 = mysqli_fetch_assoc($result3))
                                {
                        ?>
                        <div class="status"> Advertisement Request <?php echo $row2["adv_status"] ?> </div>
                        <?php
                                }
                            }
                            else
                            {
                        ?>
                        <form action="req_adv.php" method="post">
                            <button type="submit" name="advertisement" value="<?php echo $p_id; ?>" class="submit_btn">Post Advertisement</button>
                        </form>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>

            <?php              
                            }
                        
                    }
                }
            ?>
        </div>
    </div>
    <!-- Property Listing End-->

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