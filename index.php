<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
<style>
body{
background-image:url('Pro Img 2.png');
/* background-repeat: no-repeat;
background-size: cover; */
}    
</Style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="title">
            Registration Form
        </div>
        <div class="form">
        <div class="input_field">
                 <label > Image</label>
                 <input type="file" name="fileupload"style="width: 100%;"> <br>
             </div>
            <div class="input_field">
                 <label > First Name</label>
                 <input type="text" class="input" name="fname" required> <br>
             </div>
        
            <div class="input_field">
                <label > Last Name</label>
                <input type="text" class="input" name="lname"required> <br>
            </div>
            <div class="input_field">
                <label > Password</label>
                <input type="password" class="input" name="password"required> <br>
            </div>
            <div class="input_field">
                <label > Confirm Password</label>
                <input type="password" class="input" name="conpassword"required><br>
            </div>
            <div class="input_field">
                <label >Gender </label>
                <div class="select_box">
                    <select name="gender" required>
                        <option value="" >Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                
                    </select> <br>
                </div>
            </div> 
            <div class="input_field">
                <label > Email</label>
                <input type="text" class="input" name="email"required><br>
        </div>
        <div class="input_field">
                <label > Phone Number</label>
                <input type="text" class="input" name="phone"required><br>
        </div>
                <div class="input_field">
                <label style="margin-Right:125px;"> Caste</label>
                <input type="radio" name="caste" value="General"required><br> <label style="margin-Left:5px;">General</label>
                <input type="radio" name="caste"value="OBC"required><br> <label style="margin-Left:5px;">OBC</label>
                <input type="radio" name="caste"value="ST"required><br> <label style="margin-Left:5px;">ST</label>
                <input type="radio" name="caste"value="SC"required><br> <label style="margin-Left:5px;">SC</label>
        </div>
        <div class="input_field">
            <label style="margin-Right:70px;"> Language</label>
                <input type="checkbox" name="language[]" value="Hindi"><br> <label style="margin-Left:10px;">Hindi</label>
                <input type="checkbox" name="language[]"value="English"><br> <label style="margin-Left:10px;">English</label>
                
            
        </div>
        <div class="input_field">
            <label > Adress</label>
            <textarea class="textarea" name="address"required></textarea><br>

        </div> 
        <div  class="input_field terms">
                <label  class="check"> 
                <input type="checkbox" required>
                <span class="checkmark"></span>
             </label>
            <p>Agree to terms and conditions</p>
        </div>  
            <div class="input_field">
                <input  style="cursor:hand;" type="submit" value="Register" class="btn" name="register"> 
            </div> 
        </div>
        </form>
    </div>

</body>
</html>

<?php
if($_POST['register'])
{
    $filename = $_FILES["fileupload"]["name"];
$tempname= $_FILES["fileupload"]["tmp_name"];
$folder="images/".$filename ;
move_uploaded_file($tempname,$folder);

    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $pwd     = $_POST['password'];
    $cpwd    = $_POST['conpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $caste   = $_POST['caste'];
    $language   = $_POST['language'];
    $lang = implode(",",$language);
    $address = $_POST['address'];

    // if($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email !="" && $phone !="" && $address != "")
    // {

   $query = "INSERT INTO data(image,fname,lname,password,cpassword,gender,email,phone,caste,language,address) values( '$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang','$address')";
   $data = mysqli_query($conn,$query);
   if($data)
   {
    echo "<script> alert('Data Inserted Successfull')</script>";
   }
   else
   {
    echo "<script> alert('Failed')</script>";
   }
   
}
// else{
//     echo "<script>alert('Fill all the Field');</script>";
//  }
    
// }

?>