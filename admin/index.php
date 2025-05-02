<?php  

include('connection.php'); 

if(isset($_POST["submit"]))
    {
    $email = $_POST ["email"];  
    $pwd = $_POST ["pass"];  
    $sql1 = "SELECT * FROM admin WHERE a_email='$email'";
    $result = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['a_password'] == $pwd) 
            {
                session_start();
                $_SESSION['a_email'] = $email;
                header('Location: http://localhost/Website3/admin/dashboard.php');
            } 
        else 
            {
                echo "Invalid password";
            }
        }
else 
    {
        echo "Invalid Email";
    }
}
?>   