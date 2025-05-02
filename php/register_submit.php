<?php
include('connection.php');
session_start();

if(isset($_POST["submit"]))
{
    $fnm = $_POST["fname"];
    $lnm = $_POST["lname"];
    $em = $_POST["email"];
    $cont = $_POST["contact"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];

    if(!(preg_match('/^[0-9]{10}$/',$cont)))
    {
        $_SESSION['message'] = "Invalid Contact Number";
        header('Location: register.php');
    }
    else if($pass != $repass)
    {
        $_SESSION['message'] = "Passwords doesn't match";
        header('Location: register.php');
    }
    else
    {
        $sql ="SELECT * FROM user WHERE u_email='$em'";
        $result = mysqli_query($conn,$sql);
    
        if($result)
        {
            $num = mysqli_num_rows($result);
            if($num > 0)
            {
                $_SESSION['message'] = "User Already Exists";
                header('Location: register.php');
            }
            else
            {
            $sql = "INSERT INTO user (u_fname , u_lname , u_email , u_contact_no , u_password ) VALUES ('$fnm','$lnm','$em','$cont','$pass')";
            $check = mysqli_query($conn ,$sql);
    
               if($check)
                {
                    $_SESSION['message'] = "User Registered Successfully";
                    session_start();
                    $_SESSION['u_email'] = $em;
                    header('Location: http://localhost/Website3/index.php');
                }
               else
                {
                    echo mysqli_error($conn);
                }
            }    
        }        
    }
}
?>