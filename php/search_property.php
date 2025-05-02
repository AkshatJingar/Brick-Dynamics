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
    <link rel="stylesheet" href="/Website3/css/search_property.css">
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
                    <a class="anchor" href="/php/req_post.php">Post Property</a>
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
                            <a href="/website3/php/update_profile.php"><img src="/Website3/img/update_profile.png">Update Profile</a>
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
        if(isset($_POST['contact']))
        {
            $id = $_POST['contact'];
            $sql= "SELECT *from property_details WHERE p_id='$id'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                
    ?>

    <div class="post-container">
        <div class="image-container">
            <?php 
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['p_image']) . '" width="100%" height="100%">';
            ?>
         </div>

        <div class="text-container"> 
            <div class="property-details">
                <span class="property">Property Details</span>
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
            </div>

            <div class="fifth-container">
                <span class="owner">Owner Details</span>
                
                <?php
                $uid = $row['u_id'];
                $sql = "SELECT *FROM user WHERE u_id = '$uid'";
                $result = mysqli_query($conn,$sql);
                while($row1 = mysqli_fetch_assoc($result))
                {
                ?>

                <div class="flex">
                    <span class="label">Owner First Name : </span>
                    <span class="value"><?php echo $row1['u_fname']; ?> </span>
                </div>
                <div class="flex">
                    <span class="label">Owner Last Name : </span>
                    <span class="value"><?php echo $row1['u_lname']; ?> </span>
                </div>
                <div class="flex">
                    <span class="label">Owner Contact Number : </span>
                    <span class="value"><?php echo $row1['u_contact_no']; ?> </span>
                </div>
                <div class="flex">
                    <span class="label">Owner Email : </span>
                    <span class="value"><?php echo $row1['u_email']; ?> </span>
                </div>

                <?php
                            }
                        }
                    }
                ?>    
            </div>
        </div>
    </div>

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
        function toggleContact(){
            // document.getElementById("blur").classList.toggle("active");
            document.getElementById("contact").classList.toggle("active");
        }
    </script>

</body>

</html>