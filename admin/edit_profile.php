
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";
$schoolid ;
$title;
                       
    $description;
    $price ;
    $duration;
     $startingDate;
     $endingDate;
       $status;
       $id= $_GET['id'];
$result = $con->query("SELECT * FROM `users`  WHERE `userid`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
	
       
	

        
                 $userid = $row['userid'];
                 $name=$row['name'];
                                        
                     $email=$row['email'];
                     $phone =$row['phone'];
                     

//userid,name,email,phone

		
}
}


if (isset($_POST['save']))
 {
    $userid = $_GET['id'];

    
    // $userid = $row['userid'];
    // $name=$row['name'];
                           
    //     $email=$row['email'];
    //     $phone =$row['phone'];
        
 
     // $userid = $_POST['userid'];
     $name=$_POST['name'];
           
          
         $email=$_POST['email'];
         $phone =$_POST['phone'];
               
          


       $query = "update `users` set `name`='$name', `email`='$email', `phone`='$phone' where userid='$userid'";

            $rslt = mysqli_query($con, $query);


            header('Location:http://localhost/drivingschool/admin/profile.php');
          
        
        }
   
        include('header.php');
        include('navbar.php');

?>

                        


<br><br><br>
<form method="post" action="edit_profile.php?id=<?php echo $userid; ?>"> 
                    <div class="center">
                    
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $userid; ?></td>
                            </tr>
                        
                            <tr>
                                <td>Name </td>
                                <td><input type="text" name="name" value="<?php echo $name; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Email </td>
                                <td><input type="email" name="email" value="<?php echo $email; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Phone Number </td>
                                <td><input type="text" name="phone" value="<?php echo $phone; ?>"> </td>
                            </tr>

                            
                           <tr>
                                <td> </td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>

    </div>


</body>
</html>