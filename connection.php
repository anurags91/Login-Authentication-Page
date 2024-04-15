<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form1";

$conn = mysqli_connect($servername,$username,$password,$dbname);
{   
    if($conn)
    {
        //echo "Connection Successful";
    }
    else{
        echo "connection Failed".mysqli_connect_error;
    }
}
?>