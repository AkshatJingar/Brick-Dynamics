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
    <link rel="stylesheet" href="/Website3/admin/dashboard.css">
    <link rel="icon" href="/website3/img/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
</head>

<body>

    <div class="sidebar">
        <div class="logo-details">
            <img class="logo_image" src="/website3/img/icon.png">
            <span class="logo_name">Brick Dynamics</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/website3/admin/dashboard.php">
                    <img src="/website3/img/dashboard.png">
                    <span class="links_name">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/website3/admin/users.php">
                    <img src="/website3/img/users.png">
                    <span class="links_name">Users</span>
                </a>
            </li>

            <li>
                <a href="/website3/admin/add_property.php">
                    <img src="/website3/img/add_property.png">
                    <span class="links_name">Add Property</span>
                </a>
            </li>

            <li>
                <a href="/website3/admin/view_property.php">
                    <img src="/website3/img/view_property.png">
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
                <a href="/website3/admin/feedback.php">
                    <img src="/website3/img/feedback.png">
                    <span class="links_name">Feedback</span>
                </a>
            </li>

            <li class="log_out">
                <a href="/website3/admin/logout.php">
                    <img src="/website3/img/logout.png">
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
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="dropdown">
                <div class="profile-details">
                    <img class="img1" src="/website3/img/user-profile.png">
                    <span class="admin_name">
                        <?php
                        $em = $_SESSION['a_email'];
                        $sql = "SELECT * FROM admin WHERE a_email='$em'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['a_name'];
                        ?>
                    </span>
                    <img class="img2" src="/website3/img/down-arrow.png">
                </div>
                <div class="dropdown-content">
                    <a href="#"><img src="/website3/img/update_profile.png">Update Profile</a>
                </div>
            </div>
        </nav>
        <!-- Home section navbar end -->

        <!-- Home section content start -->
        <div class="home-content">
            <div class="overview-boxes">

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Registered Users</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM user";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1" src="/website3/img/Registered Users.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Properties</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details ";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                       ?>
                        </div>
                    </div>
                    <img class="icon1 icon2" src="/website3/img/total_properties.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Sell Properties</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE req_type='Sell'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                       ?>
                        </div>
                    </div>
                    <img class="icon1 icon3" src="/website3/img/sell.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Rent Properties</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE req_type='Rent'";
                       $result = mysqli_query($conn, $sql);
                       $count=(mysqli_num_rows($result));
                        echo $count;
                       ?>
                        </div>
                    </div>
                    <img class="icon1 icon4" src="/website3/img/rent.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Apartments</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Apartment'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon5" src="/website3/img/apartments.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Duplex</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Duplex'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon6" src="/website3/img/duplex.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Flats</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Flat'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon7" src="/website3/img/flat.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Offices</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Office'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon8" src="/website3/img/office.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Penthouses</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Penthouse'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon9" src="/website3/img/penthouse.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Plots</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Plot'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon10" src="/website3/img/plot.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Shops</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Shop'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon11" src="/website3/img/store.png">
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Villas</div>
                        <div class="number">
                        <?php
                        $sql = "SELECT * FROM property_details WHERE p_category='Villa'";
                        $result = mysqli_query($conn, $sql);
                        $count=(mysqli_num_rows($result));
                        echo $count;
                        ?>
                        </div>
                    </div>
                    <img class="icon1 icon12" src="/website3/img/villa.png">
                </div>
            </div>
        </div>
        <!-- Home section content end -->

        <div class="tbl">
            <span class="details-name">Admin Details</span>
            <table>
                <tr>
                    <th>Admin Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>

               
                <?php
        
                include('connection.php');
                $sql = " SELECT * FROM admin ";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
            ?>


                <tr>
                    <td>  
                        <?php echo "{$row['a_id']}"  ?>
                    </td>
                    <td>
                        <?php echo "{$row['a_name']}"   ?>
                    </td>
                    <td>
                        <?php echo "{$row['a_email']}"   ?>
                    </td>
                    <td>
                        <?php echo "{$row['a_password']}"   ?>
                    </td>
                    
                </tr>
                    
                <?php
                    }
                      
                mysqli_close($conn);
            ?>
            </table>
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