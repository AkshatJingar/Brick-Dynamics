<?php  
include('connection.php'); 
session_start();
$em = $_SESSION['u_email'];
$sql = "SELECT u_id FROM user WHERE u_email='$em'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row['u_id'];

if(isset($_POST["submit"]))
{
    $feedback = $_POST ["feedback"];  
    
    $sql="INSERT INTO feedback (u_id,feedback) VALUES ('$id','$feedback')";
    $check = mysqli_query($conn,$sql);
   
    if($check)
    {
        $_SESSION['message'] = "Feedback Sent Successfully";
        header('Location: http://localhost/Website3/index.php'); 
    }
    else
    {
        echo "Error:mysqli_error($conn)";
    }
}
?>   