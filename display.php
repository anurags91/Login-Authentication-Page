<?php
// session_start();
//  echo "Welcome ". $_SESSION['username'];
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-image:url('Pro Img 1.png');
            }
            table{
                background-color:white;
            }
            .update,.delete{
                        background-color:red;
                        color:white;
                        border:0
                        outline:none;
                        border-radius:5px;
                        height:23px;
                        width:80px;
                        cursor:pointer;

            }
            .delete{
                        background-color:orange;
                        
            }
        </style>
    </head>
    <body>

<?php
include("connection.php");
error_reporting(0);
//  $userprofile=$_SESSION['username']; 
//  if($userprofile === true)
//    {

//        }
//         else
//  {
//      header('location:display.php');
// }
// Step 2: Execute SQL query to fetch data
$query = "SELECT * FROM `data`";
$data=mysqli_query($conn,$query); 
$total = mysqli_num_rows($data);


// echo $total;
if($total != 0)
{
    
    ?>
    <h2 align="center"><mark>Displaying All Record</mark></h2>
   <center> <table border ="1" cellspacing="7" width="100%">
        <tr>
            <th width="5%">ID</th>
            <th width="5%">Photo</th>
            <th width="8%">First Name</th>
            <th width="8%">Last Name</th>
            <th width="10%">Gender</th>
            <th width="20%">Email</th>
            <th width="10%">Phone</th>
            <th width="10%">Caste</th>
            <th width="10%">Languages</th>
            <th width="20%">Address</th>
            <th width="15%">Operations</th>
        </tr>
        
    <?php 
   while($result = mysqli_fetch_assoc($data))
   {
     echo "<tr>
            <td>".$result['id']."</td>

            <td><img src='".$result['image']."' height='100px' width='100px'></td>

            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['gender']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone']."</td>
            <td>".$result['caste']."</td>
             <td>".$result['language']."</td>
            <td>".$result['address']."</td>
            
            <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
            
            <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a></td>
        </tr>";
   }
} 
else{
    echo "No Record Found";
}

?>
</table>
</center>
<a href="logout.php"> <input type="submit" value="Logout" style="background-color:blue;"></a>
</html>
<script>
    function checkdelete()
    {
        return confirm('Are you sure to delete this record ?')
    }
</script>

