<?php
include('connection.php');
session_start();
if(isset($_SESSION['a_email']))
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/Website3/admin/add_property.css">
    <link rel="icon" href="/Website3/img/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
</head>

<body>

    <!-- Sidebar Start -->
    <div class="sidebar">
        <div class="logo-details">
            <img class="logo_image" src="/Website3/img/icon.png">
            <span class="logo_name">Brick Dynamics</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/Website3/admin/dashboard.php">
                    <img src="/Website3/img/dashboard.png">
                    <span class="links_name">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/Website3/admin/users.php">
                    <img src="/Website3/img/users.png">
                    <span class="links_name">Users</span>
                </a>
            </li>

            <li>
                <a href="/Website3/admin/add_property.php">
                    <img src="/Website3/img/add_property.png">
                    <span class="links_name">Add Property</span>
                </a>
            </li>

            <li>
                <a href="/Website3/admin/view_property.php">
                    <img src="/Website3/img/view_property.png">
                    <span class="links_name">View Property</span>
                </a>
            </li>

            <li>
                <a href="/website3/admin/view_advertisement.php">
                    <img src="/website3/img/view_advertisement.png">
                    <span class="links_name">View Advertisement</span>
                </a>
            </li>
            
            <li>
                <a href="/Website3/admin/feedback.php">
                    <img src="/Website3/img/feedback.png">
                    <span class="links_name">Feedback</span>
                </a>
            </li>

            <li class="log_out">
                <a href="/Website3/admin/logout.php">
                    <img src="/Website3/img/logout.png">
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar end -->

    <!-- Home section start -->
    <section class="home-section">

        <!-- Home section navbar start -->
        <nav>
            <div>
                <span class="dashboard">Add Property</span>
            </div>
            <div class="dropdown">
                <div class="profile-details">
                    <img class="img1" src="/Website3/img/user-profile.png">
                    <span class="admin_name">
                        <?php
                        $em = $_SESSION['a_email'];
                        $sql = "SELECT * FROM admin WHERE a_email='$em'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['a_name'];
                        ?>
                    </span>
                    <img class="img2" src="/Website3/img/down-arrow.png">
                </div>
                <div class="dropdown-content">
                    <a href="#"><img src="/Website3/img/update_profile.png">Update Profile</a>
                </div>
            </div>
        </nav>
        <!-- Home section navbar end -->

        <div class="form">
            <form method="post" action="/Website3/admin/add_property_submit.php" enctype="multipart/form-data">

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
                        <option value="1BHK">1 BHK</option>
                        <option value="2BHK">2 BHK</option>
                        <option value="3BHK">3 BHK</option>
                        <option value="4BHK">4 BHK</option>
                        <option value="5BHK">5 BHK</option>
                        <option value="5+BHK">5+ BHK</option>
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
                    <input type="number" class="form-control" id="covered_area" name="covered_area" placeholder="Enter Covered Area" required>
                </div>

                <div class="age">
                    <label for="age_num" class="lbl">Age Of Property :</label>
                    <input type="number" class="form-control" id="age_num" name="age_num" placeholder="Enter Age" required>
                </div>

                <div>
                    <label for="district" class="lbl">District :</label>
                    <select id="district" name="district" required>
                        <option disabled selected hidden>Select District</option>
                        <option v adodara">Vadodara</option>
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
                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" required>
                </div>

                <div class="address">
                    <label for="address" class="lbl">Address :</label>
                    <textarea id="address" name="address" rows="3" cols="50" placeholder="Enter Address" required></textarea>
                </div>

                <div class="features">
                    <label for="features" class="lbl">Additional Features :</label>
                    <textarea id="features" name="features" rows="3" cols="50" placeholder="Enter Additional Features" required></textarea>
                </div>

                <div class="price">
                    <label for="price" class="lbl">Price :</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                </div>

                <div class="image">
                    <label for="image" class="lbl">Select Images of Property :</label>
                    <button type="button" class="img-btn">
                        <img src="/Website3/img/upload.png">Upload Image
                        <input type="file" class="form-control" id="image" name="image" required>
                    </button>
                </div>
                

                <input type="hidden" name="status" value="Pending">

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

                <div class="submit">
                    <input type="submit" class="btn" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </section>
    <!-- Home section end -->
</body>

</html>
<?php
}
else    
{
    header('Location: http://localhost/Website3/admin/index.html');
}
?>