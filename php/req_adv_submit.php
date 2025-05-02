<?php
include('connection.php');
session_start();

$em = $_SESSION['u_email'];
$sql = "SELECT * FROM user WHERE u_email='$em'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$userid = $row['u_id'];

if(isset($_POST["submit"]))
{
    $property_id = $_POST["property_id"];
    $duration = $_POST["duration"];
    $start_date = $_POST["date"];
    $fileTmp = $_FILES["image"]["tmp_name"];   
    $image = mysqli_real_escape_string ($conn, file_get_contents($fileTmp));
    $status = $_POST["status"];

    //Code to add duration days to start_date to find end_date
    $start_datetime = new DateTime($start_date);      //Converts $date variable value as a string to date
    $interval = new DateInterval("P{$duration}D");    //Converts $duration variable value as a string to date
    $end_datetime = $start_datetime->add($interval);  //Adds days into date
    $end_date = $end_datetime->format('Y-m-d');       //Stores result of addition to a Variable in form of date

    $sql = "INSERT INTO advertisement_property (u_id,p_id,adv_duration,start_date,end_date,adv_image,adv_status) VALUES ('$userid','$property_id',
    '$duration','$start_date','$end_date','$image','$status')";
    $check = mysqli_query($conn,$sql);
    if($check)
    {
        $_SESSION['message'] = "Request Sent Successfully";
        header('Location: http://localhost/Website3/index.php');
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>
