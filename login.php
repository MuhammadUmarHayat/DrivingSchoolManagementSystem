<?php include 'config.php';?>
<?php 

$message="";
if(isset($_POST['login']))//login button
{
if(!empty($_POST)) 
{
    ////username,password,rpassword
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $_SESSION['username']=$username;
    $query="select * from `users` where `userid`='$username' and `password`='$password' and usertype='$usertype'" ;
    $result = $con->query($query);//execute	
    if ($result->num_rows > 0) 
{  
    if($usertype=="admin")
	{
    
   
header('Location:http://localhost/drivingschool/admin/index.php');//go to admin panel
   
  }
    else if($usertype=="user")
    { 
        header('Location:http://localhost/drivingschool/user/index.php');//go to user panel
    }    
}
else {
  $message="Enter correct username and password";
}
}
}
?>

<?php
include('header.php');
?>


<?php
include('navbar.php');
?>
 
<br><br><br>
<section id="login" class="about">
    
    
   
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <h2> Login</h2>
                </div>
                <div class="card-body">
                <form method="POST" action="login.php">
                    <div class="form-group">
                            <label for="usertype">Choose User Type</label>
                            
<select class="form-control" name="usertype" id="usertype">
  <option class="form-control" value="admin">Admin</option>
  <option class="form-control" value="user">User</option>
  
</select> 
                            
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"placeholder="Enter your password">
                        </div>
                        
                        <div class="form-group"> <button type="submit" class="btn btn-primary" name="login">Login</button></div>
                        <div class="form-group"> <a  href="forgetPassword.php">Recover Password </a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






</section>
