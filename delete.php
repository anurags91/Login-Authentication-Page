<?php
include("connection.php");
$id = $_GET['id'];
$query = "DELETE FROM data WHERE id ='$id'";
$data = mysqli_query($conn,$query);
if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url =http://localhost/php-practice/display.php" />
    <?php
    
}
else
{
    echo "<script>alert('Failed')</script>";

}
?>