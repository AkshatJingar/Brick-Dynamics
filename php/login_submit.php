<?php  
include('connection.php'); 
session_start();

if(isset($_POST["submit"]))
{
    $em = $_POST ["email"];  
    $pass = $_POST ["pass"];  
    $sql = "SELECT * FROM user WHERE u_email='$em'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        if($row['u_password'] == $pass) 
        {
            $_SESSION['u_email'] = $em;
            $_SESSION['message'] = "Logged In Successfully";
            header('Location: http://localhost/Website3/index.php');
        }
        else 
        {
            $_SESSION['message'] = "Invalid Password";
            header('Location: http://localhost/Website3/index.php');
        }
        }
    else 
    {
        $_SESSION['message'] = "Invalid Email";
        header('Location: login.php');
    }
}
?>   