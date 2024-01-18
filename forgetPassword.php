
<?php 
include 'config.php';

$message="";

if (isset($_POST['save']))
 {
    
///userid,question,answer,newPw1,newPw2
  

      $userid = $_POST['userid'];
     $question=$_POST['question'];
           
          
         $answer=$_POST['answer'];
         $newPw1 =$_POST['newPw1'];
         $newPw2 =$_POST['newPw2'];
         
if($newPw1==$newPw2)
{
    $query="select * from `users` where `userid`='$userid' and `question`='$question' and `answer`='$answer'" ;
    $result = $con->query($query);	
    if ($result->num_rows > 0) 
    {// user password is correct 
//update new password now

$query = "update `users` set `password`='$newPw1' where userid='$userid'";


$rslt = mysqli_query($con, $query);
$message="Password has been updated successfully";


    }
    else
    {
        $message= "Secrete Question and Answer is not correct";
    }

}
else
{
    $message= "New Passwords not matched ";
}

      
        
}
    

  
include('header.php');
include('navbar.php');

?>

                        

<br><br><br>


<form method="post" action="forgetPassword.php" >
                    <div class="center">
                 <h2>Recover your Password</h2>
                        <table>
                        <tr> 
                                <td>Enter User Name</td>
                                 <td><input type="text" name="userid" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter your secreate question </td>
                                <td><input type="text" name="question" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Enter your secrete answer </td>
                                <td><input type="text" name="answer" required> <span class="error">*</span> </td>
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