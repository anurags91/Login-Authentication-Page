
<?php include("connection.php");

session_start();

$id = $_GET['id'];
$userprofile=$_SESSION['username']; 
if($userprofile === true)
  {

      }
       else
{
    header('location:display.php');
}
$query = "SELECT * FROM `data` where id='$id'";
$data=mysqli_query($conn,$query); 
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$language1 = $result['language'];
$language2 = explode(",",$language1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
body{
background-color:orange;
background-repeat: no-repeat;
background-size: cover;
}
</Style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST" >
        <div class="title">
         Update Student Details
        </div>
        <div class="form">
            <div class="input_field">
                 <label > First Name</label>
                 <input type="text" value="<?php echo $result['fname']?>"class="input" name="fname" required> <br>
             </div>
        
            <div class="input_field">
                <label > Last Name</label>
                <input type="text" value="<?php echo $result['lname']?>"class="input" name="lname"required> <br>
            </div>
            <div class="input_field">
                <label > Password</label>
                <input type="password" value="<?php echo $result['password']?>"class="input" name="password"required> <br>
            </div>
            <div class="input_field">
                <label > Confirm Password</label>
                <input type="password" class="input"value="<?php echo $result['cpassword']?>" name="conpassword"required><br>
            </div>
            <div class="input_field">
                <label >Gender </label>
                <div class="select_box">

                    <select name="gender" required>
                        <option value="" >Select</option>

                        <option value="male"
                        <?php 
                        if($result['gender']=='male')
                        {
                            echo "Selected";
                        }
                        
                        ?>
                    >
                        Male</option>
                        <option value="female"
                        <?php 
                        if($result['gender']=='female')
                        {
                            echo "Selected";
                        }
                        
                        ?>
                        
                    >female</option>
                
                    </select> <br>
                </div>
            </div> 
            <div class="input_field">
                <label > Email</label>
                <input type="text" value="<?php echo $result['email']?>"class="input" name="email"required><br>
        </div>
        <div class="input_field">
                <label > Phone Number</label>
                <input type="text"value="<?php echo $result['phone']?> "class="input" name="phone"required><br>
        </div>
        <div class="input_field">
                <label style="margin-Right:125px;"> Caste</label>
                <input type="radio" name="caste" value="General"required
                <?php
                if($result['caste'] == "General")
                {
                    echo"checked";
                }
                ?>
                >
                <br> <label style="margin-Left:5px;">General</label>
                <input type="radio" name="caste"value="OBC"required
                <?php
                if($result['caste'] == "OBC")
                {
                    echo"checked";
                }
                ?>
                >
                <br> <label style="margin-Left:5px;">OBC</label>
                <input type="radio" name="caste"value="ST"required
                <?php
                if($result['caste'] == "ST")
                {
                    echo"checked";
                }
                ?>
                
                
                >
                <br> <label style="margin-Left:5px;">ST</label>
                <input type="radio" name="caste"value="SC"required
                <?php
                if($result['caste'] == "SC")
                {
                    echo"checked";
                }
                ?>
                >
                <br> <label style="margin-Left:5px;">SC</label>
        </div>
        <div class="input_field">
            <label style="margin-Right:70px;">Language</label>

                <input type="checkbox" name="language[]" value="Hindi"
                <?php
                        if(in_array('Hindi',$language2))
                        {
                            echo "checked";
                        }
                ?>
                
                >
                <br> <label style="margin-Left:10px;">Hindi</label>
                <input type="checkbox" name="language[]"value="English"
                <?php
                        if(in_array('English',$language2))
                        {
                            echo "checked";
                        }
                ?>
                
                
                >
                <br> <label style="margin-Left:10px;">English</label>
                
            
        </div>



        <div class="input_field">
            <label > Adress</label>
            <textarea class="textarea" name="address"required><?php echo $result['address'];?>
            </textarea><br>

        </div> 
        <div  class="input_field terms">
                <label  class="check" required> 
                <input type="checkbox">
                <span class="checkmark"></span>
             </label>
            <p>Agree to terms and conditions</p>
        </div>  
            <div class="input_field">
                <input  style="cursor:hand;" type="submit" value="update" class="btn" name="update"> 
            </div> 
        </div>
        </form>
    </div>

</body>
</html>

<?php

if($_POST['update'])
{
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

   
   $query = "UPDATE data SET fname='$fname',lname='$lname',password
   ='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',caste='$caste',language='$lang',address='$address' WHERE id='$id'";
   $data = mysqli_query($conn,$query);
   if($data)
   {
    echo "<script>alert('Record Updated')</script>";
    ?>
    <!-- for refreshing the page automatically -->
    <meta http-equiv = "refresh" content = "2; url =http://localhost/php-practice/display.php" />
    <?php
   }
   else
   {
    echo "Failed";
   }
}
// else{
//     echo "<script>alert('Fill all the Field');</script>";
//  }
    
// }


