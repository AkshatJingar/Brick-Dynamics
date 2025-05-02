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
    <link rel="stylesheet" href="/Website3/css/req_post.css">
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
    if(isset($_SESSION['u_email'])){
    ?>

    <div class="form"> 
        <form method="post" action="req_post_submit.php" enctype="multipart/form-data">
            <?php
                $em = $_SESSION['u_email'];
                $sql = "SELECT * FROM user WHERE u_email='$em'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="u_id" value="<?php echo $row['u_id']; ?>">

            <h1> Request For Post </h1>

            <div class="req_radio">
                <label class="lbl">I'm looking to :</label>
                <div>
                    <input type="radio" id="sell" name="requirement" value="Sell">
                    <label for="Sell">Sell</label>
                </div>
                <div>
                    <input type="radio" id="rent" name="requirement" value="Rent">
                    <label for="Rent">Rent</label>
                </div>
            </div>

            <div class="pro_radio">
                <label class="lbl">Which kind of Property ?</label>
                <div>
                    <input type="radio" id="residential" name="property" value="Residential">
                    <label for="Residential">Residential</label>
                </div>
                <div>
                    <input type="radio" id="commercial" name="property" value="Commercial">
                    <label for="Commercial">Commercial</label>
                </div>
            </div>

            <div>
                <label for="category" class="lbl">Category :</label>
                <select id="category" name="category" required>
                    <option disabled selected hidden>Select Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Duplex">Duplex</option>
                    <option value="Flat">Flat</option>
                    <option value="Office">Office</option>
                    <option value="Penthouse">Penthouse</option>
                    <option value="Plot">Plot</option>
                    <option value="Shop">Shop</option>
                    <option value="Villa">Villa</option>
                </select>
            </div>

            <div>
                <label for="BHK" class="lbl">BHK :</label>
                <select id="BHK" name="BHK" required>
                    <option disabled selected hidden>Select BHK</option>
                    <option value="1 BHK">1 BHK</option>
                    <option value="2 BHK">2 BHK</option>
                    <option value="3 BHK">3 BHK</option>
                    <option value="4 BHK">4 BHK</option>
                    <option value="5 BHK">5 BHK</option>
                    <option value="5 +BHK">5+ BHK</option>
                </select>
            </div>

            <div>
                <label for="furnished" class="lbl">Furnished :</label>
                <select id="furnished" name="furnished" required>
                    <option disabled selected hidden>Select Type</option>
                    <option value="Non-furnished">Non-furnished</option>
                    <option value="Semi-furnished">Semi-furnished</option>
                    <option value="Fully-furnished">Fully-furnished</option>
                </select>
            </div>

            <div>
                <label for="covered_area" class="lbl">Covered Area :</label>
                <input type="number" class="form-control" id="covered_area" name="covered_area"
                    placeholder="Enter Covered Area" required>
            </div>

            <div class="age">
                <label for="age_num" class="lbl">Age Of Property :</label>
                <input type="number" class="form-control" id="age_num" name="age_num" placeholder="Enter Age" required>
            </div>

            <div>
                <label for="district" class="lbl">District :</label>
                <select id="district" name="district" required>
                    <option disabled selected hidden>Select District</option>
                    <option value="Vadodara">Vadodara</option>
                </select>
            </div>

            <div>
                <label for="area" class="lbl">Area :</label>
                <select id="area" name="area" required>
                    <option disabled selected hidden>Select Property Area</option>
                    <option value="Akota">Akota</option>
                    <option value="Alkapuri">Alkapuri</option>
                    <option value="Atladra">Atladra</option>
                    <option value="Fatehgunj">Fatehgunj</option>
                    <option value="Karelibaug">Karelibaug</option>
                    <option value="Makarpura">Makarpura</option>
                    <option value="Manjalpur">Manjalpur</option>
                    <option value="Subhanpura">Subhanpura</option>
                    <option value="Tarsali">Tarsali</option>
                    <option value="Waghodia">Waghodia</option>
                </select>
            </div>

            <div>
                <label for="pincode" class="lbl">Pincode :</label>
                <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode"
                    required>
            </div>

            <div class="address">
                <label for="address" class="lbl">Address :</label>
                <textarea id="address" name="address" rows="3" cols="50" placeholder="Enter Address"
                    required></textarea>
            </div>

            <div class="features">
                <label for="features" class="lbl">Additional Features :</label>
                <textarea id="features" name="features" rows="3" cols="50" placeholder="Enter Additional Features"
                    required></textarea>
            </div>

            <div class="price">
                <label for="price" class="lbl">Price :</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
            </div>

            <div class="image">
                <label for="image" class="lbl">Select Images of Property :</label>
                <button type="button" class="img-btn">
                    <img src="/Website3/img/upload.png">Upload Image
                    <input type="file" class="form-control" id="image" name="image" multiple required>
                </button>
            </div>

            <div class="age">
                <label for="age_num" class="lbl">Bedroom :</label>
                <input type="number" class="form-control" id="age_num" name="bedroom" placeholder="Enter Bedroom" required>
            </div>

            <div class="age">
                <label for="age_num" class="lbl">Bathroom :</label>
                <input type="number" class="form-control" id="age_num" name="bathroom" placeholder="Enter Bathroom" required>
            </div>

            <div class="age">
                <label for="age_num" class="lbl">Floor :</label>
                <input type="number" class="form-control" id="age_num" name="floor" placeholder="Enter Floor" required>
            </div>

            <div>
                <label for="pro_status" class="lbl">Property Status :</label>
                <select id="pro_status" name="pro_status" required>
                    <option disabled selected hidden>Select Property Status</option>
                    <option value="Ready To Move">Ready To Move</option>
                    <option value="Under Construction">Under Construction</option>
                </select>
            </div>
            
            <input type="hidden" name="status" value="Pending">

            <div class="submit">
                <input type="submit" class="btn" name="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
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