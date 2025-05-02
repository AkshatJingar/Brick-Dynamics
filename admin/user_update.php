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
    <link rel="stylesheet" href="/website3/admin/user_update.css">
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
                <span class="dashboard">Update Details</span>
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

        <!-- Form Start -->
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE u_id = '$id'";
                $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
        ?>

        <div class="form">
            <form method="post" action="user_up_submit.php">
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