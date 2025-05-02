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
    <link rel="stylesheet" href="/Website3/css/index.css">
    <link rel="icon" href="/Website3/img/icon.png">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="header">
        <nav class="navbar">
            <a class="anchor" href="index.php"><img src="/Website3/img/logo.png" class="main-logo"></a>
            <ul class="menu">
                <li class="menu-item">
                    <a class="anchor" href="/Website3/index.php">Home</a>
                </li>
                <li class="menu-item">
                    <a class="anchor" href="php/req_post.php">Post Property</a>
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
                            <a href="/website3/php/my_property_post.php"><img src="/Website3/img/property_post.png">My Property Post</a>
                            <a href="/website3/php/my_wishlist.php"><img src="/Website3/img/wishlist.png">Wishlist</a>
                            <a href="/website3/php/logout.php"><img src="/Website3/img/logout.png">Log Out</a>
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
    
    <!-- Pop Up Message Start -->
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
            <h2 class="heading"> 
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
    <!-- Pop up Message End -->

    <!-- Text & Image Slider Start -->
    <div class="slider-menu">

        <div class="text-menu">
            <div class="text">
                <h1>Find A <span> Perfect Home </span> To Live With Your Family</h1>
                <a class="text-btn" href="#property">Get Started</a>
            </div>
        </div>

        <div class="sliderrr">
            <div class="wrapper">
                <img src="/Website3/img/bg6.jpg">
                <img src="/Website3/img/bg.jpg">
                <img src="/Website3/img/bg4.jpg">
                <img src="/Website3/img/bg3.jpg">
            </div>
        </div>
    </div>
    <!-- Text & Image Slider End -->

    <!-- Search Bar Section Start -->

    <form action="php/search_submit.php" method="post">
    <div class="searchbar">
        <div class="search">
            <select class="search-control" id="category" name="category" required>
                <option disabled selected hidden>Select Property Type</option>
                <option class="option" value="Apartment">Apartment</option>
                <option class="option" value="Duplex">Duplex</option>
                <option class="option" value="Flat">Flat</option>
                <option class="option" value="Office">Office</option>
                <option class="option" value="Penthouse">Penthouse</option>
                <option class="option" value="Plot">Plot</option>
                <option class="option" value="Shop">Shop</option>
                <option class="option" value="Villa">Villa</option>
            </select>
        </div>

        <div class="search">
            <select class="search-control" id="requirement" name="requirement" required>
                <option disabled selected hidden>Select Property Status</option>
                <option value="Rent">Rent</option>
                <option value="Sell">Buy</option>
            </select>
        </div>

        <div class="search">
            <select class="search-control" id="area" name="area" required>
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

        <div class="search-btn">
            <!-- <a href="search.php"> -->
                <input type="submit" class="control-btn" id="submit" name="submit" value="Search Property">
            <!-- </a> -->
        </div>
    </div>
    </form>

    <!-- Property Types Start  -->
    <div class="grid-view">
        <div class="text-center">
            <h1 id="property">Property Types</h1>
        </div>
        <div class="grid-container">

            <form action="php/search_submit.php" method="post" class="grid-container">
                <button class="row-container" name="property" value='Apartment'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/apartments.png">
                    </div>
                    <h3 class="row-h3">Apartments</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Apartment'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Duplex'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/duplex.png">
                    </div>
                    <h3 class="row-h3">Duplex</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Duplex'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Flat'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/flat.png">
                    </div>
                    <h3 class="row-h3">Flats</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Flat'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Office'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/office.png">
                    </div>
                    <h3 class="row-h3">Offices</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Office'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Penthouse'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/penthouse.png">
                    </div>
                    <h3 class="row-h3">Penthouses</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Penthouse'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Plot'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/plot.png">
                    </div>
                    <h3 class="row-h3">Plots</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Plot'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Shop'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/store.png">
                    </div>
                    <h3 class="row-h3">Shops</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Shop'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
    
                <button class="row-container" name="property" value='Villa'>
                    <div class="img-container">
                        <img class="row-img" src="/Website3/img/villa.png">
                    </div>
                    <h3 class="row-h3">Villas</h3>
                    <span class="row-span">
                        <?php
                            $sql = "SELECT * FROM property_details WHERE p_category='Villa'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(($row['p_status']) == "Approved")
                                {
                                    $count = $count + 1;
                                }
                                else
                                {
                                }
                            }
                            echo $count;
                        ?> Properties
                    </span>
                </button>
            </form>
        </div>
    </div>
    <!-- Property Types End -->

    <!-- Property Advertisement Start -->
    <div class="ad_grid_view">
        <div class="ad_text_center">
            <h1 id="property">Property Advertisements</h1>
        </div>
        <div class="Slider_menu">
            <div class="Slider">
                <div class="Slides">
                    <?php
                        $query = "SELECT * FROM advertisement_property WHERE adv_status = 'Approved'";
                        $answer = mysqli_query($conn,$query);
                        while($row1 = mysqli_fetch_assoc($answer)) 
                        {
                            echo '<div class="Slide">
                                    <img class="Slide_image" src="data:image/jpeg;base64,' . base64_encode($row1['adv_image']).'" width="100%" height="100%">
                                  </div>'; 
                        }
                    ?>
                </div>
            </div>
            <div class="ad_text_menu">
                <div class="ad_text">
                    <h1>Post Your Property Post To Send <span> Property Advertisement </span> Request. </h1>
                    <a class="ad_text_btn" href="/Website3/php/req_post.php">Post Property</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Advertisement End -->

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
        //For Pop up Messages
        function togglePopup()
        {
            document.getElementById("popup").classList.toggle("active");
        }



        //For Property Advertisement Image Slider

        const slider = document.querySelector('.Slider'); // Main Slider Container
        const slides = slider.querySelector('.Slides');   // Particular Slide Container
        const slideCount = slides.children.length;        // Count total number of slides by counting "slides" class childern length
        let currentIndex = 0;  // Variable for storing current index , by default initialized as 0
        
        
        function showSlide(index) // Used for displaying slide which takes an index parameter, which represents the position of the slide to be shown.
        {
            slides.style.transform = `translateX(-${index * 100}%)`;
            currentIndex = index;
        }
        
        function nextSlide()  // Used for moving to next slide after interval
        {
            currentIndex = (currentIndex + 1) % slideCount;
            showSlide(currentIndex);
        }
        
        function previousSlide() // Used for moving to first slide after reaching the last slide
        {
            currentIndex = (currentIndex - 1 + slideCount) % slideCount;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 3000); // Automatically advance to the next slide every 3 seconds
    </script>

</body>
</html>