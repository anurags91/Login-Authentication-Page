<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>File Upload</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileupload"> <br> <br>
        <input type="submit" name="submit" value="Upload File">
    </form>
</body>
</html>
<?php

// print_r($_FILES["fileupload"]);
$filename = $_FILES["fileupload"]["name"];
$tempname= $_FILES["fileupload"]["tmp_name"];
$folder="images/".$filename ;
// echo $folder;
move_uploaded_file($tempname,$folder);
echo "<img src ='$folder' height='100px' width='100px'>";
?>
