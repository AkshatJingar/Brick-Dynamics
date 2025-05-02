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
    <link rel="stylesheet" href="/website3/admin/view_property.css">
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
                <span class="dashboard">View Property</span>
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

        <!-- For Displaying Message Start-->
        <?php
            if(isset($_SESSION['message']))
            {
        ?>
        <div style="width:100% height:100%; background-color:#01c99a; padding:20px; margin:25px;">
            <strong>Hey!  </strong><?php echo $_SESSION['message'] ?>
        </div>
        <?php
                unset($_SESSION['message']);
            }
        ?>
        <!-- For Displaying Message End-->
        
        <!-- Home section table start -->
        <div class="tbl">
            <span class="details-name">Property Details</span>
            <table border="1">
                <tr>
                    <th class="column-id">P Id</th>
                    <th class="column-id">U Id</th>
                    <th class="column-id">Req type</th>
                    <th class="column-id">P type</th>
                    <th class="column-id">Category</th>
                    <th class="column-id">Age</th>
                    <th class="column-id">Furnished</th>
                    <th class="column-id">BHK</th>
                    <th class="column-id">Covered Area</th>
                    <th class="column-id">Price</th>
                    <th class="column">Address</th>
                    <th class="column-id">District</th>
                    <th class="column-id">Area</th>
                    <th class="column-id">Pincode</th>
                    <th class="column">Features</th>
                    <th class="column">Image</th>
                    <th class="column-id">Bed Room</th>
                    <th class="column-id">Bath Room</th>
                    <th class="column-id">Floor</th>
                    <th class="column-id">Pro Status</th>
                    <th class="column-id">Status</th>
                    <th>Updation</th>
                </tr>
                
                <?php
                    $sql = " SELECT * FROM property_details ";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                        {
                ?>
                
                <tr>
                    <td>
                        <?php echo $row['p_id'] ?>
                    </td>
                    <td>
                        <?php echo $row['u_id']   ?>
                    </td>
                    <td>
                        <?php echo $row['req_type']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_type']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_category'] ?>
                    </td>
                    <td>
                        <?php echo $row['p_age']   ?>
                    </td>
                    <td>
                        <?php echo $row['furnished']   ?>
                    </td>
                    <td>
                        <?php echo $row['BHK']   ?>
                    </td>
                    <td>
                        <?php echo $row['covered_area'] ?>
                    </td>
                    <td>
                        <?php echo $row['p_price']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_address']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_district']   ?>
                    </td>
                   <td>
                        <?php echo $row['p_area'] ?>
                    </td>
                    <td>
                        <?php echo $row['p_pincode']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_features']   ?>
                    </td>
                    <td>
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['p_image']) . '" width="100%" height="100%">'; ?>
                    </td>
                    <td>
                        <?php echo $row['bedroom']   ?>
                    </td>
                    <td>
                        <?php echo $row['bathroom']   ?>
                    </td>
                    <td>
                        <?php echo $row['floor']   ?>
                    </td>
                    <td>
                        <?php echo $row['pro_status']   ?>
                    </td>
                    <td>
                        <?php echo $row['p_status']   ?>
                    </td>
                    <td>
                        <div class="updation">
                            <form action="pro_up_submit.php" method="post">
                                <button type="submit" name="approve" value="<?php echo $row['p_id'] ?>" class="updation-btn">Approve</button>
                            </form>
                            <form action="pro_up_submit.php" method="post">
                                <button type="submit" name="reject" value="<?php echo $row['p_id'] ?>" class="updation-btn">Reject</button>
                            </form>
                            <form action="pro_up_submit.php" method="post">
                                <button type="submit" name="delete" value="<?php echo $row['p_id'] ?>" class="updation-btn last-btn">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <?php
                        }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
        <!-- Home section table end -->
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