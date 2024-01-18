<?php include 'config.php';?>
<?php 


if(isset($_POST['save']))
{
if(!empty($_POST)) 
{
    ////username,password,rpassword
    $name = $_POST['name'];
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $phone = $_POST['phone'];
    $doe=date('d/m/y');

    $status="active";
    
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $usertype="user";
    $_SESSION['username']=$userid; 
    if($password==$rpassword)////////////////////////////INSERT INTO `users`(`userid`, `name`, `password`, `email`, `phone`, `doe`, `status`) VALUES ('','','','','','','')
	{
     $query="INSERT INTO `users`(`userid`, `name`, `password`, `email`, `phone`, `doe`, `status`, `question`, `answer`, `usertype`) VALUES ('$userid','$name','$password','$email','$phone','$doe','$status','$question','$answer','$usertype')" ; 
     $result = mysqli_query($con,$query);
			
     
     header('Location:http://localhost/drivingschool/user/index.php');  
    }
    else
    {
        echo "password dosenot match with retype password";
    }
}
}
?>




<?php
include("header.php");
include("navbar.php");
?>
 
<br><br><br><br><br>
  <!-- ======= Hero Section ======= -->
  <section   class="d-flex align-items-center">

    <div  class="container">
      <div class="row">
      <div > 
    <h2>User Registration Form</h2>
    </div>
</div>
    <form method="POST" action="usersignup.php">
    <table>
    <tr>
    <td> Full Name</td>
    <td><input type="text" class="form-control" name="name" required> </td>
    
    </tr>  
    <tr>
    <td> User Name</td>
    <td><input type="text" class="form-control" name="userid" required> </td>
    
    </tr>
    <tr>
    <td>Password </td>
    <td><input type="password" name="password" class="form-control" required> </td>
       </tr>
       <tr>
    <td>Retype Password</td>
    <td><input type="password" name="rpassword" class="form-control" required> </td>
    
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="email" name="email" class="form-control" required> </td>
    
    </tr>
    <tr>
    <td>Phone</td>
    <td><input type="number" name="phone" class="form-control"  required> </td>
    
    </tr>
    
   
    <tr>
    
    <td>Enter your secrete Question</td>
    <td><input type="text" name="question" class="form-control" required> </td>
    
   
    
    </tr>
    <tr>
    
    <td>Enter your secrete Answer</td>
    <td><input type="text" name="answer" class="form-control" required> </td>
    
   
    
    </tr>
    <tr>
    <td> </td>
    <td>  <button type="submit" style="width: 220px;" class="btn btn-success" name="save">Submit</button></td>
   
    
    </tr>
    </table>
</form>
</div>
</div>
</div>
</body>
</html>