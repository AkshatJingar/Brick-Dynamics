<?php      
    include('connection.php');  
    session_start();
    session_destroy();
    header('Location: http://localhost/Website3/index.php');
?>   