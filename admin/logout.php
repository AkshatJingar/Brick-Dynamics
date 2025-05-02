<?php      
    include('connection.php');  
    session_start();
    if(isset($_SESSION['a_email']))
    {
        session_destroy();
        header('Location: http://localhost/Website3/admin/index.html');
    }
    else    
    {
        header('Location: http://localhost/Website3/admin/index.html');
    }
?>