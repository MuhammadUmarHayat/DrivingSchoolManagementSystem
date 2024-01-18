<?php

 include 'config.php';?>
<?php 


if(isset($_POST['save']))//signup button
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
    $usertype="admin";
    $_SESSION['username']=$userid; 
    if($password==$rpassword)   ////////////////////////////INSERT INTO `users`(`userid`, `name`, `password`, `email`, `phone`, `doe`, `status`) VALUES ('','','','','','','')
	{
     $query="INSERT INTO `users`(`userid`, `name`, `password`, `email`, `phone`, `doe`, `status`, `question`, `answer`, `usertype`) VALUES ('$userid','$name','$password','$email','$phone','$doe','$status','$question','$answer','$usertype')" ; 
     $result = mysqli_query($con,$query);
			
     
     header('Location:http://localhost/drivingschool/admin/index.php');//go to admin home page  
    }
    else
    {
        echo "password dosenot match with retype password";
    }
}
}
include("header.php");
include("navbar.php");
?>

<br><br><br><br><br>

    <h1>Admin Registration Form</h1>
    <form method="POST" action="adminsignup.php">
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
    <td><input type="password" class="form-control" name="password" required> </td>
       </tr>
       <tr>
    <td>Retype Password</td>
    <td><input type="password" class="form-control" name="rpassword" required> </td>
    
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="email" class="form-control" name="email" required> </td>
    
    </tr>
    <tr>
    <td>Phone</td>
    <td><input type="number" class="form-control" name="phone" required> </td>
    
    </tr>
    
   
    <tr>
    
    <td>Enter your secrete Question</td>
    <td><input type="text" class="form-control" name="question" required> </td>
    
   
    
    </tr>
    <tr>
    
    <td>Enter your secrete Answer</td>
    <td><input type="text" class="form-control" name="answer" required> </td>
    
   
    
    </tr>
    <tr>
    <td> </td>
    <td>  <button type="submit" class="btn btn-success " style="width: 220px;" name="save">Submit</button></td>
   
    
    </tr>
    </table>
</form>
</body>
</html>