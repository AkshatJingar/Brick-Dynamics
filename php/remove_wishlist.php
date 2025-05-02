<?php
    include('connection.php');
    session_start();
    if(isset($_POST['wishlist']))
    {
        $w_id = $_POST['wishlist'];
        $sql = "DELETE FROM wishlist WHERE w_id='$w_id'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
           $_SESSION['message'] = "Property Removed From Wishlist";
           header('Location: my_wishlist.php');
        }
        else
        {
          echo "mysqli_query($conn)";
        }
}