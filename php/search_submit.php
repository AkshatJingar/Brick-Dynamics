<?php
    include('connection.php');
    session_start();
    $search_results = [];

    if(isset($_POST['property']))
    {
        $p = $_POST['property'];
        $sql= "SELECT *from property_details WHERE p_category='$p' and p_status='Approved'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $search_results[] = $row;
        }
    }
    else
    {
        $temp = 0;
        if(isset($_POST["submit"]))
        {
            if(isset($_POST["category"]) and isset($_POST["requirement"]) and isset($_POST["area"]))
            {
                $cat = $_POST["category"];
                $req = $_POST["requirement"];
                $area = $_POST["area"];
                $sql = "SELECT *FROM property_details WHERE p_category='$cat' and req_type='$req' and p_area='$area' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else if(isset($_POST["category"]) and isset($_POST["requirement"]))
            {
                $cat = $_POST["category"];
                $req = $_POST["requirement"];
                $sql = "SELECT *FROM property_details WHERE p_category='$cat' and req_type='$req' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            } 
            else if(isset($_POST["requirement"]) and isset($_POST["area"]))
            {
                $req = $_POST["requirement"];
                $area = $_POST["area"];
                $sql = "SELECT *FROM property_details WHERE req_type='$req' and p_area='$area' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else if(isset($_POST["category"]) and isset($_POST["area"]))
            {
                $cat = $_POST["category"];
                $area = $_POST["area"];
                $sql = "SELECT *FROM property_details WHERE p_category='$cat' and p_area='$area' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else if(isset($_POST["category"]))
            {
                $cat = $_POST["category"];
                $sql = "SELECT *FROM property_details WHERE p_category='$cat' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else if(isset($_POST["requirement"]))
            {
                $req = $_POST["requirement"];
                $sql = "SELECT *FROM property_details WHERE req_type='$req' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else if(isset($_POST["area"]))
            {
                $area = $_POST["area"];
                $sql = "SELECT *FROM property_details WHERE p_area='$area' and p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }
            else
            {
                $sql = "SELECT *FROM property_details WHERE p_status='Approved'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $search_results[] = $row;
                }
            }   
        }
    }
    $_SESSION['results'] = $search_results;
    header("Location: search.php");
?>