<?php
    include('connection.php');
    session_start();

    // For Advertisement Approve Operation Start
    if(isset($_POST["approve"]))
    {
        $id = $_POST['approve'];
        $status = "Approved";
        $sql2 = "UPDATE advertisement_property SET adv_status='$status' WHERE adv_id ='$id'";
        $execute = mysqli_query($conn,$sql2);
        if($execute)
            {
                $_SESSION['message'] = " Advertisement Approved ";
                header("Location: view_advertisement.php");
            }
        else
            {
                $_SESSION['message'] = " Something Went Wrong ";
                header("Location: view_advertisement.php");
            } 
    }
    // For Advertisement Approve Operation End

    // For Advertisement Reject Operation Start
    if(isset($_POST['reject']))
    {
        $id = $_POST['reject'];
        $status = "Rejected";
        $sql2 = "UPDATE advertisement_property SET adv_status='$status' WHERE adv_id ='$id'";
        $execute = mysqli_query($conn,$sql2);
        if($execute)
            {
                $_SESSION['message'] = " Advertisement Rejected ";
                header("Location: view_advertisement.php");
            }
        else
            {
                $_SESSION['message'] = " Something Went Wrong ";
                header("Location: view_advertisement.php");
            }  
    }
    //For Advertisement Reject Operation End

    // For Advertisement Delete Operation Start
    if(isset($_POST['delete']))
    {
        $id = $_POST['delete'];
        $sql = "DELETE FROM advertisement_property WHERE adv_id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $_SESSION['message'] = " Property Deleted Successfully";
            header('Location: view_advertisement.php');
        }
        else
        {
            $_SESSION['message'] = " Something went wrong..!";
            header('Location: view_advertisement.php');
        }
    }
    //For Advertisement Deletion Operation End