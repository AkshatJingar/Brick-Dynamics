<?php
include('connection.php');
session_start();

if(isset($_POST["submit"]))
{
    $userid = $_POST["u_id"];
    $req = $_POST["requirement"];
    $ptype = $_POST["property"];
    $pcate = $_POST["category"];
    $BHK = $_POST["BHK"];
    $furnished = $_POST["furnished"];
    $carea = $_POST["covered_area"];
    $age = $_POST["age_num"];
    $dist = $_POST["district"];
    $area = $_POST["area"];
    $pin = $_POST["pincode"];
    $add = $_POST["address"];
    $feature = $_POST["features"];
    $price = $_POST["price"];
    $fileTmp = $_FILES["image"]["tmp_name"];   
    $image = mysqli_real_escape_string ($conn, file_get_contents($fileTmp));
    $bed = $_POST["bedroom"];
    $bath = $_POST["bathroom"];
    $floor = $_POST["floor"];
    $pro_status = $_POST["pro_status"];
    $status = $_POST["status"];

    $sql = "INSERT INTO property_details (u_id,req_type,p_type,p_category,BHK,furnished,covered_area,p_age,p_district,p_area,p_pincode,p_address,
    p_features,p_price,p_image,bedroom,bathroom,floor,pro_status,p_status) VALUES ('$userid','$req','$ptype','$pcate','$BHK','$furnished',
    '$carea','$age','$dist','$area','$pin','$add','$feature','$price','$image','$bed','$bath','$floor','$pro_status','$status')";
    $check = mysqli_query($conn,$sql);
   
    if($check)
    {
        $_SESSION['message'] = "Post Request Sent Successfully";
        header('Location: http://localhost/Website3/index.php');
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>
