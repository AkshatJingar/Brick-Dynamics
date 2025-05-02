<?php
    include('connection.php');
    session_start();

    // For User Update Operation Start
    if(isset($_POST["update"]))
    {
        $id = $_POST["id"];
        $fnm = $_POST["fname"];
        $lnm = $_POST["lname"];
        $em = $_POST["email"];
        $cont = $_POST["contact"];
        $pass = $_POST["pass"];
    
        $sql = "UPDATE user SET u_fname='$fnm' , u_lname='$lnm' , u_email='$em' , u_contact_no='$cont' , u_password='$pass' WHERE u_id ='$id'";
        $check = mysqli_query($conn ,$sql);   
        if($check)
            {
                $_SESSION['message'] = " User Details Updated Successfully";
                header("Location: users.php");
            }
        else
            {
                echo mysqli_error($conn);
            }    
    }
    // For User Update Operation End

    // For calling User Delete Operation Start
    if(isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        $sql = "DELETE FROM user WHERE u_id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $_SESSION['message'] = " User Deleted Successfully";
            header('Location: users.php');
        }
        else
        {
            $_SESSION['message'] = " Something went wrong..!";
            header('Location: users.php');
        }
    }
    //For calling User Deletion Operation End