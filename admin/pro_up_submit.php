<?php
    include('connection.php');
    session_start();

    // For Property Approve Operation Start
    if(isset($_POST["approve"]))
    {
        $id = $_POST['approve'];
        $status = "Approved";
        $sql2 = "UPDATE property_details SET p_status='$status' WHERE p_id ='$id'";
        $execute = mysqli_query($conn,$sql2);
        if($execute)
            {
                $_SESSION['message'] = " Property Approved ";
                header("Location: view_property.php");
            }
        else
            {
                $_SESSION['message'] = " Something Went Wrong ";
                header("Location: view_property.php");
            } 
    }
    // For Property Approve Operation End

    // For Property Reject Operation Start
    if(isset($_POST['reject']))
    {
        $id = $_POST['reject'];
        $status = "Rejected";
        $sql2 = "UPDATE property_details SET p_status='$status' WHERE p_id ='$id'";
        $execute = mysqli_query($conn,$sql2);
        if($execute)
            {
                $_SESSION['message'] = " Property Rejected ";
                header("Location: view_property.php");
            }
        else
            {
                $_SESSION['message'] = " Something Went Wrong ";
                header("Location: view_property.php");
            }  
    }
    //For Property Reject Operation End

    // For Property Delete Operation Start
    if(isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        $sql = "DELETE FROM property_details WHERE p_id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $_SESSION['message'] = " Property Deleted Successfully";
            header('Location: view_property.php');
        }
        else
        {
            $_SESSION['message'] = " Something went wrong..!";
            header('Location: view_property.php');
        }
    }
    //For Property Deletion Operation End