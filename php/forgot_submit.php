<?php      
    include('connection.php');
    session_start();
    
    if(isset($_POST["submit"]))
    {
        $em = $_POST ["email"];  
        $pass = $_POST ["pass"];  
        $repass = $_POST ["repass"];
    
        if($pass != $repass)
        {
            $_SESSION['message'] = "Passwords doesn't match";
            header('Location: forgot.php');
        }
        else
        {  
            $sql1 ="UPDATE user SET u_password = '$pass' WHERE u_email = '$em'";
            $result = mysqli_query ($conn, $sql1);
                
            if($result)
            {  
                $_SESSION['message'] = "Updated Successfully";
                header('Location: http://localhost/Website3/index.php');  
            }  
            else
            {  
                $_SESSION['message'] = "Updation failed";
                header('Location: forgot.php');
            }     
        }
    }
?>   