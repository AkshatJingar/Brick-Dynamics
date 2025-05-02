<?php
$server="localhost";
$user="root";
$pass="";
$db="bd_details";
$conn = mysqli_connect($server,$user,$pass,$db);
if($conn)
{
  //  echo "Connection Successfully <br>";
}
else
{
    echo mysqli_connect_error();
}
?>