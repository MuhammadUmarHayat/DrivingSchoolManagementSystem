
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

if (isset($_POST['save']))
 {
    
////oldPw1,oldPw2,newPw1,newPw2
  

      $oldPw1 = $_POST['oldPw1'];
     $oldPw2=$_POST['oldPw2'];
           
          
         $newPw1=$_POST['newPw1'];
         $newPw2 =$_POST['newPw2'];
         
if($oldPw1==$oldPw2)
{
    $query="select * from `users` where `userid`='$username' and `password`='$oldPw1'" ;
    $result = $con->query($query);	
    if ($result->num_rows > 0) 
    {// user password is correct 
//update new password now

$query = "update `users` set `password`='$newPw1' where userid='$username'";
$message="Password has been updated successfully";

$rslt = mysqli_query($con, $query);


    }
    else
    {
        $message= "Old Password is not correct";
    }

}
else
{
    $message= "Old Password not matched";
}

      
        
}
    
include('header.php');
include('navbar.php');


?>

                        




<br><br><br>
<form method="post" action="changePassword.php" >
                    <div class="center">
                 <h2>Change Password</h2>
                        <table>
                        <tr>
                                <td>User Name</td>
                                <td><?php echo $username ?> </td>
                            </tr>
                            <tr>
                                <td>Enter old password </td>
                                <td><input type="password" name="oldPw1" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Enter old password again </td>
                                <td><input type="password" name="oldPw2" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter New Password </td>
                                <td><input type="password" name="newPw1" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter New Password </td>
                                <td><input type="password" name="newPw2" required> <span class="error">*</span> </td>
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